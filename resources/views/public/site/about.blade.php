
@extends('layouts.public-site')

@section('title', 'La coopérative')

@section('content')

{{-- HERO --}}
@include('public.site.partials.inner-hero', [
    'eyebrow' => 'QUI SOMMES-NOUS ?',
    'heading' => 'Une coopérative au service de la solidarité',
    'description' => 'Fédérer les artisans, encourager l’entraide et contribuer au développement de l’habitat au Sénégal.'
])

{{-- PRESENTATION --}}
<section class="about-section about-introduction">
    <div class="container about-intro-grid">

        <div class="about-intro-content">
            <span class="section-label">NOTRE IDENTITÉ</span>

            <h2>
                Une dynamique collective pour les artisans sénégalais.
            </h2>

            <p class="about-lead">
                L’Union Habitat Solidaire des Artisans du Sénégal (UHSAS)
                porte une ambition collective : rapprocher les artisans,
                encourager la coopération et valoriser les compétences
                qui contribuent au développement de l’habitat.
            </p>

            <p>
                À travers une démarche fondée sur la solidarité et
                l’engagement collectif, la coopérative entend favoriser
                les échanges entre ses membres, encourager les initiatives
                communes et soutenir le développement professionnel des artisans.
            </p>

            <p>
                L’UHSAS souhaite ainsi contribuer à une dynamique dans
                laquelle chaque artisan peut apporter son savoir-faire,
                partager son expérience et participer à des projets
                utiles à sa communauté.
            </p>

            <a href="{{ route('site.contact') }}" class="btn btn-green">
                Échanger avec l’UHSAS
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="about-intro-visual">
            <img
                src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1000&q=85"
                alt="Artisans et professionnels du bâtiment sur un chantier"
                loading="lazy"
            >

            <div class="about-visual-caption">
                <span class="about-caption-icon">
                    <i class="fas fa-hands-helping"></i>
                </span>

                <div>
                    <strong>L’union fait la force</strong>
                    <p>Des compétences réunies autour d’une ambition commune.</p>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- MISSION ET VISION --}}
{{-- <section class="about-section about-mission">
    <div class="container">

        <div class="about-section-heading">
            <span class="section-label">NOTRE RAISON D’ÊTRE</span>

            <h2>Une ambition commune, des objectifs partagés.</h2>

            <p>
                Construire une dynamique de coopération qui place les
                artisans, l’entraide et le développement local au cœur
                de ses priorités.
            </p>
        </div>

        <div class="about-purpose-grid">

            <article class="about-purpose-card">
                <div class="about-card-icon">
                    <i class="fas fa-bullseye"></i>
                </div>

                <span class="about-card-label">01 — NOTRE MISSION</span>

                <h3>Rassembler et accompagner</h3>

                <p>
                    Favoriser le regroupement des artisans, développer
                    l’esprit de solidarité et encourager les actions
                    collectives au service de leurs intérêts communs.
                </p>
            </article>

            <article class="about-purpose-card about-purpose-highlight">
                <div class="about-card-icon">
                    <i class="fas fa-eye"></i>
                </div>

                <span class="about-card-label">02 — NOTRE VISION</span>

                <h3>Une coopération durable</h3>

                <p>
                    Contribuer à un environnement dans lequel les artisans
                    sont valorisés, leurs compétences reconnues et leurs
                    initiatives collectives encouragées.
                </p>
            </article>

            <article class="about-purpose-card">
                <div class="about-card-icon">
                    <i class="fas fa-hammer"></i>
                </div>

                <span class="about-card-label">03 — NOTRE ENGAGEMENT</span>

                <h3>Valoriser les savoir-faire</h3>

                <p>
                    Encourager le partage d’expériences, la mise en valeur
                    des compétences professionnelles et la participation
                    des membres aux projets de la coopérative.
                </p>
            </article>

        </div>
    </div>
</section> --}}

