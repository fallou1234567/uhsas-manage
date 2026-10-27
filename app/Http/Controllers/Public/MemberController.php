<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MemberController extends Controller
{
    public function show(Member $member)
    {
        $member->load([
            'profession',
            'region',
            'department',
            'commune',
            'card',
        ]);

        return view('member.public', compact('member'));
    }

    public function qr(Member $member): Response
    {
        $url = route('member.public', [
            'member' => $member->id,
        ]);

        $svg = QrCode::format('svg')
            ->size(300)
            ->margin(2)
            ->errorCorrection('H')
            ->generate($url);

        return response($svg, 200)
            ->header('Content-Type', 'image/svg+xml')
            ->header('Cache-Control', 'public, max-age=3600');
    }

    /**
     * Page de recherche par téléphone.
     */
    public function index()
    {
        return view('public.update-search');
    }

    /**
     * Recherche les membres associés au téléphone.
     */
    public function search(Request $request)
    {
        $validated = $request->validate([
            'phone' => ['required', 'string', 'max:30'],
        ], [
            'phone.required' => 'Veuillez saisir votre numéro de téléphone.',
        ]);

        $phone = preg_replace('/[\s().-]+/', '', $validated['phone']);

        $members = Member::query()
            ->whereNotNull('phone')
            ->whereRaw(
                "REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(phone, ' ', ''), '-', ''), '.', ''), '(', ''), ')', '') = ?",
                [$phone]
            )
            ->select([
                'id',
                'member_number',
                'first_name',
                'last_name',
                'phone',
                'photo',
                'birth_date',
            ])
            ->limit(10)
            ->get();

        if ($members->isEmpty()) {
            return back()
                ->withInput()
                ->with('search_error',
                    'Aucun membre trouvé avec ce numéro. Vérifiez le numéro saisi.'
                );
        }

        // Une seule fiche : accéder directement à la modification.
        if ($members->count() === 1) {
            return redirect()->route(
                'member.public.update.edit',
                $members->first()->id
            );
        }

        // Plusieurs fiches : permettre de choisir la bonne.
        return view('public.update-results', compact('members'));
    }

    /**
     * Affiche le formulaire de mise à jour.
     */
    public function edit(Member $member)
    {
        return view('public.update-form', compact('member'));
    }

    /**
     * Enregistre les informations modifiables.
     */
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'birth_date' => [
                'nullable',
                'date',
                'before_or_equal:today',
            ],
            'photo' => [
                'nullable',
                File::image()->max(3 * 1024),
            ],
        ], [
            'birth_date.date' => 'La date de naissance est invalide.',
            'birth_date.before_or_equal' =>
                'La date de naissance ne peut pas être dans le futur.',
            'photo.image' => 'Le fichier doit être une image valide.',
            'photo.max' => 'La photo ne doit pas dépasser 3 Mo.',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store(
                'members/photos',
                'public'
            );

            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }

            $validated['photo'] = $path;
        }

        $member->update($validated);
        return redirect()
            ->route('member.public.update.edit', $member->id)
            ->with('success', 'Votre fiche membre a été mise à jour avec succès !');
            }


        
/**
 * Recherche un membre pour afficher sa carte virtuelle.
 */
public function searchCard(Request $request)
{
    $validated = $request->validate([
        'phone' => ['required', 'string', 'max:30'],
    ], [
        'phone.required' => 'Veuillez saisir votre numéro de téléphone.',
    ]);

    $phone = preg_replace('/[\s().-]+/', '', $validated['phone']);

    $members = Member::query()
        ->whereNotNull('phone')
        ->whereRaw(
            "REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(phone, ' ', ''), '-', ''), '.', ''), '(', ''), ')', '') = ?",
            [$phone]
        )
        ->select([
            'id',
            'member_number',
            'first_name',
            'last_name',
            'phone',
            'photo',
            'birth_date',
        ])
        ->limit(10)
        ->get();

    if ($members->isEmpty()) {
        return back()
            ->withInput()
            ->with(
                'search_error',
                'Aucune carte trouvée pour ce numéro. Vérifiez le numéro saisi.'
            );
    }

    // Un seul membre : afficher directement sa carte virtuelle.
    if ($members->count() === 1) {
        return redirect()->route(
            'member.public.update.card',
            ['member' => $members->first()->id]
        );
    }

    // Plusieurs membres : afficher les résultats pour choisir la bonne carte.
    return view('public.update-results', [
        'members' => $members,
        'action' => 'card',
    ]);
}

/**
 * Affiche la carte virtuelle du membre.
 */
public function card(Member $member)
{
    $member->load([
        'profession',
        'region',
        'department',
        'commune',
        'card',
    ]);

    return view(
        'public.registration_success_uhsas',
        compact('member')
    );
}
}
