<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'UHSAS - Union Habitat Solidaire des Artisans du Sénégal')">

    <title>@yield('title', 'UHSAS') | Union Habitat Solidaire des Artisans du Sénégal</title>

    @vite(['resources/css/public-site.css', 'resources/js/public-site.js'])
    @if (request()->routeIs('site.about'))
        <link rel="stylesheet" href="{{ asset('asset/css/about.css') }}">
    @endif
    @if (request()->routeIs('site.activities'))
        <link rel="stylesheet" href="{{ asset('asset/css/activities.css') }}">
    @endif
    @if (request()->routeIs('site.partners'))
        <link rel="stylesheet" href="{{ asset('asset/css/partners.css') }}">
    @endif
    @if (request()->routeIs('site.contact'))
        <link rel="stylesheet" href="{{ asset('asset/css/contact.css') }}">
    @endif
</head>

<body>
    <div class="topbar">
        <div class="container topbar-inner">
            <span>Union Habitat Solidaire des Artisans du Sénégal</span>
            <span>Solidarité · Habitat · Artisanat</span>
        </div>
    </div>

    <header class="site-header">
        <div class="container nav-container">
            <a href="{{ route('site.home') }}" class="brand">
                <img src="{{ asset('asset/images/logo-uhsas.jpeg') }}" alt="Logo UHSAS"
                    onerror="this.style.display='none'">
                <span>
                    <strong>UHSAS</strong>
                    <small>Ensemble, construisons l’avenir</small>
                </span>
            </a>

            <button class="menu-toggle" type="button" aria-label="Ouvrir le menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>

            <nav class="main-nav">
                <a href="{{ route('site.home') }}">Accueil</a>
                <a href="{{ route('site.about') }}">La coopérative</a>
                <a href="{{ route('site.activities') }}">Activités</a>
                <a href="{{ route('site.projects') }}">Projets</a>
                <a href="{{ route('site.partners') }}">Partenaires</a>
                {{-- <a href="{{ route('site.news') }}">Actualités</a> --}}
                <a href="{{ route('site.contact') }}">Contact</a>
                <a href="{{ route('registration.create') }}" class="nav-cta">
                    Devenir membre
                </a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container footer-grid">
            <div>
                <h3>UHSAS</h3>
                <p>
                    Une coopérative tournée vers la solidarité,
                    l’habitat et la valorisation des artisans du Sénégal.
                </p>
            </div>

            <div>
                <h4>Navigation</h4>
                <a href="{{ route('site.about') }}">Notre coopérative</a>
                <a href="{{ route('site.activities') }}">Nos activités</a>
                <a href="{{ route('site.projects') }}">Nos projets</a>
            </div>

            <div>
                <h4>Nous rejoindre</h4>
                <a href="{{ route('registration.create') }}">Devenir membre</a>
                <a href="{{ route('site.contact') }}">Nous contacter</a>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                © {{ date('Y') }} UHSAS — Tous droits réservés.
            </div>
        </div>
    </footer>
</body>

</html>
