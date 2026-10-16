@extends('layouts.public-site')

@section('title', 'Nos projets')

@section('content')
@include('public.site.partials.inner-hero', [
    'eyebrow' => 'NOS INITIATIVES',
    'heading' => 'Nos projets',
    'description' => 'Découvrez les initiatives collectives portées par l’UHSAS et les réalisations destinées à ses membres.'
])

<section class="content-section">
    <div class="container">
        <span class="section-label">PROJETS DE LA COOPÉRATIVE</span>
        <h2>Construire des solutions ensemble.</h2>
        <div class="content-placeholder">
            <h3>Les projets seront présentés ici</h3>
            <p>Cette rubrique accueillera les projets validés de la coopérative, leurs objectifs, leur état d’avancement et des photos des réalisations.</p>
        </div>
    </div>
</section>
@endsection