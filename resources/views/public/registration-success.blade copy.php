<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

    <meta name="theme-color" content="#176b3a">

    <title>
        Carte de membre UHSAS
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <style>
        * {
            box-sizing: border-box;
        }

        html {
            -webkit-text-size-adjust: 100%;
            text-size-adjust: 100%;
        }

        body {
            margin: 0;

            min-height: 100vh;
            min-height: 100dvh;

            background:
                linear-gradient(135deg,
                    #f3f4f3 0%,
                    #ffffff 50%,
                    #eef1ee 100%);

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            -webkit-tap-highlight-color: transparent;
        }


        /*
        |--------------------------------------------------------------------------
        | PAGE
        |--------------------------------------------------------------------------
        */

        .success-page {

            min-height: 100vh;
            min-height: 100dvh;

            display: flex;

            justify-content: center;

            padding:
                max(20px, env(safe-area-inset-top)) 12px max(30px, env(safe-area-inset-bottom));
        }


        .success-container {

            width: 100%;

            max-width: 1050px;

            margin: auto;
        }


        /*
        |--------------------------------------------------------------------------
        | MESSAGE AU-DESSUS
        |--------------------------------------------------------------------------
        */

        .success-header {

            text-align: center;

            margin-bottom: 24px;
        }


        .success-header-logo {

            width: 82px;
            height: 82px;

            object-fit: contain;

            margin: 0 auto 8px;
        }


        .success-title {

            margin: 0;

            color: #176b3a;

            font-size: clamp(22px,
                    4vw,
                    34px);

            font-weight: 800;
        }


        .success-description {

            margin-top: 7px;

            color: #6b7280;

            font-size: 15px;
        }


        /*
        |--------------------------------------------------------------------------
        | CADRE DORE
        |--------------------------------------------------------------------------
        */

        .card-frame {

            width: 100%;

            padding: 8px;

            border-radius: 22px;

            background:
                linear-gradient(135deg,
                    #d59b27,
                    #f1c65e,
                    #d59b27);

            box-shadow:
                0 22px 55px rgba(0, 0, 0, .18);
        }


        /*
        |--------------------------------------------------------------------------
        | CARTE
        |--------------------------------------------------------------------------
        */

        .membership-card {

            position: relative;

            width: 100%;

            aspect-ratio:
                85.6 / 53.98;

            overflow: hidden;

            border-radius: 15px;

            background:
                linear-gradient(135deg,
                    #f9f8f2 0%,
                    #ffffff 55%,
                    #f2efe5 100%);

            color: #176b3a;
        }


        /*
        |--------------------------------------------------------------------------
        | LIGNE DOREE DU HAUT
        |--------------------------------------------------------------------------
        */

        .card-top-border {

            position: absolute;

            top: 0;
            left: 0;
            right: 0;

            height: 5px;

            background:
                #151d19;

            z-index: 20;
        }


        /*
        |--------------------------------------------------------------------------
        | FILIGRANE
        |--------------------------------------------------------------------------
        */

        .card-watermark {

            position: absolute;

            z-index: 0;

            width: 42%;

            height: 72%;

            left: 40%;

            top: 18%;

            background-image:
                url('{{ asset('asset/images/logo-uhsas.jpeg') }}');

            background-position: center;

            background-repeat: no-repeat;

            background-size: contain;

            opacity: .045;

            pointer-events: none;
        }


        /*
        |--------------------------------------------------------------------------
        | PANNEAU GAUCHE
        |--------------------------------------------------------------------------
        */

        .card-left-panel {

            position: absolute;

            z-index: 5;

            top: 0;
            bottom: 0;
            left: 0;

            width: 25%;

            padding:
                7% 2.5% 17%;

            display: flex;

            flex-direction: column;

            align-items: center;

            text-align: center;

            background:
                rgba(250, 249, 243, .92);

            border-right:
                1.5px solid #176b3a;
        }


        /*
        |--------------------------------------------------------------------------
        | LOGO GAUCHE
        |--------------------------------------------------------------------------
        */

        .card-left-logo {

            width: 68%;

            max-width: 120px;

            height: auto;

            object-fit: contain;

            margin-bottom: 6%;
        }


        /*
        |--------------------------------------------------------------------------
        | NOM ORGANISATION
        |--------------------------------------------------------------------------
        */

        .organization-name {

            color: #176b3a;

            font-size: clamp(7px,
                    1.35vw,
                    14px);

            line-height: 1.3;

            font-weight: 700;

            text-align: center;
        }


        /*
        |--------------------------------------------------------------------------
        | CORPS DROIT
        |--------------------------------------------------------------------------
        */

        .card-right-area {

            position: absolute;

            z-index: 2;

            top: 0;
            right: 0;
            bottom: 0;

            width: 75%;
        }


        /*
        |--------------------------------------------------------------------------
        | TITRE
        |--------------------------------------------------------------------------
        */

        .card-title-area {

            position: absolute;

            top: 4%;
            left: 4%;
            right: 4%;

            height: 21%;

            display: flex;

            flex-direction: column;

            justify-content: center;

            align-items: center;
        }


        .card-title {

            margin: 0;

            color: #303531;

            font-size: clamp(18px,
                    4vw,
                    43px);

            line-height: 1;

            font-weight: 900;

            letter-spacing:
                .035em;

            white-space: nowrap;
        }


        /*
        |--------------------------------------------------------------------------
        | LIGNES + LOSANGE
        |--------------------------------------------------------------------------
        */

        .title-decoration {

            width: 76%;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 10px;

            margin-top: 8px;
        }


        .title-decoration::before,
        .title-decoration::after {

            content: "";

            height: 2px;

            flex: 1;

            background:
                #e1b34e;
        }


        .title-diamond {

            width: 11px;
            height: 11px;

            flex-shrink: 0;

            background:
                #dfa535;

            transform:
                rotate(45deg);
        }


        /*
        |--------------------------------------------------------------------------
        | ZONE INFORMATIONS
        |--------------------------------------------------------------------------
        */

        .card-information {

            position: absolute;

            left: 4.5%;

            top: 28%;

            width: 57%;

            height: 51%;

            display: flex;

            flex-direction: column;

            justify-content: space-between;

            gap: 0;
        }


        /*
        |--------------------------------------------------------------------------
        | LIGNE INFORMATION
        |--------------------------------------------------------------------------
        */

        .info-row {

            display: flex;

            align-items: center;

            width: 100%;

            min-width: 0;

            gap: 6px;

            color: #454b47;

            font-size: clamp(7px,
                    1.45vw,
                    16px);

            line-height: 1.15;
        }


        /*
        |--------------------------------------------------------------------------
        | ICONE
        |--------------------------------------------------------------------------
        */

        .info-icon {

            width: clamp(17px,
                    2.2vw,
                    27px);

            min-width: clamp(17px,
                    2.2vw,
                    27px);

            height: clamp(17px,
                    2.2vw,
                    27px);

            border-radius: 5px;

            display: flex;

            align-items: center;

            justify-content: center;

            background:
                #4a504c;

            color: white;
        }


        .info-icon svg {

            width: 62%;
            height: 62%;
        }


        .info-label {

            flex-shrink: 0;

            color: #5b615d;

            font-weight: 500;

            white-space: nowrap;
        }


        .info-value {

            min-width: 0;

            max-width: 100%;

            color: #313632;

            font-weight: 700;

            overflow: hidden;

            text-overflow: ellipsis;

            white-space: nowrap;
        }

        /*
        |--------------------------------------------------------------------------
        | PHOTO
        |--------------------------------------------------------------------------
        */

        .member-photo-container {

            position: absolute;

            z-index: 5;

            right: 5%;

            top: 27%;

            width: 20%;

            aspect-ratio: 1 / 1.17;
        }


        .member-photo {

            width: 100%;
            height: 100%;

            object-fit: cover;

            border-radius: 8px;

            border:
                2px solid #555a56;

            background:
                #e5e7eb;

            box-shadow:
                0 3px 8px rgba(0, 0, 0, .15);
        }


        /*
        |--------------------------------------------------------------------------
        | QR CODE
        |--------------------------------------------------------------------------
        */

        .qr-container {

            position: absolute;

            z-index: 8;

            right: 5%;

            bottom: 17%;

            width: 17%;

            aspect-ratio: 1;

            padding: 4px;

            background: #ffffff;

            border: 1.5px solid #555a56;

            border-radius: 7px;

            display: flex;

            align-items: center;

            justify-content: center;

            box-shadow:
                0 2px 7px rgba(0, 0, 0, .12);
        }


        .qr-container svg {

            display: block;

            width: 100% !important;

            height: 100% !important;

            max-width: 100%;

            max-height: 100%;
        }


        /*
        |--------------------------------------------------------------------------
        | SIGNATURE DECORATIVE
        |--------------------------------------------------------------------------
        */

        .signature-line {

            position: absolute;

            z-index: 6;

            right: 26%;

            bottom: 27%;

            width: 10%;

            height: 20px;

            border-bottom:
                1.5px solid #273d85;

            transform:
                rotate(-7deg);

            opacity: .8;
        }


        .signature-line::before {

            content: "";

            position: absolute;

            width: 80%;

            height: 8px;

            left: 5%;

            bottom: 2px;

            border-top:
                1px solid #273d85;

            border-radius: 50%;

            transform:
                rotate(8deg);
        }


        /*
        |--------------------------------------------------------------------------
        | BANDEAU BAS
        |--------------------------------------------------------------------------
        */

        .card-footer {

            position: absolute;

            z-index: 10;

            left: 0;
            right: 0;
            bottom: 0;

            height: 15%;

            overflow: hidden;

            background: #1C321E;

            color: #ffffff;
        }


        /*
        |--------------------------------------------------------------------------
        | BANDE DORE OBLIQUE
        |--------------------------------------------------------------------------
        */
        .card-footer::before {

            content: "";

            position: absolute;

            left: -5%;

            top: -18px;

            width: 110%;

            height: 35px;

            background: #dfa735;

            transform: rotate(-5deg);

            transform-origin: center;
        }


        /*
        |--------------------------------------------------------------------------
        | CONTENU FOOTER
        |--------------------------------------------------------------------------
        */

        .footer-content {

            position: absolute;

            z-index: 3;

            left: 0;
            right: 0;
            bottom: 0;

            height: 65%;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: clamp(15px,
                    4vw,
                    55px);

            padding-top: 5%;
            padding-bottom: 2%;
            padding-left: 30%;

            font-size: clamp(6px,
                    1.25vw,
                    12px);

            font-weight: 700;
        }


        .footer-item {

            display: flex;

            align-items: center;

            gap: 5px;

            white-space: nowrap;

        }


        .footer-item svg {

            width: clamp(12px,
                    1.8vw,
                    20px);

            height: clamp(12px,
                    1.8vw,
                    20px);

            color:
                #dfa735;
        }


        /*
        |--------------------------------------------------------------------------
        | TEXTE GAUCHE BAS
        |--------------------------------------------------------------------------
        */

        .footer-slogan {

            position: absolute;

            z-index: 15;

            left: 2%;

            bottom: 3%;

            width: 20%;

            color: white;

            text-align: center;

            font-size: clamp(5px,
                    1vw,
                    10px);

            line-height: 1.15;

            font-weight: 800;
        }


        /*
        |--------------------------------------------------------------------------
        | ACTIONS
        |--------------------------------------------------------------------------
        */

        .actions {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 10px;

            margin-top: 18px;
        }


        .action-button {

            position: relative;

            min-height: 54px;

            border: 0;

            border-radius: 14px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: white;

            color: #374151;

            box-shadow:
                0 3px 12px rgba(0, 0, 0, .08);

            cursor: pointer;

            transition:
                transform .15s ease,
                background .15s ease,
                color .15s ease;
        }


        .action-button:hover {

            transform:
                translateY(-2px);

            background:
                #176b3a;

            color:
                #ffffff;
        }


        .action-button:active {

            transform:
                scale(.95);
        }


        .action-button svg {

            width: 23px;
            height: 23px;
        }


        /*
        |--------------------------------------------------------------------------
        | TOOLTIP
        |--------------------------------------------------------------------------
        */

        .action-button::after {

            content:
                attr(data-label);

            position: absolute;

            bottom:
                calc(100% + 7px);

            left: 50%;

            transform:
                translateX(-50%) translateY(5px);

            background:
                #111827;

            color: white;

            padding:
                5px 8px;

            border-radius: 6px;

            font-size: 11px;

            white-space: nowrap;

            opacity: 0;

            pointer-events: none;

            transition:
                .15s ease;

            z-index: 50;
        }


        .action-button:hover::after {

            opacity: 1;

            transform:
                translateX(-50%) translateY(0);
        }


        /*
        |--------------------------------------------------------------------------
        | NUMERO
        |--------------------------------------------------------------------------
        */

        .member-number {

            margin-top: 12px;

            text-align: center;

            color:
                #6b7280;

            font-size: 13px;
        }


        .member-number strong {

            color:
                #374151;
        }


        /*
        |--------------------------------------------------------------------------
        | MOBILE
        |--------------------------------------------------------------------------
        */

        @media (max-width: 600px) {

            .success-page {

                padding-left: 6px;

                padding-right: 6px;
            }


            .success-header {

                margin-bottom: 15px;
            }


            .success-header-logo {

                width: 65px;
                height: 65px;
            }


            .card-frame {

                padding: 5px;

                border-radius: 17px;
            }


            .membership-card {

                border-radius: 11px;
            }


            .card-left-panel {

                width: 24%;

                padding:
                    7% 2% 17%;
            }


            .card-left-logo {

                width: 75%;
            }


            .organization-name {

                font-size:
                    clamp(5px,
                        1.35vw,
                        8px);
            }


            .card-title {

                font-size:
                    clamp(14px,
                        5vw,
                        25px);
            }


            .title-decoration {

                gap: 6px;

                margin-top: 5px;
            }


            .title-diamond {

                width: 7px;
                height: 7px;
            }


            .card-information {

                left: 4%;

                top: 28%;

                width: 63%;

                gap: 6%;
            }


            .info-row {

                gap: 3px;

                font-size:
                    clamp(6px,
                        1.9vw,
                        10px);
            }


            .info-icon {

                width: 15px;
                min-width: 15px;

                height: 15px;

                border-radius: 3px;
            }


            .member-photo-container {

                right: 5%;

                top: 27%;

                width: 22%;
            }


            .qr-container {

                right: 5.5%;

                bottom: 17%;

                width: 18%;

                padding: 2px;

                border-radius: 4px;
                margin-bottom: 25px;
            }


            /* .signature-line {

                right: 26%;

                bottom: 28%;

                width: 9%;
            } */


            .card-footer {

                height: 18%;


            }


            .footer-content {

                gap: 3vw;

                font-size:
                    clamp(5px,
                        1.25vw,
                        8px);
            }


            .footer-item {

                gap: 20px;
            }


            .footer-slogan {

                font-size:
                    clamp(4px,
                        1vw,
                        6px);
            }


            .actions {
                display: grid;

                grid-template-columns: repeat(4, 1fr);

                gap: 10px;

                margin-top: 18px;

                width: 100%;
            }

            .action-button {
                position: relative;

                width: 100%;
                min-height: 54px;

                border: 0;
                border-radius: 14px;

                display: flex;
                align-items: center;
                justify-content: center;

                background: #ffffff;

                color: #176b3a;

                box-shadow:
                    0 3px 12px rgba(0, 0, 0, .08);

                cursor: pointer;

                text-decoration: none;

                -webkit-tap-highlight-color: transparent;

                transition:
                    transform .15s ease,
                    background .15s ease,
                    color .15s ease,
                    box-shadow .15s ease;
            }

            .action-button:hover {
                transform: translateY(-2px);

                background: #176b3a;

                color: #ffffff;

                box-shadow:
                    0 6px 18px rgba(23, 107, 58, .20);
            }

            .action-button:active {
                transform: scale(.94);
            }

            .action-button:focus-visible {
                outline: 3px solid rgba(23, 107, 58, .25);

                outline-offset: 2px;
            }

            .action-button svg {
                width: 23px;
                height: 23px;

                flex-shrink: 0;
            }


            /* Tooltip */

            .action-button::after {
                content: attr(data-label);

                position: absolute;

                bottom: calc(100% + 8px);

                left: 50%;

                transform:
                    translateX(-50%) translateY(5px);

                background: #151d19;

                color: #ffffff;

                padding: 6px 9px;

                border-radius: 6px;

                font-size: 11px;

                white-space: nowrap;

                opacity: 0;

                pointer-events: none;

                transition: .15s ease;

                z-index: 100;
            }

            .action-button:hover::after {
                opacity: 1;

                transform:
                    translateX(-50%) translateY(0);
            }


            /* .action-button svg {

                width: 20px;
                height: 20px;
            } */
        }


        /*
        |--------------------------------------------------------------------------
        | TRES PETITS TELEPHONES
        |--------------------------------------------------------------------------
        */

        @media (max-width: 360px) {

            .card-information {

                gap: 5%;
            }


            .info-row {

                font-size: 5.7px;
            }


            .info-icon {

                width: 13px;
                min-width: 13px;

                height: 13px;
            }


            .organization-name {

                font-size: 4.5px;
            }


            .footer-content {

                font-size: 4.5px;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | IMPRESSION
        |--------------------------------------------------------------------------
        */

        @media print {

            @page {

                size:
                    85.6mm 53.98mm;

                margin: 0;
            }


            body {

                background:
                    white !important;
            }


            .success-page {

                padding: 0;

                display: block;
            }


            .success-header,
            .actions,
            .member-number {

                display: none !important;
            }


            .success-container {

                max-width: none;

                width: 85.6mm;

                margin: 0;
            }


            .card-frame {

                width: 85.6mm;

                height: 53.98mm;

                padding: 0;

                margin: 0;

                border-radius: 0;

                box-shadow: none;

                background: transparent;
            }


            .membership-card {

                width: 85.6mm;

                height: 53.98mm;

                border-radius: 0;

                box-shadow: none;
            }
        }
    </style>

</head>


<body>


    <div class="success-page">

        <main class="success-container">


            {{-- =========================================================
            HEADER PAGE
        ========================================================== --}}

            <div class="success-header">

                <img src="{{ asset('asset/images/logo-uhsas.jpeg') }}" alt="Logo UHSAS" class="success-header-logo">

                <h1 class="success-title">
                    Inscription enregistrée !
                </h1>

                <p class="success-description">
                    Votre carte de membre est disponible ci-dessous.
                </p>

            </div>


            {{-- =========================================================
            CADRE CARTE
        ========================================================== --}}

            <div class="card-frame">


                {{-- =====================================================
                CARTE
            ====================================================== --}}

                <div id="membership-card" class="membership-card">


                    {{-- Ligne noire supérieure --}}

                    <div class="card-top-border"></div>


                    {{-- Filigrane --}}

                    <div class="card-watermark"></div>


                    {{-- =================================================
                    PANNEAU GAUCHE
                ================================================== --}}

                    <div class="card-left-panel">


                        <img src="{{ asset('asset/images/logo-uhsas.jpeg') }}" alt="Logo UHSAS" class="card-left-logo">


                        <div class="organization-name">

                            UNION HABITAT<br>

                            SOLIDAIRE DES<br>

                            ARTISANS DU SÉNÉGAL

                        </div>

                    </div>


                    {{-- =================================================
                    ZONE DROITE
                ================================================== --}}

                    <div class="card-right-area">


                        {{-- =================================================
                        TITRE
                    ================================================== --}}

                        <div class="card-title-area">

                            <h1 class="card-title">
                                CARTE DE MEMBRE
                            </h1>

                            <div class="title-decoration">

                                <span></span>

                                <span class="title-diamond"></span>

                                <span></span>

                            </div>

                        </div>


                        {{-- =================================================
                        INFORMATIONS
                    ================================================== --}}

                        <div class="card-information">


                            {{-- NOM --}}

                            <div class="info-row">

                                <span class="info-icon">

                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

                                        <circle cx="12" cy="7" r="4" />

                                        <path d="M4 21a8 8 0 0 1 16 0" />

                                    </svg>

                                </span>

                                <span class="info-label">
                                    Nom :
                                </span>

                                <span class="info-value">
                                    {{ $member->full_name }}
                                </span>

                            </div>


                            {{-- NUMERO --}}

                            <div class="info-row">

                                <span class="info-icon">

                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

                                        <path d="M7 4h10" />

                                        <path d="M7 20h10" />

                                        <path d="M5 4h14v16H5z" />

                                        <path d="M9 8h6M9 12h4" />

                                    </svg>

                                </span>

                                <span class="info-label">
                                    N° de membre :
                                </span>

                                <span class="info-value">
                                    {{ $member->member_number }}
                                </span>

                            </div>


                            {{-- TELEPHONE --}}

                            <div class="info-row">

                                <span class="info-icon">

                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

                                        <path
                                            d="M5 4h4l2 5-2.5 1.5a15 15 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2C10.3 21 3 13.7 3 6a2 2 0 0 1 2-2Z" />

                                    </svg>

                                </span>

                                <span class="info-label">
                                    Téléphone :
                                </span>

                                <span class="info-value">
                                    {{ $member->phone }}
                                </span>

                            </div>


                            {{-- METIER --}}

                            <div class="info-row">

                                <span class="info-icon">

                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

                                        <rect x="3" y="6" width="18" height="14" rx="2" />

                                        <path d="M9 6V4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2" />

                                        <path d="M3 11h18" />

                                    </svg>

                                </span>

                                <span class="info-label">
                                    Métier :
                                </span>

                                <span class="info-value">
                                    {{ $member->profession?->name ?? 'Non renseigné' }}
                                </span>

                            </div>


                            {{-- DELIVRANCE --}}
                            <div class="info-row">
                                <span class="info-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="17" rx="2" />
                                        <path d="M8 2v4M16 2v4M3 10h18" />
                                    </svg>
                                </span>

                                <span class="info-label">
                                    Délivrance :
                                </span>

                                <span class="info-value">
                                    {{ optional($member->activated_at ?? $member->registered_at)->format('d/m/Y') }}
                                </span>
                            </div>


                            {{-- EXPIRATION --}}
                            <div class="info-row">
                                <span class="info-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M12 7v5l3 2" />
                                    </svg>
                                </span>

                                <span class="info-label">
                                    Expire le :
                                </span>

                                <span class="info-value">
                                    @if ($member->activated_at)
                                        {{ $member->activated_at->copy()->addYears(5)->format('d/m/Y') }}
                                    @else
                                        Non activé
                                    @endif
                                </span>
                            </div>


                            {{-- ADRESSE --}}

                            <div class="info-row">

                                <span class="info-icon">

                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

                                        <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z" />

                                        <circle cx="12" cy="10" r="2.5" />

                                    </svg>

                                </span>

                                <span class="info-label">
                                    Adresse :
                                </span>

                                <span class="info-value">

                                    {{ $member->address }}

                                </span>

                            </div>

                        </div>


                        {{-- =================================================
                        PHOTO
                    ================================================== --}}

                        <div class="member-photo-container">

                            @if ($member->photo)
                                <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->full_name }}"
                                    class="member-photo">
                            @else
                                <div
                                    class="
                                    member-photo
                                    flex
                                    items-center
                                    justify-center
                                    text-gray-500
                                    text-xs
                                ">
                                    PHOTO
                                </div>
                            @endif

                        </div>


                        {{-- =================================================
                        SIGNATURE DECORATIVE
                    ================================================== --}}
                        {{-- 
                    <div class="signature-line"></div> --}}


                        {{-- =================================================
                        QR CODE
                    ================================================== --}}

                        <div id="qr-code" class="qr-container">

                            {!! QrCode::format('svg')->size(220)->margin(0)->generate(route('member.public', $member)) !!}

                        </div>


                    </div>
                    </br>



                    {{-- =================================================
                    FOOTER
                ================================================== --}}

                    <div class="card-footer">


                        {{-- Slogan à gauche --}}

                        <div class="footer-slogan">

                            ENSEMBLE, BÂTISSONS<br>

                            DES VIES MEILLEURES

                        </div>


                        <div class="footer-content">


                            {{-- SOLIDARITE --}}

                            <span class="footer-item">

                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

                                    <circle cx="9" cy="7" r="4" />

                                    <path d="M3 21a6 6 0 0 1 12 0" />

                                    <path d="M16 11a4 4 0 1 0 0-8" />

                                    <path d="M17 13a5 5 0 0 1 4 5" />

                                </svg>

                                SOLIDARITÉ

                            </span>


                            {{-- HABITAT --}}

                            <span class="footer-item">

                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

                                    <path d="M3 11.5 12 4l9 7.5" />

                                    <path d="M5 10v10h14V10" />

                                    <path d="M9 20v-5h6v5" />

                                </svg>

                                HABITAT

                            </span>


                            {{-- PROFESSIONNALISME --}}

                            <span class="footer-item">

                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">

                                    <path d="m14 5 5-3" />

                                    <path d="m17 4 3 3" />

                                    <path d="m13 8 4 4" />

                                    <path d="m5 20 8-8" />

                                    <path d="M3 21l2-6 4 4-6 2Z" />

                                </svg>

                                PROFESSIONNALISME

                            </span>

                        </div>

                    </div>


                </div>

            </div>


            {{-- =========================================================
            NUMERO
        ========================================================== --}}

            <div class="member-number">

                N° membre :

                <strong>
                    {{ $member->member_number }}
                </strong>

            </div>


            {{-- =========================================================
            ACTIONS
        ========================================================== --}}

            {{-- =========================================================
    ACTIONS
========================================================== --}}

            <div class="actions">

                {{-- PDF --}}
                <a href="{{ route('registration.card.pdf', $member) }}" class="action-button"
                    data-label="Télécharger PDF" aria-label="Télécharger la carte en PDF">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3v12" />
                        <path d="m7 10 5 5 5-5" />
                        <path d="M5 21h14" />
                    </svg>
                </a>


                {{-- PARTAGER --}}
                <button type="button" id="shareButton" class="action-button" data-label="Partager"
                    aria-label="Partager la carte">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="18" cy="5" r="3" />
                        <circle cx="6" cy="12" r="3" />
                        <circle cx="18" cy="19" r="3" />

                        <path d="m8.6 13.5 6.8 4" />
                        <path d="m15.4 6.5-6.8 4" />
                    </svg>
                </button>


                {{-- ENREGISTRER IMAGE --}}
                <button type="button" id="saveButton" class="action-button" data-label="Enregistrer"
                    aria-label="Enregistrer la carte">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 3v12" />
                        <path d="m7 10 5 5 5-5" />
                        <path d="M5 21h14" />
                    </svg>
                </button>


                {{-- IMPRIMER --}}
                <button type="button" id="printButton" class="action-button" data-label="Imprimer"
                    aria-label="Imprimer la carte">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 9V3h12v6" />
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                        <path d="M6 14h12v7H6z" />
                    </svg>
                </button>

            </div>


            <p
                class="
                mt-5
                text-center
                text-xs
                text-gray-400
            ">
                Scannez le QR code pour consulter la carte
                de membre en ligne.
            </p>

        </main>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {

            /*
            |--------------------------------------------------------------------------
            | WHATSAPP / PARTAGE
            |--------------------------------------------------------------------------
            */

            const whatsappButton =
                document.getElementById(
                    'whatsappButton'
                );


            if (whatsappButton) {

                whatsappButton.addEventListener(
                    'click',
                    async () => {

                        const cardUrl =
                            @json(route('member.public', $member));


                        const message =
                            `Bonjour, voici ma carte de membre UHSAS : ${cardUrl}`;


                        /*
                         * Partage natif sur téléphone.
                         */

                        if (
                            navigator.share
                        ) {

                            try {

                                await navigator.share({

                                    title: 'Carte de membre UHSAS',

                                    text: message,

                                    url: cardUrl

                                });

                                return;

                            } catch (error) {

                                // Annulation du partage.
                            }
                        }


                        /*
                         * Fallback WhatsApp.
                         */

                        window.open(
                            `https://wa.me/?text=${
                        encodeURIComponent(message)
                    }`,
                            '_blank'
                        );

                    }
                );
            }


            /*
            |--------------------------------------------------------------------------
            | IMPRESSION
            |--------------------------------------------------------------------------
            */

            const printButton =
                document.getElementById(
                    'printButton'
                );


            if (printButton) {

                printButton.addEventListener(
                    'click',
                    () => {

                        window.print();

                    }
                );
            }


            /*
            |--------------------------------------------------------------------------
            | ENREGISTRER EN IMAGE
            |--------------------------------------------------------------------------
            */

            const saveButton =
                document.getElementById(
                    'saveButton'
                );


            if (saveButton) {

                saveButton.addEventListener(
                    'click',
                    async () => {

                        const card =
                            document.getElementById(
                                'membership-card'
                            );


                        saveButton.disabled = true;


                        try {

                            if (
                                typeof html2canvas ===
                                'undefined'
                            ) {

                                await loadHtml2Canvas();

                            }


                            const canvas =
                                await html2canvas(card, {

                                    scale: 4,

                                    useCORS: true,

                                    allowTaint: false,

                                    backgroundColor: '#ffffff',

                                    logging: false,

                                    imageTimeout: 15000,

                                });


                            canvas.toBlob(
                                (blob) => {

                                    if (!blob) {
                                        return;
                                    }


                                    const url =
                                        URL.createObjectURL(
                                            blob
                                        );


                                    const link =
                                        document.createElement(
                                            'a'
                                        );


                                    link.href = url;

                                    link.download =
                                        `Carte-UHSAS-${@json($member->member_number)}.jpg`;


                                    document.body.appendChild(
                                        link
                                    );


                                    link.click();


                                    link.remove();


                                    URL.revokeObjectURL(
                                        url
                                    );

                                },
                                'image/jpeg',
                                0.95
                            );


                        } catch (error) {

                            console.error(error);

                            alert(
                                "Impossible d'enregistrer la carte. Utilisez le bouton PDF."
                            );

                        } finally {

                            saveButton.disabled = false;

                        }

                    }
                );
            }


            /*
            |--------------------------------------------------------------------------
            | CHARGEMENT HTML2CANVAS
            |--------------------------------------------------------------------------
            */

            function loadHtml2Canvas() {

                return new Promise(
                    (resolve, reject) => {

                        const script =
                            document.createElement(
                                'script'
                            );


                        script.src =
                            'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js';


                        script.onload =
                            resolve;

                        script.onerror =
                            reject;


                        document.head.appendChild(
                            script
                        );

                    }
                );
            }

        });
    </script>


</body>

</html>
