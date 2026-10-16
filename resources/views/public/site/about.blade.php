@extends('layouts.public-site')

@section('title', 'La coopérative')

@section('content')
@include('public.site.partials.inner-hero', [
    'eyebrow' => 'QUI SOMMES-NOUS ?',
    'heading' => 'Une coopérative au service de la solidarité',
    'description' => 'Fédérer les artisans, encourager l’entraide et contribuer au développement de l’habitat au Sénégal.'
])

<section class="content-section">
    <div class="container intro-grid">
        <div>
            <span class="section-label">NOTRE IDENTITÉ</span>
            <h2>Une dynamique collective pour les artisans sénégalais.</h2>
            <p>
                L’Union Habitat Solidaire des Artisans du Sénégal (UHSAS)
                est présentée comme une initiative de coopération destinée
                à rassembler les artisans autour d’objectifs communs.
            </p>
            <p>
                La coopérative entend favoriser la solidarité entre ses
                membres, valoriser les compétences professionnelles et
                encourager les initiatives en faveur de l’habitat.
            </p>
        </div>
        <div class="content-placeholder">
            <h3>Notre vision</h3>
            <p>Promouvoir une coopération durable qui valorise les artisans et soutient les initiatives collectives.</p>
            <h3>Notre engagement</h3>
            <p>Placer l’entraide, la responsabilité et le développement local au cœur des actions de la coopérative.</p>
        </div>
    </div>
</section>
@endsection