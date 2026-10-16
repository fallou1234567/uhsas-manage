@extends('layouts.public-site')

@section('title', 'Nos activités')

@section('content')
@include('public.site.partials.inner-hero', [
    'eyebrow' => 'NOS ACTIONS SUR LE TERRAIN',
    'heading' => 'Des activités au service des artisans',
    'description' => 'À travers ses actions et ses initiatives, l’UHSAS souhaite valoriser les savoir-faire, favoriser les échanges entre artisans et promouvoir la solidarité professionnelle.'
])


{{-- INTRODUCTION --}}
<section class="activities-intro" id="nos-domaines">
    <div class="container activities-intro-grid">
        <div class="activities-intro-left">
            <span class="activities-section-label">
                NOS DOMAINES D’ACTION
            </span>

            <h2>
                Ensemble, faisons<br>
                grandir <span>les métiers.</span>
            </h2>
        </div>

        <div class="activities-intro-right">
            <p>
                La coopération est au cœur de notre démarche.
                À travers différents domaines d’action, l’UHSAS
                souhaite encourager l’entraide, la transmission des
                savoir-faire et la création d’opportunités pour
                les artisans.
            </p>
        </div>
    </div>
</section>


{{-- ACTIVITÉ 01 --}}
<section class="activity-feature">
    <div class="container activity-feature-grid">
        <div class="activity-feature-visual">
            <img
                src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=85"
                alt="Architecture et construction"
                loading="lazy"
            >

            <div class="activity-image-caption">
                <span>01</span>
                <span>HABITAT & CONSTRUCTION</span>
            </div>
        </div>

        <div class="activity-feature-content">
            <span class="activity-feature-index">01 / 06</span>

            <span class="activities-section-label">
                BÂTIR ENSEMBLE
            </span>

            <h2>Habitat et construction</h2>

            <p>
                Encourager les initiatives collectives liées à
                l’habitat et à la construction, tout en valorisant
                le savoir-faire des artisans locaux.
            </p>

            <ul class="activity-benefits">
                <li>Promotion de l’habitat solidaire</li>
                <li>Mobilisation des professionnels du bâtiment</li>
                <li>Valorisation des compétences locales</li>
            </ul>
        </div>
    </div>
</section>


{{-- ACTIVITÉ 02 --}}
<section class="activity-feature activity-feature-reverse">
    <div class="container activity-feature-grid">
        <div class="activity-feature-visual">
            <img
                src="https://images.unsplash.com/photo-1504148455328-c376907d081c?auto=format&fit=crop&w=1200&q=85"
                alt="Artisan travaillant dans son atelier"
                loading="lazy"
            >

            <div class="activity-image-caption">
                <span>02</span>
                <span>MÉTIERS & SAVOIR-FAIRE</span>
            </div>
        </div>

        <div class="activity-feature-content">
            <span class="activity-feature-index">02 / 06</span>

            <span class="activities-section-label">
                VALORISER LES TALENTS
            </span>

            <h2>Accompagnement des artisans</h2>

            <p>
                Favoriser le développement professionnel des artisans
                et renforcer les échanges entre les différents corps
                de métiers.
            </p>

            <ul class="activity-benefits">
                <li>Promotion des métiers artisanaux</li>
                <li>Partage d’expériences professionnelles</li>
                <li>Valorisation des réalisations des membres</li>
            </ul>
        </div>
    </div>
</section>


{{-- ACTIVITÉ 03 --}}
<section class="activity-feature">
    <div class="container activity-feature-grid">
        <div class="activity-feature-visual">
            <img
                src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?auto=format&fit=crop&w=1200&q=85"
                alt="Équipe en formation et en collaboration"
                loading="lazy"
            >

            <div class="activity-image-caption">
                <span>03</span>
                <span>FORMATION & TRANSMISSION</span>
            </div>
        </div>

        <div class="activity-feature-content">
            <span class="activity-feature-index">03 / 06</span>

            <span class="activities-section-label">
                APPRENDRE ENSEMBLE
            </span>

            <h2>Formation et transmission des savoir-faire</h2>

            <p>
                Encourager le partage des connaissances et
                l’amélioration continue des compétences techniques
                et professionnelles.
            </p>

            <ul class="activity-benefits">
                <li>Ateliers de renforcement des compétences</li>
                <li>Transmission entre artisans expérimentés et débutants</li>
                <li>Sensibilisation à la qualité et à la sécurité</li>
            </ul>
        </div>
    </div>
</section>




{{-- ENGAGEMENT --}}
<section class="activities-commitment">
    <div class="container activities-commitment-grid">
        <div class="commitment-decoration" aria-hidden="true">
            <span>U</span>
        </div>

        <div class="commitment-content">
            <span class="activities-section-label">
                NOTRE ENGAGEMENT
            </span>

            <h2>
                La force du collectif<br>
                au service de chaque artisan.
            </h2>

            <p>
                Nous croyons qu’en unissant les compétences,
                les expériences et les ambitions, les artisans
                peuvent construire des solutions durables.
            </p>

            <a href="{{ route('registration.create') }}"
               class="activities-main-btn">
                Devenir membre
                <span aria-hidden="true">→</span>
            </a>
        </div>
    </div>
</section>


{{-- CONTACT --}}
<section class="activities-contact">
    <div class="container activities-contact-inner">
        <div>
            <span class="activities-section-label">
                CONSTRUISONS L’AVENIR ENSEMBLE
            </span>

            <h2>Vous souhaitez en savoir plus ?</h2>

            <p>
                Contactez l’UHSAS pour découvrir sa démarche
                et ses initiatives en faveur des artisans.
            </p>
        </div>

        <a href="{{ route('site.contact') }}"
           class="activities-contact-btn">
            Nous contacter
            <span aria-hidden="true">↗</span>
        </a>
    </div>
</section>

@endsection
