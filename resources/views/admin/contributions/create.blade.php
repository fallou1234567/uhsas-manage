@extends('layouts.app')

@section('title', 'Nouvelle cotisation')
@section('page-title', 'Nouvelle cotisation')

@section('content')

<link rel="stylesheet" href="{{ asset('asset/css/contributions.css') }}">


    <div class="max-w-5xl mx-auto">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:items-center
                md:justify-between gap-4 mb-6">

            <div class="flex items-center gap-3">

                <a href="{{ route('admin.contributions.index') }}"
                    class="w-10 h-10 rounded-xl bg-white border border-gray-200
                      flex items-center justify-center text-gray-500
                      hover:text-[#075B32] hover:border-[#075B32] transition">

                    <i class="fas fa-arrow-left"></i>

                </a>

                <div>

                    <h1 class="text-2xl font-bold text-[#043D23]">
                        Nouvelle cotisation
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Enregistrer une cotisation pour un membre
                    </p>

                </div>

            </div>

        </div>


        {{-- ERREURS --}}
        @if ($errors->any())

            <div class="mb-6 rounded-2xl border border-red-200
                    bg-red-50 p-5">

                <div class="flex items-start gap-3">

                    <div
                        class="w-9 h-9 rounded-full bg-red-100
                            text-red-600 flex items-center
                            justify-center shrink-0">

                        <i class="fas fa-exclamation-triangle"></i>

                    </div>

                    <div>

                        <h3 class="font-semibold text-red-800">
                            Vérifiez les informations saisies
                        </h3>

                        <ul class="mt-2 text-sm text-red-700 space-y-1">

                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif


        <form action="{{ route('admin.contributions.store') }}" method="POST">

            @csrf


            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


                {{-- ============================================
                 FORMULAIRE PRINCIPAL
            ============================================= --}}
                <div class="lg:col-span-2 space-y-6">


                    {{-- MEMBRE --}}
                    <div
                        class="bg-white rounded-2xl border border-gray-200
                            shadow-sm overflow-hidden">

                        <div class="px-6 py-5 border-b border-gray-100">

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-10 h-10 rounded-xl
                                        bg-[#EAF5EF]
                                        text-[#075B32]
                                        flex items-center justify-center">

                                    <i class="fas fa-user"></i>

                                </div>

                                <div>

                                    <h2 class="font-bold text-[#043D23]">
                                        Membre
                                    </h2>

                                    <p class="text-xs text-gray-500 mt-1">
                                        Sélectionner le membre concerné
                                    </p>

                                </div>

                            </div>

                        </div>


                        <div class="p-6">

                            <label for="member_id"
                                class="block text-sm font-semibold
                                   text-gray-700 mb-2">

                                Membre
                                <span class="text-red-500">*</span>

                            </label>


                            <div class="relative">

                                <i
                                    class="fas fa-id-card absolute left-4 top-1/2
                                      -translate-y-1/2 text-gray-400"></i>

                                <select id="member_id" name="member_id" required
                                    class="w-full pl-11 pr-4 py-3 rounded-xl
                                       border border-gray-200 bg-white
                                       focus:border-[#075B32]
                                       focus:ring-2 focus:ring-[#075B32]/10
                                       outline-none transition">

                                    <option value="">
                                        Sélectionner un membre
                                    </option>

                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}" @selected(old('member_id') == $member->id)>

                                            {{ $member->full_name }}
                                            — {{ $member->member_number }}

                                        </option>
                                    @endforeach

                                </select>

                            </div>

                        </div>

                    </div>


                    {{-- COTISATION --}}
                    <div
                        class="bg-white rounded-2xl border border-gray-200
                            shadow-sm overflow-hidden">

                        <div class="px-6 py-5 border-b border-gray-100">

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-10 h-10 rounded-xl
                                        bg-[#FFF8E7]
                                        text-[#B88A18]
                                        flex items-center justify-center">

                                    <i class="fas fa-money-bill-wave"></i>

                                </div>

                                <div>

                                    <h2 class="font-bold text-[#043D23]">
                                        Détails de la cotisation
                                    </h2>

                                    <p class="text-xs text-gray-500 mt-1">
                                        Montant et période de cotisation
                                    </p>

                                </div>

                            </div>

                        </div>


                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">


                            {{-- MONTANT --}}
                            <div class="md:col-span-2">

                                <label
                                    class="block text-sm font-semibold
                                       text-gray-700 mb-3">

                                    Montant de la cotisation
                                    <span class="text-red-500">*</span>

                                </label>


                                <div class="grid grid-cols-2 sm:grid-cols-5 gap-3">

                                    @foreach ([5000, 10000, 15000, 20000, 25000] as $amount)
                                        <label class="cursor-pointer">

                                            <input type="radio" name="amount" value="{{ $amount }}"
                                                class="peer sr-only" @checked(old('amount') == $amount)>

                                            <div
                                                class="rounded-xl border-2
                                                   border-gray-200
                                                   p-4 text-center
                                                   peer-checked:border-[#075B32]
                                                   peer-checked:bg-[#F3FAF6]
                                                   transition">

                                                <div
                                                    class="text-lg font-bold
                                                        text-[#043D23]">

                                                    {{ number_format($amount, 0, ',', ' ') }}

                                                </div>

                                                <div
                                                    class="text-xs text-gray-500
                                                        mt-1">

                                                    FCFA

                                                </div>

                                            </div>

                                        </label>
                                    @endforeach

                                </div>

                            </div>


                            {{-- ANNÉE --}}
                            <div>

                                <label for="year"
                                    class="block text-sm font-semibold
                                       text-gray-700 mb-2">

                                    Année
                                    <span class="text-red-500">*</span>

                                </label>

                                <select id="year" name="year" required
                                    class="w-full px-4 py-3 rounded-xl
                                       border border-gray-200 bg-white
                                       focus:border-[#075B32]
                                       focus:ring-2 focus:ring-[#075B32]/10
                                       outline-none">

                                    @for ($year = now()->year; $year >= now()->year - 5; $year--)
                                        <option value="{{ $year }}" @selected(old('year', now()->year) == $year)>
                                            {{ $year }}
                                        </option>
                                    @endfor

                                </select>

                            </div>


                            {{-- DATE --}}
                            <div>

                                <label for="paid_at"
                                    class="block text-sm font-semibold
                                       text-gray-700 mb-2">

                                    Date de paiement
                                    <span class="text-red-500">*</span>

                                </label>

                                <div class="relative">

                                    <i
                                        class="fas fa-calendar absolute left-4
                                          top-1/2 -translate-y-1/2
                                          text-gray-400"></i>

                                    <input type="date" id="paid_at" name="paid_at"
                                        value="{{ old('paid_at', now()->format('Y-m-d')) }}"
                                        required
                                        class="w-full pl-11 pr-4 py-3 rounded-xl
                                           border border-gray-200
                                           focus:border-[#075B32]
                                           focus:ring-2 focus:ring-[#075B32]/10
                                           outline-none">

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- STATUT --}}
                    <div
                        class="bg-white rounded-2xl border border-gray-200
                            shadow-sm overflow-hidden">

                        <div class="px-6 py-5 border-b border-gray-100">

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-10 h-10 rounded-xl
                                        bg-[#EAF5EF]
                                        text-[#075B32]
                                        flex items-center justify-center">

                                    <i class="fas fa-circle-check"></i>

                                </div>

                                <div>

                                    <h2 class="font-bold text-[#043D23]">
                                        Statut du paiement
                                    </h2>

                                    <p class="text-xs text-gray-500 mt-1">
                                        Définir l'état de la cotisation
                                    </p>

                                </div>

                            </div>

                        </div>


                        <div class="p-6">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


                                {{-- PAYÉE --}}
                                <label class="cursor-pointer">

                                    <input type="radio" name="status" value="paid" class="peer sr-only"
                                        @checked(old('status', 'paid') === 'paid')>

                                    <div
                                        class="rounded-2xl border-2
                                           border-gray-200 p-5
                                           peer-checked:border-[#075B32]
                                           peer-checked:bg-[#F3FAF6]
                                           transition">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="w-11 h-11 rounded-xl
                                                   bg-green-50
                                                   text-green-600
                                                   flex items-center
                                                   justify-center">

                                                <i class="fas fa-check"></i>

                                            </div>

                                            <div>

                                                <p class="font-semibold text-gray-800">
                                                    Payée
                                                </p>

                                                <p class="text-xs text-gray-500">
                                                    Paiement reçu
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                </label>


                                {{-- EN ATTENTE --}}
                                <label class="cursor-pointer">

                                    <input type="radio" name="status" value="pending" class="peer sr-only"
                                        @checked(old('status') === 'pending')>

                                    <div
                                        class="rounded-2xl border-2
                                           border-gray-200 p-5
                                           peer-checked:border-[#D6A52E]
                                           peer-checked:bg-[#FFFDF5]
                                           transition">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="w-11 h-11 rounded-xl
                                                   bg-yellow-50
                                                   text-yellow-600
                                                   flex items-center
                                                   justify-center">

                                                <i class="fas fa-clock"></i>

                                            </div>

                                            <div>

                                                <p class="font-semibold text-gray-800">
                                                    En attente
                                                </p>

                                                <p class="text-xs text-gray-500">
                                                    Paiement à confirmer
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                </label>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- ============================================
                 SIDEBAR
            ============================================= --}}
                <div class="space-y-6">


                    {{-- RÉSUMÉ --}}
                    <div
                        class="bg-gradient-to-br
                            from-[#043D23] to-[#075B32]
                            rounded-2xl text-white p-6 shadow-lg">

                        <div class="flex items-center gap-3 mb-5">

                            <div
                                class="w-11 h-11 rounded-xl
                                    bg-white/10
                                    flex items-center justify-center">

                                <i class="fas fa-wallet text-[#F0C85A]"></i>

                            </div>

                            <div>

                                <h3 class="font-bold">
                                    Résumé
                                </h3>

                                <p class="text-xs text-white/60">
                                    Cotisation UHSAS
                                </p>

                            </div>

                        </div>


                        <div class="space-y-4">

                            <div>

                                <p class="text-xs text-white/60">
                                    Montant sélectionné
                                </p>

                                <p id="summaryAmount"
                                    class="text-2xl font-bold
                                      text-[#F0C85A] mt-1">

                                    0 FCFA

                                </p>

                            </div>


                            <div class="border-t border-white/10 pt-4">

                                <div class="flex justify-between">

                                    <span class="text-sm text-white/60">
                                        Année
                                    </span>

                                    <span id="summaryYear" class="font-semibold">

                                        {{ old('year', now()->year) }}

                                    </span>

                                </div>

                            </div>


                            <div>

                                <div class="flex justify-between">

                                    <span class="text-sm text-white/60">
                                        Statut
                                    </span>

                                    <span id="summaryStatus" class="font-semibold">

                                        Payée

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- INFORMATION --}}
                    <div class="bg-white rounded-2xl border border-gray-200
                            shadow-sm p-6">

                        <div class="flex items-center gap-3 mb-4">

                            <div
                                class="w-10 h-10 rounded-xl
                                    bg-[#EAF5EF]
                                    text-[#075B32]
                                    flex items-center justify-center">

                                <i class="fas fa-circle-info"></i>

                            </div>

                            <h3 class="font-bold text-[#043D23]">
                                À savoir
                            </h3>

                        </div>

                        <ul class="space-y-3 text-sm text-gray-600">

                            <li class="flex items-start gap-3">

                                <i class="fas fa-check text-[#075B32] mt-1"></i>

                                <span>
                                    Le paiement sera associé au membre sélectionné.
                                </span>

                            </li>

                            <li class="flex items-start gap-3">

                                <i class="fas fa-check text-[#075B32] mt-1"></i>

                                <span>
                                    Les montants autorisés vont de
                                    5 000 à 25 000 FCFA.
                                </span>

                            </li>

                            <li class="flex items-start gap-3">

                                <i class="fas fa-check text-[#075B32] mt-1"></i>

                                <span>
                                    L'historique des cotisations est conservé.
                                </span>

                            </li>

                        </ul>

                    </div>


                    {{-- ACTIONS --}}
                    <div class="bg-white rounded-2xl border border-gray-200
                            shadow-sm p-5">

                        <button type="submit"
                            class="w-full flex items-center
                               justify-center gap-2
                               bg-[#075B32] hover:bg-[#043D23]
                               text-white font-semibold
                               py-3.5 px-5 rounded-xl
                               transition shadow-sm">

                            <i class="fas fa-save"></i>

                            Enregistrer la cotisation

                        </button>


                        <a href="{{ route('admin.contributions.index') }}"
                            class="mt-3 w-full flex items-center
                               justify-center gap-2
                               bg-gray-100 hover:bg-gray-200
                               text-gray-700 font-semibold
                               py-3.5 px-5 rounded-xl transition">

                            <i class="fas fa-xmark"></i>

                            Annuler

                        </a>

                    </div>

                </div>

            </div>

        </form>

    </div>

@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            /*
            |--------------------------------------------------------------------------
            | Montant
            |--------------------------------------------------------------------------
            */

            const amountInputs =
                document.querySelectorAll('input[name="amount"]');

            const summaryAmount =
                document.getElementById('summaryAmount');


            function updateAmount() {

                const selected =
                    document.querySelector('input[name="amount"]:checked');

                if (!selected) {

                    summaryAmount.textContent = '0 FCFA';

                    return;
                }

                const amount =
                    parseInt(selected.value, 10);

                summaryAmount.textContent =
                    new Intl.NumberFormat('fr-FR').format(amount) +
                    ' FCFA';
            }


            amountInputs.forEach(input => {

                input.addEventListener(
                    'change',
                    updateAmount
                );

            });


            /*
            |--------------------------------------------------------------------------
            | Année
            |--------------------------------------------------------------------------
            */

            const yearInput =
                document.getElementById('year');

            const summaryYear =
                document.getElementById('summaryYear');


            yearInput.addEventListener('change', function() {

                summaryYear.textContent = this.value;

            });


            /*
            |--------------------------------------------------------------------------
            | Statut
            |--------------------------------------------------------------------------
            */

            const statusInputs =
                document.querySelectorAll('input[name="status"]');

            const summaryStatus =
                document.getElementById('summaryStatus');


            statusInputs.forEach(input => {

                input.addEventListener('change', function() {

                    summaryStatus.textContent =
                        this.value === 'paid' ?
                        'Payée' :
                        'En attente';

                });

            });


            /*
            |--------------------------------------------------------------------------
            | Initialisation
            |--------------------------------------------------------------------------
            */

            updateAmount();

        });
    </script>
@endpush
