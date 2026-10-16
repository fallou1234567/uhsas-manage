
@extends('layouts.public-site')

@section('title', 'Nos partenaires')

@section('content')
@include('public.site.partials.inner-hero', [
    'eyebrow' => 'ENSEMBLE, NOUS ALLONS PLUS LOIN',
    'heading' => 'Des partenariats au service du développement',
    'description' => 'L’UHSAS souhaite développer des collaborations durables avec les institutions, les entreprises et les acteurs du développement afin de soutenir les artisans et de promouvoir des initiatives solidaires en faveur de l’habitat au Sénégal.'
])

{{-- INTRODUCTION ÉDITORIALE --}}
<section class="partner-intro">
    <div class="container partner-intro-grid">
        <div class="partner-intro-copy">
            <span class="partner-kicker">
                <span class="partner-kicker-line"></span>
                NOTRE RÉSEAU
            </span>

            <h1>
                Ensemble,<br>
                <span>nous allons</span><br>
                plus loin.
            </h1>

            <p>
                Les défis de l’artisanat se relèvent collectivement.
                L’UHSAS souhaite développer des collaborations
                durables avec des acteurs engagés dans l’habitat,
                la formation et le développement professionnel.
            </p>

            <a href="#partenaires-officiels" class="partner-text-link">
                Découvrir notre réseau
                <span aria-hidden="true">↓</span>
            </a>
        </div>

        <div class="partner-intro-visual">
            <img
                src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1200&q=85"
                alt="Des professionnels réunis autour d'un projet commun"
                fetchpriority="high"
            >

            <div class="partner-visual-note">
                <span class="partner-visual-mark">U</span>
                <div>
                    <strong>La force du collectif</strong>
                    <p>Coopération · Engagement · Solidarité</p>
                </div>
            </div>

            <span class="partner-visual-number">01</span>
        </div>
    </div>
</section>


{{-- BANDEAU DE VALEURS --}}
<section class="partner-values-strip">
    <div class="container partner-values-row">
        <div>
            <span>01</span>
            <strong>Coopérer</strong>
        </div>
        <div>
            <span>02</span>
            <strong>Partager</strong>
        </div>
        <div>
            <span>03</span>
            <strong>Développer</strong>
        </div>
        <div>
            <span>04</span>
            <strong>Construire durablement</strong>
        </div>
    </div>
</section>


{{-- PRÉSENTATION DU RÉSEAU --}}
<section class="partner-network" id="partenaires-officiels">
    <div class="container">
        <div class="partner-network-heading">
            <div>
                <span class="partner-section-label">
                    UN RÉSEAU À FORT POTENTIEL
                </span>

                <h2>
                    Des compétences différentes.<br>
                    Une ambition commune.
                </h2>
            </div>

            <p>
                Nous souhaitons rapprocher les acteurs qui peuvent
                contribuer à la progression des artisans et à
                l’émergence de nouvelles opportunités.
            </p>
        </div>

        {{-- CATÉGORIE 1 --}}
        <article class="partner-network-row">
            <div class="partner-network-image">
                <img
                    src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1000&q=85"
                    alt="Infrastructures et bâtiments institutionnels"
                    loading="lazy"
                >
                <span class="partner-image-index">01</span>
            </div>

            <div class="partner-network-content">
                <span class="partner-section-label">
                    INSTITUTIONS & DÉVELOPPEMENT
                </span>

                <h3>Des institutions engagées pour l’avenir</h3>

                <p>
                    Favoriser les échanges avec les institutions,
                    les collectivités et les organismes de développement
                    autour de projets qui répondent aux besoins
                    des artisans et de leurs communautés.
                </p>

                <div class="partner-keywords">
                    <span>Accompagnement</span>
                    <span>Développement local</span>
                    <span>Coopération</span>
                </div>
            </div>
        </article>

        {{-- CATÉGORIE 2 --}}
        <article class="partner-network-row partner-network-row-reverse">
            <div class="partner-network-image">
                <img
                    src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1000&q=85"
                    alt="Travaux sur un chantier de construction"
                    loading="lazy"
                >
                <span class="partner-image-index">02</span>
            </div>

            <div class="partner-network-content">
                <span class="partner-section-label">
                    ENTREPRISES & BTP
                </span>

                <h3>Relier les artisans aux opportunités</h3>

                <p>
                    Encourager les relations entre les artisans,
                    les entreprises de construction, les fournisseurs
                    et les professionnels du secteur pour favoriser
                    les échanges et les collaborations.
                </p>

                <div class="partner-keywords">
                    <span>Expertise</span>
                    <span>Marchés</span>
                    <span>Partage de compétences</span>
                </div>
            </div>
        </article>

        {{-- CATÉGORIE 3 --}}
        <article class="partner-network-row">
            <div class="partner-network-image">
                <img
                    src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1000&q=85"
                    alt="Salle de formation et apprentissage"
                    loading="lazy"
                >
                <span class="partner-image-index">03</span>
            </div>

            <div class="partner-network-content">
                <span class="partner-section-label">
                    FORMATION & EXPERTISE
                </span>

                <h3>Investir dans les compétences</h3>

                <p>
                    Favoriser les relations avec les centres de formation,
                    les experts et les structures d’accompagnement
                    pour encourager la transmission des savoir-faire
                    et le développement professionnel.
                </p>

                <div class="partner-keywords">
                    <span>Formation</span>
                    <span>Innovation</span>
                    <span>Savoir-faire</span>
                </div>
            </div>
        </article>

        {{-- CATÉGORIE 4 --}}
        <article class="partner-network-row partner-network-row-reverse">
            <div class="partner-network-image">
                <img
                    src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=1000&q=85"
                    alt="Documents financiers et préparation de projets"
                    loading="lazy"
                >
                <span class="partner-image-index">04</span>
            </div>

            <div class="partner-network-content">
                <span class="partner-section-label">
                    FINANCEMENT & ÉQUIPEMENTS
                </span>

                <h3>Explorer de nouvelles solutions</h3>

                <p>
                    Identifier des pistes de collaboration avec les
                    institutions financières, les fournisseurs
                    et les organismes susceptibles de faciliter
                    l’accès aux ressources nécessaires aux artisans.
                </p>

                <div class="partner-keywords">
                    <span>Financement</span>
                    <span>Équipements</span>
                    <span>Solutions adaptées</span>
                </div>
            </div>
        </article>
    </div>
