<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <style>

        @page {
            margin: 0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;

            width: 85.6mm;
            height: 53.98mm;

            font-family: DejaVu Sans, Arial, sans-serif;

            background: #ffffff;
        }


        /*
        |--------------------------------------------------------------------------
        | CARTE
        |--------------------------------------------------------------------------
        */

        .card {

            position: relative;

            width: 85.6mm;
            height: 53.98mm;

            overflow: hidden;

            background: #faf9f3;

            color: #343936;
        }


        /*
        |--------------------------------------------------------------------------
        | BORDURE SUPÉRIEURE
        |--------------------------------------------------------------------------
        */

        .top-line {

            position: absolute;

            top: 0;
            left: 0;

            width: 100%;
            height: 1.4mm;

            background: #18201c;
        }


        /*
        |--------------------------------------------------------------------------
        | COLONNE GAUCHE
        |--------------------------------------------------------------------------
        */

        .left {

            position: absolute;

            top: 0;
            left: 0;

            width: 22mm;
            height: 53.98mm;

            border-right: 0.35mm solid #454b47;

            background: #faf9f3;

            text-align: center;
        }


        .left-logo {

            position: absolute;

            top: 3.5mm;
            left: 4.2mm;

            width: 13.5mm;
            height: 13.5mm;

            object-fit: contain;
        }


        .left-title {

            position: absolute;

            top: 18.5mm;
            left: 2mm;

            width: 18mm;

            font-size: 2.05mm;

            line-height: 1.35;

            font-weight: bold;

            color: #555b56;

            text-align: center;
        }


        /*
        |--------------------------------------------------------------------------
        | ZONE PRINCIPALE
        |--------------------------------------------------------------------------
        */

        .main {

            position: absolute;

            top: 0;
            left: 22mm;

            width: 63.6mm;
            height: 53.98mm;
        }


        /*
        |--------------------------------------------------------------------------
        | TITRE
        |--------------------------------------------------------------------------
        */

        .title {

            position: absolute;

            top: 4mm;
            left: 2mm;

            width: 59.6mm;

            text-align: center;

            font-size: 6.6mm;

            line-height: 1;

            font-weight: bold;

            color: #303531;

            white-space: nowrap;
        }


        /*
        |--------------------------------------------------------------------------
        | LIGNE TITRE
        |--------------------------------------------------------------------------
        */

        .title-line {

            position: absolute;

            top: 11.7mm;
            left: 6mm;

            width: 47mm;

            height: 0.45mm;

            background: #dfa735;
        }


        .diamond {

            position: absolute;

            top: -0.8mm;
            left: 50%;

            width: 2.1mm;
            height: 2.1mm;

            background: #dfa735;

            transform: rotate(45deg);

            margin-left: -1mm;
        }


        /*
        |--------------------------------------------------------------------------
        | INFORMATIONS
        |--------------------------------------------------------------------------
        */

        .infos {

            position: absolute;

            top: 15.2mm;
            left: 2.5mm;

            width: 40mm;
        }


        .info {

            width: 40mm;

            height: 4.65mm;

            line-height: 4.65mm;

            white-space: nowrap;

            font-size: 2.35mm;

            color: #424944;
        }


        /*
        |--------------------------------------------------------------------------
        | ICONE
        |--------------------------------------------------------------------------
        */

        .icon {

            display: inline-block;

            width: 3.7mm;
            height: 3.7mm;

            margin-right: 0.9mm;

            vertical-align: middle;

            background: #454c48;

            color: #ffffff;

            border-radius: 0.8mm;

            text-align: center;

            line-height: 3.7mm;

            font-size: 2mm;

            font-weight: bold;
        }


        .label {

            color: #555b56;

            font-weight: normal;
        }


        .value {

            color: #303531;

            font-weight: bold;
        }


        /*
        |--------------------------------------------------------------------------
        | PHOTO
        |--------------------------------------------------------------------------
        */

        .photo-box {

            position: absolute;

            top: 15.5mm;
            right: 3.8mm;

            width: 15.5mm;
            height: 18.5mm;

            border: 0.35mm solid #555a56;

            border-radius: 1.5mm;

            overflow: hidden;

            background: #eeeeee;
        }


        .photo {

            width: 15.5mm;
            height: 18.5mm;

            object-fit: cover;
        }


        /*
        |--------------------------------------------------------------------------
        | SIGNATURE
        |--------------------------------------------------------------------------
        */

        .signature {

            position: absolute;

            top: 34mm;
            right: 19mm;

            width: 9mm;
            height: 4mm;

            border-bottom:
                0.3mm solid #253a82;

            transform: rotate(-8deg);
        }


        /*
        |--------------------------------------------------------------------------
        | QR CODE
        |--------------------------------------------------------------------------
        */

        .qr-box {

            position: absolute;

            right: 3.8mm;
            bottom: 10mm;

            width: 13.5mm;
            height: 13.5mm;

            padding: 0.8mm;

            background: #ffffff;

            border:
                0.35mm solid #555a56;

            border-radius: 1.2mm;
        }


        .qr-box svg {

            width: 100%;
            height: 100%;
        }


        /*
        |--------------------------------------------------------------------------
        | FILIGRANE
        |--------------------------------------------------------------------------
        */

        .watermark {

            position: absolute;

            left: 31mm;
            top: 15mm;

            width: 31mm;
            height: 30mm;

            opacity: 0.035;

            background-image:
                url("{{ public_path('asset/images/logo-uhsas.jpeg') }}");

            background-repeat: no-repeat;

            background-position: center;

            background-size: contain;
        }


        /*
        |--------------------------------------------------------------------------
        | FOOTER
        |--------------------------------------------------------------------------
        */

        .footer {

            position: absolute;

            left: 0;
            bottom: 0;

            width: 85.6mm;
            height: 8.7mm;

            background: #111714;

            color: #ffffff;
        }


        /*
        |--------------------------------------------------------------------------
        | BANDE DORÉE
        |--------------------------------------------------------------------------
        */

        .gold {

            position: absolute;

            left: -3mm;
            top: -3.5mm;

            width: 92mm;
            height: 5mm;

            background: #dfa735;

            transform: rotate(-5deg);
        }


        /*
        |--------------------------------------------------------------------------
        | SLOGAN
        |--------------------------------------------------------------------------
        */

        .slogan {

            position: absolute;

            left: 2mm;
            bottom: 1.1mm;

            width: 19mm;

            color: #ffffff;

            text-align: center;

            font-size: 1.35mm;

            line-height: 1.25;

            font-weight: bold;
        }


        /*
        |--------------------------------------------------------------------------
        | FOOTER ITEMS
        |--------------------------------------------------------------------------
        */

        .footer-items {

            position: absolute;

            left: 23mm;
            right: 2mm;

            bottom: 1.2mm;

            height: 4mm;

            text-align: center;

            white-space: nowrap;
        }


        .footer-item {

            display: inline-block;

            margin-left: 3.5mm;

            margin-right: 3.5mm;

            color: #ffffff;

            font-size: 1.75mm;

            font-weight: bold;
        }


        .footer-icon {

            color: #dfa735;

            font-size: 2.4mm;

            margin-right: 0.7mm;
        }

    </style>

