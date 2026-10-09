@extends('layouts.app')

@section('title', 'Nouveau membre')
@section('page-title', 'Ajouter un membre')

@section('content')

<div class="max-w-6xl mx-auto">

    {{-- En-tête --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

        <div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.members.index') }}"
                   class="w-10 h-10 rounded-xl bg-white border border-gray-200
                          flex items-center justify-center text-gray-500
                          hover:text-[#075B32] hover:border-[#075B32] transition">
                    <i class="fas fa-arrow-left"></i>
                </a>

                <div>
                    <h1 class="text-2xl font-bold text-[#043D23]">
                        Nouveau membre
                    </h1>
                    <p class="text-sm text-gray-500 mt-1">
                        Enregistrer manuellement un membre UHSAS
                    </p>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-2 text-sm text-gray-500">
            <i class="fas fa-user-plus text-[#D6A52E]"></i>
            <span>Inscription administrative</span>
        </div>

    </div>


    {{-- Erreurs --}}
    @if ($errors->any())
        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5">
            <div class="flex items-start gap-3">
                <div class="w-9 h-9 rounded-full bg-red-100 text-red-600
                            flex items-center justify-center shrink-0">
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


    <form action="{{ route('admin.members.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- =========================
                 COLONNE PRINCIPALE
            ========================== --}}
            <div class="lg:col-span-2 space-y-6">

                {{-- Identité --}}
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-[#EAF5EF]
                                        text-[#075B32] flex items-center justify-center">
                                <i class="fas fa-user"></i>
                            </div>

                            <div>
                                <h2 class="font-bold text-[#043D23]">
                                    Informations personnelles
                                </h2>
                                <p class="text-xs text-gray-500 mt-1">
                                    Informations principales du membre
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- Nom complet --}}
                        <div class="md:col-span-2">
                            <label for="full_name"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Nom complet
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <i class="fas fa-user absolute left-4 top-1/2
                                          -translate-y-1/2 text-gray-400"></i>

                                <input
                                    type="text"
                                    id="full_name"
                                    name="full_name"
                                    value="{{ old('full_name') }}"
                                    required
                                    placeholder="Ex : Mamadou Diop"
                                    class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200
                                           focus:border-[#075B32] focus:ring-2 focus:ring-[#075B32]/10
                                           outline-none transition"
                                >
                            </div>
                        </div>


                        {{-- Téléphone --}}
                        <div>
                            <label for="phone"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Numéro de téléphone
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <i class="fas fa-phone absolute left-4 top-1/2
                                          -translate-y-1/2 text-gray-400"></i>

                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    required
                                    placeholder="77 000 00 00"
                                    class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200
                                           focus:border-[#075B32] focus:ring-2 focus:ring-[#075B32]/10
                                           outline-none transition"
                                >
                            </div>
                        </div>


                        {{-- Profession --}}
                        <div>
                            <label for="profession_id"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Profession
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <i class="fas fa-hard-hat absolute left-4 top-1/2
                                          -translate-y-1/2 text-gray-400 z-10"></i>

                                <select
                                    id="profession_id"
                                    name="profession_id"
                                    required
                                    class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200
                                           bg-white focus:border-[#075B32]
                                           focus:ring-2 focus:ring-[#075B32]/10
                                           outline-none transition appearance-none">

                                    <option value="">Sélectionner une profession</option>

                                    @foreach ($professions as $profession)
                                        <option value="{{ $profession->id }}"
                                            @selected(old('profession_id') == $profession->id)>
                                            {{ $profession->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        {{-- Adresse --}}
                        <div class="md:col-span-2">
                            <label for="address"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Adresse
                            </label>

                            <div class="relative">
                                <i class="fas fa-location-dot absolute left-4 top-4
                                          text-gray-400"></i>

                                <textarea
                                    id="address"
                                    name="address"
                                    rows="3"
                                    placeholder="Adresse ou quartier du membre"
                                    class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200
                                           focus:border-[#075B32] focus:ring-2 focus:ring-[#075B32]/10
                                           outline-none transition resize-none"
                                >{{ old('address') }}</textarea>
                            </div>
                        </div>

                    </div>
                </div>


                {{-- Localisation --}}
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100">
                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-[#FFF8E7]
                                        text-[#B88A18] flex items-center justify-center">
                                <i class="fas fa-map-location-dot"></i>
                            </div>

                            <div>
                                <h2 class="font-bold text-[#043D23]">
                                    Localisation
                                </h2>

                                <p class="text-xs text-gray-500 mt-1">
                                    Région, département et commune
                                </p>
                            </div>

                        </div>
                    </div>


                    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-5">

                        {{-- Région --}}
                        <div>
                            <label for="region_id"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Région
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                id="region_id"
                                name="region_id"
                                required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200
                                       bg-white focus:border-[#075B32]
                                       focus:ring-2 focus:ring-[#075B32]/10
                                       outline-none transition">

                                <option value="">Choisir</option>

                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}"
                                        @selected(old('region_id') == $region->id)>
                                        {{ $region->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>


                        {{-- Département --}}
                        <div>
                            <label for="department_id"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Département
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                id="department_id"
                                name="department_id"
                                required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200
                                       bg-white focus:border-[#075B32]
                                       focus:ring-2 focus:ring-[#075B32]/10
                                       outline-none transition">

                                <option value="">Choisir</option>

                                @foreach ($departments as $department)
                                    <option
                                        value="{{ $department->id }}"
                                        data-region="{{ $department->region_id }}"
                                        @selected(old('department_id') == $department->id)
                                    >
                                        {{ $department->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>


                        {{-- Commune --}}
                        {{-- <div>
                            <label for="commune_id"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Commune
                                <span class="text-red-500">*</span>
                            </label>

                            <select
                                id="commune_id"
                                name="commune_id"
                                required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200
                                       bg-white focus:border-[#075B32]
                                       focus:ring-2 focus:ring-[#075B32]/10
                                       outline-none transition">

                                <option value="">Choisir</option>

                                @foreach ($communes as $commune)
                                    <option
                                        value="{{ $commune->id }}"
                                        data-department="{{ $commune->department_id }}"
                                        @selected(old('commune_id') == $commune->id)
                                    >
                                        {{ $commune->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div> --}}

                    </div>
                </div>


                {{-- Statut --}}
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-[#EAF5EF]
                                        text-[#075B32] flex items-center justify-center">
                                <i class="fas fa-shield-halved"></i>
                            </div>

                            <div>
                                <h2 class="font-bold text-[#043D23]">
                                    Statut du membre
                                </h2>

                                <p class="text-xs text-gray-500 mt-1">
                                    Définir l'état initial de l'adhésion
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="p-6">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            {{-- En attente --}}
                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    name="status"
                                    value="pending"
                                    class="peer sr-only"
                                    @checked(old('status', 'pending') === 'pending')
                                >

                                <div class="rounded-2xl border-2 border-gray-200 p-4
                                            peer-checked:border-[#D6A52E]
                                            peer-checked:bg-[#FFFDF5]
                                            transition">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-xl bg-yellow-50
                                                    text-yellow-600 flex items-center justify-center">
                                            <i class="fas fa-clock"></i>
                                        </div>

                                        <div>
                                            <p class="font-semibold text-gray-800">
                                                En attente
                                            </p>
                                            <p class="text-xs text-gray-500">
                                                Le membre devra être activé
                                            </p>
                                        </div>

                                    </div>

                                </div>
                            </label>


                            {{-- Actif --}}
                            <label class="cursor-pointer">
                                <input
                                    type="radio"
                                    name="status"
                                    value="active"
                                    class="peer sr-only"
                                    @checked(old('status') === 'active')
                                >

                                <div class="rounded-2xl border-2 border-gray-200 p-4
                                            peer-checked:border-[#075B32]
                                            peer-checked:bg-[#F3FAF6]
                                            transition">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-xl bg-[#EAF5EF]
                                                    text-[#075B32] flex items-center justify-center">
                                            <i class="fas fa-circle-check"></i>
                                        </div>

                                        <div>
                                            <p class="font-semibold text-gray-800">
                                                Actif
                                            </p>
                                            <p class="text-xs text-gray-500">
                                                Activation immédiate
                                            </p>
                                        </div>

                                    </div>

                                </div>
                            </label>

                        </div>

                    </div>
                </div>

            </div>


            {{-- =========================
                 SIDEBAR
            ========================== --}}
            <div class="space-y-6">

                {{-- Photo --}}
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

                    <div class="px-6 py-5 border-b border-gray-100">
                        <h2 class="font-bold text-[#043D23]">
                            Photo du membre
                        </h2>

                        <p class="text-xs text-gray-500 mt-1">
                            Photo utilisée sur la carte UHSAS
                        </p>
                    </div>

                    <div class="p-6">

                        <div class="flex flex-col items-center">

                            <div id="photoPreview"
                                 class="w-36 h-36 rounded-full overflow-hidden
                                        border-4 border-[#EAF5EF] bg-[#F4F7F3]
                                        flex items-center justify-center mb-5">

                                <div id="photoPlaceholder"
                                     class="text-center text-gray-400">

                                    <i class="fas fa-camera text-3xl mb-2"></i>

                                    <p class="text-xs">
                                        Aucune photo
                                    </p>

                                </div>

                                <img id="previewImage"
                                     src=""
                                     alt="Prévisualisation"
                                     class="hidden w-full h-full object-cover">
                            </div>


                            <label for="photo"
                                   class="w-full cursor-pointer">

                                <div class="w-full rounded-xl border-2 border-dashed
                                            border-gray-200 px-4 py-4 text-center
                                            hover:border-[#075B32]
                                            hover:bg-[#F8FCF9] transition">

                                    <i class="fas fa-cloud-arrow-up
                                              text-[#075B32] text-xl mb-2"></i>

                                    <p class="text-sm font-semibold text-gray-700">
                                        Sélectionner une photo
                                    </p>

                                    <p class="text-xs text-gray-400 mt-1">
                                        JPG, JPEG ou PNG — max. 2 Mo
                                    </p>

                                </div>

                                <input
                                    type="file"
                                    id="photo"
                                    name="photo"
                                    accept="image/jpeg,image/png,image/jpg"
                                    class="hidden"
                                >

                            </label>

                        </div>

                    </div>
                </div>


                {{-- Information carte --}}
                <div class="rounded-2xl bg-gradient-to-br from-[#043D23] to-[#075B32]
                            text-white p-6 shadow-lg">

                    <div class="flex items-center gap-3 mb-4">

                        <div class="w-10 h-10 rounded-xl bg-white/10
                                    flex items-center justify-center">
                            <i class="fas fa-id-card text-[#F0C85A]"></i>
                        </div>

                        <div>
                            <h3 class="font-bold">
                                Carte UHSAS
                            </h3>

                            <p class="text-xs text-white/60">
                                Génération automatique
                            </p>
                        </div>

                    </div>

                    <p class="text-sm text-white/75 leading-6">
                        Après l'enregistrement, le membre recevra un
                        numéro d'adhérent unique. Sa carte pourra ensuite
                        être générée au format PDF avec son QR Code.
                    </p>

                    <div class="mt-5 pt-5 border-t border-white/10">

                        <div class="flex items-center justify-between text-sm">
                            <span class="text-white/60">
                                Durée de validité
                            </span>

                            <span class="font-bold text-[#F0C85A]">
                                5 ans
                            </span>
                        </div>

                    </div>

                </div>


                {{-- Actions --}}
                <div class="bg-white rounded-2xl border border-gray-200
                            shadow-sm p-5">

                    <button
                        type="submit"
                        class="w-full flex items-center justify-center gap-2
                               bg-[#075B32] hover:bg-[#043D23]
                               text-white font-semibold py-3.5 px-5
                               rounded-xl transition shadow-sm">

                        <i class="fas fa-user-plus"></i>
                        Enregistrer le membre

                    </button>


                    <a href="{{ route('admin.members.index') }}"
                       class="mt-3 w-full flex items-center justify-center gap-2
                              bg-gray-100 hover:bg-gray-200
                              text-gray-700 font-semibold py-3.5 px-5
                              rounded-xl transition">

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

document.addEventListener('DOMContentLoaded', function () {

    const regionSelect = document.getElementById('region_id');
    const departmentSelect = document.getElementById('department_id');
    const communeSelect = document.getElementById('commune_id');

    const oldDepartment = "{{ old('department_id') }}";
    const oldCommune = "{{ old('commune_id') }}";


    /*
    |--------------------------------------------------------------------------
    | Région → Département
    |--------------------------------------------------------------------------
    */

    function filterDepartments() {

        const regionId = regionSelect.value;

        Array.from(departmentSelect.options).forEach(option => {

            if (!option.value) {
                option.hidden = false;
                return;
            }

            const matches = option.dataset.region === regionId;

            option.hidden = !matches;

        });

        if (
            departmentSelect.value &&
            departmentSelect.options[departmentSelect.selectedIndex]?.hidden
        ) {
            departmentSelect.value = '';
        }

        filterCommunes();
    }


    /*
    |--------------------------------------------------------------------------
    | Département → Commune
    |--------------------------------------------------------------------------
    */

    function filterCommunes() {

        const departmentId = departmentSelect.value;

        Array.from(communeSelect.options).forEach(option => {

            if (!option.value) {
                option.hidden = false;
                return;
            }

            const matches = option.dataset.department === departmentId;

            option.hidden = !matches;

        });

        if (
            communeSelect.value &&
            communeSelect.options[communeSelect.selectedIndex]?.hidden
        ) {
            communeSelect.value = '';
        }
    }


    regionSelect.addEventListener('change', filterDepartments);
    departmentSelect.addEventListener('change', filterCommunes);


    /*
    |--------------------------------------------------------------------------
    | Initialisation avec anciennes valeurs
    |--------------------------------------------------------------------------
    */

    if (regionSelect.value) {
        filterDepartments();

        if (oldDepartment) {
            departmentSelect.value = oldDepartment;
        }

        filterCommunes();

        if (oldCommune) {
            communeSelect.value = oldCommune;
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Prévisualisation photo
    |--------------------------------------------------------------------------
    */

    const photoInput = document.getElementById('photo');
    const previewImage = document.getElementById('previewImage');
    const photoPlaceholder = document.getElementById('photoPlaceholder');


    photoInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            previewImage.src = '';
            previewImage.classList.add('hidden');
            photoPlaceholder.classList.remove('hidden');
            return;
        }

        if (!file.type.startsWith('image/')) {
            alert('Veuillez sélectionner une image.');
            this.value = '';
            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {

            previewImage.src = event.target.result;

            previewImage.classList.remove('hidden');
            photoPlaceholder.classList.add('hidden');

        };

        reader.readAsDataURL(file);

    });

});

</script>
@endpush