<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use App\Models\Department;
use App\Models\Member;
use App\Models\Profession;
use App\Models\Region;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class RegistrationController extends Controller
{
    /**
     * Afficher le formulaire d'inscription.
     */
    public function create(): View
    {
        $regions = Region::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $professions = Profession::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('public.registration', [
            'regions' => $regions,
            'professions' => $professions,
        ]);
    }


    /**
     * Retourner les départements d'une région.
     */
    public function departments(Region $region): JsonResponse
    {
        $departments = $region->departments()
            ->where('is_active', true)
            ->orderBy('name')
            ->get([
                'id',
                'name',
                'code',
            ]);

        return response()->json($departments);
    }


    /**
     * Retourner les communes d'un département.
     *
     * Si aucune commune n'est enregistrée,
     * le tableau retourné sera simplement [].
     */
    public function communes(Department $department): JsonResponse
    {
        $communes = $department->communes()
            ->where('is_active', true)
            ->orderBy('name')
            ->get([
                'id',
                'name',
                'code',
            ]);

        return response()->json($communes);
    }


    /**
     * Enregistrer une demande d'inscription.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'first_name' => [
                    'required',
                    'string',
                    'min:2',
                    'max:100',
                ],

                'last_name' => [
                    'required',
                    'string',
                    'min:2',
                    'max:100',
                ],

                'phone' => [
                    'required',
                    'string',
                    'min:9',
                    'max:30',
                ],

                // Email facultatif
                'email' => [
                    'nullable',
                    'email',
                    'max:255',
                ],

                'birth_date' => [
                    'required',
                    'date',
                    'before:today',
                ],

                'gender' => [
                    'required',
                    'in:male,female,other',
                ],

                'photo' => [
                    'required',
                    'image',
                    'mimes:jpg,jpeg,png,webp',
                    'max:5120',
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

                /*
                 * IMPORTANT :
                 * La commune est facultative.
                 *
                 * Un département peut ne pas avoir
                 * de commune disponible dans notre référentiel.
                 */
                'commune_id' => [
                    'nullable',
                    'exists:communes,id',
                ],

                'address' => [
                    'required',
                    'string',
                    'min:2',
                    'max:500',
                ],

                'terms' => [
                    'required',
                    'accepted',
                ],
            ],

            [
                'first_name.required' =>
                    'Le prénom est obligatoire.',

                'first_name.min' =>
                    'Le prénom doit contenir au moins 2 caractères.',

                'first_name.max' =>
                    'Le prénom ne doit pas dépasser 100 caractères.',


                'last_name.required' =>
                    'Le nom est obligatoire.',

                'last_name.min' =>
                    'Le nom doit contenir au moins 2 caractères.',

                'last_name.max' =>
                    'Le nom ne doit pas dépasser 100 caractères.',


                'phone.required' =>
                    'Le numéro de téléphone est obligatoire.',

                'phone.min' =>
                    'Veuillez saisir un numéro de téléphone valide.',


                'email.email' =>
                    'Veuillez saisir une adresse email valide.',


                'birth_date.required' =>
                    'La date de naissance est obligatoire.',

                'birth_date.date' =>
                    'La date de naissance est invalide.',

                'birth_date.before' =>
                    'La date de naissance doit être antérieure à aujourd’hui.',


                'gender.required' =>
                    'Veuillez sélectionner votre sexe.',

                'gender.in' =>
                    'Le sexe sélectionné est invalide.',


                'photo.required' =>
                    'La photo est obligatoire.',

                'photo.image' =>
                    'Le fichier sélectionné doit être une image.',

                'photo.mimes' =>
                    'La photo doit être au format JPG, JPEG, PNG ou WEBP.',

                'photo.max' =>
                    'La photo ne doit pas dépasser 5 Mo.',


                'profession_id.required' =>
                    'Veuillez sélectionner votre métier.',

                'profession_id.exists' =>
                    'Le métier sélectionné est invalide.',


                'region_id.required' =>
                    'Veuillez sélectionner votre région.',

                'region_id.exists' =>
                    'La région sélectionnée est invalide.',


                'department_id.required' =>
                    'Veuillez sélectionner votre département.',

                'department_id.exists' =>
                    'Le département sélectionné est invalide.',


                'commune_id.exists' =>
                    "La commune d'arrondissement sélectionnée est invalide.",


                'address.required' =>
                    'L’adresse ou la localité est obligatoire.',

                'address.min' =>
                    'Veuillez préciser votre adresse ou votre localité.',


                'terms.required' =>
                    'Vous devez confirmer les informations fournies.',

                'terms.accepted' =>
                    'Vous devez confirmer que les informations fournies sont exactes.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Vérification géographique supplémentaire
        |--------------------------------------------------------------------------
        |
        | On vérifie que le département appartient bien à la région.
        |
        */

        $department = Department::query()
            ->where('id', $validated['department_id'])
            ->where('region_id', $validated['region_id'])
            ->where('is_active', true)
            ->first();

        if (!$department) {

            return back()
                ->withErrors([
                    'department_id' =>
                        'Le département sélectionné ne correspond pas à la région choisie.',
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Vérification de la commune
        |--------------------------------------------------------------------------
        |
        | Si une commune est envoyée, elle doit obligatoirement
        | appartenir au département sélectionné.
        |
        */

        if (!empty($validated['commune_id'])) {

            $communeExists = Commune::query()
                ->where('id', $validated['commune_id'])
                ->where('department_id', $department->id)
                ->where('is_active', true)
                ->exists();

            if (!$communeExists) {

                return back()
                    ->withErrors([
                        'commune_id' =>
                            "La commune d'arrondissement sélectionnée ne correspond pas au département choisi.",
                    ])
                    ->withInput();
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Enregistrement
        |--------------------------------------------------------------------------
        */

        try {

            $member = DB::transaction(function () use ($request, $validated) {

                /*
                 * Génération du numéro membre.
                 */
                $lastMemberId = (Member::max('id') ?? 0) + 1;

                $memberNumber =
                    'UHSAS-' . str_pad(
                        $lastMemberId,
                        6,
                        '0',
                        STR_PAD_LEFT
                    );


                /*
                 * Upload de la photo.
                 */
                $photoPath = null;

                if ($request->hasFile('photo')) {

                    $photoPath = $request
                        ->file('photo')
                        ->store('members/photos', 'public');
                }


                /*
                 * Création du membre.
                 */
                return Member::create([
                    'member_number' => $memberNumber,

                    'first_name' =>
                        $validated['first_name'],

                    'last_name' =>
                        $validated['last_name'],

                    'phone' =>
                        $validated['phone'],

                    'email' =>
                        $validated['email'] ?? null,

                    'birth_date' =>
                        $validated['birth_date'],

                    'gender' =>
                        $validated['gender'],

                    'photo' =>
                        $photoPath,

                    'profession_id' =>
                        $validated['profession_id'],

                    'region_id' =>
                        $validated['region_id'],

                    'department_id' =>
                        $validated['department_id'],

                    'commune_id' =>
                        $validated['commune_id'] ?? null,

                    'address' =>
                        $validated['address'],

                    'registration_source' =>
                        'self',

                    'status' =>
                        'pending',

                    'registered_at' =>
                        now(),
                ]);
            });


            return redirect()
                ->route(
                    'registration.success',
                    $member
                );

        } catch (\Throwable $e) {

            report($e);

            return back()
                ->withErrors([
                    'general' =>
                        "Une erreur est survenue lors de l'inscription. Veuillez réessayer.",
                ])
                ->withInput();
        }
    }


/**
 * Afficher la carte virtuelle après inscription.
 */
public function success(Member $member)
{
    $member->load([
        'profession',
        'region',
        'department',
        'commune',
        'card',
    ]);

    return view(
        'public.registration-success',
        compact('member')
    );
}


/**
 * Générer la carte de membre en PDF.
 */
public function pdf(Member $member)
{
    $member->load([
        'profession',
        'region',
        'department',
        'commune',
        'card',
    ]);

    $pdf = Pdf::loadView(
        'public.card-pdf',
        compact('member')
    );

    /*
    |--------------------------------------------------------------------------
    | Format carte bancaire
    |--------------------------------------------------------------------------
    |
    | 85.6 mm × 53.98 mm
    |
    | Conversion :
    | 1 mm = 2.83465 pt
    |
    */

    $width = 85.6 * 2.83465;
    $height = 53.98 * 2.83465;

    $pdf->setPaper(
        [0, 0, $width, $height],
        'landscape'
    );

    return $pdf->download(
        'Carte-UHSAS-' .
        $member->member_number .
        '.pdf'
    );
}
}