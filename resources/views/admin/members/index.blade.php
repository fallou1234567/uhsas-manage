@extends('layouts.app')

@section('title', 'Membres')
@section('page-title', 'Membres')


{{-- ========================================================= --}}
{{-- STYLES --}}
{{-- ========================================================= --}}

@push('styles')

<style>

    /* =========================================================
       HEADER
    ========================================================= */

    .members-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .members-title h1 {
        margin: 0;
        color: #043D23;
        font-size: 25px;
        font-weight: 800;
    }

    .members-title p {
        margin-top: 6px;
        color: #718078;
        font-size: 13px;
    }


    /* =========================================================
       BOUTON PRINCIPAL
    ========================================================= */

    .primary-button {
        min-height: 43px;
        padding: 0 17px;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        border: none;
        border-radius: 11px;

        background: #075B32;
        color: white;

        font-size: 11px;
        font-weight: 700;

        text-decoration: none;
        cursor: pointer;

        transition: .2s ease;
    }

    .primary-button:hover {
        background: #043D23;
        transform: translateY(-1px);
    }

    .primary-button svg {
        width: 17px;
        height: 17px;
    }


    /* =========================================================
       STATS
    ========================================================= */

    .member-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 13px;
        margin-bottom: 20px;
    }

    .member-stat {
        padding: 16px 18px;

        background: white;

        border: 1px solid #E4EAE5;
        border-radius: 14px;
    }

    .member-stat-label {
        color: #89938D;
        font-size: 10px;
    }

    .member-stat-value {
        margin-top: 5px;

        color: #043D23;
        font-size: 21px;
        font-weight: 800;
    }

    .member-stat-value.gold {
        color: #B78617;
    }

    .member-stat-value.red {
        color: #B42318;
    }


    /* =========================================================
       FILTRES
    ========================================================= */

    .filter-card {
        padding: 18px;

        background: white;

        border: 1px solid #E4EAE5;
        border-radius: 15px;

        margin-bottom: 18px;
    }

    .filters-row {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .search-box {
        position: relative;
        flex: 1;
    }

    .search-box svg {
        position: absolute;

        left: 13px;
        top: 50%;

        width: 17px;
        height: 17px;

        transform: translateY(-50%);

        color: #8A948E;
    }

    .search-box input {
        width: 100%;
        height: 43px;

        padding: 0 14px 0 40px;

        border: 1px solid #DDE5DF;
        border-radius: 10px;

        outline: none;

        color: #26342C;
        background: #FAFCFA;

        font-size: 11px;

        transition: .2s ease;
    }

    .search-box input:focus {
        border-color: #075B32;
        background: white;
        box-shadow: 0 0 0 3px rgba(7, 91, 50, .07);
    }

    .filter-select {
        height: 43px;
        min-width: 160px;

        padding: 0 12px;

        border: 1px solid #DDE5DF;
        border-radius: 10px;

        outline: none;

        background: #FAFCFA;
        color: #445048;

        font-size: 11px;

        cursor: pointer;
    }

    .filter-select:focus {
        border-color: #075B32;
    }

    .filter-button {
        height: 43px;

        padding: 0 15px;

        border: 1px solid #DDE5DF;
        border-radius: 10px;

        background: white;
        color: #075B32;

        font-size: 11px;
        font-weight: 700;

        cursor: pointer;

        transition: .2s ease;
    }

    .filter-button:hover {
        background: #F1F7F3;
    }

    .reset-button {
        height: 43px;

        padding: 0 15px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border: 1px solid #E4EAE5;
        border-radius: 10px;

        background: #F8FAF8;
        color: #718078;

        font-size: 11px;
        font-weight: 600;

        text-decoration: none;

        transition: .2s ease;
    }

    .reset-button:hover {
        color: #B42318;
        background: #FFF5F4;
        border-color: #F1C5C2;
    }


    /* =========================================================
       TABLE
    ========================================================= */

    .members-card {
        background: white;

        border: 1px solid #E4EAE5;
        border-radius: 15px;

        overflow: hidden;
    }

    .members-card-header {
        min-height: 63px;

        padding: 15px 20px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        border-bottom: 1px solid #EEF1EF;
    }

    .members-count {
        color: #718078;
        font-size: 11px;
    }

    .members-count strong {
        color: #043D23;
    }

    .table-container {
        overflow-x: auto;
    }

    .members-table {
        width: 100%;
        min-width: 950px;

        border-collapse: collapse;
    }

    .members-table th {
        padding: 12px 18px;

        background: #FAFBFA;
        color: #89938D;

        border-bottom: 1px solid #EEF1EF;

        font-size: 9px;
        font-weight: 700;

        text-align: left;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .members-table td {
        padding: 13px 18px;

        color: #445048;

        border-bottom: 1px solid #F0F2F0;

        font-size: 11px;
    }

    .members-table tbody tr {
        transition: background .15s ease;
    }

    .members-table tbody tr:hover {
        background: #FBFDFC;
    }

    .members-table tbody tr:last-child td {
        border-bottom: none;
    }


    /* =========================================================
       MEMBRE
    ========================================================= */

    .member-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .member-photo,
    .member-placeholder {
        width: 38px;
        height: 38px;

        flex-shrink: 0;

        border-radius: 50%;
    }

    .member-photo {
        object-fit: cover;
        background: #EAF3ED;
    }

    .member-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;

        background: #EAF3ED;
        color: #075B32;

        font-size: 11px;
        font-weight: 800;
    }

    .member-full-name {
        color: #26342C;
        font-size: 11px;
        font-weight: 700;
    }

    .member-number {
        margin-top: 3px;

        color: #9AA39E;

        font-size: 9px;
    }


    /* =========================================================
       LOCALISATION
    ========================================================= */

    .location-main {
        color: #344139;
        font-size: 11px;
        font-weight: 700;
    }

    .location-secondary {
        margin-top: 3px;
        color: #9AA39E;
        font-size: 9px;
    }


    /* =========================================================
       STATUT
    ========================================================= */

    .status-badge {
        display: inline-flex;

        padding: 5px 9px;

        border-radius: 20px;

        font-size: 8px;
        font-weight: 750;
    }

    .status-active {
        background: #DCFCE7;
        color: #166534;
    }

    .status-pending {
        background: #FEF3C7;
        color: #92400E;
    }

    .status-disabled {
        background: #FEE2E2;
        color: #991B1B;
    }


    /* =========================================================
       ACTIONS
    ========================================================= */

    .actions {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .actions form {
        margin: 0;
    }

    .table-action {
        width: 32px;
        height: 32px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border: 1px solid #E2E8E3;
        border-radius: 8px;

        background: white;
        color: #718078;

        cursor: pointer;

        transition: .2s ease;

        text-decoration: none;
    }

    .table-action:hover {
        color: #075B32;
        border-color: #B8CCBE;
        background: #F4F9F5;
    }

    .table-action.success:hover {
        color: #166534;
        border-color: #B7D8C0;
        background: #F0FDF4;
    }

    .table-action.danger:hover {
        color: #B42318;
        border-color: #F1C5C2;
        background: #FFF5F4;
    }

    .table-action svg {
        width: 15px;
        height: 15px;
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .empty-state {
        padding: 60px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 55px;
        height: 55px;

        margin: 0 auto 13px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #EEF6F1;
        color: #075B32;
    }

    .empty-icon svg {
        width: 25px;
        height: 25px;
    }

    .empty-state h3 {
        color: #344139;
        font-size: 14px;
    }

    .empty-state p {
        margin-top: 5px;
        color: #89938D;
        font-size: 11px;
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .pagination-container {
        padding: 17px 20px;
        border-top: 1px solid #EEF1EF;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 1100px) {

        .member-stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .filters-row {
            flex-wrap: wrap;
        }

        .search-box {
            min-width: 100%;
        }

        .filter-select {
            flex: 1;
        }
    }

    @media(max-width: 600px) {

        .members-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .primary-button {
            width: 100%;
        }

        .member-stats {
            grid-template-columns: 1fr 1fr;
        }

        .filter-select {
            width: 100%;
            min-width: 100%;
        }

        .filter-button,
        .reset-button {
            width: 100%;
        }
    }

</style>

@endpush


{{-- ========================================================= --}}
{{-- CONTENT --}}
{{-- ========================================================= --}}

@section('content')

<div>


    {{-- ===================================================== --}}
    {{-- HEADER --}}
    {{-- ===================================================== --}}

    <div class="members-header">

        <div class="members-title">

            <h1>
                Membres
            </h1>

            <p>
                Gérez les adhérents et leurs informations.
            </p>

        </div>


        <a
            href="{{ route('admin.members.create') }}"
            class="primary-button"
        >

            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
            >
                <path d="M12 5v14"/>
                <path d="M5 12h14"/>
            </svg>

            Nouveau membre

        </a>

    </div>


    {{-- ===================================================== --}}
    {{-- STATISTIQUES --}}
    {{-- ===================================================== --}}

    <div class="member-stats">

        {{-- Total --}}
        <div class="member-stat">

            <div class="member-stat-label">
                Total membres
            </div>

            <div class="member-stat-value">
                {{ number_format($totalMembers ?? 0, 0, ',', ' ') }}
            </div>

        </div>


        {{-- Actifs --}}
        <div class="member-stat">

            <div class="member-stat-label">
                Membres actifs
            </div>

            <div class="member-stat-value">
                {{ number_format($activeMembers ?? 0, 0, ',', ' ') }}
            </div>

        </div>


        {{-- En attente --}}
        <div class="member-stat">

            <div class="member-stat-label">
                En attente
            </div>

            <div class="member-stat-value gold">
                {{ number_format($pendingMembers ?? 0, 0, ',', ' ') }}
            </div>

        </div>


        {{-- Désactivés --}}
        <div class="member-stat">

            <div class="member-stat-label">
                Désactivés
            </div>

            <div class="member-stat-value red">
                {{ number_format($disabledMembers ?? 0, 0, ',', ' ') }}
            </div>

        </div>

    </div>


    {{-- ===================================================== --}}
    {{-- FILTRES --}}
    {{-- ===================================================== --}}

    <div class="filter-card">

        <form
            method="GET"
            action="{{ route('admin.members.index') }}"
        >

            <div class="filters-row">


                {{-- Recherche --}}
                <div class="search-box">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                    >

                        <circle
                            cx="11"
                            cy="11"
                            r="7"
                        />

                        <path d="m20 20-4-4"/>

                    </svg>


                    <input
                        type="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Rechercher un nom, téléphone ou numéro..."
                    >

                </div>


                {{-- Statut --}}
                <select
                    name="status"
                    class="filter-select"
                >

                    <option value="">
                        Tous les statuts
                    </option>

                    <option
                        value="active"
                        @selected(request('status') === 'active')
                    >
                        Actifs
                    </option>

                    <option
                        value="pending"
                        @selected(request('status') === 'pending')
                    >
                        En attente
                    </option>

                    <option
                        value="disabled"
                        @selected(request('status') === 'disabled')
                    >
                        Désactivés
                    </option>

                </select>


                {{-- Région --}}
                <select
                    name="region_id"
                    class="filter-select"
                >

                    <option value="">
                        Toutes les régions
                    </option>

                    @foreach($regions ?? [] as $region)

                        <option
                            value="{{ $region->id }}"
                            @selected(
                                (string) request('region_id')
                                ===
                                (string) $region->id
                            )
                        >
                            {{ $region->name }}
                        </option>

                    @endforeach

                </select>


                {{-- Profession --}}
                <select
                    name="profession_id"
                    class="filter-select"
                >

                    <option value="">
                        Toutes les professions
                    </option>

                    @foreach($professions ?? [] as $profession)

                        <option
                            value="{{ $profession->id }}"
                            @selected(
                                (string) request('profession_id')
                                ===
                                (string) $profession->id
                            )
                        >
                            {{ $profession->name }}
                        </option>

                    @endforeach

                </select>


                {{-- Filtrer --}}
                <button
                    type="submit"
                    class="filter-button"
                >
                    Filtrer
                </button>


                {{-- Réinitialiser --}}
                @if(request()->hasAny([
                    'search',
                    'status',
                    'region_id',
                    'profession_id'
                ]))

                    <a
                        href="{{ route('admin.members.index') }}"
                        class="reset-button"
                    >
                        Réinitialiser
                    </a>

                @endif

            </div>

        </form>

    </div>


    {{-- ===================================================== --}}
    {{-- TABLEAU --}}
    {{-- ===================================================== --}}

    <div class="members-card">


        {{-- Header tableau --}}
        <div class="members-card-header">

            <div class="members-count">

                <strong>
                    {{ $members->total() }}
                </strong>

                membre(s)

            </div>

        </div>


        <div class="table-container">

            <table class="members-table">

                <thead>

                    <tr>

                        <th>
                            Membre
                        </th>

                        <th>
                            Téléphone
                        </th>

                        <th>
                            Profession
                        </th>

                        <th>
                            Localisation
                        </th>

                        <th>
                            Statut
                        </th>

                        <th>
                            Inscription
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($members as $member)

                        <tr>


                            {{-- ================================= --}}
                            {{-- MEMBRE --}}
                            {{-- ================================= --}}

                            <td>

                                <div class="member-cell">


                                    @if($member->photo)

                                        <img
                                            src="{{ asset('storage/' . $member->photo) }}"
                                            alt="{{ $member->full_name }}"
                                            class="member-photo"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                        >

                                        <div
                                            class="member-placeholder"
                                            style="display:none;"
                                        >
                                            {{ strtoupper(substr($member->full_name, 0, 1)) }}
                                        </div>

                                    @else

                                        <div class="member-placeholder">

                                            {{ strtoupper(
                                                substr(
                                                    $member->full_name,
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </div>

                                    @endif


                                    <div>

                                        <div class="member-full-name">

                                            {{ $member->full_name }}

                                        </div>

                                        <div class="member-number">

                                            {{ $member->member_number }}

                                        </div>

                                    </div>

                                </div>

                            </td>


                            {{-- ================================= --}}
                            {{-- TELEPHONE --}}
                            {{-- ================================= --}}

                            <td>

                                {{ $member->phone ?: '—' }}

                            </td>


                            {{-- ================================= --}}
                            {{-- PROFESSION --}}
                            {{-- ================================= --}}

                            <td>

                                {{ $member->profession?->name ?? '—' }}

                            </td>


                            {{-- ================================= --}}
                            {{-- LOCALISATION --}}
                            {{-- ================================= --}}

                            <td>

                                <div class="location-main">

                                    {{ $member->commune?->name ?? '—' }}

                                </div>

                                <div class="location-secondary">

                                    {{ $member->department?->name ?? '—' }}

                                    @if($member->region?->name)

                                        · {{ $member->region->name }}

                                    @endif

                                </div>

                            </td>


                            {{-- ================================= --}}
                            {{-- STATUT --}}
                            {{-- ================================= --}}

                            <td>

                                @if($member->status === 'active')

                                    <span class="status-badge status-active">
                                        ACTIF
                                    </span>

                                @elseif($member->status === 'disabled')

                                    <span class="status-badge status-disabled">
                                        DÉSACTIVÉ
                                    </span>

                                @else

                                    <span class="status-badge status-pending">
                                        EN ATTENTE
                                    </span>

                                @endif

                            </td>


                            {{-- ================================= --}}
                            {{-- DATE --}}
                            {{-- ================================= --}}

                            <td>

                                {{ optional($member->registered_at)->format('d/m/Y') ?? '—' }}

                            </td>


                            {{-- ================================= --}}
                            {{-- ACTIONS --}}
                            {{-- ================================= --}}

                            <td>

                                <div class="actions">


                                    {{-- VOIR --}}
                                    <a
                                        href="{{ route('admin.members.show', $member) }}"
                                        class="table-action"
                                        title="Voir le membre"
                                    >

                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        >

                                            <path
                                                d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"
                                            />

                                            <circle
                                                cx="12"
                                                cy="12"
                                                r="3"
                                            />

                                        </svg>

                                    </a>


                                    {{-- MODIFIER --}}
                                    <a
                                        href="{{ route('admin.members.edit', $member) }}"
                                        class="table-action"
                                        title="Modifier"
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

                                    </a>


                                    {{-- CARTE PUBLIQUE --}}
                                    @if($member->status === 'active')

                                        @if(Route::has('member.public'))

                                            <a
                                                href="{{ route('member.public', $member) }}"
                                                target="_blank"
                                                class="table-action"
                                                title="Voir la carte"
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

                                            </a>

                                        @endif

                                    @endif


                                    {{-- ACTIVER --}}
                                    @if($member->status !== 'active')

                                        <form
                                            method="POST"
                                            action="{{ route('admin.members.activate', $member) }}"
                                            onsubmit="return confirm('Voulez-vous activer ce membre ?')"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="table-action success"
                                                title="Activer"
                                            >

                                                <svg
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="1.8"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >

                                                    <path d="M20 6 9 17l-5-5"/>

                                                </svg>

                                            </button>

                                        </form>

                                    @endif


                                    {{-- DÉSACTIVER --}}
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
                                                class="table-action danger"
                                                title="Désactiver"
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

                                            </button>

                                        </form>

                                    @endif


                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="7">

                                <div class="empty-state">

                                    <div class="empty-icon">

                                        <svg
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.7"
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

                                        </svg>

                                    </div>


                                    <h3>
                                        Aucun membre trouvé
                                    </h3>

                                    <p>
                                        Aucun membre ne correspond aux critères de recherche.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- ================================================= --}}
        {{-- PAGINATION --}}
        {{-- ================================================= --}}

        @if($members->hasPages())

            <div class="pagination-container">

                {{ $members->links() }}

            </div>

        @endif

    </div>

</div>

@endsection