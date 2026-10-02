<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscription UHSAS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100">

    <div class="max-w-2xl mx-auto px-4 py-8">

        <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

            {{-- Header --}}
            <div class="bg-green-800 text-white px-6 py-8 text-center">

                <img src="{{ asset('asset/images/logo-uhsas.jpeg') }}" alt="Logo UHSAS"
                    class="mx-auto h-20 w-auto object-contain mb-4">

                <div class="text-3xl font-bold">
                    UHSAS
                </div>

                <p class="mt-2 text-green-100">
                    Inscription membre
                </p>

                <p class="mt-4 text-sm text-green-100">
                    Remplissez simplement ce formulaire
                    pour demander votre carte de membre.
                </p>

            </div>

            <form method="POST" action="{{ route('registration.store') }}" enctype="multipart/form-data"
                class="p-6 space-y-8">

                @csrf

                {{-- Informations personnelles --}}
                <section>

                    <h2 class="text-lg font-semibold text-gray-900">
                        1. Informations personnelles
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">

                        <div>
                            <label class="block text-sm font-medium">
                                Prénom *
                            </label>

                            <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                class="mt-2 w-full rounded-lg border-gray-300">

                            @error('first_name')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium">
                                Nom *
                            </label>

                            <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                class="mt-2 w-full rounded-lg border-gray-300">

                            @error('last_name')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">

                        <div>
                            <label class="block text-sm font-medium">
                                Téléphone *
                            </label>

                            <input type="tel" name="phone" value="{{ old('phone') }}" required
                                placeholder="77 000 00 00" class="mt-2 w-full rounded-lg border-gray-300">
                        </div>

                        <div>
                            <label class="block text-sm font-medium">
                                Email
                            </label>

                            <input type="email" name="email" value="{{ old('email') }}"
                                class="mt-2 w-full rounded-lg border-gray-300">
                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">

                        <div>
                            <label class="block text-sm font-medium">
                                Date de naissance
                            </label>

                            <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                                class="mt-2 w-full rounded-lg border-gray-300">
                        </div>

                        <div>
                            <label class="block text-sm font-medium">
                                Sexe
                            </label>

                            <select name="gender" class="mt-2 w-full rounded-lg border-gray-300">
                                <option value="">
                                    Sélectionner
                                </option>

                                <option value="male">
                                    Homme
                                </option>

                                <option value="female">
                                    Femme
                                </option>

                                <option value="other">
                                    Autre
                                </option>
                            </select>
                        </div>

                    </div>

                </section>

                {{-- Photo --}}
                <section>

                    <h2 class="text-lg font-semibold text-gray-900">
                        2. Photo
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Une photo claire du visage est recommandée
                        pour la carte.
                    </p>

                    <input type="file" name="photo" accept="image/*" capture="user"
                        class="mt-4 block w-full text-sm">

                </section>

                {{-- Activité --}}
                <section>

                    <h2 class="text-lg font-semibold text-gray-900">
                        3. Activité professionnelle
                    </h2>

                    <div class="mt-5">

                        <label class="block text-sm font-medium">
                            Profession / Métier *
                        </label>

                        <select name="profession_id" required class="mt-2 w-full rounded-lg border-gray-300">

                            <option value="">
                                Sélectionner votre métier
                            </option>

                            @foreach ($professions as $profession)
                                <option value="{{ $profession->id }}" @selected(old('profession_id') == $profession->id)>
                                    {{ $profession->name }}
                                </option>
                            @endforeach

                        </select>

                    </div>

                </section>

                {{-- Localisation --}}
                <section>

                    <h2 class="text-lg font-semibold text-gray-900">
                        4. Localisation
                    </h2>

                    <div class="space-y-5 mt-5">

                        <div>

                            <label class="block text-sm font-medium">
                                Région *
                            </label>

                            <select id="region_id" name="region_id" required
                                class="mt-2 w-full rounded-lg border-gray-300">

                                <option value="">
                                    Sélectionner une région
                                </option>

                                @foreach ($regions as $region)
                                    <option value="{{ $region->id }}">
                                        {{ $region->name }}
                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div>

                            <label class="block text-sm font-medium">
                                Département *
                            </label>

                            <select id="department_id" name="department_id" required disabled
                                class="mt-2 w-full rounded-lg border-gray-300">

                                <option value="">
                                    Sélectionner d'abord la région
                                </option>

                            </select>

                        </div>

                        <div>

                            <label class="block text-sm font-medium">
                                Commune
                            </label>

                            <select id="commune_id" name="commune_id" disabled
                                class="mt-2 w-full rounded-lg border-gray-300">

                                <option value="">
                                    Sélectionner d'abord le département
                                </option>

                            </select>

                        </div>

                        <div>

                            <label class="block text-sm font-medium">
                                Adresse / Localité
                            </label>

                            <textarea name="address" rows="3" class="mt-2 w-full rounded-lg border-gray-300">{{ old('address') }}</textarea>

                        </div>

                    </div>

                </section>

                {{-- Confirmation --}}
                <section>

                    <label class="flex items-start gap-3">

                        <input type="checkbox" name="terms" value="1" required
                            class="mt-1 rounded border-gray-300">

                        <span class="text-sm text-gray-600">
                            Je confirme que les informations fournies
                            sont exactes.
                        </span>

                    </label>

                    @error('terms')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </section>

                <button type="submit"
                    class="w-full rounded-xl bg-green-800
                           px-6 py-4 text-white font-semibold
                           hover:bg-green-900 transition">
                    Envoyer mon inscription
                </button>

            </form>

        </div>

    </div>

</body>

</html>
