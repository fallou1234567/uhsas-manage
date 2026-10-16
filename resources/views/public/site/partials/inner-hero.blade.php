<section class="inner-hero">
    <div class="inner-hero-overlay"></div>
    <div class="container inner-hero-content">
        <span class="section-label">{{ $eyebrow ?? 'UHSAS' }}</span>
        <h1>{{ $heading }}</h1>
        <p>{{ $description }}</p>
        <div class="breadcrumbs">
            <a href="{{ route('site.home') }}">Accueil</a>
            <span> / </span>
            <span>{{ $heading }}</span>
        </div>
    </div>
</section>