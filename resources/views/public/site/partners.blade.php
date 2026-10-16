@extends('layouts.public-site')

@section('title', 'Nos partenaires')

@section('content')
@include('public.site.partials.inner-hero', [
    'eyebrow' => 'ENSEMBLE, PLUS LOIN',
    'heading' => 'Nos partenaires',
    'description' => 'Les collaborations qui peuvent contribuer au développement des actions de l’UHSAS.'
])

<section class="content-section">
    <div class="container">
        <span class="section-label">NOTRE ÉCOSYSTÈME</span>
        <h2>La force des collaborations.</h2>
        <div class="content-placeholder">
            <h3>Un espace dédié à nos partenaires</h3>
            <p>Les logos, noms et présentations des partenaires officiels seront ajoutés après validation par la coopérative.</p>
        </div>
    </div>
</section>
@endsection