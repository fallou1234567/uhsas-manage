@extends('layouts.app')

@section('title', 'Départements')
@section('page-title', 'Départements')

@section('content')

<div class="max-w-7xl mx-auto space-y-6">

    {{-- =========================================================
         HEADER
    ========================================================== --}}
    <div class="flex flex-col lg:flex-row lg:items-center
                lg:justify-between gap-4">

        <div class="flex items-center gap-3">

            <div class="w-12 h-12 rounded-2xl
                        bg-[#EAF5EF] text-[#075B32]
                        flex items-center justify-center">

                <i class="fas fa-building text-xl"></i>

            </div>

            <div>

                <h1 class="text-2xl font-bold text-[#043D23]">
                    Départements
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Gestion des départements administratifs
                </p>

            </div>

        </div>


        <button
            type="button"
            onclick="openDepartmentModal()"
            class="inline-flex items-center justify-center
                   gap-2 px-5 py-3 rounded-xl
                   bg-[#075B32] hover:bg-[#043D23]
                   text-white font-semibold transition"
        >

            <i class="fas fa-plus"></i>

            Ajouter un département

        </button>

    </div>


    {{-- =========================================================
         FILTRES
    ========================================================== --}}
    <div class="bg-white rounded-2xl border border-gray-200
                shadow-sm p-5">

        <form
            method="GET"
            action="{{ route('admin.locations.departments') }}"
            class="grid grid-cols-1 md:grid-cols-3 gap-4"
        >

            {{-- Recherche --}}
            <div>

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
                        placeholder="Nom du département..."
                        class="w-full pl-11 pr-4 py-3 rounded-xl
                               border border-gray-200
                               focus:border-[#075B32]
                               focus:ring-2 focus:ring-[#075B32]/10
                               outline-none"
                    >

                </div>

            </div>


            {{-- Région --}}
            <div>

                <label class="block text-sm font-semibold
                              text-gray-700 mb-2">

                    Région

                </label>

                <select
                    name="region_id"
                    class="w-full px-4 py-3 rounded-xl
                           border border-gray-200 bg-white
                           focus:border-[#075B32]
                           focus:ring-2 focus:ring-[#075B32]/10
                           outline-none"
                >

                    <option value="">
                        Toutes les régions
                    </option>

                    @foreach($regions as $region)

                        <option
                            value="{{ $region->id }}"
                            @selected(
                                request('region_id') == $region->id
                            )
                        >
                            {{ $region->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Boutons --}}
            <div class="flex items-end gap-2">

                <button
                    type="submit"
                    class="flex-1 inline-flex items-center
                           justify-center gap-2
                           px-4 py-3 rounded-xl
                           bg-[#075B32]
                           hover:bg-[#043D23]
                           text-white font-semibold"
                >

                    <i class="fas fa-filter"></i>
                    Filtrer

                </button>


                <a
                    href="{{ route('admin.locations.departments') }}"
                    class="px-4 py-3 rounded-xl
                           bg-gray-100 hover:bg-gray-200
                           text-gray-600
                           flex items-center justify-center"
                    title="Réinitialiser"
                >

                    <i class="fas fa-rotate-left"></i>

                </a>

            </div>

        </form>

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
                        Départements
                    </p>

                    <p class="text-3xl font-bold text-[#043D23] mt-2">
                        {{ $departments->count() }}
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-[#EAF5EF] text-[#075B32]
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
                        Communes
                    </p>

                    <p class="text-3xl font-bold text-[#043D23] mt-2">
                        {{ $departments->sum('communes_count') }}
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-[#FFF8E7] text-[#B88A18]
                            flex items-center justify-center">

                    <i class="fas fa-city"></i>

                </div>

            </div>

        </div>


        <div class="bg-white rounded-2xl border border-gray-200
                    shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-gray-500">
                        Membres
                    </p>

                    <p class="text-3xl font-bold text-[#043D23] mt-2">
                        {{ $departments->sum('members_count') }}
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

        <div class="px-6 py-5 border-b border-gray-100">

            <div>

                <h2 class="font-bold text-[#043D23]">
                    Liste des départements
                </h2>

                <p class="text-xs text-gray-500 mt-1">
                    Chaque département appartient à une région
                </p>

            </div>

        </div>


        @if($departments->count())

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-[#F8FAF8]">

                        <tr>

                            <th class="px-6 py-4 text-left
                                       text-xs font-bold text-gray-500
                                       uppercase tracking-wider">

                                Département

                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-bold text-gray-500
                                       uppercase tracking-wider">

                                Région

                            </th>

                            <th class="px-6 py-4 text-left
                                       text-xs font-bold text-gray-500
                                       uppercase tracking-wider">

                                Communes

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

                        @foreach($departments as $department)

                            <tr class="hover:bg-[#FAFCFA] transition">


                                {{-- Département --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-11 h-11 rounded-xl
                                                    bg-[#EAF5EF]
                                                    text-[#075B32]
                                                    flex items-center
                                                    justify-center">

                                            <i class="fas fa-building"></i>

                                        </div>

                                        <div>

                                            <p class="font-semibold
                                                      text-gray-800">

                                                {{ $department->name }}

                                            </p>

                                            <p class="text-xs text-gray-400">

                                                ID #{{ $department->id }}

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- Région --}}
                                <td class="px-6 py-4">

                                    <span class="inline-flex items-center
                                                 gap-2 px-3 py-1.5
                                                 rounded-full
                                                 bg-[#F3FAF6]
                                                 text-[#075B32]
                                                 text-xs font-semibold">

                                        <i class="fas fa-map"></i>

                                        {{ $department->region->name ?? '-' }}

                                    </span>

                                </td>


                                {{-- Communes --}}
                                <td class="px-6 py-4">

                                    <span class="inline-flex items-center
                                                 gap-2 px-3 py-1.5
                                                 rounded-full
                                                 bg-[#FFF8E7]
                                                 text-[#9A7210]
                                                 text-xs font-semibold">

                                        <i class="fas fa-city"></i>

                                        {{ $department->communes_count ?? 0 }}

                                    </span>

                                </td>


                                {{-- Membres --}}
                                <td class="px-6 py-4">

                                    <span class="inline-flex items-center
                                                 gap-2 px-3 py-1.5
                                                 rounded-full
                                                 bg-blue-50
                                                 text-blue-700
                                                 text-xs font-semibold">

                                        <i class="fas fa-users"></i>

                                        {{ $department->members_count ?? 0 }}

                                    </span>

                                </td>


                                {{-- Actions --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center
                                                justify-end gap-2">


                                        {{-- Communes --}}
                                        <a
                                            href="{{ route(
                                                'admin.locations.communes',
                                                ['department_id' => $department->id]
                                            ) }}"
                                            title="Voir les communes"
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


                                        {{-- Modifier --}}
                                        <button
                                            type="button"
                                            onclick="editDepartment(
                                                {{ $department->id }},
                                                {{ $department->region_id }},
                                                @js($department->name)
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


                                        {{-- Supprimer --}}
                                        @if(($department->communes_count ?? 0) === 0)

                                            <form
                                                method="POST"
                                                action="{{ route(
                                                    'admin.locations.departments.destroy',
                                                    $department
                                                ) }}"
                                                onsubmit="return confirm(
                                                    'Voulez-vous vraiment supprimer ce département ?'
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
                                                           justify-center">

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
                            flex items-center justify-center">

                    <i class="fas fa-building text-3xl"></i>

                </div>

                <h3 class="mt-5 text-lg font-bold text-[#043D23]">
                    Aucun département
                </h3>

                <p class="text-sm text-gray-500 mt-2">
                    Aucun département ne correspond aux critères.
                </p>

                <button
                    type="button"
                    onclick="openDepartmentModal()"
                    class="inline-flex items-center gap-2
                           mt-6 px-5 py-3 rounded-xl
                           bg-[#075B32] text-white
                           font-semibold">

                    <i class="fas fa-plus"></i>

                    Ajouter un département

                </button>

            </div>

        @endif

    </div>

</div>


{{-- =========================================================
     MODAL
========================================================== --}}
<div
    id="departmentModal"
    class="fixed inset-0 z-50 hidden"
>

    {{-- Overlay --}}
    <div
        class="absolute inset-0 bg-black/50 backdrop-blur-sm"
        onclick="closeDepartmentModal()"
    ></div>


    <div class="relative min-h-screen flex items-center
                justify-center p-4">

        <div class="relative w-full max-w-md
                    bg-white rounded-2xl shadow-2xl
                    overflow-hidden">


            {{-- Header --}}
            <div class="px-6 py-5 border-b border-gray-100
                        flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-[#EAF5EF]
                                text-[#075B32]
                                flex items-center justify-center">

                        <i class="fas fa-building"></i>

                    </div>

                    <div>

                        <h2
                            id="departmentModalTitle"
                            class="font-bold text-[#043D23]"
                        >
                            Ajouter un département
                        </h2>

                        <p class="text-xs text-gray-500">
                            Rattacher le département à une région
                        </p>

                    </div>

                </div>


                <button
                    type="button"
                    onclick="closeDepartmentModal()"
                    class="w-9 h-9 rounded-lg bg-gray-100
                           text-gray-500
                           hover:bg-gray-200
                           flex items-center justify-center">

                    <i class="fas fa-xmark"></i>

                </button>

            </div>


            {{-- Form --}}
            <form
                id="departmentForm"
                method="POST"
                action="{{ route('admin.locations.departments.store') }}"
            >

                @csrf

                <div id="departmentMethod"></div>


                <div class="p-6 space-y-5">


                    {{-- Région --}}
                    <div>

                        <label
                            for="departmentRegion"
                            class="block text-sm font-semibold
                                   text-gray-700 mb-2"
                        >

                            Région
                            <span class="text-red-500">*</span>

                        </label>


                        <select
                            id="departmentRegion"
                            name="region_id"
                            required
                            class="w-full px-4 py-3 rounded-xl
                                   border border-gray-200
                                   bg-white
                                   focus:border-[#075B32]
                                   focus:ring-2
                                   focus:ring-[#075B32]/10
                                   outline-none"
                        >

                            <option value="">
                                Sélectionner une région
                            </option>

                            @foreach($regions as $region)

                                <option value="{{ $region->id }}">
                                    {{ $region->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Nom --}}
                    <div>

                        <label
                            for="departmentName"
                            class="block text-sm font-semibold
                                   text-gray-700 mb-2"
                        >

                            Nom du département
                            <span class="text-red-500">*</span>

                        </label>


                        <div class="relative">

                            <i class="fas fa-building absolute left-4
                                      top-1/2 -translate-y-1/2
                                      text-gray-400"></i>

                            <input
                                type="text"
                                id="departmentName"
                                name="name"
                                required
                                placeholder="Ex : Dakar"
                                class="w-full pl-11 pr-4 py-3
                                       rounded-xl
                                       border border-gray-200
                                       focus:border-[#075B32]
                                       focus:ring-2
                                       focus:ring-[#075B32]/10
                                       outline-none"
                            >

                        </div>

                    </div>

                </div>


                {{-- Footer --}}
                <div class="px-6 py-4 bg-gray-50
                            border-t border-gray-100
                            flex justify-end gap-3">

                    <button
                        type="button"
                        onclick="closeDepartmentModal()"
                        class="px-5 py-3 rounded-xl
                               bg-white border border-gray-200
                               text-gray-700 font-semibold
                               hover:bg-gray-100">

                        Annuler

                    </button>


                    <button
                        type="submit"
                        class="px-5 py-3 rounded-xl
                               bg-[#075B32]
                               hover:bg-[#043D23]
                               text-white font-semibold">

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

function openDepartmentModal() {

    const modal =
        document.getElementById('departmentModal');

    const title =
        document.getElementById('departmentModalTitle');

    const form =
        document.getElementById('departmentForm');

    const region =
        document.getElementById('departmentRegion');

    const name =
        document.getElementById('departmentName');

    const method =
        document.getElementById('departmentMethod');


    title.textContent =
        'Ajouter un département';

    form.action =
        "{{ route('admin.locations.departments.store') }}";

    method.innerHTML = '';

    region.value = '';

    name.value = '';

    modal.classList.remove('hidden');

    setTimeout(() => name.focus(), 100);
}


function editDepartment(id, regionId, nameValue) {

    const modal =
        document.getElementById('departmentModal');

    const title =
        document.getElementById('departmentModalTitle');

    const form =
        document.getElementById('departmentForm');

    const region =
        document.getElementById('departmentRegion');

    const name =
        document.getElementById('departmentName');

    const method =
        document.getElementById('departmentMethod');


    title.textContent =
        'Modifier le département';

    form.action =
        "{{ url('/admin/locations/departments') }}/" + id;

    method.innerHTML =
        '<input type="hidden" name="_method" value="PUT">';

    region.value = regionId;

    name.value = nameValue;

    modal.classList.remove('hidden');

    setTimeout(() => name.focus(), 100);
}


function closeDepartmentModal() {

    document
        .getElementById('departmentModal')
        .classList.add('hidden');

}


document.addEventListener('keydown', function(event) {

    if (event.key === 'Escape') {
        closeDepartmentModal();
    }

});

</script>

@endpush