{{-- NOS VALEURS --}}
<section class="about-section about-values">
    <div class="container">

        <div class="about-values-grid">
            <div class="about-values-heading">
                <span class="section-label">NOS PRINCIPES</span>

                <h2>Les valeurs qui nous rassemblent.</h2>

                <p>
                    La force d’une coopérative repose autant sur les
                    compétences de ses membres que sur les principes
                    qui guident leurs actions.
                </p>
            </div>

            <div class="about-values-list">

                <article class="about-value-item">
                    <span class="about-value-number">01</span>

                    <div>
                        <h3>Solidarité</h3>
                        <p>
                            Encourager l’entraide, le soutien mutuel et
                            la recherche de solutions collectives.
                        </p>
                    </div>
                </article>

                <article class="about-value-item">
                    <span class="about-value-number">02</span>

                    <div>
                        <h3>Coopération</h3>
                        <p>
                            Mettre les compétences et les expériences
                            en commun pour faire émerger des initiatives utiles.
                        </p>
                    </div>
                </article>

                <article class="about-value-item">
                    <span class="about-value-number">03</span>

                    <div>
                        <h3>Responsabilité</h3>
                        <p>
                            Favoriser l’engagement des membres, le respect
                            des engagements et une démarche constructive.
                        </p>
                    </div>
                </article>

                <article class="about-value-item">
                    <span class="about-value-number">04</span>

                    <div>
                        <h3>Développement local</h3>
                        <p>
                            Encourager les initiatives qui valorisent
                            les artisans et contribuent à la vie des communautés.
                        </p>
                    </div>
                </article>

            </div>
        </div>

    </div>
</section>

{{-- NOS OBJECTIFS --}}
<section class="about-section about-objectives">
    <div class="container">

        <div class="about-section-heading">
            <span class="section-label">NOS PRIORITÉS</span>

            <h2>Transformer la solidarité en actions.</h2>

            <p>
                La démarche de l’UHSAS s’articule autour de plusieurs
                orientations destinées à renforcer la coopération entre artisans.
            </p>
        </div>

        <div class="about-objectives-grid">

            <article class="about-objective">
                <span class="about-objective-icon">
                    <i class="fas fa-users"></i>
                </span>

                <h3>Fédérer les artisans</h3>

                <p>
                    Développer les liens entre professionnels et favoriser
                    leur participation à une dynamique commune.
                </p>
            </article>

            <article class="about-objective">
                <span class="about-objective-icon">
                    <i class="fas fa-tools"></i>
                </span>

                <h3>Valoriser les compétences</h3>

                <p>
                    Encourager la reconnaissance des savoir-faire et le
                    partage d’expériences entre les membres.
                </p>
            </article>

            <article class="about-objective">
                <span class="about-objective-icon">
                    <i class="fas fa-house"></i>
                </span>

                <h3>Soutenir l’habitat</h3>

                <p>
                    Contribuer à une dynamique collective en faveur
                    des initiatives liées à l’habitat et au cadre de vie.
                </p>
            </article>

            <article class="about-objective">
                <span class="about-objective-icon">
                    <i class="fas fa-handshake"></i>
                </span>

                <h3>Encourager les partenariats</h3>

                <p>
                    Favoriser les échanges avec les acteurs susceptibles
                    de soutenir les objectifs de la coopérative.
                </p>
            </article>

        </div>
    </div>
</section>

{{-- APPEL À REJOINDRE --}}
<section class="about-join">
    <div class="container">
        <div class="about-join-content">

            <div>
                <span class="about-join-eyebrow">PARTICIPONS ENSEMBLE</span>

                <h2>La solidarité commence par l’engagement de chacun.</h2>

                <p>
                    Vous êtes artisan, partenaire ou souhaitez en savoir
                    davantage sur notre démarche ? Prenez contact avec l’UHSAS
                    pour échanger sur les possibilités de collaboration.
                </p>
            </div>

            <div class="about-join-actions">
                <a href="{{ route('site.contact') }}" class="btn about-btn-light">
                    Nous contacter
                    <i class="fas fa-arrow-right"></i>
                </a>

                <a href="{{ route('site.projects') }}" class="about-link-light">
                    Découvrir nos projets
                </a>
            </div>

        </div>
    </div>
</section>

@endsection
