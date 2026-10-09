<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="theme-color" content="#176b3a">

    <title>Carte de membre UHSAS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: #f4f6f3;
            font-family: Arial, Helvetica, sans-serif;
            color: #29332d;
        }

        .page {
            width: min(100% - 24px, 560px);
            margin: 0 auto;
            padding: 24px 0 40px;
        }

        .panel {
            overflow: hidden;
            border: 3px solid #dfa735;
            border-radius: 20px;
            background: #fff;
            box-shadow: 0 12px 35px #00000012;
        }

        .top {
            padding: 24px 18px;
            text-align: center;
            background: #faf9f3;
            border-bottom: 1px solid #e7d7ac;
        }

        .logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin: 0 auto 12px;
        }

        .title {
            margin: 0;
            font-size: 23px;
            font-weight: 800;
            color: #176b3a;
        }

        .subtitle {
            margin: 8px 0 0;
            color: #68716b;
            font-size: 14px;
        }

        .content {
            padding: 22px 18px;
        }

        .member-photo {
            display: block;
            width: 110px;
            height: 125px;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 2px solid #dfa735;
            border-radius: 12px;
            background: #f3f4f3;
        }

        .details {
            display: grid;
            gap: 0;
        }

        .detail {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 14px;
            padding: 12px 0;
            border-bottom: 1px solid #edf0ed;
            font-size: 14px;
        }

        .label {
            color: #68716b;
            flex-shrink: 0;
        }

        .value {
            text-align: right;
            overflow-wrap: anywhere;
            font-weight: 700;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            background: #fff2d8;
            color: #885d05;
            font-size: 12px;
        }

        .status.active {
            background: #dcfce7;
            color: #166534;
        }

        .status.suspended,
        .status.expired {
            background: #fee2e2;
            color: #991b1b;
        }

        .qr-section {
            padding: 20px 12px;
            text-align: center;
            background: #faf9f3;
        }

        .qr-section img {
            display: block;
            width: 150px;
            height: 150px;
            margin: 12px auto;
        }

        .qr-caption {
            color: #68716b;
            font-size: 12px;
        }

        .footer {
            padding: 17px 10px;
            background: #111714;
            color: white;
            text-align: center;
            font-size: 12px;
            font-weight: 700;
        }
    </style>
</head>

<body>
    @php
        $statusLabels = [
            'pending' => 'En attente de validation',
            'active' => 'Membre actif',
            'late' => 'Cotisation en retard',
            'expired' => 'Adhésion expirée',
            'suspended' => 'Membre suspendu',
        ];

        $statusLabel = $statusLabels[$member->status] ?? 'Statut inconnu';

        $statusClass = in_array($member->status, ['active', 'suspended', 'expired'], true) ? $member->status : '';
    @endphp

    <main class="page">
        <section class="panel">
            <header class="top">
                <img src="{{ asset('asset/images/logo-uhsas.jpeg') }}" alt="Logo UHSAS" class="logo">

                <h1 class="title">Carte de membre UHSAS</h1>

                <p class="subtitle">
                    Vérification publique de l'adhésion
                </p>
            </header>

            <div class="content">
                @if ($member->photo)
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($member->photo) }}" alt="Photo du membre"
                        class="member-photo">
                @endif

                <div class="details">
                    <div class="detail">
                        <span class="label">N° de membre</span>
                        <span class="value">{{ $member->member_number }}</span>
                    </div>

                    <div class="detail">
                        <span class="label">Nom complet</span>
                        <span class="value">{{ $member->full_name }}</span>
                    </div>

                    <div class="detail">
                        <span class="label">Téléphone</span>
                        <span class="value">{{ $member->phone }}</span>
                    </div>

                    <div class="detail">
                        <span class="label">Profession</span>
                        <span class="value">
                            {{ $member->profession?->name ?? 'Non renseignée' }}
                        </span>
                    </div>

                    <div class="detail">
                        <span class="label">Région</span>
                        <span class="value">
                            {{ $member->region?->name ?? 'Non renseignée' }}
                        </span>
                    </div>

                    <div class="detail">
                        <span class="label">Département</span>
                        <span class="value">
                            {{ $member->department?->name ?? 'Non renseigné' }}
                        </span>
                    </div>

                    @if ($member->commune)
                        <div class="detail">
                            <span class="label">Commune d'arrondissement</span>
                            <span class="value">{{ $member->commune->name }}</span>
                        </div>
                    @endif

                    <div class="detail">
                        <span class="label">Statut</span>
                        <span class="value">
                            <span class="status {{ $statusClass }}">
                                {{ $statusLabel }}
                            </span>
                        </span>
                    </div>

                    <div class="detail">
                        <span class="label">Date d'inscription</span>
                        <span class="value">
                            {{ $member->registered_at?->format('d/m/Y') ?? ($member->created_at?->format('d/m/Y') ?? '—') }}
                        </span>
                    </div>

                    <div class="detail">
                        <span class="label">Expiration</span>
                        <span class="value">
                            {{ $member->membership_expires_at?->format('d/m/Y') ?? ($member->card?->expires_at?->format('d/m/Y') ?? '—') }}
                        </span>
                    </div>
                </div>
            </div>

            <section class="qr-section">
                <p><strong>Carte de membre UHSAS</strong></p>

                <img src="{{ route('member.public.qr', ['member' => $member->id]) }}" alt="QR code de vérification"
                    width="150" height="150">

                <p class="qr-caption">
                    Numéro : {{ $member->member_number }}
                </p>
            </section>

            <footer class="footer">
                ENSEMBLE, BÂTISSONS DES VIES MEILLEURES
            </footer>
        </section>
    </main>
</body>

</html>
