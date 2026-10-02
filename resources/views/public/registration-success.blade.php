<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Inscription réussie - UHSAS</title>

    @vite(['resources/css/app.css'])

</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <div class="w-full max-w-md">

        <div class="bg-white rounded-2xl shadow-sm p-8 text-center">

            <div class="mx-auto w-16 h-16 rounded-full
                        bg-green-100 flex items-center justify-center">

                <span class="text-3xl">
                    ✓
                </span>

            </div>

            <h1 class="mt-6 text-2xl font-bold">
                Inscription enregistrée
            </h1>

            <p class="mt-3 text-gray-600">
                Merci {{ $member->first_name }}.
                Votre demande d'inscription UHSAS
                a bien été enregistrée.
            </p>

            <div class="mt-6 rounded-xl bg-gray-50 p-5">

                <p class="text-sm text-gray-500">
                    Votre numéro de membre
                </p>

                <p class="mt-2 text-2xl font-bold text-green-800">
                    {{ $member->member_number }}
                </p>

            </div>

            <div class="mt-6 text-sm text-gray-600">

                <p>
                    Statut :
                    <strong>En attente de validation</strong>
                </p>

                <p class="mt-2">
                    Une fois votre inscription validée,
                    votre carte de membre pourra être générée.
                </p>

            </div>

        </div>

    </div>

</body>

</html>