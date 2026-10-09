@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('page-title', 'Tableau de bord')

@push('styles')
<style>

    .dashboard-header {
        margin-bottom: 25px;
    }

    .dashboard-header h1 {
        margin: 0;
        color: #043D23;
        font-size: 25px;
        font-weight: 800;
        letter-spacing: -.5px;
    }

    .dashboard-header p {
        margin-top: 6px;
        color: #718078;
        font-size: 13px;
    }


    /* =========================
       STATISTICS
    ========================= */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 25px;
    }

    .stat-card {
        position: relative;
        overflow: hidden;

        padding: 20px;

        background: #fff;

        border: 1px solid #E4EAE5;
        border-radius: 16px;

        box-shadow: 0 5px 20px rgba(4,61,35,.035);
    }

    .stat-card::after {
        content: '';

        position: absolute;

        width: 80px;
        height: 80px;

        right: -30px;
        bottom: -30px;

        border-radius: 50%;

        background: rgba(7,91,50,.035);
    }

    .stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-icon {
        width: 43px;
        height: 43px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: #EEF6F1;
        color: #075B32;
    }

    .stat-icon.gold {
        background: #FCF6E7;
        color: #B78617;
    }

    .stat-icon.warning {
        background: #FFF6E8;
        color: #B66A00;
    }

    .stat-icon.danger {
        background: #FEF0F0;
        color: #B42318;
    }

    .stat-icon svg {
        width: 21px;
        height: 21px;
    }

    .stat-label {
        margin-top: 18px;

        color: #718078;

        font-size: 11px;
        font-weight: 600;
    }

    .stat-value {
        margin-top: 5px;

        color: #043D23;

        font-size: 25px;
        font-weight: 800;
        letter-spacing: -.5px;
    }

    .stat-description {
        margin-top: 6px;

        color: #8A948E;

        font-size: 10px;
    }


    /* =========================
       CONTENT GRID
    ========================= */

    .dashboard-grid {
        display: grid;
        grid-template-columns: 1.65fr 1fr;
        gap: 18px;
        margin-bottom: 18px;
    }

    .dashboard-card {
        background: #fff;

        border: 1px solid #E4EAE5;
        border-radius: 16px;

        box-shadow: 0 5px 20px rgba(4,61,35,.035);

        overflow: hidden;
    }

    .card-header {
        min-height: 67px;

        padding: 17px 20px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        border-bottom: 1px solid #EEF1EF;
    }

    .card-title {
        color: #043D23;

        font-size: 14px;
        font-weight: 750;
    }

    .card-subtitle {
        margin-top: 4px;

        color: #89938D;

        font-size: 10px;
    }

    .card-link {
        color: #075B32;

        font-size: 10px;
        font-weight: 700;
    }

    .card-link:hover {
        color: #D6A52E;
    }


    /* =========================
       CONTRIBUTIONS SUMMARY
    ========================= */

    .contribution-body {
        padding: 25px 20px;
    }

    .contribution-total {
        color: #043D23;

        font-size: 30px;
        font-weight: 800;
    }

    .contribution-label {
        margin-top: 4px;

        color: #718078;

        font-size: 11px;
    }

    .contribution-progress {
        margin-top: 25px;

        height: 9px;

        overflow: hidden;

        border-radius: 20px;

        background: #EAF0EC;
    }

    .contribution-progress-bar {
        width: 78%;

        height: 100%;

        border-radius: inherit;

        background:
            linear-gradient(
                90deg,
                #075B32,
                #D6A52E
            );
    }

    .contribution-details {
        display: grid;
        grid-template-columns: 1fr 1fr;

        gap: 12px;

        margin-top: 18px;
    }

    .contribution-item {
        padding: 12px;

        border-radius: 11px;

        background: #F7F9F7;
    }

    .contribution-item-label {
        color: #89938D;

        font-size: 9px;
    }

    .contribution-item-value {
        margin-top: 4px;

        color: #043D23;

        font-size: 14px;
        font-weight: 750;
    }


    /* =========================
       REGION
    ========================= */

    .regions-list {
        padding: 7px 20px 20px;
    }

    .region-item {
        padding: 13px 0;

        border-bottom: 1px solid #F0F2F0;
    }

    .region-item:last-child {
        border-bottom: none;
    }

    .region-top {
        display: flex;

        justify-content: space-between;
        align-items: center;

        margin-bottom: 7px;
    }

    .region-name {
        color: #344139;

        font-size: 11px;
        font-weight: 650;
    }

    .region-count {
        color: #718078;

        font-size: 10px;
    }

    .region-progress {
        height: 6px;

        overflow: hidden;

        border-radius: 20px;

        background: #EEF2EF;
    }

    .region-progress-bar {
        height: 100%;

        border-radius: inherit;

        background: #075B32;
    }


    /* =========================
       TABLE
    ========================= */

    .table-wrapper {
        overflow-x: auto;
    }

    .dashboard-table {
        width: 100%;

        border-collapse: collapse;
    }

    .dashboard-table th {
        padding: 12px 20px;

        color: #89938D;

        background: #FAFBFA;

        border-bottom: 1px solid #EEF1EF;

        font-size: 9px;
        font-weight: 700;

        text-align: left;

        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .dashboard-table td {
        padding: 13px 20px;

        color: #445048;

        border-bottom: 1px solid #F0F2F0;

        font-size: 11px;
    }

    .dashboard-table tr:last-child td {
        border-bottom: none;
    }

    .member-cell {
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .member-avatar {
        width: 32px;
        height: 32px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #EAF3ED;

        color: #075B32;

        font-size: 10px;
        font-weight: 800;
    }

    .member-name {
        color: #26342C;
        font-weight: 700;
    }

    .member-number {
        margin-top: 2px;

        color: #9AA39E;

        font-size: 9px;
    }

    .status {
        display: inline-flex;

        padding: 5px 8px;

        border-radius: 20px;

        font-size: 8px;
        font-weight: 750;
    }

    .status.active {
        color: #166534;
        background: #DCFCE7;
    }

    .status.pending {
        color: #92400E;
        background: #FEF3C7;
    }

    .status.disabled {
        color: #991B1B;
        background: #FEE2E2;
    }


    /* =========================
       QUICK ACTIONS
    ========================= */

    .quick-actions {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;

        padding: 20px;
    }

    .quick-action {
        min-height: 82px;

        padding: 15px;

        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;

        border: 1px solid #E4EAE5;
        border-radius: 12px;

        background: #FAFCFA;

        transition: .2s ease;
    }

    .quick-action:hover {
        border-color: #D6A52E;
        transform: translateY(-2px);
    }

    .quick-action-icon {
        width: 31px;
        height: 31px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background: #EAF3ED;

        color: #075B32;
    }

    .quick-action-icon svg {
        width: 16px;
        height: 16px;
    }

    .quick-action-title {
        margin-top: 8px;

        color: #344139;

        font-size: 10px;
        font-weight: 700;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media(max-width: 1100px) {

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .dashboard-grid {
            grid-template-columns: 1fr;
        }

    }


    @media(max-width: 600px) {

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .quick-actions {
            grid-template-columns: 1fr;
        }

        .card-header {
            padding: 15px;
        }

        .dashboard-table th,
        .dashboard-table td {
            padding-left: 13px;
            padding-right: 13px;
        }

    }

</style>
@endpush


@section('content')

    {{-- =====================================================
        HEADER
    ====================================================== --}}

    <div class="dashboard-header">

        <h1>
            Bonjour, {{ auth()->user()->name ?? 'Administrateur' }} 👋
        </h1>

        <p>
            Voici un aperçu de l'activité de l'UHSAS aujourd'hui.
        </p>

    </div>


    {{-- =====================================================
        STATISTIQUES
    ====================================================== --}}

    <div class="stats-grid">


        {{-- MEMBRES --}}

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path
                            d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"
                        />

                        <circle
                            cx="9"
                            cy="7"
                            r="4"
                        />

                        <path
                            d="M22 21v-2a4 4 0 0 0-3-3.87"
                        />

                        <path
                            d="M16 3.13a4 4 0 0 1 0 7.75"
                        />

                    </svg>

                </div>

            </div>

            <div class="stat-label">
                Membres enregistrés
            </div>

            <div class="stat-value">
                {{ number_format($totalMembers ?? 0, 0, ',', ' ') }}
            </div>

            <div class="stat-description">
                Toutes les adhésions
            </div>

        </div>


        {{-- ACTIFS --}}

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M20 6L9 17l-5-5"/>

                    </svg>

                </div>

            </div>

            <div class="stat-label">
                Membres actifs
            </div>

            <div class="stat-value">
                {{ number_format($activeMembers ?? 0, 0, ',', ' ') }}
            </div>

            <div class="stat-description">
                Membres actuellement actifs
            </div>

        </div>


        {{-- COTISATIONS --}}

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon gold">

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

                        <path d="M3 10h18"/>

                        <path d="M7 15h2"/>

                    </svg>

                </div>

            </div>

            <div class="stat-label">
                Cotisations encaissées
            </div>

            <div class="stat-value">
                {{ number_format($totalContributions, 0, ',', ' ') }} FCFA
                <small style="font-size:11px;">FCFA</small>
            </div>

            <div class="stat-description">
                Total des cotisations
            </div>

        </div>


        {{-- EN ATTENTE --}}

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon warning">

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

                </div>

            </div>

            <div class="stat-label">
                À régulariser
            </div>

            <div class="stat-value">
                {{ number_format($pendingMembers ?? 0, 0, ',', ' ') }}
            </div>

            <div class="stat-description">
                Membres en attente de cotisation
            </div>

        </div>


    </div>


    {{-- =====================================================
        GRILLE PRINCIPALE
    ====================================================== --}}

    <div class="dashboard-grid">


        {{-- COTISATIONS --}}

        <div class="dashboard-card">

            <div class="card-header">

                <div>

                    <div class="card-title">
                        Situation des cotisations
                    </div>

                    <div class="card-subtitle">
                        Vue globale des cotisations des membres
                    </div>

                </div>

                <a
                    href="{{ route('admin.contributions.index') }}"
                    class="card-link"
                >
                    Voir les cotisations →
                </a>

            </div>


            <div class="contribution-body">

                <div class="contribution-total">

                    {{ number_format($totalContributions ?? 0, 0, ',', ' ') }}
                    FCFA

                </div>

                <div class="contribution-label">
                    Montant total encaissé
                </div>


                <div class="contribution-progress">

                    <div
                        class="contribution-progress-bar"
                        style="width: {{ $contributionPercentage ?? 0 }}%"
                    ></div>

                </div>


                <div class="contribution-details">

                    <div class="contribution-item">

                        <div class="contribution-item-label">
                            Cotisations payées
                        </div>

                        <div class="contribution-item-value">
                            {{ number_format($paidContributions ?? 0, 0, ',', ' ') }}
                        </div>

                    </div>


                    <div class="contribution-item">

                        <div class="contribution-item-label">
                            En attente
                        </div>

                        <div class="contribution-item-value">
                            {{ number_format($pendingContributions ?? 0, 0, ',', ' ') }}
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- REGIONS --}}

        <div class="dashboard-card">

            <div class="card-header">

                <div>

                    <div class="card-title">
                        Répartition géographique
                    </div>

                    <div class="card-subtitle">
                        Membres par région
                    </div>

                </div>

                <a
                    href="{{ route('admin.locations.regions') }}"
                    class="card-link"
                >
                    Détails →
                </a>

            </div>


            <div class="regions-list">

                @forelse($membersByRegion ?? [] as $region)

                    <div class="region-item">

                        <div class="region-top">

                            <span class="region-name">
                                {{ $region->name }}
                            </span>

                            <span class="region-count">
                                {{ number_format($region->members_count, 0, ',', ' ') }}
                                membres
                            </span>

                        </div>

                        <div class="region-progress">

                            <div
                                class="region-progress-bar"
                                style="width: {{ $region->percentage ?? 0 }}%"
                            ></div>

                        </div>

                    </div>

                @empty

                    <div
                        style="
                            padding:30px 0;
                            text-align:center;
                            color:#89938D;
                            font-size:11px;
                        "
                    >
                        Aucune donnée disponible.
                    </div>

                @endforelse

            </div>

        </div>


    </div>


    {{-- =====================================================
        DERNIERS MEMBRES
    ====================================================== --}}

    <div class="dashboard-card">

        <div class="card-header">

            <div>

                <div class="card-title">
                    Dernières inscriptions
                </div>

                <div class="card-subtitle">
                    Les membres récemment enregistrés
                </div>

            </div>

            <a
                href="{{ route('admin.members.index') }}"
                class="card-link"
            >
                Voir tous les membres →
            </a>

        </div>


        <div class="table-wrapper">

            <table class="dashboard-table">

                <thead>

                    <tr>

                        <th>
                            Membre
                        </th>

                        <th>
                            Profession
                        </th>

                        <th>
                            Localisation
                        </th>

                        <th>
                            Date
                        </th>

                        <th>
                            Statut
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($recentMembers ?? [] as $member)

                        <tr>

                            <td>

                                <div class="member-cell">

                                    <div class="member-avatar">

                                        @if($member->photo)

                                            <img
                                                src="{{ Storage::url($member->photo) }}"
                                                alt=""
                                                style="
                                                    width:100%;
                                                    height:100%;
                                                    object-fit:cover;
                                                    border-radius:50%;
                                                "
                                            >

                                        @else

                                            {{ strtoupper(substr($member->full_name, 0, 1)) }}

                                        @endif

                                    </div>

                                    <div>

                                        <div class="member-name">
                                            {{ $member->full_name }}
                                        </div>

                                        <div class="member-number">
                                            {{ $member->member_number }}
                                        </div>

                                    </div>

                                </div>

                            </td>


                            <td>

                                {{ $member->profession?->name ?? '—' }}

                            </td>


                            <td>

                                {{ $member->region?->name ?? '—' }}

                            </td>


                            <td>

                                {{ optional($member->registered_at)->format('d/m/Y') }}

                            </td>


                            <td>

                                @if($member->status === 'active')

                                    <span class="status active">
                                        ACTIF
                                    </span>

                                @elseif($member->status === 'disabled')

                                    <span class="status disabled">
                                        DÉSACTIVÉ
                                    </span>

                                @else

                                    <span class="status pending">
                                        EN ATTENTE
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                style="
                                    text-align:center;
                                    padding:35px;
                                    color:#89938D;
                                "
                            >
                                Aucun membre enregistré.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- =====================================================
        ACTIONS RAPIDES
    ====================================================== --}}

    <div
        class="dashboard-card"
        style="margin-top:18px;"
    >

        <div class="card-header">

            <div>

                <div class="card-title">
                    Actions rapides
                </div>

                <div class="card-subtitle">
                    Accès rapide aux opérations courantes
                </div>

            </div>

        </div>


        <div class="quick-actions">


            <a
                href="{{ route('admin.members.create') }}"
                class="quick-action"
            >

                <div class="quick-action-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M12 5v14"/>
                        <path d="M5 12h14"/>

                    </svg>

                </div>

                <div class="quick-action-title">
                    Ajouter un membre
                </div>

            </a>


            <a
                href="{{ route('admin.contributions.create') }}"
                class="quick-action"
            >

                <div class="quick-action-icon">

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

                        <path d="M3 10h18"/>

                        <path d="M7 15h2"/>

                    </svg>

                </div>

                <div class="quick-action-title">
                    Enregistrer une cotisation
                </div>

            </a>


            <a
                href=""
                class="quick-action"
            >

                <div class="quick-action-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M4 19V5"/>
                        <path d="M4 19h17"/>
                        <path d="m7 15 4-4 3 2 5-6"/>

                    </svg>

                </div>

                <div class="quick-action-title">
                    Consulter les rapports
                </div>

            </a>


        </div>

    </div>

@endsection