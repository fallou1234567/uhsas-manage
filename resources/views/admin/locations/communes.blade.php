@extends('layouts.app')

@section('title', 'Communes')
@section('page-title', 'Gestion des communes')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <p class="text-sm text-gray-500 mt-1">
                Gérez les communes rattachées aux départements du Sénégal.
            </p>
        </div>

        <button
            onclick="openCommuneModal()"
            class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl
                   bg-[#075B32] text-white font-semibold hover:bg-[#043D23]
                   transition shadow-sm">
            <i class="fas fa-plus"></i>
            Ajouter une commune
        </button>
    </div>

    {{-- Statistiques --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total communes</p>
                    <h3 class="text-2xl font-bold text-[#043D23] mt-1">
                        {{ $communes->count() }}
                    </h3>
                </div>

                <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                    <i class="fas fa-city text-[#075B32] text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Membres enregistrés</p>
                    <h3 class="text-2xl font-bold text-[#043D23] mt-1">
                        {{ $communes->sum('members_count') }}
                    </h3>
                </div>

                <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center">
                    <i class="fas fa-users text-[#D6A52E] text-xl"></i>
                </div>
            </div>
        </div>

    </div>

    {{-- Filtres --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">

        <form method="GET" action="{{ route('admin.locations.communes') }}">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                {{-- Recherche --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Rechercher
                    </label>

                    <div class="relative">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Nom de la commune..."
                            class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl
                                   focus:ring-2 focus:ring-[#075B32] focus:border-[#075B32] outline-none">
                    </div>
                </div>

                {{-- Région --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Région
                    </label>

                    <select
                        name="region_id"
                        onchange="this.form.submit()"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl
                               focus:ring-2 focus:ring-[#075B32] focus:border-[#075B32] outline-none">

                        <option value="">Toutes les régions</option>

                        @foreach($regions as $region)
                            <option
                                value="{{ $region->id }}"
                                {{ request('region_id') == $region->id ? 'selected' : '' }}>
                                {{ $region->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- Département --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Département
                    </label>

                    <select
                        name="department_id"
                        onchange="this.form.submit()"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl
                               focus:ring-2 focus:ring-[#075B32] focus:border-[#075B32] outline-none">

                        <option value="">Tous les départements</option>

                        @foreach($departments as $department)
                            <option
                                value="{{ $department->id }}"
                                data-region="{{ $department->region_id }}"
                                {{ request('department_id') == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

            </div>

            @if(request()->hasAny(['search', 'region_id', 'department_id']))
                <div class="mt-4">
                    <a
                        href="{{ route('admin.locations.communes') }}"
                        class="inline-flex items-center gap-2 text-sm text-[#075B32] font-medium hover:underline">
                        <i class="fas fa-times"></i>
                        Réinitialiser les filtres
                    </a>
                </div>
            @endif

        </form>
    </div>

    {{-- Tableau --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-6 py-5 border-b border-gray-100">
            <h3 class="font-bold text-[#043D23]">
                Liste des communes
            </h3>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                            Commune
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                            Département
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">
                            Région
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-semibold text-gray-500 uppercase">
                            Membres
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse($communes as $commune)

                        <tr class="hover:bg-gray-50 transition">

                            {{-- Commune --}}
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-xl bg-green-50
                                                flex items-center justify-center">
                                        <i class="fas fa-city text-[#075B32]"></i>
                                    </div>

                                    <div>
                                        <p class="font-semibold text-gray-800">
                                            {{ $commune->name }}
                                        </p>
                                    </div>

                                </div>
                            </td>

                            {{-- Département --}}
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-700">
                                    {{ $commune->department?->name ?? '—' }}
                                </span>
                            </td>

                            {{-- Région --}}
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-2 px-3 py-1.5
                                             rounded-lg bg-gray-100 text-sm text-gray-700">

                                    <i class="fas fa-map-marker-alt text-[#D6A52E]"></i>

                                    {{ $commune->department?->region?->name ?? '—' }}

                                </span>
                            </td>

                            {{-- Membres --}}
                            <td class="px-6 py-4 text-center">

                                <span class="inline-flex items-center justify-center
                                             min-w-[40px] px-3 py-1.5 rounded-lg
                                             bg-green-50 text-[#075B32] font-semibold">
                                    {{ $commune->members_count }}
                                </span>

                            </td>

                            {{-- Actions --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center justify-end gap-2">

                                    {{-- Modifier --}}
                                    <button
                                        type="button"
                                        onclick='editCommune(@json($commune))'
                                        class="w-9 h-9 rounded-lg bg-gray-100 text-gray-600
                                               hover:bg-[#075B32] hover:text-white transition"
                                        title="Modifier">

                                        <i class="fas fa-edit"></i>

                                    </button>

                                    {{-- Supprimer --}}
                                    @if($commune->members_count == 0)

                                        <form
                                            action="{{ route('admin.locations.communes.destroy', $commune) }}"
                                            method="POST"
                                            onsubmit="return confirm('Voulez-vous vraiment supprimer cette commune ?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="w-9 h-9 rounded-lg bg-red-50 text-red-500
                                                       hover:bg-red-500 hover:text-white transition"
                                                title="Supprimer">

                                                <i class="fas fa-trash"></i>

                                            </button>

                                        </form>

                                    @else

                                        <span
                                            class="w-9 h-9 rounded-lg bg-gray-100 text-gray-400
                                                   flex items-center justify-center cursor-not-allowed"
                                            title="Impossible de supprimer : des membres sont associés">

                                            <i class="fas fa-lock text-xs"></i>

                                        </span>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="w-16 h-16 rounded-2xl bg-gray-100
                                                flex items-center justify-center mb-4">
                                        <i class="fas fa-city text-gray-400 text-2xl"></i>
                                    </div>

                                    <h3 class="font-semibold text-gray-700">
                                        Aucune commune trouvée
                                    </h3>

                                    <p class="text-sm text-gray-400 mt-1">
                                        Ajoutez une commune ou modifiez vos filtres.
                                    </p>

                                </div>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- MODAL AJOUT / MODIFICATION --}}
{{-- ========================================================= --}}

<div
    id="communeModal"
    class="fixed inset-0 z-[100] hidden">

    {{-- Overlay --}}
    <div
        class="absolute inset-0 bg-black/50 backdrop-blur-sm"
        onclick="closeCommuneModal()">
    </div>

    {{-- Modal --}}
    <div class="relative min-h-screen flex items-center justify-center p-4">

        <div
            class="bg-white w-full max-w-lg rounded-2xl shadow-2xl overflow-hidden">

            {{-- Header --}}
            <div class="px-6 py-5 bg-[#043D23] text-white flex items-center justify-between">

                <div>
                    <h3 id="communeModalTitle" class="font-bold text-lg">
                        Ajouter une commune
                    </h3>

                    <p class="text-white/70 text-sm mt-1">
                        Renseignez les informations de la commune.
                    </p>
                </div>

                <button
                    type="button"
                    onclick="closeCommuneModal()"
                    class="w-9 h-9 rounded-lg bg-white/10 hover:bg-white/20 transition">

                    <i class="fas fa-times"></i>

                </button>

            </div>

            {{-- Form --}}
            <form
                id="communeForm"
                method="POST"
                action="{{ route('admin.locations.communes.store') }}"
                class="p-6 space-y-5">

                @csrf

                <div id="communeMethod"></div>

                {{-- Région --}}
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Région <span class="text-red-500">*</span>
                    </label>

                    <select
                        id="modalRegionId"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl
                               focus:ring-2 focus:ring-[#075B32]
                               focus:border-[#075B32] outline-none">

                        <option value="">Sélectionner une région</option>

                        @foreach($regions as $region)

                            <option value="{{ $region->id }}">
                                {{ $region->name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Département --}}
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Département <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="department_id"
                        id="modalDepartmentId"
                        required
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl
                               focus:ring-2 focus:ring-[#075B32]
                               focus:border-[#075B32] outline-none">

                        <option value="">Sélectionner un département</option>

                        @foreach($departments as $department)

                            <option
                                value="{{ $department->id }}"
                                data-region="{{ $department->region_id }}">

                                {{ $department->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Commune --}}
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nom de la commune <span class="text-red-500">*</span>
                    </label>

                    <div class="relative">

                        <i class="fas fa-city absolute left-4 top-1/2
                                  -translate-y-1/2 text-gray-400"></i>

                        <input
                            type="text"
                            name="name"
                            id="communeName"
                            required
                            placeholder="Ex : Parcelles Assainies"
                            class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl
                                   focus:ring-2 focus:ring-[#075B32]
                                   focus:border-[#075B32] outline-none">

                    </div>

                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-end gap-3 pt-3">

                    <button
                        type="button"
                        onclick="closeCommuneModal()"
                        class="px-5 py-3 rounded-xl border border-gray-200
                               text-gray-600 font-medium hover:bg-gray-50 transition">

                        Annuler

                    </button>

                    <button
                        type="submit"
                        class="px-5 py-3 rounded-xl bg-[#075B32] text-white
                               font-semibold hover:bg-[#043D23] transition">

                        <i class="fas fa-save mr-2"></i>
                        Enregistrer

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


@push('scripts')

<script>

    const communeModal = document.getElementById('communeModal');
    const communeForm = document.getElementById('communeForm');
    const communeMethod = document.getElementById('communeMethod');
    const communeModalTitle = document.getElementById('communeModalTitle');

    const modalRegion = document.getElementById('modalRegionId');
    const modalDepartment = document.getElementById('modalDepartmentId');
    const communeName = document.getElementById('communeName');


    /**
     * Filtrer les départements selon la région
     */
    function filterModalDepartments(selectedDepartment = null) {

        const regionId = modalRegion.value;

        let firstVisible = false;

        Array.from(modalDepartment.options).forEach(option => {

            if (!option.value) {
                option.hidden = false;
                return;
            }

            const matchesRegion =
                !regionId || option.dataset.region == regionId;

            option.hidden = !matchesRegion;

            if (matchesRegion && !firstVisible) {
                firstVisible = true;
            }

        });

        if (
            selectedDepartment &&
            Array.from(modalDepartment.options)
                .some(option =>
                    option.value == selectedDepartment &&
                    !option.hidden
                )
        ) {
            modalDepartment.value = selectedDepartment;
        } else if (
            modalDepartment.selectedOptions[0]?.hidden
        ) {
            modalDepartment.value = '';
        }
    }


    modalRegion.addEventListener('change', function () {

        filterModalDepartments();

        modalDepartment.value = '';

    });


    /**
     * Ouvrir modal ajout
     */
    function openCommuneModal() {

        communeModal.classList.remove('hidden');

        communeModalTitle.textContent = 'Ajouter une commune';

        communeForm.action =
            "{{ route('admin.locations.communes.store') }}";

        communeMethod.innerHTML = '';

        communeForm.reset();

        filterModalDepartments();

        document.body.classList.add('overflow-hidden');

        setTimeout(() => {
            communeName.focus();
        }, 100);

    }


    /**
     * Ouvrir modal modification
     */
    function editCommune(commune) {

        communeModal.classList.remove('hidden');

        communeModalTitle.textContent = 'Modifier la commune';

        communeForm.action =
            "{{ url('admin/locations/communes') }}/" + commune.id;

        communeMethod.innerHTML =
            '@method("PUT")';

        communeName.value = commune.name;

        const departmentId = commune.department_id;

        const departmentOption =
            Array.from(modalDepartment.options)
                .find(option => option.value == departmentId);

        if (departmentOption) {

            modalRegion.value =
                departmentOption.dataset.region;

        }

        filterModalDepartments(departmentId);

        modalDepartment.value = departmentId;

        document.body.classList.add('overflow-hidden');

        setTimeout(() => {
            communeName.focus();
        }, 100);

    }


    /**
     * Fermer modal
     */
    function closeCommuneModal() {

        communeModal.classList.add('hidden');

        document.body.classList.remove('overflow-hidden');

        communeForm.reset();

        communeMethod.innerHTML = '';

        filterModalDepartments();

    }


    /**
     * Fermer avec ESC
     */
    document.addEventListener('keydown', function(event) {

        if (
            event.key === 'Escape' &&
            !communeModal.classList.contains('hidden')
        ) {
            closeCommuneModal();
        }

    });

</script>

@endpush

@endsection