</head>


<body>

<div class="card">


    {{-- =====================================================
        BORDURE
    ====================================================== --}}

    <div class="top-line"></div>


    {{-- =====================================================
        FILIGRANE
    ====================================================== --}}

    <div class="watermark"></div>


    {{-- =====================================================
        COLONNE GAUCHE
    ====================================================== --}}

    <div class="left">

        <img
            src="{{ public_path('asset/images/logo-uhsas.jpeg') }}"
            class="left-logo"
        >

        <div class="left-title">

            UNION HABITAT<br>
            SOLIDAIRE DES<br>
            ARTISANS DU SÉNÉGAL

        </div>

    </div>


    {{-- =====================================================
        ZONE PRINCIPALE
    ====================================================== --}}

    <div class="main">


        {{-- TITRE --}}

        <div class="title">

            CARTE DE MEMBRE

        </div>


        {{-- LIGNE --}}

        <div class="title-line">

            <div class="diamond"></div>

        </div>


        {{-- =================================================
            INFORMATIONS
        ================================================== --}}

        <div class="infos">


            {{-- NOM --}}

            <div class="info">

                <span class="icon">
                    P
                </span>

                <span class="label">
                    Nom :
                </span>

                <span class="value">
                    {{ $member->full_name }}
                </span>

            </div>


            {{-- NUMERO --}}

            <div class="info">

                <span class="icon">
                    #
                </span>

                <span class="label">
                    N° de membre :
                </span>

                <span class="value">
                    {{ $member->member_number }}
                </span>

            </div>


            {{-- TELEPHONE --}}

            <div class="info">

                <span class="icon">
                    T
                </span>

                <span class="label">
                    Téléphone :
                </span>

                <span class="value">
                    {{ $member->phone }}
                </span>

            </div>


            {{-- METIER --}}

            <div class="info">

                <span class="icon">
                    M
                </span>

                <span class="label">
                    Métier :
                </span>

                <span class="value">
                    {{ $member->profession?->name ?? 'Non renseigné' }}
                </span>

            </div>


            {{-- DELIVRANCE --}}

            <div class="info">

                <span class="icon">
                    D
                </span>

                <span class="label">
                    Délivrance :
                </span>

                <span class="value">

                    {{ optional(
                        $member->activated_at
                        ?? $member->registered_at
                    )->format('d/m/Y') }}

                </span>

            </div>


            {{-- EXPIRATION --}}

            <div class="info">

                <span class="icon">
                    E
                </span>

                <span class="label">
                    Expire le :
                </span>

                <span class="value">

                    @if($member->membership_expires_at)

                        {{ $member->membership_expires_at->format('d/m/Y') }}

                    @elseif($member->card?->expires_at)

                        {{ $member->card->expires_at->format('d/m/Y') }}

                    @else

                        —

                    @endif

                </span>

            </div>


            {{-- ADRESSE --}}

            <div class="info">

                <span class="icon">
                    A
                </span>

                <span class="label">
                    Adresse :
                </span>

                <span class="value">

                    {{ $member->address }}

                </span>

            </div>


        </div>


        {{-- =================================================
            PHOTO
        ================================================== --}}

        <div class="photo-box">

            @if($member->photo)

                <img
                    src="{{ public_path(
                        'storage/' . $member->photo
                    ) }}"
                    class="photo"
                >

            @else

                <div
                    style="
                        width:100%;
                        height:100%;
                        text-align:center;
                        padding-top:7mm;
                        font-size:2mm;
                        color:#777;
                    "
                >
                    PHOTO
                </div>

            @endif

        </div>


        {{-- SIGNATURE --}}

        <div class="signature"></div>


        {{-- =================================================
            QR CODE
        ================================================== --}}

        <div class="qr-box">

            {!! QrCode::format('svg')
                ->size(180)
                ->margin(0)
                ->generate(
                    route(
                        'member.public',
                        $member
                    )
                )
            !!}

        </div>


    </div>


    {{-- =====================================================
        FOOTER
    ====================================================== --}}

    <div class="footer">

        <div class="gold"></div>


        <div class="slogan">

            ENSEMBLE, BÂTISSONS<br>
            DES VIES MEILLEURES

        </div>


        <div class="footer-items">

            <span class="footer-item">

                <span class="footer-icon">
                    ♡
                </span>

                SOLIDARITÉ

            </span>


            <span class="footer-item">

                <span class="footer-icon">
                    ⌂
                </span>

                HABITAT

            </span>


            <span class="footer-item">

                <span class="footer-icon">
                    ⚒
                </span>

                PROFESSIONNALISME

            </span>

        </div>

    </div>

</div>

</body>

</html>