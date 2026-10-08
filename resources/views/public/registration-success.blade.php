
@section('content')

<style>
    :root {
        --uhsas-green: #075B32;
        --uhsas-dark: #043D23;
        --uhsas-green-light: #0B7040;
        --uhsas-gold: #D6A52E;
        --uhsas-gold-light: #F0C85A;
        --uhsas-bg: #F4F7F3;
        --uhsas-text: #1F2A23;
        --uhsas-muted: #718078;
        --uhsas-white: #FFFFFF;
    }

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        background:
            radial-gradient(circle at 10% 10%, rgba(214,165,46,.10), transparent 25%),
            radial-gradient(circle at 90% 90%, rgba(7,91,50,.10), transparent 30%),
            var(--uhsas-bg);
        font-family: Inter, Arial, sans-serif;
        color: var(--uhsas-text);
    }

    .success-page {
        min-height: 100vh;
        padding: 55px 20px 70px;
    }

    .success-wrapper {
        max-width: 1100px;
        margin: auto;
    }

    /* HEADER */

    .success-intro {
        text-align: center;
        margin-bottom: 35px;
    }

    .success-logo {
        width: 95px;
        height: 95px;
        object-fit: contain;
        margin-bottom: 15px;
    }

    .success-check {
        width: 48px;
        height: 48px;
        margin: 0 auto 15px;
        border-radius: 50%;
        background: var(--uhsas-green);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        box-shadow: 0 8px 25px rgba(7,91,50,.20);
    }

    .success-title {
        margin: 0;
        color: var(--uhsas-dark);
        font-size: 30px;
        font-weight: 800;
        letter-spacing: -.5px;
    }

    .success-description {
        margin: 10px auto 0;
        max-width: 600px;
        color: var(--uhsas-muted);
        line-height: 1.6;
        font-size: 15px;
    }

    /* CARD */

    .membership-card-wrapper {
        max-width: 950px;
        margin: 0 auto 35px;
        padding: 7px;
        border-radius: 28px;

        background:
            linear-gradient(
                135deg,
                var(--uhsas-gold),
                var(--uhsas-gold-light),
                var(--uhsas-gold)
            );

        box-shadow:
            0 25px 60px rgba(4,61,35,.20),
            0 5px 15px rgba(0,0,0,.08);
    }

    .membership-card {
        position: relative;
        overflow: hidden;
        aspect-ratio: 85.6 / 53.98;
        min-height: 520px;

        border-radius: 21px;

        background:
            radial-gradient(
                circle at 100% 0%,
                rgba(214,165,46,.20),
                transparent 30%
            ),
            radial-gradient(
                circle at 0% 100%,
                rgba(255,255,255,.06),
                transparent 35%
            ),
            linear-gradient(
                135deg,
                #043D23 0%,
                #075B32 55%,
                #064626 100%
            );

        color: white;
    }

    /* motifs */

    .card-decoration {
        position: absolute;
        border: 1px solid rgba(240,200,90,.25);
        border-radius: 50%;
        pointer-events: none;
    }

    .card-decoration.one {
        width: 400px;
        height: 400px;
        right: -170px;
        top: -190px;
    }

    .card-decoration.two {
        width: 280px;
        height: 280px;
        left: -150px;
        bottom: -160px;
    }

    .card-content {
        position: relative;
        z-index: 2;
        height: 100%;
        padding: 38px 42px;
        display: flex;
        flex-direction: column;
    }

    /* TOP */

    .card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .organization {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .organization-logo {
        width: 76px;
        height: 76px;
        border-radius: 50%;
        object-fit: contain;
        background: white;
        padding: 5px;
    }

    .organization-name {
        font-size: 12px;
        line-height: 1.5;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .organization-name span {
        color: var(--uhsas-gold-light);
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        padding: 8px 14px;
        border-radius: 30px;

        background: rgba(255,255,255,.10);
        border: 1px solid rgba(255,255,255,.18);

        font-size: 10px;
        font-weight: 800;
        letter-spacing: .8px;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #68D391;
        box-shadow: 0 0 0 4px rgba(104,211,145,.12);
    }

    /* TITLE */

    .card-heading {
        margin-top: 25px;
    }

    .card-heading small {
        color: var(--uhsas-gold-light);
        font-size: 10px;
        letter-spacing: 3px;
        font-weight: 700;
    }

    .card-heading h2 {
        margin: 5px 0 0;
        font-size: 27px;
        letter-spacing: 1px;
        font-weight: 800;
    }

    /* BODY */

    .card-main {
        flex: 1;
        display: grid;
        grid-template-columns: 145px 1fr 120px;
        gap: 28px;
        align-items: center;
    }

    .member-photo {
        width: 145px;
        height: 175px;
        object-fit: cover;

        border-radius: 14px;
        border: 3px solid var(--uhsas-gold);
        background: white;

        box-shadow: 0 12px 25px rgba(0,0,0,.20);
    }

    .photo-placeholder {
        width: 145px;
        height: 175px;
        border-radius: 14px;
        border: 3px solid var(--uhsas-gold);
        background: rgba(255,255,255,.10);

        display: flex;
        align-items: center;
        justify-content: center;

        color: rgba(255,255,255,.7);
        font-size: 11px;
        font-weight: 700;
    }

    .member-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px 25px;
    }

    .info-item {
        min-width: 0;
    }

    .info-item.full {
        grid-column: span 2;
    }

    .info-label {
        display: block;
        margin-bottom: 5px;

        color: rgba(255,255,255,.55);
        font-size: 8px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .info-value {
        display: block;

        color: white;
        font-size: 13px;
        font-weight: 700;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .info-value.member-name {
        color: var(--uhsas-gold-light);
        font-size: 18px;
        text-transform: uppercase;
    }

    .qr-box {
        width: 115px;
        height: 115px;

        padding: 8px;
        border-radius: 12px;

        background: white;
        box-shadow: 0 12px 25px rgba(0,0,0,.20);
    }

    .qr-box svg {
        display: block;
        width: 100%;
        height: 100%;
    }

    .qr-label {
        margin-top: 8px;
        text-align: center;

        font-size: 8px;
        color: rgba(255,255,255,.65);
        letter-spacing: .8px;
        text-transform: uppercase;
    }

    /* FOOTER */

    .card-bottom {
        padding-top: 17px;

        border-top: 1px solid rgba(240,200,90,.35);

        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .card-motto {
        font-size: 9px;
        letter-spacing: 1.5px;
        font-weight: 700;
        color: rgba(255,255,255,.8);
    }

    .card-validity {
        text-align: right;
    }

    .card-validity small {
        display: block;
        font-size: 7px;
        color: rgba(255,255,255,.5);
        letter-spacing: 1px;
    }

    .card-validity strong {
        display: block;
        margin-top: 2px;
        color: var(--uhsas-gold-light);
        font-size: 11px;
    }

    /* ACTIONS */

    .actions-title {
        text-align: center;
        margin-bottom: 17px;
    }

    .actions-title h3 {
        margin: 0;
        font-size: 18px;
        color: var(--uhsas-dark);
    }

    .actions-title p {
        margin: 5px 0 0;
        color: var(--uhsas-muted);
        font-size: 13px;
    }

    .actions {
        max-width: 800px;
        margin: auto;

        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }

    .action-button {
        min-height: 58px;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;

        border: 1px solid #E1E7E2;
        border-radius: 14px;

        background: white;
        color: var(--uhsas-dark);

        text-decoration: none;
        font-size: 12px;
        font-weight: 700;

        cursor: pointer;

        transition: .2s ease;

        box-shadow: 0 5px 15px rgba(4,61,35,.05);
    }

    .action-button:hover {
        transform: translateY(-3px);
        border-color: var(--uhsas-gold);
        box-shadow: 0 12px 25px rgba(4,61,35,.10);
    }

    .action-button.primary {
        background: var(--uhsas-green);
        border-color: var(--uhsas-green);
        color: white;
    }

    .action-icon {
        width: 21px;
        height: 21px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .member-reference {
        margin-top: 25px;
        text-align: center;
        font-size: 11px;
        color: var(--uhsas-muted);
    }

    .member-reference strong {
        color: var(--uhsas-green);
        letter-spacing: 1px;
    }

    @media(max-width: 800px) {

        .membership-card {
            min-height: auto;
            aspect-ratio: auto;
        }

        .card-content {
            padding: 28px 25px;
        }

        .card-main {
            grid-template-columns: 105px 1fr;
            gap: 18px;
            margin: 25px 0;
        }

        .member-photo,
        .photo-placeholder {
            width: 105px;
            height: 130px;
        }

        .qr-box-container {
            grid-column: 2;
        }

        .qr-box {
            width: 90px;
            height: 90px;
        }

        .actions {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media(max-width: 550px) {

        .success-page {
            padding: 30px 12px 50px;
        }

        .success-title {
            font-size: 25px;
        }

        .membership-card-wrapper {
            padding: 4px;
            border-radius: 20px;
        }

        .membership-card {
            border-radius: 16px;
        }

        .card-content {
            padding: 22px 18px;
        }

        .organization-logo {
            width: 55px;
            height: 55px;
        }

        .organization-name {
            font-size: 8px;
        }

        .status-badge {
            font-size: 7px;
            padding: 6px 8px;
        }

        .card-heading {
            margin-top: 18px;
        }

        .card-heading h2 {
            font-size: 20px;
        }

        .card-main {
            grid-template-columns: 82px 1fr;
            gap: 13px;
        }

        .member-photo,
        .photo-placeholder {
            width: 82px;
            height: 105px;
        }

        .member-info {
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .info-item.full {
            grid-column: span 1;
        }

        .info-value.member-name {
            font-size: 14px;
        }

        .info-value {
            font-size: 10px;
        }

        .qr-box-container {
            display: none;
        }

        .card-motto {
            font-size: 7px;
        }

        .card-validity strong {
            font-size: 9px;
        }

        .actions {
            grid-template-columns: 1fr 1fr;
        }

        .action-button {
            font-size: 10px;
        }
    }

    @media print {

        body {
            background: white;
        }

        .success-intro,
        .actions,
        .actions-title,
        .member-reference {
            display: none !important;
        }

        .success-page {
            padding: 0;
        }

        .success-wrapper {
            max-width: none;
        }

        .membership-card-wrapper {
            margin: 0;
            padding: 0;
            box-shadow: none;
        }

        .membership-card {
            width: 85.6mm;
            height: 53.98mm;
            min-height: 0;
            border-radius: 0;
            box-shadow: none;
        }

        .card-content {
            padding: 4mm;
        }
    }
</style>


<div class="success-page">

    <div class="success-wrapper">

        {{-- HEADER --}}
        <div class="success-intro">

            <div class="success-check">
                ✓
            </div>

            <h1 class="success-title">
                Inscription réussie
            </h1>

            <p class="success-description">
                Votre adhésion à l'Union Habitat Solidaire des Artisans du Sénégal
                a été enregistrée avec succès.
            </p>

        </div>


        {{-- CARTE --}}
        <div class="membership-card-wrapper">

            <div class="membership-card">

                <div class="card-decoration one"></div>
                <div class="card-decoration two"></div>

                <div class="card-content">

                    {{-- TOP --}}
                    <div class="card-top">

                        <div class="organization">

                            <img
                                src="{{ asset('asset/images/logo-uhsas.jpeg') }}"
                                class="organization-logo"
                                alt="Logo UHSAS"
                            >

                            <div class="organization-name">
                                UNION HABITAT SOLIDAIRE
                                <br>
                                DES ARTISANS DU <span>SÉNÉGAL</span>
                            </div>

                        </div>

                        <div class="status-badge">
                            <span class="status-dot"></span>
                            MEMBRE ACTIF
                        </div>

                    </div>


                    {{-- TITRE --}}
                    <div class="card-heading">

                        <small>DOCUMENT OFFICIEL</small>

                        <h2>
                            CARTE DE MEMBRE
                        </h2>

                    </div>


                    {{-- INFORMATIONS --}}
                    <div class="card-main">

                        {{-- PHOTO --}}
                        <div>

                            @if($member->photo)

                                <img
                                    src="{{ Storage::url($member->photo) }}"
                                    class="member-photo"
                                    alt="Photo du membre"
                                >

                            @else

                                <div class="photo-placeholder">
                                    PHOTO
                                </div>

                            @endif

                        </div>


                        {{-- INFOS --}}
                        <div class="member-info">

                            <div class="info-item full">

                                <span class="info-label">
                                    Nom complet
                                </span>

                                <span class="info-value member-name">
                                    {{ $member->full_name }}
                                </span>

                            </div>


                            <div class="info-item">

                                <span class="info-label">
                                    Profession
                                </span>

                                <span class="info-value">
                                    {{ $member->profession?->name ?? 'Non renseigné' }}
                                </span>

                            </div>


                            <div class="info-item">

                                <span class="info-label">
                                    Numéro membre
                                </span>

                                <span class="info-value">
                                    {{ $member->member_number }}
                                </span>

                            </div>


                            <div class="info-item">

                                <span class="info-label">
                                    Téléphone
                                </span>

                                <span class="info-value">
                                    {{ $member->phone }}
                                </span>

                            </div>


                            <div class="info-item">

                                <span class="info-label">
                                    Adresse
                                </span>

                                <span class="info-value">
                                    {{ $member->address ?? 'Non renseignée' }}
                                </span>

                            </div>

                        </div>


                        {{-- QR --}}
                        <div class="qr-box-container">

                            <div class="qr-box">

                                {!! QrCode::format('svg')
                                    ->size(220)
                                    ->margin(0)
                                    ->generate(route('member.public', $member)) !!}

                            </div>

                            <div class="qr-label">
                                Vérifier la carte
                            </div>

                        </div>

                    </div>


                    {{-- FOOTER --}}
                    <div class="card-bottom">

                        <div class="card-motto">
                            SOLIDARITÉ • HABITAT • PROFESSIONNALISME
                        </div>

                        <div class="card-validity">

                            <small>
                                VALABLE JUSQU'AU
                            </small>

                            <strong>
                                {{ $member->activated_at?->copy()->addYears(5)->format('d/m/Y') ?? 'Non activé' }}
                            </strong>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ACTIONS --}}

        <div class="actions-title">

            <h3>
                Votre carte est prête
            </h3>

            <p>
                Conservez votre carte numérique ou partagez-la facilement.
            </p>

        </div>


        <div class="actions">

            {{-- <a
                href="{{ route('registration.card.pdf', $member) }}"
                class="action-button primary"
            >
                <span class="action-icon">↓</span>
                Télécharger PDF
            </a> --}}


            <button
                type="button"
                id="shareButton"
                class="action-button"
            >
                <span class="action-icon">↗</span>
                Partager
            </button>


            <button
                type="button"
                id="saveButton"
                class="action-button"
            >
                <span class="action-icon">↓</span>
                Enregistrer
            </button>


            {{-- <button
                type="button"
                id="printButton"
                class="action-button"
            >
                <span class="action-icon">▣</span>
                Imprimer
            </button> --}}

        </div>


        <div class="member-reference">

            Numéro de membre :

            <strong>
                {{ $member->member_number }}
            </strong>

        </div>

    </div>

</div>


<script>

    const shareButton = document.getElementById('shareButton');
    const printButton = document.getElementById('printButton');

    /*
    |--------------------------------------------------------------------------
    | PARTAGE
    |--------------------------------------------------------------------------
    */

    if (shareButton) {

        shareButton.addEventListener('click', async () => {

            const shareData = {
                title: 'Carte de membre UHSAS',
                text: 'Ma carte de membre UHSAS - {{ $member->full_name }}',
                url: "{{ route('member.public', $member) }}"
            };

            try {

                if (navigator.share) {

                    await navigator.share(shareData);

                } else {

                    const whatsappUrl =
                        'https://wa.me/?text=' +
                        encodeURIComponent(
                            shareData.text + "\n" + shareData.url
                        );

                    window.open(
                        whatsappUrl,
                        '_blank'
                    );
                }

            } catch (error) {

                console.log('Partage annulé');

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | IMPRESSION
    |--------------------------------------------------------------------------
    */

    if (printButton) {

        printButton.addEventListener('click', () => {

            window.print();

        });

    }


    /*
    |--------------------------------------------------------------------------
    | ENREGISTREMENT IMAGE
    |--------------------------------------------------------------------------
    */

    const saveButton = document.getElementById('saveButton');

    if (saveButton) {

        saveButton.addEventListener('click', async () => {

            saveButton.disabled = true;
            saveButton.innerHTML = 'Génération...';

            try {

                if (!window.html2canvas) {

                    await new Promise((resolve, reject) => {

                        const script = document.createElement('script');

                        script.src =
                            'https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js';

                        script.onload = resolve;
                        script.onerror = reject;

                        document.head.appendChild(script);

                    });

                }

                const card =
                    document.querySelector('.membership-card');

                const canvas =
                    await html2canvas(card, {
                        scale: 4,
                        useCORS: true,
                        backgroundColor: null
                    });

                const link =
                    document.createElement('a');

                link.download =
                    'carte-membre-{{ $member->member_number }}.png';

                link.href =
                    canvas.toDataURL('image/png');

                link.click();

            } catch (error) {

                console.error(error);

                alert(
                    'Impossible d’enregistrer la carte.'
                );

            } finally {

                saveButton.disabled = false;

                saveButton.innerHTML =
                    '<span class="action-icon">↓</span> Enregistrer';

            }

        });

    }

</script>
