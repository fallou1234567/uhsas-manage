@extends('layouts.app')

@section('title', 'Régions')
@section('page-title', 'Régions')

@section('content')

<div class="max-w-7xl mx-auto space-y-6">

    {{-- =========================================================
         HEADER
    ========================================================== --}}
    <div class="flex flex-col md:flex-row md:items-center
                md:justify-between gap-4">

        <div class="flex items-center gap-3">

            <div class="w-12 h-12 rounded-2xl
                        bg-[#EAF5EF] text-[#075B32]
                        flex items-center justify-center">

                <i class="fas fa-map-location-dot text-xl"></i>

            </div>

            <div>

                <h1 class="text-2xl font-bold text-[#043D23]">
                    Régions
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Gestion des régions administratives du Sénégal
                </p>

            </div>

        </div>


        <button
            type="button"
            onclick="openRegionModal()"
            class="inline-flex items-center justify-center
                   gap-2 px-5 py-3 rounded-xl
                   bg-[#075B32] hover:bg-[#043D23]
                   text-white font-semibold transition">

            <i class="fas fa-plus"></i>

            Ajouter une région

        </button>

    </div>


    {{-- =========================================================
         STATISTIQUES
    ========================================================== --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

        <div class="bg-white rounded-2xl border border-gray-200
                    shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Total régions
                    </p>

                    <p class="text-3xl font-bold
                              text-[#043D23] mt-2">

                        {{ $regions->count() }}

                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-[#EAF5EF] text-[#075B32]
                            flex items-center justify-center">

                    <i class="fas fa-map"></i>

                </div>

            </div>

        </div>


        <div class="bg-white rounded-2xl border border-gray-200
                    shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Départements
                    </p>

                    <p class="text-3xl font-bold
                              text-[#043D23] mt-2">

                        {{ $regions->sum('departments_count') }}

                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-[#FFF8E7] text-[#B88A18]
                            flex items-center justify-center">

                    <i class="fas fa-building"></i>

                </div>

            </div>

        </div>


        <div class="bg-white rounded-2xl border border-gray-200
                    shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Membres localisés
                    </p>

                    <p class="text-3xl font-bold
                              text-[#043D23] mt-2">

                        {{ $regions->sum('members_count') }}

                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-blue-50 text-blue-600
                            flex items-center justify-center">

                    <i class="fas fa-users"></i>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         TABLEAU
    ========================================================== --}}
    <div class="bg-white rounded-2xl border border-gray-200
                shadow-sm overflow-hidden">

        {{-- En-tête --}}
        <div class="px-6 py-5 border-b border-gray-100
                    flex flex-col md:flex-row
                    md:items-center md:justify-between gap-4">

            <div>

                <h2 class="font-bold text-[#043D23]">
                    Liste des régions
                </h2>

                <p class="text-xs text-gray-500 mt-1">
                    Régions utilisées dans les inscriptions UHSAS
                </p>

            </div>


            {{-- Recherche --}}
            <form
                method="GET"
                action="{{ route('admin.locations.regions') }}"
                class="relative w-full md:w-72"
            >

                <i class="fas fa-search absolute left-4 top-1/2
                          -translate-y-1/2 text-gray-400"></i>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Rechercher une région..."
                    class="w-full pl-11 pr-4 py-2.5 rounded-xl
                           border border-gray-200
                           focus:border-[#075B32]
                           focus:ring-2 focus:ring-[#075B32]/10
                           outline-none"
                >

            </form>

        </div>


        @if($regions->count())

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-[#F8FAF8]">

                        <tr>

                            <th class="px-6 py-4 text-left
                                       text-xs font-bold text-gray-500
                                       uppercase tracking-wider">

                                Région

                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-bold text-gray-500
                                       uppercase tracking-wider">

                                Départements

                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-bold text-gray-500
                                       uppercase tracking-wider">

                                Membres

                            </th>

                            <th class="px-6 py-4 text-right
                                       text-xs font-bold text-gray-500
                                       uppercase tracking-wider">

                                Actions

                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-100">

                        @foreach($regions as $region)

                            <tr class="hover:bg-[#FAFCFA] transition">

                                {{-- Région --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-11 h-11 rounded-xl
                                                    bg-[#EAF5EF]
                                                    text-[#075B32]
                                                    flex items-center
                                                    justify-center">

                                            <i class="fas fa-map"></i>

                                        </div>

                                        <div>

                                            <p class="font-semibold
                                                      text-gray-800">

                                                {{ $region->name }}

                                            </p>

                                            <p class="text-xs text-gray-400">

                                                ID #{{ $region->id }}

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- Départements --}}
                                <td class="px-6 py-4">

                                    <span class="inline-flex items-center
                                                 gap-2 px-3 py-1.5
                                                 rounded-full
                                                 bg-[#FFF8E7]
                                                 text-[#9A7210]
                                                 text-xs font-semibold">

                                        <i class="fas fa-building"></i>

                                        {{ $region->departments_count ?? 0 }}

                                    </span>

                                </td>


                                {{-- Membres --}}
                                <td class="px-6 py-4">

                                    <span class="inline-flex items-center
                                                 gap-2 px-3 py-1.5
                                                 rounded-full
                                                 bg-[#EAF5EF]
                                                 text-[#075B32]
                                                 text-xs font-semibold">

                                        <i class="fas fa-users"></i>

                                        {{ $region->members_count ?? 0 }}

                                    </span>

                                </td>


                                {{-- Actions --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center
                                                justify-end gap-2">

                                        <a
                                            href="{{ route(
                                                'admin.locations.departments',
                                                ['region_id' => $region->id]
                                            ) }}"
                                            title="Voir les départements"
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


                                        <button
                                            type="button"
                                            onclick="editRegion(
                                                {{ $region->id }},
                                                @js($region->name)
                                            )"
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

                                        </button>


                                        @if(($region->departments_count ?? 0) === 0)

                                            <form
                                                method="POST"
                                                action="{{ route(
                                                    'admin.locations.regions.destroy',
                                                    $region
                                                ) }}"
                                                onsubmit="return confirm(
                                                    'Voulez-vous vraiment supprimer cette région ?'
                                                )"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    title="Supprimer"
                                                    class="w-9 h-9 rounded-lg
                                                           bg-red-50
                                                           text-red-600
                                                           hover:bg-red-100
                                                           flex items-center
                                                           justify-center
                                                           transition">

                                                    <i class="fas fa-trash"></i>

                                                </button>

                                            </form>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="px-6 py-16 text-center">

                <div class="w-20 h-20 mx-auto rounded-2xl
                            bg-[#F4F7F3]
                            text-[#075B32]
                            flex items-center
                            justify-center">

                    <i class="fas fa-map text-3xl"></i>

                </div>

                <h3 class="mt-5 text-lg font-bold text-[#043D23]">
                    Aucune région
                </h3>

                <p class="text-sm text-gray-500 mt-2">
                    Aucune région ne correspond à votre recherche.
                </p>

                <button
                    type="button"
                    onclick="openRegionModal()"
                    class="inline-flex items-center gap-2
                           mt-6 px-5 py-3 rounded-xl
                           bg-[#075B32] text-white
                           font-semibold">

                    <i class="fas fa-plus"></i>

                    Ajouter une région

                </button>

            </div>

        @endif

    </div>

</div>


{{-- =========================================================
     MODAL RÉGION
========================================================== --}}
<div
    id="regionModal"
    class="fixed inset-0 z-50 hidden"
>

    {{-- Overlay --}}
    <div
        class="absolute inset-0 bg-black/50 backdrop-blur-sm"
        onclick="closeRegionModal()"
    ></div>


    {{-- Modal --}}
    <div class="relative min-h-screen flex items-center
                justify-center p-4">

        <div
            class="relative w-full max-w-md bg-white
                   rounded-2xl shadow-2xl overflow-hidden"
        >

            {{-- Header --}}
            <div class="px-6 py-5 border-b border-gray-100
                        flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-[#EAF5EF]
                                text-[#075B32]
                                flex items-center
                                justify-center">

                        <i class="fas fa-map"></i>

                    </div>

                    <div>

                        <h2
                            id="modalTitle"
                            class="font-bold text-[#043D23]"
                        >
                            Ajouter une région
                        </h2>

                        <p class="text-xs text-gray-500">
                            Informations de la région
                        </p>

                    </div>

                </div>


                <button
                    type="button"
                    onclick="closeRegionModal()"
                    class="w-9 h-9 rounded-lg
                           bg-gray-100
                           text-gray-500
                           hover:bg-gray-200
                           flex items-center justify-center"
                >

                    <i class="fas fa-xmark"></i>

                </button>

            </div>


            {{-- Form --}}
            <form
                id="regionForm"
                method="POST"
                action="{{ route('admin.locations.regions.store') }}"
            >

                @csrf

                <div id="methodContainer"></div>


                <div class="p-6">

                    <label
                        for="regionName"
                        class="block text-sm font-semibold
                               text-gray-700 mb-2"
                    >

                        Nom de la région
                        <span class="text-red-500">*</span>

                    </label>


                    <div class="relative">

                        <i class="fas fa-map absolute left-4 top-1/2
                                  -translate-y-1/2 text-gray-400"></i>

                        <input
                            type="text"
                            id="regionName"
                            name="name"
                            required
                            placeholder="Ex : Dakar"
                            class="w-full pl-11 pr-4 py-3
                                   rounded-xl border border-gray-200
                                   focus:border-[#075B32]
                                   focus:ring-2
                                   focus:ring-[#075B32]/10
                                   outline-none"
                        >

                    </div>

                </div>


                {{-- Footer --}}
                <div class="px-6 py-4 bg-gray-50
                            border-t border-gray-100
                            flex justify-end gap-3">

                    <button
                        type="button"
                        onclick="closeRegionModal()"
                        class="px-5 py-3 rounded-xl
                               bg-white border border-gray-200
                               text-gray-700 font-semibold
                               hover:bg-gray-100"
                    >

                        Annuler

                    </button>


                    <button
                        type="submit"
                        class="px-5 py-3 rounded-xl
                               bg-[#075B32]
                               hover:bg-[#043D23]
                               text-white font-semibold"
                    >

                        <i class="fas fa-save mr-2"></i>

                        Enregistrer

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection


@push('scripts')

<script>

function openRegionModal() {

    const modal = document.getElementById('regionModal');

    const title = document.getElementById('modalTitle');

    const form = document.getElementById('regionForm');

    const name = document.getElementById('regionName');

    const methodContainer =
        document.getElementById('methodContainer');


    title.textContent = 'Ajouter une région';

    form.action =
        "{{ route('admin.locations.regions.store') }}";

    methodContainer.innerHTML = '';

    name.value = '';

    modal.classList.remove('hidden');

    setTimeout(() => name.focus(), 100);
}


function editRegion(id, nameValue) {

    const modal = document.getElementById('regionModal');

    const title = document.getElementById('modalTitle');

    const form = document.getElementById('regionForm');

    const name = document.getElementById('regionName');

    const methodContainer =
        document.getElementById('methodContainer');


    title.textContent = 'Modifier la région';

    form.action =
        "{{ url('/admin/locations/regions') }}/" + id;

    methodContainer.innerHTML =
        '<input type="hidden" name="_method" value="PUT">';

    name.value = nameValue;

    modal.classList.remove('hidden');

    setTimeout(() => name.focus(), 100);
}


function closeRegionModal() {

    document
        .getElementById('regionModal')
        .classList.add('hidden');

}


document.addEventListener('keydown', function(event) {

    if (event.key === 'Escape') {
        closeRegionModal();
    }

});

</script>

@endpush