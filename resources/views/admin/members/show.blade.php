@extends('layouts.app')

@section('title', 'Fiche membre')

@section('page-title', 'Fiche membre')

@push('styles')
<style>

    .member-page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-bottom: 22px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        color: #718078;
        font-size: 11px;
        font-weight: 600;
    }

    .back-link:hover {
        color: #075B32;
    }

    .back-link svg {
        width: 17px;
        height: 17px;
    }

    .header-actions {
        display: flex;
        gap: 8px;
    }

    .outline-button,
    .gold-button,
    .danger-button {
        min-height: 40px;
        padding: 0 13px;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;

        border-radius: 10px;

        font-size: 10px;
        font-weight: 700;

        cursor: pointer;

        transition: .2s ease;
    }

    .outline-button {
        border: 1px solid #DDE5DF;
        background: white;
        color: #075B32;
    }

    .outline-button:hover {
        background: #F2F8F4;
        border-color: #B8CCBE;
    }

    .gold-button {
        border: 1px solid #D6A52E;
        background: #D6A52E;
        color: #043D23;
    }

    .gold-button:hover {
        background: #F0C85A;
    }

    .danger-button {
        border: 1px solid #E8C6C3;
        background: #FFF7F6;
        color: #B42318;
    }

    .danger-button:hover {
        background: #FEECEC;
    }

    .outline-button svg,
    .gold-button svg,
    .danger-button svg {
        width: 16px;
        height: 16px;
    }


    /* =========================
       PROFILE HEADER
    ========================= */

    .profile-card {
        position: relative;
        overflow: hidden;

        padding: 25px;

        background:
            linear-gradient(
                135deg,
                #043D23,
                #075B32
            );

        border-radius: 18px;

        color: white;

        box-shadow:
            0 12px 30px rgba(4,61,35,.14);

        margin-bottom: 18px;
    }

    .profile-card::after {
        content: '';

        position: absolute;

        width: 300px;
        height: 300px;

        right: -150px;
        top: -180px;

        border-radius: 50%;

        border: 1px solid rgba(240,200,90,.18);
    }

    .profile-card::before {
        content: '';

        position: absolute;

        width: 200px;
        height: 200px;

        left: -120px;
        bottom: -130px;

        border-radius: 50%;

        border: 1px solid rgba(255,255,255,.08);
    }

    .profile-content {
        position: relative;
        z-index: 2;

        display: flex;
        align-items: center;

        gap: 20px;
    }

    .profile-photo {
        width: 100px;
        height: 100px;

        flex-shrink: 0;

        object-fit: cover;

        border-radius: 18px;

        border: 3px solid #D6A52E;

        background: white;
    }

    .profile-placeholder {
        width: 100px;
        height: 100px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 18px;

        border: 3px solid #D6A52E;

        background: rgba(255,255,255,.10);

        color: #F0C85A;

        font-size: 25px;
        font-weight: 800;
    }

    .profile-info {
        flex: 1;
    }

    .profile-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 5px 9px;

        border-radius: 20px;

        background: rgba(255,255,255,.10);

        color: #F0C85A;

        font-size: 8px;
        font-weight: 750;

        letter-spacing: .7px;
    }

    .profile-status-dot {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: #68D391;
    }

    .profile-name {
        margin-top: 8px;

        font-size: 24px;
        font-weight: 800;
        letter-spacing: -.4px;
    }

    .profile-number {
        margin-top: 5px;

        color: rgba(255,255,255,.65);

        font-size: 11px;
        letter-spacing: .8px;
    }

    .profile-profession {
        margin-top: 10px;

        color: rgba(255,255,255,.82);

        font-size: 11px;
    }


    /* =========================
       GRID
    ========================= */

    .member-grid {
        display: grid;
        grid-template-columns: 1.4fr .8fr;
        gap: 18px;
    }

    .content-card {
        background: white;

        border: 1px solid #E4EAE5;

        border-radius: 16px;

        overflow: hidden;

        box-shadow:
            0 5px 20px rgba(4,61,35,.03);
    }

    .content-card + .content-card {
        margin-top: 18px;
    }

    .content-card-header {
        min-height: 60px;

        padding: 15px 20px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        border-bottom: 1px solid #EEF1EF;
    }

    .content-card-title {
        color: #043D23;

        font-size: 13px;
        font-weight: 750;
    }

    .content-card-subtitle {
        margin-top: 3px;

        color: #89938D;

        font-size: 9px;
    }

    .content-card-body {
        padding: 20px;
    }


    /* =========================
       INFORMATION
    ========================= */

    .information-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;

        gap: 18px 25px;
    }

    .information-item.full {
        grid-column: span 2;
    }

    .information-label {
        display: block;

        margin-bottom: 5px;

        color: #89938D;

        font-size: 9px;
        font-weight: 700;

        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .information-value {
        color: #26342C;

        font-size: 12px;
        font-weight: 600;
    }


    /* =========================
       STATUS CARD
    ========================= */

    .status-card {
        text-align: center;
    }

    .big-status {
        width: 65px;
        height: 65px;

        margin: 5px auto 13px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #EAF6EE;

        color: #075B32;
    }

    .big-status svg {
        width: 29px;
        height: 29px;
    }

    .status-title {
        color: #043D23;

        font-size: 17px;
        font-weight: 800;
    }

    .status-description {
        margin-top: 5px;

        color: #89938D;

        font-size: 10px;
        line-height: 1.5;
    }

    .status-date {
        margin-top: 18px;

        padding: 12px;

        border-radius: 11px;

        background: #F7F9F7;
    }

    .status-date-label {
        color: #89938D;

        font-size: 8px;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .status-date-value {
        margin-top: 4px;

        color: #075B32;

        font-size: 12px;
        font-weight: 750;
    }


    /* =========================
       CONTRIBUTION
    ========================= */

    .contribution-summary {
        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 14px;

        border-radius: 12px;

        background: #FAFBFA;

        margin-bottom: 12px;
    }

    .contribution-label {
        color: #89938D;

        font-size: 9px;
    }

    .contribution-value {
        margin-top: 3px;

        color: #043D23;

        font-size: 17px;
        font-weight: 800;
    }

    .paid-badge {
        padding: 6px 9px;

        border-radius: 20px;

        background: #DCFCE7;

        color: #166534;

        font-size: 8px;
        font-weight: 750;
    }

    .unpaid-badge {
        padding: 6px 9px;

        border-radius: 20px;

        background: #FEF3C7;

        color: #92400E;

        font-size: 8px;
        font-weight: 750;
    }


    /* =========================
       CARD PREVIEW
    ========================= */

    .card-preview {
        padding: 15px;

        background:
            linear-gradient(
                135deg,
                #043D23,
                #075B32
            );

        border-radius: 13px;

        color: white;
    }

    .mini-card-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .mini-logo {
        width: 38px;
        height: 38px;

        object-fit: contain;

        border-radius: 50%;

        background: white;

        padding: 2px;
    }

    .mini-card-label {
        color: #F0C85A;

        font-size: 7px;
        font-weight: 750;

        letter-spacing: 1px;
    }

    .mini-card-name {
        margin-top: 18px;

        font-size: 14px;
        font-weight: 800;
    }

    .mini-card-number {
        margin-top: 4px;

        color: rgba(255,255,255,.6);

        font-size: 8px;
    }

    .mini-card-footer {
        margin-top: 18px;

        padding-top: 10px;

        border-top: 1px solid rgba(240,200,90,.25);

        display: flex;
        justify-content: space-between;

        color: rgba(255,255,255,.6);

        font-size: 7px;
    }


    /* =========================
       ACTIONS
    ========================= */

    .action-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .full-button {
        width: 100%;
        min-height: 42px;

        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        border-radius: 10px;

        font-size: 10px;
        font-weight: 700;

        cursor: pointer;

        transition: .2s ease;
    }

    .full-button.green {
        background: #075B32;
        color: white;
        border: 1px solid #075B32;
    }

    .full-button.green:hover {
        background: #043D23;
    }

    .full-button.gold {
        background: #D6A52E;
        color: #043D23;
        border: 1px solid #D6A52E;
    }

    .full-button.gold:hover {
        background: #F0C85A;
    }

    .full-button.outline {
        background: white;
        color: #075B32;
        border: 1px solid #DDE5DF;
    }

    .full-button.outline:hover {
        background: #F3F8F4;
    }

    .full-button.danger {
        background: #FFF7F6;
        color: #B42318;
        border: 1px solid #E8C6C3;
    }

    .full-button.danger:hover {
        background: #FEECEC;
    }

    .full-button svg {
        width: 16px;
        height: 16px;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media(max-width: 900px) {

        .member-grid {
            grid-template-columns: 1fr;
        }

    }

    @media(max-width: 650px) {

        .member-page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .header-actions {
            width: 100%;
        }

        .header-actions > * {
            flex: 1;
        }

        .profile-content {
            align-items: flex-start;
            flex-direction: column;
        }

        .profile-photo,
        .profile-placeholder {
            width: 85px;
            height: 85px;
        }

        .information-grid {
            grid-template-columns: 1fr;
        }

        .information-item.full {
            grid-column: span 1;
        }

    }

</style>
@endpush


@section('content')


    {{-- =====================================================
        HEADER
    ====================================================== --}}

    <div class="member-page-header">

        <a
            href="{{ route('admin.members.index') }}"
            class="back-link"
        >

            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
            >
                <path d="M19 12H5"/>
                <path d="m12 19-7-7 7-7"/>
            </svg>

            Retour aux membres

        </a>


        <div class="header-actions">

            <a
                href="{{ route('admin.members.edit', $member) }}"
                class="outline-button"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path d="M12 20h9"/>

                    <path
                        d="M16.5 3.5a2.12 2.12 0 0 1 3 3L8 18l-4 1 1-4Z"
                    />

                </svg>

                Modifier

            </a>


            @if($member->status === 'active')

                <a
                    href="{{ route('member.public', $member) }}"
                    target="_blank"
                    class="gold-button"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <rect
                            x="3"
                            y="5"
                            width="18"
                            height="14"
                            rx="2"
                        />

                        <circle
                            cx="8"
                            cy="11"
                            r="2"
                        />

                        <path d="M13 10h5"/>
                        <path d="M13 14h4"/>

                    </svg>

                    Voir la carte

                </a>

            @endif

        </div>

    </div>


    {{-- =====================================================
        PROFILE
    ====================================================== --}}

    <div class="profile-card">

        <div class="profile-content">


            @if($member->photo)

                <img
                    src="{{ Storage::url($member->photo) }}"
                    alt="{{ $member->full_name }}"
                    class="profile-photo"
                >

            @else

                <div class="profile-placeholder">

                    {{ strtoupper(substr($member->full_name, 0, 1)) }}

                </div>

            @endif


            <div class="profile-info">

                <span class="profile-status">

                    <span class="profile-status-dot"></span>

                    @if($member->status === 'active')
                        MEMBRE ACTIF
                    @elseif($member->status === 'disabled')
                        MEMBRE DÉSACTIVÉ
                    @else
                        EN ATTENTE
                    @endif

                </span>


                <div class="profile-name">

                    {{ $member->full_name }}

                </div>


                <div class="profile-number">

                    N° {{ $member->member_number }}

                </div>


                <div class="profile-profession">

                    {{ $member->profession?->name ?? 'Profession non renseignée' }}

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
        MAIN GRID
    ====================================================== --}}

    <div class="member-grid">


        {{-- =================================================
            LEFT COLUMN
        ================================================== --}}

        <div>


            {{-- INFORMATIONS PERSONNELLES --}}

            <div class="content-card">

                <div class="content-card-header">

                    <div>

                        <div class="content-card-title">
                            Informations du membre
                        </div>

                        <div class="content-card-subtitle">
                            Informations personnelles et administratives
                        </div>

                    </div>

                </div>


                <div class="content-card-body">

                    <div class="information-grid">


                        <div class="information-item">

                            <span class="information-label">
                                Nom complet
                            </span>

                            <span class="information-value">
                                {{ $member->full_name }}
                            </span>

                        </div>


                        <div class="information-item">

                            <span class="information-label">
                                Téléphone
                            </span>

                            <span class="information-value">
                                {{ $member->phone }}
                            </span>

                        </div>


                        <div class="information-item">

                            <span class="information-label">
                                Profession
                            </span>

                            <span class="information-value">
                                {{ $member->profession?->name ?? 'Non renseignée' }}
                            </span>

                        </div>


                        <div class="information-item">

                            <span class="information-label">
                                Région
                            </span>

                            <span class="information-value">
                                {{ $member->region?->name ?? 'Non renseignée' }}
                            </span>

                        </div>


                        <div class="information-item">

                            <span class="information-label">
                                Département
                            </span>

                            <span class="information-value">
                                {{ $member->department?->name ?? 'Non renseigné' }}
                            </span>

                        </div>


                        <div class="information-item">

                            <span class="information-label">
                                Commune
                            </span>

                            <span class="information-value">
                                {{ $member->commune?->name ?? 'Non renseignée' }}
                            </span>

                        </div>


                        <div class="information-item full">

                            <span class="information-label">
                                Adresse
                            </span>

                            <span class="information-value">
                                {{ $member->address ?? 'Non renseignée' }}
                            </span>

                        </div>


                        <div class="information-item">

                            <span class="information-label">
                                Date d'inscription
                            </span>

                            <span class="information-value">
                                {{ optional($member->registered_at)->format('d/m/Y à H:i') ?? '—' }}
                            </span>

                        </div>


                        <div class="information-item">

                            <span class="information-label">
                                Date d'activation
                            </span>

                            <span class="information-value">
                                {{ optional($member->activated_at)->format('d/m/Y à H:i') ?? 'Non activé' }}
                            </span>

                        </div>


                    </div>

                </div>

            </div>


            {{-- COTISATION --}}

            <div class="content-card">

                <div class="content-card-header">

                    <div>

                        <div class="content-card-title">
                            Cotisation
                        </div>

                        <div class="content-card-subtitle">
                            Situation financière du membre
                        </div>

                    </div>

                    <a
                        href="{{ route('admin.contributions.create', ['member_id' => $member->id]) }}"
                        class="card-link"
                    >
                        + Enregistrer
                    </a>

                </div>


                <div class="content-card-body">


                    <div class="contribution-summary">

                        <div>

                            <div class="contribution-label">
                                Cotisation annuelle
                            </div>

                            <div class="contribution-value">

                                {{ number_format($member->contribution_amount ?? 0, 0, ',', ' ') }}

                                FCFA

                            </div>

                        </div>


                        @if($member->has_paid ?? false)

                            <span class="paid-badge">
                                PAYÉE
                            </span>

                        @else

                            <span class="unpaid-badge">
                                NON PAYÉE
                            </span>

                        @endif

                    </div>


                    @if(isset($member->latestContribution) && $member->latestContribution)

                        <div class="information-grid">

                            <div class="information-item">

                                <span class="information-label">
                                    Dernier paiement
                                </span>

                                <span class="information-value">

                                    {{ optional($member->latestContribution->paid_at)->format('d/m/Y') }}

                                </span>

                            </div>


                            <div class="information-item">

                                <span class="information-label">
                                    Montant
                                </span>

                                <span class="information-value">

                                    {{ number_format($member->latestContribution->amount, 0, ',', ' ') }}

                                    FCFA

                                </span>

                            </div>

                        </div>

                    @else

                        <div
                            style="
                                color:#89938D;
                                font-size:10px;
                                padding-top:5px;
                            "
                        >
                            Aucun paiement enregistré pour le moment.
                        </div>

                    @endif

                </div>

            </div>


        </div>


        {{-- =================================================
            RIGHT COLUMN
        ================================================== --}}

        <div>


            {{-- STATUT --}}

            <div class="content-card">

                <div class="content-card-header">

                    <div>

                        <div class="content-card-title">
                            Statut du membre
                        </div>

                    </div>

                </div>


                <div class="content-card-body status-card">


                    <div class="big-status">

                        @if($member->status === 'active')

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="m5 12 4 4L19 6"/>
                            </svg>

                        @elseif($member->status === 'disabled')

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <circle
                                    cx="12"
                                    cy="12"
                                    r="9"
                                />
                                <path d="m9 9 6 6"/>
                                <path d="m15 9-6 6"/>
                            </svg>

                        @else

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <circle
                                    cx="12"
                                    cy="12"
                                    r="9"
                                />
                                <path d="M12 7v5l3 2"/>
                            </svg>

                        @endif

                    </div>


                    <div class="status-title">

                        @if($member->status === 'active')
                            Membre actif
                        @elseif($member->status === 'disabled')
                            Membre désactivé
                        @else
                            En attente
                        @endif

                    </div>


                    <div class="status-description">

                        @if($member->status === 'active')

                            Le membre dispose actuellement
                            d'une carte UHSAS valide.

                        @elseif($member->status === 'disabled')

                            Le membre est actuellement
                            désactivé.

                        @else

                            L'inscription est en attente
                            de validation.

                        @endif

                    </div>


                    @if($member->activated_at)

                        <div class="status-date">

                            <div class="status-date-label">
                                Carte valable jusqu'au
                            </div>

                            <div class="status-date-value">

                                {{ $member->activated_at->copy()->addYears(5)->format('d/m/Y') }}

                            </div>

                        </div>

                    @endif


                </div>

            </div>


            {{-- CARTE --}}

            <div class="content-card">

                <div class="content-card-header">

                    <div>

                        <div class="content-card-title">
                            Carte de membre
                        </div>

                        <div class="content-card-subtitle">
                            Accès rapide à la carte numérique
                        </div>

                    </div>

                </div>


                <div class="content-card-body">

                    <div class="card-preview">


                        <div class="mini-card-top">

                            <img
                                src="{{ asset('asset/images/logo-uhsas.jpeg') }}"
                                class="mini-logo"
                                alt="UHSAS"
                            >

                            <span class="mini-card-label">
                                CARTE DE MEMBRE
                            </span>

                        </div>


                        <div class="mini-card-name">

                            {{ $member->full_name }}

                        </div>


                        <div class="mini-card-number">

                            {{ $member->member_number }}

                        </div>


                        <div class="mini-card-footer">

                            <span>
                                UHSAS
                            </span>

                            <span>

                                @if($member->activated_at)

                                    {{ $member->activated_at->copy()->addYears(5)->format('d/m/Y') }}

                                @else

                                    Non activée

                                @endif

                            </span>

                        </div>

                    </div>


                    @if($member->status === 'active')

                        <a
                            href="{{ route('member.public', $member) }}"
                            target="_blank"
                            class="full-button green"
                            style="margin-top:10px;"
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <rect
                                    x="3"
                                    y="5"
                                    width="18"
                                    height="14"
                                    rx="2"
                                />

                                <circle
                                    cx="8"
                                    cy="11"
                                    r="2"
                                />

                                <path d="M13 10h5"/>
                                <path d="M13 14h4"/>

                            </svg>

                            Voir la carte

                        </a>

                    @endif

                </div>

            </div>


            {{-- ACTIONS --}}

            <div class="content-card">

                <div class="content-card-header">

                    <div>

                        <div class="content-card-title">
                            Actions
                        </div>

                    </div>

                </div>


                <div class="content-card-body">

                    <div class="action-list">


                        @if($member->status !== 'active')

                            <form
                                method="POST"
                                action="{{ route('admin.members.activate', $member) }}"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="full-button green"
                                >

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >
                                        <path d="m5 12 4 4L19 6"/>
                                    </svg>

                                    Activer le membre

                                </button>

                            </form>

                        @endif

{{-- 
                        <a
                            href="{{ route('registration.card.pdf', $member) }}"
                            class="full-button gold"
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path d="M12 3v12"/>
                                <path d="m7 10 5 5 5-5"/>
                                <path d="M5 21h14"/>

                            </svg>

                            Télécharger la carte PDF

                        </a> --}}


                        @if($member->status === 'active')

                            <form
                                method="POST"
                                action="{{ route('admin.members.destroy', $member) }}"
                                onsubmit="return confirm('Voulez-vous vraiment désactiver ce membre ?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="full-button danger"
                                >

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >

                                        <circle
                                            cx="12"
                                            cy="12"
                                            r="9"
                                        />

                                        <path d="M8 12h8"/>

                                    </svg>

                                    Désactiver le membre

                                </button>

                            </form>

                        @endif


                    </div>

                </div>

            </div>


        </div>

    </div>

@endsection