<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

    <meta name="theme-color" content="#166534">

    <title>Inscription UHSAS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        html {
            -webkit-text-size-adjust: 100%;
            text-size-adjust: 100%;
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            min-height: 100dvh;
            -webkit-tap-highlight-color: transparent;
        }


        /*
        |--------------------------------------------------------------------------
        | FILIGRANE
        |--------------------------------------------------------------------------
        */

        .uhsas-page {
            position: relative;
            overflow: hidden;
            isolation: isolate;
        }

        .uhsas-page::before {
            content: "";

            position: fixed;

            width: 420px;
            height: 420px;

            right: -150px;
            top: 180px;

            background-image:
                url('{{ asset('asset/images/logo-uhsas.jpeg') }}');

            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;

            opacity: 0.035;

            pointer-events: none;

            z-index: -1;

            transform: rotate(-10deg);
        }

        .uhsas-page::after {
            content: "";

            position: fixed;

            width: 320px;
            height: 320px;

            left: -170px;
            bottom: 50px;

            background-image:
                url('{{ asset('asset/images/logo-uhsas.jpeg') }}');

            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;

            opacity: 0.025;

            pointer-events: none;

            z-index: -1;

            transform: rotate(12deg);
        }


        /*
        |--------------------------------------------------------------------------
        | INPUTS
        |--------------------------------------------------------------------------
        */

        .uhsas-input {

            width: 100%;

            min-height: 50px;

            border-radius: 12px;

            border: 1px solid #d1d5db;

            background-color: #ffffff;

            padding: 12px 14px;

            font-size: 16px;

            line-height: 1.4;

            outline: none;

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                background-color .2s ease;
        }

        .uhsas-input:focus {

            border-color: #15803d;

            box-shadow:
                0 0 0 3px rgba(21, 128, 61, .12);
        }

        .uhsas-input:disabled {

            background-color: #f3f4f6;

            color: #9ca3af;

            cursor: not-allowed;
        }

        .uhsas-input.input-error {

            border-color: #dc2626;

            background-color: #fffafa;
        }


        /*
        |--------------------------------------------------------------------------
        | LABEL
        |--------------------------------------------------------------------------
        */

        .uhsas-label {

            display: block;

            margin-bottom: 7px;

            color: #111827;

            font-size: 14px;

            font-weight: 600;
        }

        .required-star {

            color: #dc2626;
        }


        /*
        |--------------------------------------------------------------------------
        | ERREUR
        |--------------------------------------------------------------------------
        */

        .field-error {

            display: flex;

            align-items: flex-start;

            gap: 6px;

            margin-top: 6px;

            color: #dc2626;

            font-size: 13px;

            line-height: 1.4;
        }

        .field-error::before {

            content: "!";

            flex-shrink: 0;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            width: 17px;

            height: 17px;

            border-radius: 50%;

            background: #dc2626;

            color: white;

            font-size: 11px;

            font-weight: 700;
        }


        /*
        |--------------------------------------------------------------------------
        | SECTION
        |--------------------------------------------------------------------------
        */

        .uhsas-section {

            padding-bottom: 28px;

            border-bottom: 1px solid #f0f0f0;
        }

        .uhsas-section:last-child {

            border-bottom: 0;
        }


        /*
        |--------------------------------------------------------------------------
        | PHOTO
        |--------------------------------------------------------------------------
        */

        .photo-upload {

            border: 2px dashed #d1d5db;

            border-radius: 16px;

            padding: 20px;

            background: #fafafa;

            transition: all .2s ease;
        }

        .photo-upload:focus-within {

            border-color: #15803d;

            background: #f0fdf4;
        }


        /*
        |--------------------------------------------------------------------------
        | COMMUNE
        |--------------------------------------------------------------------------
        */

        #commune-container {

            transition:
                opacity .2s ease,
                transform .2s ease;
        }

        #commune-container.hidden {

            display: none;
        }


        /*
        |--------------------------------------------------------------------------
        | MOBILE
        |--------------------------------------------------------------------------
        */

        .mobile-safe-bottom {

            padding-bottom:
                max(20px, env(safe-area-inset-bottom));
        }


        /*
        |--------------------------------------------------------------------------
        | ANIMATION
        |--------------------------------------------------------------------------
        */

        @keyframes fadeUp {

            from {

                opacity: 0;

                transform: translateY(8px);
            }

            to {

                opacity: 1;

                transform: translateY(0);
            }
        }

        .animate-form {

            animation:
                fadeUp .35s ease-out;
        }


        /*
        |--------------------------------------------------------------------------
        | PETITS TELEPHONES
        |--------------------------------------------------------------------------
        */

        @media (max-width: 360px) {

            .uhsas-container {

                padding-left: 12px;

                padding-right: 12px;
            }

            .uhsas-form {

                padding: 20px 16px;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | DESKTOP
        |--------------------------------------------------------------------------
        */

        @media (min-width: 768px) {

            .uhsas-page::before {

                width: 600px;

                height: 600px;

                right: -220px;

                top: 160px;

                opacity: 0.04;
            }

            .uhsas-page::after {

                width: 450px;

                height: 450px;

                left: -250px;

                bottom: 50px;

                opacity: 0.03;
            }
        }


        .login-icon-button {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            width: 46px;
            height: 46px;

            color: #166534;
            background: #ffffff;
            border: 1px solid #dcfce7;
            border-radius: 50%;

            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.10);
            text-decoration: none;

            transition: all 0.2s ease;
        }

        .login-icon-button:hover {
            color: #ffffff;
            background: #166534;
            border-color: #166534;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(22, 101, 52, 0.22);
        }

        .login-icon-button:focus-visible {
            outline: 3px solid #86efac;
            outline-offset: 3px;
        }

        @media (max-width: 480px) {
            .login-icon-button {
                top: 12px;
                right: 12px;
                width: 42px;
                height: 42px;
            }
        }
    </style>

</head>


<body class="bg-gray-100 text-gray-900">


    <div class="uhsas-page min-h-screen">


        <a href="{{ route('login') }}" class="login-icon-button" aria-label="Se connecter" title="Se connecter">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                aria-hidden="true">
                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                <polyline points="10 17 15 12 10 7" />
                <line x1="15" y1="12" x2="3" y2="12" />
            </svg>
        </a>



        <div
            class="
            uhsas-container
            w-full
            max-w-2xl
            mx-auto
            px-3
            sm:px-4
            py-4
            sm:py-8
        ">


            <div
                class="
                bg-white
                rounded-2xl
                shadow-sm
                overflow-hidden
                animate-form
            ">


                {{-- =====================================================
                HEADER
            ====================================================== --}}

                <header
                    class="
                    bg-green-800
                    text-white
                    px-5
                    sm:px-8
                    py-8
                    sm:py-10
                    text-center
                ">

                    <img src="{{ asset('asset/images/logo-uhsas.jpeg') }}" alt="Logo UHSAS"
                        class="
                        mx-auto
                        h-20
                        sm:h-24
                        w-auto
                        object-contain
                        mb-4
                    ">

                    <h1
                        class="
                        text-2xl
                        sm:text-3xl
                        font-bold
                    ">
                        UHSAS
                    </h1>

                    <p
                        class="
                        mt-2
                        text-green-100
                        text-base
                    ">
                        Inscription membre
                    </p>

                    <p
                        class="
                        mt-4
                        text-sm
                        sm:text-base
                        text-green-100
                        leading-relaxed
                    ">
                        Remplissez simplement ce formulaire
                        pour demander votre carte de membre.
                    </p>

                    <div
                        class="
                        mt-5
                        inline-flex
                        items-center
                        gap-2
                        rounded-full
                        bg-white/10
                        px-4
                        py-2
                        text-xs
                        sm:text-sm
                        text-green-50
                    ">

                        <span
                            class="
                            h-2
                            w-2
                            rounded-full
                            bg-green-300
                        "></span>

                        Tous les champs sont obligatoires
                        sauf l’email.

                    </div>

                </header>


                {{-- =====================================================
                FORMULAIRE
            ====================================================== --}}

                <form method="POST" action="{{ route('registration.store') }}" enctype="multipart/form-data"
                    class="
                    uhsas-form
                    p-5
                    sm:p-7
                    space-y-8
                ">

                    @csrf


                    {{-- =================================================
                    ERREUR GENERALE
                ================================================== --}}

                    @if ($errors->has('general'))
                        <div
                            class="
                            rounded-xl
                            border
                            border-red-200
                            bg-red-50
                            p-4
                        ">

                            <p class="font-semibold text-red-800">

                                {{ $errors->first('general') }}

                            </p>

                        </div>
                    @endif


                    {{-- =================================================
                    INFORMATIONS PERSONNELLES
                ================================================== --}}

                    <section class="uhsas-section">

                        <div class="mb-5">

                            <h2
                                class="
                                text-lg
                                sm:text-xl
                                font-bold
                                text-gray-900
                            ">
                                1. Informations personnelles
                            </h2>

                            <p
                                class="
                                mt-1
                                text-sm
                                text-gray-500
                            ">
                                Renseignez vos informations personnelles.
                            </p>

                        </div>


                        {{-- Prénom / Nom --}}

                        <div
                            class="
                            grid
                            grid-cols-1
                            sm:grid-cols-2
                            gap-5
                        ">

                            {{-- Prénom --}}

                            <div>

                                <label for="first_name" class="uhsas-label">
                                    Prénom
                                    <span class="required-star">*</span>
                                </label>

                                <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}"
                                    required autocomplete="given-name"
                                    class="
                                    uhsas-input
                                    @error('first_name')
                                        input-error
                                    @enderror
                                "
                                    placeholder="Ex. Mamadou">

                                @error('first_name')
                                    <p class="field-error">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- Nom --}}

                            <div>

                                <label for="last_name" class="uhsas-label">
                                    Nom
                                    <span class="required-star">*</span>
                                </label>

                                <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}"
                                    required autocomplete="family-name"
                                    class="
                                    uhsas-input
                                    @error('last_name')
                                        input-error
                                    @enderror
                                "
                                    placeholder="Ex. Diop">

                                @error('last_name')
                                    <p class="field-error">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>


                        {{-- Téléphone / Email --}}

                        <div
                            class="
                            grid
                            grid-cols-1
                            sm:grid-cols-2
                            gap-5
                            mt-5
                        ">

                            {{-- Téléphone --}}

                            <div>

                                <label for="phone" class="uhsas-label">
                                    Téléphone
                                    <span class="required-star">*</span>
                                </label>

                                <input id="phone" type="tel" name="phone" value="{{ old('phone') }}"
                                    required inputmode="tel" autocomplete="tel"
                                    class="
                                    uhsas-input
                                    @error('phone')
                                        input-error
                                    @enderror
                                "
                                    placeholder="77 000 00 00">

                                @error('phone')
                                    <p class="field-error">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- Email --}}

                            <div>

                                <label for="email" class="uhsas-label">

                                    Email

                                    <span
                                        class="
                                        text-gray-400
                                        font-normal
                                    ">
                                        (facultatif)
                                    </span>

                                </label>

                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                    autocomplete="email"
                                    class="
                                    uhsas-input
                                    @error('email')
                                        input-error
                                    @enderror
                                "
                                    placeholder="exemple@email.com">

                                @error('email')
                                    <p class="field-error">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>


                        {{-- Date / Sexe --}}

                        <div
                            class="
                            grid
                            grid-cols-1
                            sm:grid-cols-2
                            gap-5
                            mt-5
                        ">

                            {{-- Date de naissance --}}

                            <div>

                                <label for="birth_date" class="uhsas-label">
                                    Date de naissance
                                    <span class="required-star">*</span>
                                </label>

                                <input id="birth_date" type="date" name="birth_date"
                                    value="{{ old('birth_date') }}" required
                                    class="
                                    uhsas-input
                                    @error('birth_date')
                                        input-error
                                    @enderror
                                ">

                                @error('birth_date')
                                    <p class="field-error">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- Sexe --}}

                            <div>

                                <label for="gender" class="uhsas-label">
                                    Sexe
                                    <span class="required-star">*</span>
                                </label>

                                <select id="gender" name="gender" required
                                    class="
                                    uhsas-input
                                    @error('gender')
                                        input-error
                                    @enderror
                                ">

                                    <option value="">
                                        Sélectionner
                                    </option>

                                    <option value="male" @selected(old('gender') === 'male')>
                                        Homme
                                    </option>

                                    <option value="female" @selected(old('gender') === 'female')>
                                        Femme
                                    </option>

                                    <option value="other" @selected(old('gender') === 'other')>
                                        Autre
                                    </option>

                                </select>

                                @error('gender')
                                    <p class="field-error">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>

                    </section>


                    {{-- =================================================
                    PHOTO
                ================================================== --}}

                    <section class="uhsas-section">

                        <div class="mb-5">

                            <h2
                                class="
                                text-lg
                                sm:text-xl
                                font-bold
                                text-gray-900
                            ">
                                2. Photo
                            </h2>

                            <p
                                class="
                                mt-1
                                text-sm
                                text-gray-500
                            ">
                                Une photo claire du visage est nécessaire
                                pour votre carte.
                            </p>

                        </div>


                        <div class="photo-upload">

                            <label for="photo" class="uhsas-label">

                                Photo du membre

                                <span class="required-star">
                                    *
                                </span>

                            </label>

                            <input id="photo" type="file" name="photo"
                                accept="image/jpeg,image/png,image/webp" capture="user" required
                                class="
                                block
                                w-full
                                text-sm
                                text-gray-600
                                file:mr-3
                                file:rounded-lg
                                file:border-0
                                file:bg-green-700
                                file:px-4
                                file:py-3
                                file:text-sm
                                file:font-semibold
                                file:text-white
                            ">

                            <p
                                class="
                                mt-3
                                text-xs
                                text-gray-500
                                leading-relaxed
                            ">
                                JPG, JPEG, PNG ou WEBP — maximum 5 Mo.
                                Sur téléphone, vous pouvez directement
                                prendre une photo.
                            </p>


                            {{-- Preview --}}

                            <div id="photoPreview" class="hidden mt-4">

                                <img id="previewImage" src="" alt="Aperçu"
                                    class="
                                    mx-auto
                                    h-32
                                    w-32
                                    rounded-full
                                    object-cover
                                    border-4
                                    border-white
                                    shadow
                                ">

                            </div>

                        </div>


                        @error('photo')
                            <p class="field-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </section>


                    {{-- =================================================
                    PROFESSION
                ================================================== --}}

                    <section class="uhsas-section">

                        <div class="mb-5">

                            <h2
                                class="
                                text-lg
                                sm:text-xl
                                font-bold
                                text-gray-900
                            ">
                                3. Activité professionnelle
                            </h2>

                        </div>


                        <label for="profession_id" class="uhsas-label">
                            Profession / Métier
                            <span class="required-star">*</span>
                        </label>

                        <select id="profession_id" name="profession_id" required
                            class="
                            uhsas-input
                            @error('profession_id')
                                input-error
                            @enderror
                        ">

                            <option value="">
                                Sélectionner votre métier
                            </option>

                            @foreach ($professions as $profession)
                                <option value="{{ $profession->id }}" @selected(old('profession_id') == $profession->id)>
                                    {{ $profession->name }}
                                </option>
                            @endforeach

                        </select>

                        @error('profession_id')
                            <p class="field-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </section>


                    {{-- =================================================
                    LOCALISATION
                ================================================== --}}

                    <section class="uhsas-section">

                        <div class="mb-5">

                            <h2
                                class="
                                text-lg
                                sm:text-xl
                                font-bold
                                text-gray-900
                            ">
                                4. Localisation
                            </h2>

                            <p
                                class="
                                mt-1
                                text-sm
                                text-gray-500
                            ">
                                Indiquez votre lieu de résidence.
                            </p>

                        </div>


                        <div class="space-y-5">


                            {{-- Région --}}

                            <div>

                                <label for="region_id" class="uhsas-label">
                                    Région
                                    <span class="required-star">*</span>
                                </label>

                                <select id="region_id" name="region_id" required
                                    class="
                                    uhsas-input
                                    @error('region_id')
                                        input-error
                                    @enderror
                                ">

                                    <option value="">
                                        Sélectionner une région
                                    </option>

                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}" @selected(old('region_id') == $region->id)>
                                            {{ $region->name }}
                                        </option>
                                    @endforeach

                                </select>

                                @error('region_id')
                                    <p class="field-error">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- Département --}}

                            <div>

                                <label for="department_id" class="uhsas-label">
                                    Département
                                    <span class="required-star">*</span>
                                </label>

                                <select id="department_id" name="department_id" required disabled
                                    class="
                                    uhsas-input
                                    @error('department_id')
                                        input-error
                                    @enderror
                                ">

                                    <option value="">
                                        Sélectionner d'abord la région
                                    </option>

                                </select>

                                @error('department_id')
                                    <p class="field-error">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- =================================================
                            COMMUNE D'ARRONDISSEMENT
                        ================================================== --}}

                            <div id="commune-container" class="hidden">

                                <label for="commune_id" class="uhsas-label">

                                    Commune d'arrondissement

                                    <span
                                        class="
                                        text-gray-400
                                        font-normal
                                    ">
                                        (facultatif)
                                    </span>

                                </label>

                                <select id="commune_id" name="commune_id" disabled
                                    class="
                                    uhsas-input
                                    @error('commune_id')
                                        input-error
                                    @enderror
                                ">

                                    <option value="">
                                        Sélectionner une commune
                                    </option>

                                </select>

                                @error('commune_id')
                                    <p class="field-error">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- Adresse --}}

                            <div>

                                <label for="address" class="uhsas-label">

                                    Adresse / Localité

                                    <span class="required-star">
                                        *
                                    </span>

                                </label>

                                <textarea id="address" name="address" rows="3" required autocomplete="street-address"
                                    class="
                                    uhsas-input
                                    resize-none
                                    @error('address')
                                        input-error
                                    @enderror
                                "
                                    placeholder="Ex. Unité 15, Parcelles Assainies...">{{ old('address') }}</textarea>

                                @error('address')
                                    <p class="field-error">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>

                    </section>


                    {{-- =================================================
                    CONFIRMATION
                ================================================== --}}

                    <section>

                        <div
                            class="
                            rounded-xl
                            bg-green-50
                            border
                            border-green-100
                            p-4
                        ">

                            <label for="terms"
                                class="
                                flex
                                items-start
                                gap-3
                                cursor-pointer
                            ">

                                <input id="terms" type="checkbox" name="terms" value="1" required
                                    @checked(old('terms'))
                                    class="
                                    mt-1
                                    h-5
                                    w-5
                                    flex-shrink-0
                                    rounded
                                    border-gray-300
                                    text-green-700
                                ">

                                <span
                                    class="
                                    text-sm
                                    text-gray-700
                                    leading-relaxed
                                ">

                                    Je confirme que les informations
                                    fournies sont exactes et j'accepte
                                    leur utilisation dans le cadre de
                                    mon inscription à l'UHSAS.

                                    <span class="required-star">*</span>

                                </span>

                            </label>

                            @error('terms')
                                <p class="field-error">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </section>


                    {{-- =================================================
                    BOUTON
                ================================================== --}}

                    <div class="mobile-safe-bottom">

                        <button type="submit" id="submitButton"
                            class="
                            w-full
                            min-h-[54px]
                            rounded-xl
                            bg-green-800
                            px-5
                            py-4
                            text-base
                            sm:text-lg
                            text-white
                            font-bold
                            shadow-sm
                            hover:bg-green-900
                            active:scale-[0.99]
                            transition
                            duration-150
                        ">

                            <span id="submitText">
                                Envoyer mon inscription
                            </span>

                        </button>

                        <p
                            class="
                            mt-3
                            text-center
                            text-xs
                            text-gray-500
                        ">
                            Les champs marqués d'un
                            <span class="text-red-600 font-bold">*</span>
                            sont obligatoires.
                        </p>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- ================================================================
    JAVASCRIPT
