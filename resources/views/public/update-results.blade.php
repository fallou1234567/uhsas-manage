
@extends('layouts.public-site')

@section('title', 'Résultats de recherche - UHSAS')

@section('content')
<section class="content-section" style="padding: 60px 0;">
    <div class="container" style="max-width: 850px; margin: auto;">
        <h1>Choisissez votre fiche membre</h1>

        <p>Plusieurs fiches correspondent à ce numéro.</p>

        @foreach ($members as $member)
            <article class="project-card" style="margin-bottom: 20px; padding: 20px;">
                <h3>
                    {{ $member->first_name }} {{ $member->last_name }}
                </h3>

                <p>
                    Numéro de membre :
                    {{ $member->member_number }}
                </p>

                <p>
                    Date de naissance :
                    {{ $member->birth_date?->format('d/m/Y') ?? 'Non renseignée' }}
                </p>

                <a
                    href="{{ route('member.public.update.edit', $member->id) }}"
                    class="btn btn-gold"
                >
                    Sélectionner cette fiche
                </a>
            </article>
        @endforeach
    </div>
</section>
@endsection
