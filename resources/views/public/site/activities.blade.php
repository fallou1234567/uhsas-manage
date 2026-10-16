@extends('layouts.public-site')

@section('title', 'Nos activités')

@section('content')
@include('public.site.partials.inner-hero', [
    'eyebrow' => 'CE QUE NOUS FAISONS',
    'heading' => 'Nos activités',
    'description' => 'Des initiatives pour soutenir les artisans, renforcer les liens entre les membres et encourager la coopération.'
])

<section class="content-section">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">NOS DOMAINES D’ACTION</span>
            <h2>La coopération au cœur de nos activités.</h2>
        </div>

        <div class="content-grid">
            <article class="content-card">
                <div class="content-card-body">
                    <h3>Habitat et construction</h3>
                    <p>Encourager les initiatives collectives liées à l’habitat et à l’amélioration du cadre de vie.</p>
                </div>
            </article>
            <article class="content-card">
                <div class="content-card-body">
                    <h3>Accompagnement des artisans</h3>
                    <p>Promouvoir les compétences, les métiers et les opportunités de collaboration entre professionnels.</p>
                </div>
            </article>
            <article class="content-card">
                <div class="content-card-body">
                    <h3>Solidarité coopérative</h3>
                    <p>Développer l’entraide et favoriser la participation des membres aux actions communes.</p>
                </div>
            </article>
        </div>
    </div>
</section>
@endsection