================================================================ --}}

    <script>
        document.addEventListener('DOMContentLoaded', () => {


            /*
            |--------------------------------------------------------------------------
            | Éléments
            |--------------------------------------------------------------------------
            */

            const regionSelect =
                document.getElementById('region_id');

            const departmentSelect =
                document.getElementById('department_id');

            const communeContainer =
                document.getElementById('commune-container');

            const communeSelect =
                document.getElementById('commune_id');

            const photoInput =
                document.getElementById('photo');

            const photoPreview =
                document.getElementById('photoPreview');

            const previewImage =
                document.getElementById('previewImage');

            const form =
                document.querySelector('.uhsas-form');

            const submitButton =
                document.getElementById('submitButton');

            const submitText =
                document.getElementById('submitText');


            /*
            |--------------------------------------------------------------------------
            | Anciennes valeurs Laravel
            |--------------------------------------------------------------------------
            */

            const oldDepartmentId =
                @json(old('department_id'));

            const oldCommuneId =
                @json(old('commune_id'));


            /*
            |--------------------------------------------------------------------------
            | Afficher / masquer la commune
            |--------------------------------------------------------------------------
            */

            function hideCommune() {

                communeContainer.classList.add('hidden');

                communeSelect.disabled = true;

                communeSelect.required = false;

                communeSelect.innerHTML = `
            <option value="">
                Sélectionner une commune
            </option>
        `;

                communeSelect.value = '';
            }


            function showCommune() {

                communeContainer.classList.remove('hidden');

                communeSelect.disabled = false;

                /*
                 * Important :
                 * la commune reste facultative.
                 */
                communeSelect.required = false;
            }


            /*
            |--------------------------------------------------------------------------
            | Chargement des communes
            |--------------------------------------------------------------------------
            */

            async function loadCommunes(
                departmentId,
                selectedCommuneId = null
            ) {

                hideCommune();

                if (!departmentId) {

                    return;
                }


                try {

                    const response = await fetch(
                        `/api/departments/${departmentId}/communes`, {
                            headers: {
                                'Accept': 'application/json'
                            }
                        }
                    );


                    if (!response.ok) {

                        throw new Error(
                            'Impossible de charger les communes.'
                        );
                    }


                    const communes =
                        await response.json();


                    /*
                     * Aucun commune disponible :
                     * on cache complètement le champ.
                     */

                    if (
                        !Array.isArray(communes) ||
                        communes.length === 0
                    ) {

                        hideCommune();

                        return;
                    }


                    /*
                     * Des communes existent :
                     * on affiche le champ.
                     */

                    showCommune();


                    communeSelect.innerHTML = `
                <option value="">
                    Sélectionner une commune
                </option>
            `;


                    communes.forEach(commune => {

                        const option =
                            document.createElement('option');

                        option.value =
                            commune.id;

                        option.textContent =
                            commune.name;


                        if (
                            selectedCommuneId &&
                            String(commune.id) ===
                            String(selectedCommuneId)
                        ) {

                            option.selected = true;
                        }


                        communeSelect.appendChild(option);

                    });


                } catch (error) {

                    console.error(error);

                    /*
                     * En cas de problème technique,
                     * on masque le champ plutôt que
                     * de bloquer l'utilisateur.
                     */

                    hideCommune();
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Chargement des départements
            |--------------------------------------------------------------------------
            */

            async function loadDepartments(
                regionId,
                selectedDepartmentId = null
            ) {

                departmentSelect.disabled = true;

                hideCommune();


                departmentSelect.innerHTML = `
            <option value="">
                Chargement des départements...
            </option>
        `;


                if (!regionId) {

                    departmentSelect.innerHTML = `
                <option value="">
                    Sélectionner d'abord la région
                </option>
            `;

                    return;
                }


                try {

                    const response = await fetch(
                        `/api/regions/${regionId}/departments`, {
                            headers: {
                                'Accept': 'application/json'
                            }
                        }
                    );


                    if (!response.ok) {

                        throw new Error(
                            'Impossible de charger les départements.'
                        );
                    }


                    const departments =
                        await response.json();


                    departmentSelect.innerHTML = `
                <option value="">
                    Sélectionner un département
                </option>
            `;


                    departments.forEach(department => {

                        const option =
                            document.createElement('option');

                        option.value =
                            department.id;

                        option.textContent =
                            department.name;


                        if (
                            selectedDepartmentId &&
                            String(department.id) ===
                            String(selectedDepartmentId)
                        ) {

                            option.selected = true;
                        }


                        departmentSelect.appendChild(option);

                    });


                    departmentSelect.disabled = false;


                    /*
                     * Si Laravel avait déjà une ancienne valeur,
                     * on charge automatiquement ses communes.
                     */

                    if (selectedDepartmentId) {

                        await loadCommunes(
                            selectedDepartmentId,
                            oldCommuneId
                        );
                    }


                } catch (error) {

                    console.error(error);

                    departmentSelect.innerHTML = `
                <option value="">
                    Impossible de charger les départements
                </option>
            `;

                    departmentSelect.disabled = true;
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Changement de région
            |--------------------------------------------------------------------------
            */

            regionSelect.addEventListener(
                'change',
                async () => {

                    await loadDepartments(
                        regionSelect.value
                    );
                }
            );


            /*
            |--------------------------------------------------------------------------
            | Changement de département
            |--------------------------------------------------------------------------
            */

            departmentSelect.addEventListener(
                'change',
                async () => {

                    await loadCommunes(
                        departmentSelect.value
                    );
                }
            );


            /*
            |--------------------------------------------------------------------------
            | Initialisation après erreur Laravel
            |--------------------------------------------------------------------------
            */

            const oldRegionId =
                @json(old('region_id'));


            if (oldRegionId) {

                regionSelect.value =
                    oldRegionId;


                loadDepartments(
                    oldRegionId,
                    oldDepartmentId
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Prévisualisation photo
            |--------------------------------------------------------------------------
            */

            if (photoInput) {

                photoInput.addEventListener(
                    'change',
                    () => {

                        const file =
                            photoInput.files[0];


                        if (!file) {

                            photoPreview.classList.add(
                                'hidden'
                            );

                            return;
                        }


                        if (!file.type.startsWith('image/')) {

                            photoPreview.classList.add(
                                'hidden'
                            );

                            return;
                        }


                        const reader =
                            new FileReader();


                        reader.onload =
                            (event) => {

                                previewImage.src =
                                    event.target.result;

                                photoPreview.classList.remove(
                                    'hidden'
                                );
                            };


                        reader.readAsDataURL(file);
                    }
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Protection contre double soumission
            |--------------------------------------------------------------------------
            */

            if (form) {

                form.addEventListener(
                    'submit',
                    () => {

                        submitButton.disabled = true;

                        submitText.textContent =
                            'Envoi en cours...';

                    }
                );
            }

        });
    </script>

</body>

</html>
