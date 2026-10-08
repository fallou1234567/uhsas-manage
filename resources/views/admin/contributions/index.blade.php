@extends('layouts.app')

@section('title', 'Cotisations')
@section('page-title', 'Cotisations')

@section('content')

<div class="max-w-7xl mx-auto space-y-6">

    {{-- =========================================================
         HEADER
    ========================================================== --}}
    <div class="flex flex-col lg:flex-row lg:items-center
                lg:justify-between gap-4">

        <div>
            <div class="flex items-center gap-3">

                <div class="w-12 h-12 rounded-2xl
                            bg-[#EAF5EF] text-[#075B32]
                            flex items-center justify-center">

                    <i class="fas fa-money-bill-wave text-xl"></i>

                </div>

                <div>

                    <h1 class="text-2xl font-bold text-[#043D23]">
                        Cotisations
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Suivi des cotisations des membres UHSAS
                    </p>

                </div>

            </div>
        </div>


        <a href="{{ route('admin.contributions.create') }}"
           class="inline-flex items-center justify-center gap-2
                  bg-[#075B32] hover:bg-[#043D23]
                  text-white font-semibold
                  px-5 py-3 rounded-xl
                  transition shadow-sm">

            <i class="fas fa-plus"></i>

            Enregistrer une cotisation

        </a>

    </div>


    {{-- =========================================================
         STATISTIQUES
    ========================================================== --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

        {{-- Total --}}
        <div class="bg-white rounded-2xl border border-gray-200
                    shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Total cotisations
                    </p>

                    <h3 class="text-2xl font-bold text-[#043D23] mt-2">
                        {{ number_format($totalContributions ?? 0, 0, ',', ' ') }}
                    </h3>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-[#EAF5EF] text-[#075B32]
                            flex items-center justify-center">

                    <i class="fas fa-receipt"></i>

                </div>

            </div>

        </div>


        {{-- Montant encaissé --}}
        <div class="bg-white rounded-2xl border border-gray-200
                    shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Montant encaissé
                    </p>

                    <h3 class="text-2xl font-bold text-[#075B32] mt-2">
                        {{ number_format($totalAmount ?? 0, 0, ',', ' ') }}
                        <span class="text-sm font-medium">FCFA</span>
                    </h3>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-green-50 text-green-600
                            flex items-center justify-center">

                    <i class="fas fa-coins"></i>

                </div>

            </div>

        </div>


        {{-- Payées --}}
        <div class="bg-white rounded-2xl border border-gray-200
                    shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Cotisations payées
                    </p>

                    <h3 class="text-2xl font-bold text-[#043D23] mt-2">
                        {{ $paidContributions ?? 0 }}
                    </h3>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-green-50 text-green-600
                            flex items-center justify-center">

                    <i class="fas fa-circle-check"></i>

                </div>

            </div>

        </div>


        {{-- En attente --}}
        <div class="bg-white rounded-2xl border border-gray-200
                    shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        En attente
                    </p>

                    <h3 class="text-2xl font-bold text-[#B88A18] mt-2">
                        {{ $pendingContributions ?? 0 }}
                    </h3>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-yellow-50 text-yellow-600
                            flex items-center justify-center">

                    <i class="fas fa-clock"></i>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         FILTRES
    ========================================================== --}}
    <div class="bg-white rounded-2xl border border-gray-200
                shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl
                            bg-gray-100 text-gray-600
                            flex items-center justify-center">

                    <i class="fas fa-filter"></i>

                </div>

                <div>

                    <h2 class="font-bold text-[#043D23]">
                        Filtrer les cotisations
                    </h2>

                    <p class="text-xs text-gray-500 mt-1">
                        Rechercher rapidement une cotisation
                    </p>

                </div>

            </div>

        </div>


        <form method="GET"
              action="{{ route('admin.contributions.index') }}"
              class="p-6">

            <div class="grid grid-cols-1 md:grid-cols-2
                        lg:grid-cols-5 gap-4">

                {{-- Recherche --}}
                <div class="lg:col-span-2">

                    <label class="block text-sm font-semibold
                                  text-gray-700 mb-2">

                        Recherche

                    </label>

                    <div class="relative">

                        <i class="fas fa-search absolute left-4 top-1/2
                                  -translate-y-1/2 text-gray-400"></i>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Nom, téléphone ou numéro membre..."
                            class="w-full pl-11 pr-4 py-3
                                   rounded-xl border border-gray-200
                                   focus:border-[#075B32]
                                   focus:ring-2 focus:ring-[#075B32]/10
                                   outline-none"
                        >

                    </div>

                </div>


                {{-- Montant --}}
                <div>

                    <label class="block text-sm font-semibold
                                  text-gray-700 mb-2">

                        Montant

                    </label>

                    <select
                        name="amount"
                        class="w-full px-4 py-3 rounded-xl
                               border border-gray-200 bg-white
                               focus:border-[#075B32]
                               focus:ring-2 focus:ring-[#075B32]/10
                               outline-none">

                        <option value="">
                            Tous les montants
                        </option>

                        @foreach([5000, 10000, 15000, 20000, 25000] as $amount)

                            <option
                                value="{{ $amount }}"
                                @selected(request('amount') == $amount)
                            >
                                {{ number_format($amount, 0, ',', ' ') }} FCFA
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Statut --}}
                <div>

                    <label class="block text-sm font-semibold
                                  text-gray-700 mb-2">

                        Statut

                    </label>

                    <select
                        name="status"
                        class="w-full px-4 py-3 rounded-xl
                               border border-gray-200 bg-white
                               focus:border-[#075B32]
                               focus:ring-2 focus:ring-[#075B32]/10
                               outline-none">

                        <option value="">
                            Tous les statuts
                        </option>

                        <option value="paid"
                            @selected(request('status') === 'paid')>
                            Payée
                        </option>

                        <option value="pending"
                            @selected(request('status') === 'pending')>
                            En attente
                        </option>

                    </select>

                </div>


                {{-- Année --}}
                <div>

                    <label class="block text-sm font-semibold
                                  text-gray-700 mb-2">

                        Année

                    </label>

                    <select
                        name="year"
                        class="w-full px-4 py-3 rounded-xl
                               border border-gray-200 bg-white
                               focus:border-[#075B32]
                               focus:ring-2 focus:ring-[#075B32]/10
                               outline-none">

                        <option value="">
                            Toutes les années
                        </option>

                        @for($year = now()->year; $year >= now()->year - 5; $year--)

                            <option
                                value="{{ $year }}"
                                @selected(request('year') == $year)
                            >
                                {{ $year }}
                            </option>

                        @endfor

                    </select>

                </div>

            </div>


            <div class="flex flex-col sm:flex-row
                        sm:justify-end gap-3 mt-5">

                <a href="{{ route('admin.contributions.index') }}"
                   class="inline-flex items-center justify-center
                          gap-2 px-5 py-3 rounded-xl
                          bg-gray-100 hover:bg-gray-200
                          text-gray-700 font-semibold transition">

                    <i class="fas fa-rotate-left"></i>

                    Réinitialiser

                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center
                           gap-2 px-5 py-3 rounded-xl
                           bg-[#075B32] hover:bg-[#043D23]
                           text-white font-semibold transition">

                    <i class="fas fa-filter"></i>

                    Appliquer les filtres

                </button>

            </div>

        </form>

    </div>


    {{-- =========================================================
         TABLEAU
    ========================================================== --}}
    <div class="bg-white rounded-2xl border border-gray-200
                shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100
                    flex flex-col sm:flex-row
                    sm:items-center sm:justify-between gap-3">

            <div>

                <h2 class="font-bold text-[#043D23]">
                    Historique des cotisations
                </h2>

                <p class="text-xs text-gray-500 mt-1">
                    Liste des cotisations enregistrées
                </p>

            </div>

            <span class="text-sm text-gray-500">

                {{ $contributions->total() ?? 0 }}
                résultat(s)

            </span>

        </div>


        @if(isset($contributions) && $contributions->count())

            {{-- Desktop --}}
            <div class="hidden md:block overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-[#F8FAF8]">

                        <tr>

                            <th class="px-6 py-4 text-left
                                       text-xs font-bold text-gray-500
                                       uppercase tracking-wider">
                                Membre
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-bold text-gray-500
                                       uppercase tracking-wider">
                                Montant
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-bold text-gray-500
                                       uppercase tracking-wider">
                                Date
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-bold text-gray-500
                                       uppercase tracking-wider">
                                Année
                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-bold text-gray-500
                                       uppercase tracking-wider">
                                Statut
                            </th>

                            <th class="px-6 py-4 text-right
                                       text-xs font-bold text-gray-500
                                       uppercase tracking-wider">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @foreach($contributions as $contribution)

                            <tr class="hover:bg-[#FAFCFA] transition">

                                {{-- Membre --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-xl
                                                    bg-[#EAF5EF]
                                                    text-[#075B32]
                                                    flex items-center justify-center
                                                    font-bold">

                                            {{ strtoupper(
                                                substr(
                                                    $contribution->member->full_name ?? 'M',
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </div>

                                        <div>

                                            <p class="font-semibold
                                                      text-gray-800">

                                                {{ $contribution->member->full_name ?? '-' }}

                                            </p>

                                            <p class="text-xs text-gray-400">

                                                {{ $contribution->member->member_number ?? '-' }}

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- Montant --}}
                                <td class="px-6 py-4">

                                    <span class="font-bold text-[#043D23]">

                                        {{ number_format(
                                            $contribution->amount ?? 0,
                                            0,
                                            ',',
                                            ' '
                                        ) }}

                                        <span class="text-xs font-medium">
                                            FCFA
                                        </span>

                                    </span>

                                </td>


                                {{-- Date --}}
                                <td class="px-6 py-4">

                                    <span class="text-sm text-gray-600">

                                        {{ $contribution->paid_at?->format('d/m/Y')
                                            ?? $contribution->created_at?->format('d/m/Y')
                                            ?? '-' }}

                                    </span>

                                </td>


                                {{-- Année --}}
                                <td class="px-6 py-4">

                                    <span class="text-sm font-medium
                                                 text-gray-700">

                                        {{ $contribution->year
                                            ?? $contribution->paid_at?->format('Y')
                                            ?? $contribution->created_at?->format('Y')
                                            ?? '-' }}

                                    </span>

                                </td>


                                {{-- Statut --}}
                                <td class="px-6 py-4">

                                    @if(($contribution->status ?? '') === 'paid')

                                        <span class="inline-flex items-center
                                                     gap-1.5 px-3 py-1.5
                                                     rounded-full
                                                     bg-green-50 text-green-700
                                                     text-xs font-semibold">

                                            <i class="fas fa-circle-check"></i>
                                            Payée

                                        </span>

                                    @else

                                        <span class="inline-flex items-center
                                                     gap-1.5 px-3 py-1.5
                                                     rounded-full
                                                     bg-yellow-50 text-yellow-700
                                                     text-xs font-semibold">

                                            <i class="fas fa-clock"></i>
                                            En attente

                                        </span>

                                    @endif

                                </td>


                                {{-- Actions --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center
                                                justify-end gap-2">

                                        @if(isset($contribution->member))

                                            <a
                                                href="{{ route(
                                                    'admin.members.show',
                                                    $contribution->member
                                                ) }}"
                                                title="Voir le membre"
                                                class="w-9 h-9 rounded-lg
                                                       bg-gray-100
                                                       text-gray-600
                                                       hover:bg-[#EAF5EF]
                                                       hover:text-[#075B32]
                                                       flex items-center
                                                       justify-center
                                                       transition">

                                                <i class="fas fa-eye"></i>

                                            </a>

                                        @endif


                                        @if(Route::has('admin.contributions.edit'))

                                            <a
                                                href="{{ route(
                                                    'admin.contributions.edit',
                                                    $contribution
                                                ) }}"
                                                title="Modifier"
                                                class="w-9 h-9 rounded-lg
                                                       bg-gray-100
                                                       text-gray-600
                                                       hover:bg-[#FFF8E7]
                                                       hover:text-[#B88A18]
                                                       flex items-center
                                                       justify-center
                                                       transition">

                                                <i class="fas fa-pen"></i>

                                            </a>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- Mobile --}}
            <div class="md:hidden divide-y divide-gray-100">

                @foreach($contributions as $contribution)

                    <div class="p-5">

                        <div class="flex items-start
                                    justify-between gap-3">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-xl
                                            bg-[#EAF5EF]
                                            text-[#075B32]
                                            flex items-center justify-center
                                            font-bold">

                                    {{ strtoupper(
                                        substr(
                                            $contribution->member->full_name ?? 'M',
                                            0,
                                            1
                                        )
                                    ) }}

                                </div>

                                <div>

                                    <p class="font-semibold text-gray-800">

                                        {{ $contribution->member->full_name ?? '-' }}

                                    </p>

                                    <p class="text-xs text-gray-400">

                                        {{ $contribution->member->member_number ?? '-' }}

                                    </p>

                                </div>

                            </div>


                            @if(($contribution->status ?? '') === 'paid')

                                <span class="w-8 h-8 rounded-full
                                             bg-green-50 text-green-600
                                             flex items-center justify-center">

                                    <i class="fas fa-check text-xs"></i>

                                </span>

                            @else

                                <span class="w-8 h-8 rounded-full
                                             bg-yellow-50 text-yellow-600
                                             flex items-center justify-center">

                                    <i class="fas fa-clock text-xs"></i>

                                </span>

                            @endif

                        </div>


                        <div class="grid grid-cols-2 gap-4 mt-5">

                            <div>

                                <p class="text-xs text-gray-400">
                                    Montant
                                </p>

                                <p class="font-bold text-[#043D23] mt-1">

                                    {{ number_format(
                                        $contribution->amount ?? 0,
                                        0,
                                        ',',
                                        ' '
                                    ) }}
                                    FCFA

                                </p>

                            </div>


                            <div>

                                <p class="text-xs text-gray-400">
                                    Date
                                </p>

                                <p class="font-medium text-gray-700 mt-1">

                                    {{ $contribution->paid_at?->format('d/m/Y')
                                        ?? $contribution->created_at?->format('d/m/Y')
                                        ?? '-' }}

                                </p>

                            </div>

                        </div>


                        <div class="flex gap-2 mt-5">

                            @if(isset($contribution->member))

                                <a
                                    href="{{ route(
                                        'admin.members.show',
                                        $contribution->member
                                    ) }}"
                                    class="flex-1 flex items-center
                                           justify-center gap-2
                                           px-4 py-2.5 rounded-xl
                                           bg-gray-100
                                           text-gray-700 text-sm
                                           font-semibold">

                                    <i class="fas fa-user"></i>
                                    Membre

                                </a>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- Pagination --}}
            @if($contributions->hasPages())

                <div class="px-6 py-5 border-t border-gray-100">

                    {{ $contributions->withQueryString()->links() }}

                </div>

            @endif

        @else

            {{-- Empty state --}}
            <div class="px-6 py-16 text-center">

                <div class="w-20 h-20 mx-auto rounded-2xl
                            bg-[#F4F7F3]
                            text-[#075B32]
                            flex items-center justify-center">

                    <i class="fas fa-receipt text-3xl"></i>

                </div>

                <h3 class="mt-5 text-lg font-bold text-[#043D23]">
                    Aucune cotisation
                </h3>

                <p class="text-sm text-gray-500 mt-2 max-w-md mx-auto">

                    Aucune cotisation ne correspond aux critères
                    sélectionnés.

                </p>

                <a
                    href="{{ route('admin.contributions.create') }}"
                    class="inline-flex items-center gap-2
                           mt-6 px-5 py-3 rounded-xl
                           bg-[#075B32] hover:bg-[#043D23]
                           text-white font-semibold transition">

                    <i class="fas fa-plus"></i>

                    Enregistrer une cotisation

                </a>

            </div>

        @endif

    </div>

</div>

@endsection