<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contribution;
use App\Models\Member;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    /**
     * Liste des cotisations.
     */
    public function index(Request $request)
    {
        $query = Contribution::with('member');

        /*
        |--------------------------------------------------------------------------
        | Recherche
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->whereHas('member', function ($q) use ($search) {

                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere(
                        'member_number',
                        'like',
                        "%{$search}%"
                    );

            });
        }

        /*
        |--------------------------------------------------------------------------
        | Montant
        |--------------------------------------------------------------------------
        */

        if ($request->filled('amount')) {

            $query->where(
                'amount',
                $request->amount
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Statut
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where(
                'status',
                $request->status
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Année
        |--------------------------------------------------------------------------
        */

        if ($request->filled('year')) {

            $query->where(
                'year',
                $request->year
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Liste
        |--------------------------------------------------------------------------
        */

        $contributions = $query
            ->latest('paid_at')
            ->paginate(15)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Statistiques
        |--------------------------------------------------------------------------
        */

        $totalContributions = Contribution::count();

        $totalAmount = Contribution::where('status', 'paid')
            ->sum('amount');

        $paidContributions = Contribution::where(
            'status',
            'paid'
        )->count();

        $pendingContributions = Contribution::where(
            'status',
            'pending'
        )->count();

        return view(
            'admin.contributions.index',
            compact(
                'contributions',
                'totalContributions',
                'totalAmount',
                'paidContributions',
                'pendingContributions'
            )
        );
    }

    /**
     * Formulaire d'enregistrement.
     */
    public function create()
    {
        $members = Member::where('status', 'active')
            ->orderBy('first_name')
            ->orderBy('last_name')
            ->get();

        return view(
            'admin.contributions.create',
            compact('members')
        );
    }

    /**
     * Enregistrer une cotisation.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'member_id' => [
                'required',
                'exists:members,id',
            ],

            'amount' => [
                'required',
                'integer',
                'in:5000,10000,15000,20000,25000',
            ],

            'year' => [
                'required',
                'integer',
                'min:2020',
                'max:'.(now()->year + 1),
            ],

            'paid_at' => [
                'required',
                'date',
            ],

            'status' => [
                'required',
                'in:paid,pending',
            ],

        ], [

            'member_id.required' => 'Veuillez sélectionner un membre.',

            'member_id.exists' => 'Le membre sélectionné n’existe pas.',

            'amount.required' => 'Veuillez sélectionner un montant.',

            'amount.in' => 'Le montant sélectionné est invalide.',

            'year.required' => 'L’année est obligatoire.',

            'paid_at.required' => 'La date de paiement est obligatoire.',

            'status.required' => 'Le statut du paiement est obligatoire.',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Vérifier que le membre est actif
        |--------------------------------------------------------------------------
        */

        $member = Member::findOrFail(
            $validated['member_id']
        );

        if ($member->status !== 'active') {

            return back()
                ->withInput()
                ->withErrors([
                    'member_id' => 'Seuls les membres actifs peuvent avoir une cotisation enregistrée.',
                ]);

        }

        /*
        |--------------------------------------------------------------------------
        | Vérifier les doublons
        |--------------------------------------------------------------------------
        */

        $alreadyExists = Contribution::where(
            'member_id',
            $validated['member_id']
        )
            ->where(
                'year',
                $validated['year']
            )
            ->exists();

        if ($alreadyExists) {

            return back()
                ->withInput()
                ->withErrors([
                    'member_id' => 'Une cotisation existe déjà pour ce membre pour l’année sélectionnée.',
                ]);

        }

        /*
        |--------------------------------------------------------------------------
        | Création
        |--------------------------------------------------------------------------
        */

        $contribution = Contribution::create([

            'member_id' => $validated['member_id'],

            'amount' => $validated['amount'],

            'year' => $validated['year'],

            'paid_at' => $validated['paid_at'],

            'status' => $validated['status'],

        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirection
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.contributions.index')
            ->with(
                'success',
                'La cotisation de '
                .$member->full_name
                .' a été enregistrée avec succès.'
            );
    }
}