</section>


{{-- ESPACE DES PARTENAIRES OFFICIELS --}}
<section class="partner-logos-section">
    <div class="container">
        <div class="partner-logos-heading">
            <span class="partner-section-label">
                ILS NOUS ACCOMPAGNENT
            </span>

            <h2>Nos partenaires officiels</h2>

            <p>
                Retrouvez ici les organisations dont la collaboration
                avec l’UHSAS aura été confirmée et validée.
            </p>
        </div>

        {{-- 
            Ajouter ici les logos officiels après validation.
            Exemple :
            <a href="URL_OFFICIELLE" class="partner-logo-item">
                <img src="{{ asset('images/partners/logo-partenaire.png') }}"
                     alt="Nom du partenaire">
            </a>
        --}}

        <div class="partner-logos-empty">
            <div class="partner-logos-empty-icon" aria-hidden="true">
                <svg viewBox="0 0 48 48" fill="none">
                    <rect x="7" y="7" width="34" height="34" rx="4"
                          stroke="currentColor" stroke-width="1.5"/>
                    <path d="M16 31L23 23L28 28L32 24L38 31"
                          stroke="currentColor" stroke-width="1.5"
                          stroke-linecap="round" stroke-linejoin="round"/>
                    <circle cx="17" cy="17" r="3"
                            stroke="currentColor" stroke-width="1.5"/>
                </svg>
            </div>

            <h3>Un espace dédié à nos collaborations</h3>

            <p>
                Les logos et présentations seront publiés ici
                au fur et à mesure de la validation des partenariats.
            </p>
        </div>
    </div>
</section>


{{-- APPEL À COLLABORATION --}}
<section class="partner-join">
    <div class="container partner-join-inner">
        <div class="partner-join-copy">
            <span class="partner-section-label">
                REJOIGNEZ NOTRE DÉMARCHE
            </span>

            <h2>
                Et si votre organisation contribuait
                à faire grandir l’artisanat ?
            </h2>

            <p>
                Vous représentez une entreprise, une institution,
                un organisme de formation ou un partenaire financier ?
                Échangeons sur les possibilités de collaboration avec l’UHSAS.
            </p>
        </div>

        <a href="{{ route('site.contact') }}" class="partner-join-button">
            Parlons de votre projet
            <span aria-hidden="true">↗</span>
        </a>
    </div>
</section>

@endsection