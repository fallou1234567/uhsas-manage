<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#ffffff">
    <title>Carte de membre UHSAS</title>
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
            background: #fff;
            color: #202820;
            font-family: Arial, Helvetica, sans-serif;
        }

        .success-page {
            min-height: 100vh;
            padding: 24px 14px 36px;
        }

        .success-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .success-header {
            text-align: center;
            margin: 0 0 22px;
        }

        .success-header-logo {
            width: 76px;
            height: 76px;
            object-fit: contain;
        }

        .success-title {
            margin: 8px 0 0;
            color: #176b3a;
            font-size: clamp(22px, 4vw, 32px);
        }

        .success-description {
            margin: 6px 0 0;
            color: #667067;
        }

        .card-frame {
            width: 100%;
            padding: 0;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 14px 40px rgba(0, 0, 0, .13);
            overflow: hidden;
        }

        /* Carte au ratio réel ISO ID-1 : 85,60 × 53,98 mm (ratio 1,586). */
        .membership-card {
            position: relative;
            isolation: isolate;
            width: 100%;
            aspect-ratio: 85.6 / 53.98;
            overflow: hidden;
            border: 1px solid #d9ddd7;
            border-radius: 15px;
            background: #fff !important;
            background-color: #fff !important;
            background-image: none !important;
            color: #252c27;
        }

        .card-top-border {
            position: absolute;
            z-index: 10;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: #171d19;
        }

        .card-watermark {
            position: absolute;
            z-index: 0;
            left: 39%;
            top: 23%;
            width: 36%;
            height: 57%;
            background: url('{{ asset('asset/images/logo-uhsas.jpeg') }}') center / contain no-repeat;
            opacity: .055;
            pointer-events: none;
        }

        .card-left-panel {
            position: absolute;
            z-index: 2;
            inset: 0 auto 0 0;
            width: 25%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 7% 1.8% 16%;
            background: #fff;
            border-right: 1.5px solid #176b3a;
        }

        .card-left-logo {
            width: 68%;
            max-width: 150px;
            height: auto;
            object-fit: contain;
            margin-bottom: 6%;
        }

        .organization-name {
            color: #176b3a;
            font-size: clamp(7px, 1.25vw, 17px);
            line-height: 1.28;
            font-weight: 800;
        }

        .card-right-area {
            position: absolute;
            z-index: 1;
            inset: 0 0 0 25%;
        }

        .card-title-area {
            position: absolute;
            top: 5%;
            left: 4%;
            right: 4%;
            height: 18%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .card-title {
            margin: 0;
            color: #252b26;
            font-size: clamp(17px, 3.4vw, 42px);
            line-height: 1.05;
            font-weight: 900;
            letter-spacing: .025em;
            white-space: nowrap;
            text-align: center;
        }

        .title-decoration {
            width: 76%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            margin-top: 8px;
        }

        .title-decoration::before,
        .title-decoration::after {
            content: "";
            height: 2px;
            flex: 1;
            background: #dfad37;
        }

        .title-diamond {
            width: 10px;
            height: 10px;
            flex: 0 0 10px;
            background: #dfa535;
            transform: rotate(45deg);
        }


        /* En-tête du titre */
        .card-title-area {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            box-sizing: border-box;
        }

        /* Titre au premier plan */
        .card-title-area .card-title {
            position: relative;
            z-index: 2;
            margin: 0;
            padding: 0 18px;
            background: #fff;
            text-align: center;
            line-height: 1.1;
        }

        /* Décoration jaune derrière le titre */
        .card-title-area .title-decoration {
            position: absolute;
            z-index: 1;
            top: 75%;
            left: 2.5%;
            right: 2.5%;
            display: flex;
            align-items: center;
            gap: 0;
            pointer-events: none;
        }

        .card-title-area .title-decoration>span:not(.title-diamond) {
            display: block;
            flex: 1;
            height: 2px;
            background: #d4a72c;
        }

        .card-title-area .title-decoration .title-diamond {
            flex: 0 0 12px;
            width: 12px;
            height: 12px;
            margin: 0 14px;
            background: #d4a72c;
            transform: rotate(45deg);
        }


        .card-information {
            position: absolute;
            left: 4%;
            top: 28%;
            width: 58%;
            height: 48%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 2%;
        }

        .info-row {
            display: flex;
            align-items: center;
            min-width: 0;
            width: 100%;
            gap: 7px;
            color: #424a44;
            font-size: clamp(7px, 1.32vw, 16px);
            line-height: 1.2;
        }

        .info-icon {
            flex: 0 0 clamp(17px, 2.15vw, 28px);
            width: clamp(17px, 2.15vw, 28px);
            height: clamp(17px, 2.15vw, 28px);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            background: #48504a;
            color: #fff;
        }

        .info-icon svg {
            width: 65%;
            height: 65%;
        }

        .info-label {
            flex: 0 0 auto;
            white-space: nowrap;
            color: #59615b;
            font-weight: 500;
        }

        .info-value {
            flex: 1 1 auto;
            min-width: 0;
            color: #2e342f;
            font-weight: 700;
            white-space: normal;
            overflow-wrap: anywhere;
            word-break: normal;
            line-height: 1.18;
        }

        .info-row {
            display: flex;
            flex-direction: row;
            align-items: center;
            min-width: 0;
            width: 100%;
            gap: 7px;
            color: #424a44;
            font-size: clamp(7px, 1.32vw, 16px);
            line-height: 1.2;
            box-sizing: border-box;
        }

        .info-icon {
            flex: 0 0 clamp(17px, 2.15vw, 28px);
            width: clamp(17px, 2.15vw, 28px);
            height: clamp(17px, 2.15vw, 28px);

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border-radius: 5px;
            background: #48504a;
            color: #fff;

            padding: 0;
            margin: 0;
            line-height: 0;
            box-sizing: border-box;
            position: relative;
            top: 0;
            transform: none;
        }

        .info-icon svg {
            display: block;
            width: 65%;
            height: 65%;
            flex: 0 0 auto;

            margin: 0;
            padding: 0;
            vertical-align: middle;
            overflow: visible;
            position: static;
            transform: none;
        }

        .info-label,
        .info-value {
            align-self: center;
            margin-top: 0;
            margin-bottom: 0;
        }

        .info-label {
            flex: 0 0 auto;
            white-space: nowrap;
            color: #59615b;
            font-weight: 500;
        }

        .info-value {
            flex: 1 1 auto;
            min-width: 0;
            color: #2e342f;
            font-weight: 700;
            white-space: normal;
            overflow-wrap: anywhere;
            word-break: normal;
            line-height: 1.18;
        }


        .member-photo-container {
            position: absolute;
            top: 26.5%;
            right: 7%;
            width: 15%;
            aspect-ratio: 3 / 4;
            overflow: hidden;
            border: 2px solid #56645b;
            border-radius: 10px;
            box-sizing: border-box;
        }

        .member-photo {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            max-width: none;
            border-radius: 7px;
        }

        .member-photo-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667067;
            font-size: 12px;
            background: #f4f6f3;
        }


        .qr-container {
            position: absolute;
            z-index: 4;
            right: 5%;
            bottom: 17%;
            width: 17%;
            aspect-ratio: 1;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border: 1.5px solid #505750;
            border-radius: 7px;
        }

        .qr-container svg {
            display: block;
            width: 100% !important;
            height: 100% !important;
        }

        .card-footer {
            position: absolute;
            z-index: 5;
            left: 0;
            right: 0;
            bottom: 0;
            height: 15%;
            overflow: hidden;
            background: #1c321e;
            color: #fff;
        }

        .card-footer::before {
            content: "";
            position: absolute;
            left: -4%;
            top: -19px;
            width: 110%;
            height: 35px;
            background: #dfa735;
            transform: rotate(-4deg);
            transform-origin: center;
        }

        .footer-content {
            position: absolute;
            z-index: 2;
            left: 25%;
            right: 2%;
            bottom: 0;
            height: 62%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            gap: 10px;
            padding: 0 1% 1%;
            font-size: clamp(5px, 1.05vw, 13px);
            font-weight: 800;
        }

        .footer-item {
            display: flex;
            align-items: center;
            gap: 5px;
            white-space: nowrap;
        }

        .footer-item svg {
            width: clamp(10px, 1.6vw, 20px);
            height: clamp(10px, 1.6vw, 20px);
            color: #dfa735;
        }


        /* Répartition du pied de carte */
        .card-footer .footer-content {
            display: flex;
            align-items: center;
            justify-content: space-around;
            gap: 24px;
            min-width: 0;
        }


        /* Alignement icône + texte dans le footer */
        .card-footer .footer-item {
            display: inline-flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 8px;
            line-height: 1;
            vertical-align: middle;
        }

        /* Neutraliser les décalages propres aux SVG */
        .card-footer .footer-item svg {
            display: block;
            flex: 0 0 24px;
            width: 24px;
            height: 24px;
            margin: 0;
            padding: 0;
            position: static;
            transform: none;
            vertical-align: middle;
        }

        /* Centrer précisément le texte sur la hauteur de l'icône */
        .card-footer .footer-item span {
            display: inline-block;
            margin: 0;
            padding: 0;
            line-height: 1.2;
        }



        .footer-slogan {
            position: absolute;
            z-index: 3;
            left: 1.5%;
            bottom: 25%;
            width: 22%;
            color: #fff;
            text-align: center;
            font-size: clamp(5px, .85vw, 11px);
            line-height: 1.12;
            font-weight: 800;
        }

        .card-footer .footer-item {
            display: inline-flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 7px;

            margin: 0;
            padding: 0;
            line-height: 1.2;
        }

        .card-footer .footer-item svg {
            display: block;
            flex: 0 0 20px;
            width: 20px;
            height: 20px;

            margin: 0;
            padding: 0;
            vertical-align: middle;
            position: static;
            transform: none;
        }

        .actions {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
            margin-top: 18px;
        }

        .action-button {
            min-height: 48px;
            border: 0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #fff;
            color: #374151;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .08);
            cursor: pointer;
            font-size: 14px;
        }

        .action-button:hover {
            background: #176b3a;
            color: #fff;
        }

        .action-button:disabled {
            opacity: .65;
            cursor: wait;
        }

        .action-button svg {
            width: 21px;
            height: 21px;
        }

        @media (max-width: 640px) {
            .success-page {
                padding: 14px 8px 24px;
            }

            .success-header {
                margin-bottom: 14px;
            }

            .success-header-logo {
                width: 56px;
                height: 56px;
            }

            .card-frame {
                border-radius: 8px;
            }

            .membership-card {
                border-radius: 8px;
            }

            .info-row {
                gap: 3px;
                font-size: clamp(5px, 1.25vw, 8px);
            }

            .info-label {
                white-space: normal;
            }

            .info-icon {
                border-radius: 3px;
            }

            .card-information {
                width: 59%;
            }

            .actions {
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 7px;
            }

            .action-button {
                min-height: 44px;
                padding: 8px 3px;
            }

            .action-button .action-text {
                display: none;
            }
        }

        @media print {
            @page {
                size: 85.6mm 53.98mm;
                margin: 0;
            }

            html,
            body {
                width: 85.6mm;
                height: 53.98mm;
                margin: 0;
                padding: 0;
                background: #fff !important;
            }

            .success-page {
                min-height: 0;
                padding: 0;
                display: block;
            }

            .success-header,
            .actions {
                display: none !important;
            }

            .success-container,
            .card-frame {
                width: 85.6mm;
                max-width: none;
                height: 53.98mm;
                margin: 0;
                padding: 0;
                border-radius: 0;
                box-shadow: none;
            }

            .membership-card {
                width: 85.6mm;
                height: 53.98mm;
                aspect-ratio: auto;
                border-radius: 0;
            }
        }
    </style>
