@extends('layouts.public-site')

@section('title', 'Actualités')

@section('content')
@include('public.site.partials.inner-hero', [
    'eyebrow' => 'LA VIE DE LA COOPÉRATIVE',
    'heading' => 'Actualités',
    'description' => 'Retrouvez les informations, annonces et temps forts de l’UHSAS.'
])

<section class="content-section">
    <div class="container">
        <span class="section-label">À LA UNE</span>
        <h2>Les nouvelles de l’UHSAS.</h2>
        <div class="content-placeholder">
            <h3>Les actualités seront publiées ici</h3>
            <p>Cette rubrique pourra ensuite être reliée à un espace d’administration pour publier des articles, ajouter des images et gérer les dates de publication.</p>
        </div>
    </div>
</section>
@endsection