@extends('layouts.public-site')

@section('title', 'Contact')

@section('content')
@include('public.site.partials.inner-hero', [
    'eyebrow' => 'RESTONS EN CONTACT',
    'heading' => 'Contactez l’UHSAS',
    'description' => 'Une question sur la coopérative ou les modalités d’adhésion ? Contactez notre équipe.'
])

<section class="content-section">
    <div class="container contact-grid">
        <div>
            <span class="section-label">ÉCHANGEONS</span>
            <h2>Nous sommes à votre écoute.</h2>
            <p>
                Pour nous permettre de vous répondre, indiquez vos
                coordonnées et le motif de votre demande.
            </p>
            <div class="content-placeholder">
                <strong>Coordonnées officielles</strong>
                <p>Ajoutez ici le numéro de téléphone, l’adresse e-mail et l’adresse physique validés de l’UHSAS.</p>
            </div>
        </div>

        <form class="contact-form" action="#" method="post"
              onsubmit="event.preventDefault(); alert('Le formulaire de contact sera activé lors de la prochaine étape.');">
            <label>
                Nom complet
                <input type="text" name="name" required>
            </label>
            <label>
                Adresse e-mail
                <input type="email" name="email" required>
            </label>
            <label>
                Objet
                <input type="text" name="subject" required>
            </label>
            <label>
                Votre message
                <textarea name="message" required></textarea>
            </label>
            <button class="btn btn-green" type="submit">Envoyer le message</button>
        </form>
    </div>
</section>
@endsection