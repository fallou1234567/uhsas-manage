
@extends('layouts.public-site')

@section('title', 'Nos projets')

@section('description', 'Découvrez les projets de l’UHSAS : habitat solidaire, équipement des artisans, formation professionnelle, financement, marchés de travaux et solidarité.')

@section('content')

@include('public.site.partials.inner-hero', [
    'eyebrow' => 'NOS INITIATIVES',
    'heading' => 'Des projets pour bâtir un avenir solidaire',
    'description' => 'Découvrez les initiatives de l’UHSAS visant à soutenir les artisans, renforcer la coopération et contribuer au développement de l’habitat au Sénégal.'
])

<section class="content-section projects-section">
    <div class="container">

        <div class="projects-intro">
            <span class="section-label">PROJETS DE LA COOPÉRATIVE</span>
            <h2>Construire des solutions ensemble.</h2>
            <p>
                L’UHSAS souhaite développer des projets collectifs
                qui répondent aux besoins des artisans, de leurs familles
                et de leurs communautés. Ces initiatives constituent
                des axes de développement proposés à la coopérative.
            </p>
        </div>

        <div class="projects-grid">

            {{-- PROJET 1 --}}
            <article class="project-card">
                <div class="project-image project-image-1">
                    <img
                        src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=85"
                        alt="Projet de construction de logements"
                        loading="lazy"
                    >
                    <span class="project-number">01</span>
                </div>

                <div class="project-body">
                    <span class="project-category">HABITAT</span>
                    <h3>Programme d’habitat solidaire</h3>
                    <p>
                        Favoriser l’accès des artisans à des logements
                        décents à travers des initiatives collectives,
                        des partenariats fonciers et des solutions
                        de construction adaptées à leurs revenus.
                    </p>

                    <ul class="project-features">
                        <li>Accès au logement</li>
                        <li>Construction progressive</li>
                        <li>Partenariats immobiliers</li>
                    </ul>
                </div>
            </article>

            {{-- PROJET 2 --}}
            <article class="project-card">
                <div class="project-image project-image-2">
                    <img
                        src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=900&q=85"
                        alt="Artisans et équipements de chantier"
                        loading="lazy"
                    >
                    <span class="project-number">02</span>
                </div>

                <div class="project-body">
                    <span class="project-category">ÉQUIPEMENT</span>
                    <h3>Centre d’équipements partagés</h3>
                    <p>
                        Mettre progressivement à disposition des artisans
                        des outils, machines et équipements professionnels
                        afin de réduire leurs coûts et d’améliorer
                        la qualité de leurs réalisations.
                    </p>

                    <ul class="project-features">
                        <li>Location d’outils</li>
                        <li>Matériel professionnel</li>
                        <li>Entretien des équipements</li>
                    </ul>
                </div>
            </article>

            {{-- PROJET 3 --}}
            <article class="project-card">
                <div class="project-image project-image-3">
                    <img
                        src="{{ asset('asset/images/uhsas/banner1.png') }}"
                        alt="Formation professionnelle"
                        loading="lazy"
                    >
                    <span class="project-number">03</span>
                </div>

                <div class="project-body">
                    <span class="project-category">FORMATION</span>
                    <h3>Académie des métiers et du savoir-faire</h3>
                    <p>
                        Organiser des formations pratiques pour renforcer
                        les compétences techniques des artisans et
                        développer leurs connaissances en sécurité,
                        gestion et nouvelles techniques de construction.
                    </p>

                    <ul class="project-features">
                        <li>Perfectionnement technique</li>
                        <li>Sécurité sur les chantiers</li>
                        <li>Gestion d’activité</li>
                    </ul>
                </div>
            </article>

            {{-- PROJET 4 --}}
            <article class="project-card">
                <div class="project-image project-image-4">
                    <img
                        src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=85"
                        alt="Gestion financière et accompagnement"
                        loading="lazy"
                    >
                    <span class="project-number">04</span>
                </div>

                <div class="project-body">
                    <span class="project-category">FINANCEMENT</span>
                    <h3>Fonds de soutien aux artisans</h3>
                    <p>
                        Étudier la mise en place de mécanismes de soutien
                        financier permettant aux membres éligibles
                        de financer leurs outils, leurs matières premières
                        ou le développement de leur activité.
                    </p>

                    <ul class="project-features">
                        <li>Épargne collective encadrée</li>
                        <li>Accompagnement des projets</li>
                        <li>Partenariats financiers</li>
                    </ul>
                </div>
            </article>

            {{-- PROJET 5 --}}
            <article class="project-card">
                <div class="project-image project-image-5">
                    <img
                        src="{{ asset('asset/images/uhsas/banner2.png') }}"
                        alt="Travaux et projets de construction"
                        loading="lazy"
                    >
                    <span class="project-number">05</span>
                </div>

                <div class="project-body">
                    <span class="project-category">EMPLOI</span>
                    <h3>Réseau des artisans et des marchés de travaux</h3>
                    <p>
                        Faciliter la mise en relation entre les artisans,
                        les particuliers, les entreprises et les porteurs
                        de projets afin de favoriser l’accès à des
                        opportunités professionnelles.
                    </p>

                    <ul class="project-features">
                        <li>Mise en relation professionnelle</li>
                        <li>Groupements d’artisans</li>
                        <li>Opportunités de chantiers</li>
                    </ul>
                </div>
            </article>

            {{-- PROJET 6 --}}
            <article class="project-card">
                <div class="project-image project-image-6">
                    <img
                        src="{{ asset('asset/images/uhsas/banner1.png') }}"
                        alt="Initiative communautaire et solidarité"
                        loading="lazy"
                    >
                    <span class="project-number">06</span>
                </div>

                <div class="project-body">
                    <span class="project-category">SOLIDARITÉ</span>
                    <h3>Programme d’entraide et de protection sociale</h3>
                    <p>
                        Développer des initiatives de solidarité entre
                        les membres, notamment l’accompagnement des
                        familles en difficulté et l’étude de solutions
                        collectives de protection sociale.
                    </p>

                    <ul class="project-features">
                        <li>Assistance aux membres</li>
                        <li>Soutien en cas de difficulté</li>
                        <li>Partenariats de protection sociale</li>
                    </ul>
                </div>
            </article>

        </div>
    </div>
</section>

<section class="projects-cta">
    <div class="container projects-cta-inner">
        <div>
            <span class="section-label">CONSTRUISONS ENSEMBLE</span>
            <h2>Vous souhaitez contribuer à nos initiatives ?</h2>
            <p>
                Rejoignez l’UHSAS pour participer à une dynamique
                collective au service des artisans du Sénégal.
            </p>
        </div>

        <div class="projects-cta-actions">
            <a href="{{ route('registration.create') }}" class="btn btn-gold">
                Devenir membre
            </a>
            <a href="{{ route('site.contact') }}" class="btn btn-outline">
                Nous contacter
            </a>
        </div>
    </div>
</section>

@endsection
