<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use App\Models\Department;
use App\Models\Member;
use App\Models\Profession;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class MemberAdminController extends Controller
{
    /**
     * Liste des membres.
     */
    public function index(Request $request)
    {
        $query = Member::with([
            'profession',
            'region',
            'department',
            'commune',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Recherche
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('member_number', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");

            });
        }

        /*
        |--------------------------------------------------------------------------
        | Filtres
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('region_id')) {
            $query->where('region_id', $request->region_id);
        }

        if ($request->filled('profession_id')) {
            $query->where('profession_id', $request->profession_id);
        }

        /*
        |--------------------------------------------------------------------------
        | Membres
        |--------------------------------------------------------------------------
        */

        $members = $query
            ->orderByDesc('registered_at')
            ->paginate(15)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Statistiques
        |--------------------------------------------------------------------------
        */

        $totalMembers = Member::count();

        $activeMembers = Member::where('status', 'active')->count();

        $pendingMembers = Member::where('status', 'pending')->count();

        $disabledMembers = Member::where('status', 'disabled')->count();

        /*
        |--------------------------------------------------------------------------
        | Filtres
        |--------------------------------------------------------------------------
        */

        $regions = Region::orderBy('name')->get();

        $professions = Profession::orderBy('name')->get();

        /*
        |--------------------------------------------------------------------------
        | Vue
        |--------------------------------------------------------------------------
        */

        return view('admin.members.index', compact(
            'members',
            'totalMembers',
            'activeMembers',
            'pendingMembers',
            'disabledMembers',
            'regions',
            'professions'
        ));
    }

    /**
     * Formulaire de création d'un membre.
     */
    public function create()
    {
        $regions = Region::orderBy('name')->get();

        $departments = Department::with('region')
            ->orderBy('name')
            ->get();

        $communes = Commune::with('department')
            ->orderBy('name')
            ->get();

        $professions = Profession::orderBy('name')->get();

        return view(
            'admin.members.create',
            compact(
                'regions',
                'departments',
                'communes',
                'professions'
            )
        );
    }

    /**
     * Enregistrer un nouveau membre.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'full_name' => [
                'required',
                'string',
                'max:255',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
            ],

            'profession_id' => [
                'required',
                'exists:professions,id',
            ],

            'region_id' => [
                'required',
                'exists:regions,id',
            ],

            'department_id' => [
                'required',
                'exists:departments,id',
            ],

            'commune_id' => [
                'required',
                'exists:communes,id',
            ],

            'address' => [
                'nullable',
                'string',
                'max:500',
            ],

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'status' => [
                'required',
                'in:pending,active',
            ],

        ], [

            'full_name.required' => 'Le nom complet est obligatoire.',

            'phone.required' => 'Le numéro de téléphone est obligatoire.',

            'profession_id.required' => 'La profession est obligatoire.',

            'profession_id.exists' => 'La profession sélectionnée est invalide.',

            'region_id.required' => 'La région est obligatoire.',

            'region_id.exists' => 'La région sélectionnée est invalide.',

            'department_id.required' => 'Le département est obligatoire.',

            'department_id.exists' => 'Le département sélectionné est invalide.',

            'commune_id.required' => 'La commune est obligatoire.',

            'commune_id.exists' => 'La commune sélectionnée est invalide.',

            'photo.image' => 'Le fichier sélectionné doit être une image.',

            'photo.mimes' => 'La photo doit être au format JPG, JPEG ou PNG.',

            'photo.max' => 'La photo ne doit pas dépasser 2 Mo.',

            'status.required' => 'Le statut est obligatoire.',

            'status.in' => 'Le statut sélectionné est invalide.',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Vérification de la hiérarchie géographique
        |--------------------------------------------------------------------------
        */

        $department = Department::findOrFail(
            $validated['department_id']
        );

        if (
            (int) $department->region_id !==
            (int) $validated['region_id']
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'department_id' => 'Le département sélectionné ne correspond pas à la région choisie.',
                ]);
        }

        $commune = Commune::findOrFail(
            $validated['commune_id']
        );

        if (
            (int) $commune->department_id !==
            (int) $validated['department_id']
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'commune_id' => 'La commune sélectionnée ne correspond pas au département choisi.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Génération du numéro membre
        |--------------------------------------------------------------------------
        */

        do {

            $memberNumber =
                'UHSAS-'.
                now()->format('Y').
                '-'.
                strtoupper(Str::random(6));

        } while (
            Member::where(
                'member_number',
                $memberNumber
            )->exists()
        );

        /*
        |--------------------------------------------------------------------------
        | Photo
        |--------------------------------------------------------------------------
        */

        $photoPath = null;

        if ($request->hasFile('photo')) {

            $photoPath = $request
                ->file('photo')
                ->store(
                    'members/photos',
                    'public'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Dates
        |--------------------------------------------------------------------------
        */

        $registeredAt = now();

        $activatedAt =
            $validated['status'] === 'active'
                ? now()
                : null;

        /*
        |--------------------------------------------------------------------------
        | Création
        |--------------------------------------------------------------------------
        */

        $member = Member::create([

            'member_number' => $memberNumber,

            'full_name' => $validated['full_name'],

            'phone' => $validated['phone'],

            'profession_id' => $validated['profession_id'],

            'region_id' => $validated['region_id'],

            'department_id' => $validated['department_id'],

            'commune_id' => $validated['commune_id'],

            'address' => $validated['address'] ?? null,

            'photo' => $photoPath,

            'status' => $validated['status'],

            'registered_at' => $registeredAt,

            'activated_at' => $activatedAt,

        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirection
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'admin.members.show',
                $member
            )
            ->with(
                'success',
                'Le membre '.
                $member->full_name.
                ' a été enregistré avec succès.'
            );
    }

    /**
     * Afficher les détails d'un membre.
     */
    public function show(Member $member)
    {
        $member->load([
            'profession',
            'region',
            'department',
            'commune',
            'contributions',
        ]);

        return view(
            'admin.members.show',
            compact('member')
        );
    }

    /**
     * Formulaire de modification.
     */
    public function edit(Member $member)
    {
        $regions = Region::orderBy('name')->get();

        $departments = Department::with('region')
            ->orderBy('name')
            ->get();

        $communes = Commune::with('department')
            ->orderBy('name')
            ->get();

        $professions = Profession::orderBy('name')->get();

        return view(
            'admin.members.edit',
            compact(
                'member',
                'regions',
                'departments',
                'communes',
                'professions'
            )
        );
    }

    /**
     * Mettre à jour un membre.
     */
    public function update(
        Request $request,
        Member $member
    ) {
        $validated = $request->validate([

            'full_name' => [
                'required',
                'string',
                'max:255',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
            ],

            'profession_id' => [
                'required',
                'exists:professions,id',
            ],

            'region_id' => [
                'required',
                'exists:regions,id',
            ],

            'department_id' => [
                'required',
                'exists:departments,id',
            ],

            'commune_id' => [
                'required',
                'exists:communes,id',
            ],

            'address' => [
                'nullable',
                'string',
                'max:500',
            ],

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],

            'status' => [
                'required',
                'in:pending,active,disabled',
            ],

        ]);

        /*
        |--------------------------------------------------------------------------
        | Vérification géographique
        |--------------------------------------------------------------------------
        */

        $department = Department::findOrFail(
            $validated['department_id']
        );

        if (
            (int) $department->region_id !==
            (int) $validated['region_id']
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'department_id' => 'Le département sélectionné ne correspond pas à la région choisie.',
                ]);
        }

        $commune = Commune::findOrFail(
            $validated['commune_id']
        );

        if (
            (int) $commune->department_id !==
            (int) $validated['department_id']
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'commune_id' => 'La commune sélectionnée ne correspond pas au département choisi.',
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Photo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('photo')) {

            if ($member->photo) {

                Storage::disk('public')
                    ->delete($member->photo);
            }

            $member->photo = $request
                ->file('photo')
                ->store(
                    'members/photos',
                    'public'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | Activation
        |--------------------------------------------------------------------------
        */

        $oldStatus = $member->status;

        if (
            $validated['status'] === 'active' &&
            $oldStatus !== 'active'
        ) {
            $member->activated_at = now();
        }

        /*
         * On ne remet PAS activated_at à null lorsqu'un
         * membre passe en pending ou disabled.
         *
         * Cela permet de conserver son historique
         * d'activation.
         */

        /*
        |--------------------------------------------------------------------------
        | Mise à jour
        |--------------------------------------------------------------------------
        */

        $member->full_name =
            $validated['full_name'];

        $member->phone =
            $validated['phone'];

        $member->profession_id =
            $validated['profession_id'];

        $member->region_id =
            $validated['region_id'];

        $member->department_id =
            $validated['department_id'];

        $member->commune_id =
            $validated['commune_id'];

        $member->address =
            $validated['address'] ?? null;

        $member->status =
            $validated['status'];

        $member->save();

        /*
        |--------------------------------------------------------------------------
        | Redirection
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route(
                'admin.members.show',
                $member
            )
            ->with(
                'success',
                'Les informations du membre ont été mises à jour avec succès.'
            );
    }

    /**
     * Désactiver un membre.
     *
     * On ne supprime pas réellement le membre.
     */
    public function destroy(Member $member)
    {
        $member->update([
            'status' => 'disabled',
        ]);

        return redirect()
            ->route('admin.members.index')
            ->with(
                'success',
                'Le membre a été désactivé avec succès.'
            );
    }

    /**
     * Activer un membre.
     */
    public function activate(Member $member)
    {
        $member->update([
            'status' => 'active',
            'activated_at' => now(),
        ]);

        return redirect()
            ->route(
                'admin.members.show',
                $member
            )
            ->with(
                'success',
                'Le membre a été activé avec succès.'
            );
    }
}