</head>

<body>
    <div class="success-page">
        <main class="success-container">
            <header class="success-header">
                <img src="{{ asset('asset/images/logo-uhsas.jpeg') }}" alt="Logo UHSAS" class="success-header-logo">
                <h1 class="success-title">Inscription enregistrée !</h1>
                <p class="success-description">Votre carte de membre est disponible ci-dessous.</p>
            </header>

            <div class="card-frame">
                <div id="membership-card" class="membership-card" data-member-card>
                    <div class="card-top-border"></div>
                    <div class="card-watermark"></div>

                    <aside class="card-left-panel">
                        <img src="{{ asset('asset/images/logo-uhsas.jpeg') }}" alt="Logo UHSAS" class="card-left-logo"
                            crossorigin="anonymous">
                        <div class="organization-name">
                            UNION HABITAT<br>
                            SOLIDAIRE DES<br>
                            ARTISANS DU SÉNÉGAL
                        </div>
                    </aside>

                    <section class="card-right-area">
                        <header class="card-title-area">
                            <h2 class="card-title">CARTE DE MEMBRE</h2>
                            <div class="title-decoration"><span></span><span class="title-diamond"></span><span></span>
                            </div>
                        </header>

                        <div class="card-information">
                            <div class="info-row">
                                <span class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <circle cx="12" cy="8" r="4" />
                                        <path d="M4 21v-2a8 8 0 0 1 16 0v2" />
                                    </svg></span>
                                <span class="info-label">Nom :</span><span
                                    class="info-value">{{ $member->full_name }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <rect x="5" y="3" width="14" height="18" rx="1" />
                                        <path d="M9 7h6M9 11h6M9 15h3" />
                                    </svg></span>
                                <span class="info-label">N° de membre :</span><span
                                    class="info-value">{{ $member->member_number }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path
                                            d="M22 16.9v3a2 2 0 0 1-2.2 2A19.8 19.8 0 0 1 11.2 19a19.4 19.4 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 3a2 2 0 0 1-.6 1.9L7.1 10.5a16 16 0 0 0 6 6l1.9-1.9a2 2 0 0 1 1.9-.6l3 .5a2 2 0 0 1 2.1 2.4z" />
                                    </svg></span>
                                <span class="info-label">Téléphone :</span><span
                                    class="info-value">{{ $member->phone }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <rect x="3" y="7" width="18" height="14" rx="2" />
                                        <path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18" />
                                    </svg></span>
                                <span class="info-label">Métier :</span><span
                                    class="info-value">{{ $member->profession?->name ?? 'Non renseigné' }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <rect x="3" y="5" width="18" height="16" rx="2" />
                                        <path d="M16 3v4M8 3v4M3 10h18" />
                                    </svg></span>
                                <span class="info-label">Délivrance :</span><span
                                    class="info-value">{{ optional($member->activated_at ?? ($member->registered_at ?? $member->created_at))->format('d/m/Y') ?? 'En attente' }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M12 7v5l3 2" />
                                    </svg></span>
                                <span class="info-label">Expire le :</span><span
                                    class="info-value">{{ $member->expires_at ? \Illuminate\Support\Carbon::parse($member->expires_at)->format('d/m/Y') : 'Non activé' }}</span>
                            </div>
                            <div class="info-row">
                                <span class="info-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M20 10c0 5-8 12-8 12S4 15 4 10a8 8 0 1 1 16 0Z" />
                                        <circle cx="12" cy="10" r="2.5" />
                                    </svg></span>
                                <span class="info-label">Adresse :</span><span
                                    class="info-value">{{ $member->address ?? 'Non renseignée' }}</span>
                            </div>
                        </div>


                        <div class="member-photo-container">
                            @if ($member->photo)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($member->photo) }}"
                                    alt="Photo de {{ $member->full_name }}" class="member-photo"
                                    crossorigin="anonymous">
                            @else
                                <div class="member-photo member-photo-placeholder">
                                    Photo
                                </div>
                            @endif
                        </div>


                        <div class="qr-container">
                            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')->size(220)->margin(0)->generate(route('member.public', $member)) !!}
                        </div>
                    </section>

                    <footer class="card-footer">
                        <div class="footer-slogan">ENSEMBLE, BÂTISSONS<br>DES VIES MEILLEURES</div>
                        <div class="footer-content">
                            <span class="footer-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M2 21v-2a7 7 0 0 1 14 0v2M19 8v6M22 11h-6" />
                                </svg> SOLIDARITÉ</span>
                            <span class="footer-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="m3 10 9-7 9 7M5 9v12h14V9M9 21v-7h6v7" />
                                </svg> HABITAT</span>
                            <span class="footer-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="m14 6 4-4 4 4-4 4M2 22l10-10M8 22l-6-6M14 10l-4-4" />
                                </svg> PROFESSIONNALISME</span>
                        </div>
                    </footer>
                </div>
            </div>

            <div class="actions">
                <button type="button" class="action-button" id="saveButton" data-label="Enregistrer">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 3v12m-5-5 5 5 5-5M5 21h14" />
                    </svg><span class="action-text">Enregistrer l’image</span>
                </button>
                {{-- <button type="button" class="action-button" id="shareButton" data-label="Partager">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="18" cy="5" r="3" />
                        <circle cx="6" cy="12" r="3" />
                        <circle cx="18" cy="19" r="3" />
                        <path d="m8.7 10.7 6.6-4.4M8.7 13.3l6.6 4.4" />
                    </svg><span class="action-text">Partager</span>
                </button> --}}
                <button type="button" class="action-button" id="whatsappButton" data-label="WhatsApp">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 20l1.2-5.3A8.4 8.4 0 1 1 21 11.5Z" />
                        <path d="M8.5 8.5c.6 2.5 2.5 4.4 5 5" />
                    </svg><span class="action-text">WhatsApp</span>
                </button>
                {{-- <button type="button" class="action-button" id="printButton" data-label="Imprimer">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path
                            d="M6 9V3h12v6M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                        <path d="M6 14h12v7H6z" />
                    </svg><span class="action-text">Imprimer</span>
                </button> --}}
            </div>
        </main>
    </div>

    <script>
        (() => {
            const card = document.getElementById('membership-card');
            const saveButton = document.getElementById('saveButton');
            const shareButton = document.getElementById('shareButton');
            const whatsappButton = document.getElementById('whatsappButton');
            const printButton = document.getElementById('printButton');
            const memberNumber = @json($member->member_number);
            const memberName = @json($member->full_name);
            const publicUrl = @json(route('member.public', $member));

            function loadHtml2Canvas() {
                if (typeof window.html2canvas === 'function') return Promise.resolve();
                if (window.__html2canvasPromise) return window.__html2canvasPromise;
                window.__html2canvasPromise = new Promise((resolve, reject) => {
                    const script = document.createElement('script');
                    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js';
                    script.onload = () => typeof window.html2canvas === 'function' ?
                        resolve() : reject(new Error('html2canvas indisponible'));
                    script.onerror = () => reject(new Error('Chargement de html2canvas impossible'));
                    document.head.appendChild(script);
                });
                return window.__html2canvasPromise;
            }

            async function waitForImages(root) {
                const images = [...root.querySelectorAll('img')];
                await Promise.all(images.map(img => {
                    if (img.complete && img.naturalWidth > 0) return Promise.resolve();
                    return new Promise(resolve => {
                        const done = () => resolve();
                        img.addEventListener('load', done, {
                            once: true
                        });
                        img.addEventListener('error', done, {
                            once: true
                        });
                        setTimeout(done, 10000);
                    });
                }));
            }


            if (saveButton) {
                saveButton.addEventListener('click', async () => {
                    const original = saveButton.innerHTML;
                    saveButton.disabled = true;
                    saveButton.innerHTML = 'Génération…';

                    try {
                        await loadHtml2Canvas();
                        await document.fonts.ready;

                        // Attendre le chargement des images de la carte.
                        await waitForImages(card);

                        // Attendre deux cycles de rendu pour stabiliser le layout.
                        await new Promise(resolve =>
                            requestAnimationFrame(() =>
                                requestAnimationFrame(resolve)
                            )
                        );

                        const rect = card.getBoundingClientRect();

                        if (!rect.width || !rect.height) {
                            throw new Error('Dimensions de la carte invalides.');
                        }

                        // Capturer la carte sans modifier ses proportions.
                        const canvas = await window.html2canvas(card, {
                            scale: 3,
                            useCORS: true,
                            allowTaint: false,
                            backgroundColor: '#ffffff',
                            logging: false,
                            imageTimeout: 15000,

                            // Utiliser la taille réelle de la carte.
                            width: card.offsetWidth,
                            height: card.offsetHeight,
                            windowWidth: Math.max(
                                document.documentElement.clientWidth,
                                card.scrollWidth
                            ),
                            windowHeight: Math.max(
                                document.documentElement.clientHeight,
                                card.scrollHeight
                            ),

                            scrollX: 0,
                            scrollY: 0,

                            onclone: clonedDocument => {
                                const clonedCard = clonedDocument.querySelector(
                                    '[data-member-card]'
                                );

                                if (!clonedCard) return;

                                clonedCard.style.overflow = 'hidden';
                                clonedCard.style.boxSizing = 'border-box';
                                clonedCard.style.transform = 'none';

                                /*
                                 * Neutraliser les règles globales susceptibles
                                 * de décaler les SVG pendant la capture.
                                 */
                                clonedCard.querySelectorAll('.info-row').forEach(row => {
                                    row.style.display = 'flex';
                                    row.style.flexDirection = 'row';
                                    row.style.alignItems = 'center';
                                    row.style.gap = '7px';
                                    row.style.lineHeight = '1.2';
                                    row.style.overflow = 'visible';
                                });

                                clonedCard.querySelectorAll('.info-icon').forEach(icon => {
                                    icon.style.display = 'inline-flex';
                                    icon.style.flexShrink = '0';
                                    icon.style.alignItems = 'center';
                                    icon.style.justifyContent = 'center';
                                    icon.style.padding = '0';
                                    icon.style.margin = '0';
                                    icon.style.lineHeight = '0';
                                    icon.style.overflow = 'hidden';
                                    icon.style.position = 'relative';
                                    icon.style.top = '0';
                                    icon.style.transform = 'none';
                                    icon.style.alignSelf = 'center';
                                });

                                clonedCard.querySelectorAll('.info-icon svg').forEach(svg => {
                                    svg.style.display = 'block';
                                    svg.style.width = '65%';
                                    svg.style.height = '65%';
                                    svg.style.flex = '0 0 auto';
                                    svg.style.margin = '0';
                                    svg.style.padding = '0';
                                    svg.style.position = 'static';
                                    svg.style.top = 'auto';
                                    svg.style.transform = 'none';
                                    svg.style.verticalAlign = 'middle';
                                });

                                clonedCard.querySelectorAll('.info-label, .info-value').forEach(text => {
                                    text.style.alignSelf = 'center';
                                    text.style.marginTop = '0';
                                    text.style.marginBottom = '0';
                                });

                                clonedCard.querySelectorAll('.footer-content').forEach(content => {
                                    content.style.display = 'flex';
                                    content.style.alignItems = 'center';
                                });

                                clonedCard.querySelectorAll('.footer-item').forEach(item => {
                                    item.style.display = 'inline-flex';
                                    item.style.flexDirection = 'row';
                                    item.style.alignItems = 'center';
                                    item.style.justifyContent = 'center';
                                    item.style.lineHeight = '1.2';
                                    item.style.margin = '0';
                                    item.style.padding = '0';
                                });

                                clonedCard.querySelectorAll('.footer-item svg').forEach(svg => {
                                    svg.style.display = 'block';
                                    svg.style.width = '20px';
                                    svg.style.height = '20px';
                                    svg.style.flex = '0 0 20px';
                                    svg.style.margin = '0';
                                    svg.style.padding = '0';
                                    svg.style.position = 'static';
                                    svg.style.top = 'auto';
                                    svg.style.transform = 'none';
                                    svg.style.verticalAlign = 'middle';
                                });

                                // Préserver les proportions des photos.
                                clonedCard.querySelectorAll('.member-photo').forEach(img => {
                                    img.style.objectFit = 'cover';
                                    img.style.objectPosition = 'center';
                                    img.style.display = 'block';
                                });
                            }
                        });

                        const blob = await new Promise((resolve, reject) => {
                            canvas.toBlob(result => {
                                if (result) {
                                    resolve(result);
                                } else {
                                    reject(new Error('Image PNG vide.'));
                                }
                            }, 'image/png');
                        });

                        const safeNumber = String(memberNumber)
                            .replace(/[^a-zA-Z0-9_-]/g, '-');

                        const fileName = `Carte-UHSAS-${safeNumber}.png`;

                        const file = new File([blob], fileName, {
                            type: 'image/png'
                        });

                        if (
                            navigator.share &&
                            navigator.canShare &&
                            navigator.canShare({
                                files: [file]
                            })
                        ) {
                            await navigator.share({
                                title: 'Carte de membre UHSAS',
                                text: `Carte de membre de ${memberName}`,
                                files: [file]
                            });
                        } else {
                            const objectUrl = URL.createObjectURL(blob);
                            const link = document.createElement('a');

                            link.href = objectUrl;
                            link.download = fileName;
                            document.body.appendChild(link);
                            link.click();
                            link.remove();

                            setTimeout(() => {
                                URL.revokeObjectURL(objectUrl);
                            }, 3000);
                        }
                    } catch (error) {
                        if (error.name !== 'AbortError') {
                            console.error(
                                'Erreur capture carte UHSAS :',
                                error
                            );

                            alert(
                                "Impossible de générer l'image. Vérifiez le chargement des photos et réessayez."
                            );
                        }
                    } finally {
                        saveButton.disabled = false;
                        saveButton.innerHTML = original;
                    }
                });
            }


            if (shareButton) {
                shareButton.addEventListener('click', async () => {
                    const data = {
                        title: 'Carte de membre UHSAS',
                        text: `Carte de membre de ${memberName}`,
                        url: publicUrl
                    };
                    try {
                        if (navigator.share) await navigator.share(data);
                        else window.open('https://wa.me/?text=' + encodeURIComponent(
                            `${data.text}\n${data.url}`), '_blank', 'noopener');
                    } catch (error) {
                        if (error.name !== 'AbortError') console.error(error);
                    }
                });
            }

            if (whatsappButton) {
                whatsappButton.addEventListener('click', () => {
                    const text = `Carte de membre UHSAS de ${memberName}\n${publicUrl}`;
                    window.open('https://wa.me/?text=' + encodeURIComponent(text), '_blank', 'noopener');
                });
            }

            if (printButton) printButton.addEventListener('click', () => window.print());
        })();
    </script>
</body>

</html>
