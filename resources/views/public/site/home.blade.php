@extends('layouts.public-site')

@section('title', 'Accueil')
@section('description', 'Découvrez la coopérative UHSAS, ses activités, ses projets et son engagement pour les artisans
    du Sénégal.')

@section('content')
    <section class="hero-slider">
        <div class="hero-slide active"
            style="--slide-image: url('https://www.radiofrance.fr/pikapi/images/026301d1-4a37-4138-8982-7e2c987f57dc/1200x680')">
            <div class="hero-overlay"></div>
            <div class="container hero-content">
                <span class="eyebrow">UNIS POUR BÂTIR DEMAIN</span>
                <h1>Construisons ensemble<br>un avenir plus solidaire.</h1>
                <p>
                    L’UHSAS rassemble les artisans autour de la solidarité,
                    de l’habitat et du développement durable.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('site.about') }}" class="btn btn-gold">
                        Découvrir la coopérative
                    </a>
                    <a href="{{ route('registration.create') }}" class="btn btn-outline">
                        Devenir membre
                    </a>
                </div>
            </div>
        </div>

        <div class="hero-slide"
            style="--slide-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2000&q=85')">
            <div class="hero-overlay"></div>
            <div class="container hero-content">
                <span class="eyebrow">VALORISER NOS ARTISANS</span>
                <h1>Le savoir-faire local<br>au cœur du progrès.</h1>
                <p>
                    Favoriser la coopération, soutenir les professionnels
                    et promouvoir les compétences artisanales sénégalaises.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('site.activities') }}" class="btn btn-gold">
                        Nos activités
                    </a>
                    <a href="{{ route('site.projects') }}" class="btn btn-outline">
                        Nos projets
                    </a>
                </div>
            </div>
        </div>

        <div class="hero-slide"
            style="--slide-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=2000&q=85')">
            <div class="hero-overlay"></div>
            <div class="container hero-content">
                <span class="eyebrow">LA FORCE DU COLLECTIF</span>
                <h1>Ensemble, nos projets<br>prennent vie.</h1>
                <p>
                    Développons des initiatives communes pour améliorer
                    les conditions de vie et renforcer la solidarité.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('site.partners') }}" class="btn btn-gold">
                        Nos partenaires
                    </a>
                    <a href="{{ route('site.contact') }}" class="btn btn-outline">
                        Nous contacter
                    </a>
                </div>
            </div>
        </div>

        <div class="hero-controls">
            <button class="slider-arrow slider-prev" aria-label="Slide précédent">←</button>
            <div class="slider-dots" aria-label="Choisir une diapositive">
                <button class="slider-dot active" aria-label="Diapositive 1"></button>
                <button class="slider-dot" aria-label="Diapositive 2"></button>
                <button class="slider-dot" aria-label="Diapositive 3"></button>
            </div>
            <button class="slider-arrow slider-next" aria-label="Slide suivant">→</button>
        </div>
        <div class="hero-progress"><span></span></div>
    </section>

    <section class="intro-section section-padding">
        <div class="container intro-grid">
            <div class="intro-visual">
                <div class="intro-image" role="img" aria-label="Bâtiment contemporain"
                    style="background-image:url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=85')">
                </div>
                <div class="intro-stamp">
                    <strong>UHSAS</strong>
                    <span>La solidarité en action</span>
                </div>
            </div>

            <div class="intro-text">
                <span class="section-label">QUI SOMMES-NOUS ?</span>
                <h2>Une vision commune pour un avenir solidaire.</h2>
                <p>
                    L’Union Habitat Solidaire des Artisans du Sénégal
                    a vocation à fédérer les artisans et à encourager
                    les initiatives collectives dans les domaines de
                    l’habitat, de l’artisanat et du développement local.
                </p>
                <p>
                    Notre ambition est de mettre la coopération au service
                    des membres, de leurs projets et de leurs communautés.
                </p>
                <a href="{{ route('site.about') }}" class="text-link">
                    En savoir plus <span>↗</span>
                </a>
            </div>
        </div>
    </section>


    <section class="pillars-section section-padding">
        <div class="container">
            <div class="section-heading">
                <span class="section-label">NOS ENGAGEMENTS</span>
                <h2>Agir ensemble, progresser durablement.</h2>
                <p>Des actions guidées par la solidarité et la valorisation des compétences.</p>
            </div>

            <div class="pillar-grid">
                <article class="pillar-card">
                    <div class="pillar-icon">⌂</div>
                    <h3>Habitat solidaire</h3>
                    <p>Encourager les initiatives collectives liées à l’habitat et au cadre de vie.</p>
                </article>
                <article class="pillar-card">
                    <div class="pillar-icon">⚒</div>
                    <h3>Artisanat</h3>
                    <p>Valoriser les métiers, les savoir-faire et les compétences des artisans.</p>
                </article>
                <article class="pillar-card">
                    <div class="pillar-icon">◎</div>
                    <h3>Solidarité</h3>
                    <p>Renforcer l’entraide et la coopération entre les membres de la coopérative.</p>
                </article>
            </div>
        </div>
    </section>



    <section class="projects-preview section-padding">
        <div class="container projects-preview-inner">
            <div>
                <span class="section-label">NOS INITIATIVES</span>
                <h2>Des idées collectives pour des réalisations concrètes.</h2>
                <p>Découvrez les projets et les actions portés par la coopérative.</p>
            </div>
            <a href="{{ route('site.projects') }}" class="btn btn-green">
                Découvrir nos projets
            </a>
        </div>
    </section>
    {{-- STATISTIQUES DE LA COOPÉRATIVE --}}
    <section class="stats-section section-padding">
        <div class="container">
            <div class="stats-heading">
                <span class="section-label">NOTRE IMPACT</span>
                <h2>L’UHSAS en chiffres</h2>
                <p>
                    Une communauté d’artisans unis par la solidarité,
                    l’habitat et le développement local.
                </p>
            </div>

            <div class="stats-grid">
                <article class="stat-card">
                    <div class="stat-icon">♙</div>
                    <div class="stat-number">
                        {{ number_format($totalMembers ?? 0, 0, ',', ' ') }}
                    </div>
                    <h3>Membres inscrits</h3>
                    <p>Une communauté en construction</p>
                </article>

                <article class="stat-card">
                    <div class="stat-icon">✓</div>
                    <div class="stat-number">
                        {{ number_format($activeMembers ?? 0, 0, ',', ' ') }}
                    </div>
                    <h3>Membres actifs</h3>
                    <p>Des membres dont le compte est actif</p>
                </article>

                <article class="stat-card">
                    <div class="stat-icon">⚒</div>
                    <div class="stat-number">
                        {{ number_format($totalProfessions ?? 0, 0, ',', ' ') }}
                    </div>
                    <h3>Métiers représentés</h3>
                    <p>Des savoir-faire artisanaux valorisés</p>
                </article>

                <article class="stat-card">
                    <div class="stat-icon">⌖</div>
                    <div class="stat-number">
                        {{ number_format($totalRegions ?? 0, 0, ',', ' ') }}
                    </div>
                    <h3>Régions couvertes</h3>
                    <p>Une présence à travers le Sénégal</p>
                </article>
            </div>
        </div>
    </section>


    <section class="join-section">
        <div class="container join-inner">
            <div>
                <span class="section-label">REJOIGNEZ LE MOUVEMENT</span>
                <h2>Votre savoir-faire a sa place au sein de l’UHSAS.</h2>
                <p>Rejoignez une dynamique collective fondée sur la coopération.</p>
            </div>
            <a href="{{ route('registration.create') }}" class="btn btn-gold">
                Devenir membre <span>→</span>
            </a>
        </div>
    </section>
@endsection
