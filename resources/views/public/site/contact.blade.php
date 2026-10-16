
@extends('layouts.public-site')

@section('title', 'Contact')

@section('content')
@include('public.site.partials.inner-hero', [
    'eyebrow' => 'RESTONS EN CONTACT',
    'heading' => 'Contactez l’UHSAS',
    'description' => 'Une question sur la coopérative, l’adhésion ou nos activités ? Notre équipe est à votre écoute.'
])

<section class="contact-page">
    <div class="container">
        <div class="contact-intro">
            <span class="section-label">ÉCHANGEONS</span>
            <h2>Construisons ensemble des solutions durables.</h2>
            <p>
                Vous souhaitez rejoindre l’UHSAS, obtenir des informations
                sur nos activités ou devenir partenaire ? Contactez-nous
                par téléphone, par e-mail ou à travers notre formulaire.
            </p>
        </div>

        <div class="contact-grid">
            {{-- Coordonnées --}}
            <div class="contact-info">
                <div class="contact-info-heading">
                    <span class="contact-kicker">NOS COORDONNÉES</span>
                    <h3>Parlons de votre projet.</h3>
                    <p>
                        Choisissez le moyen de contact qui vous convient.
                        Nous serons ravis d’échanger avec vous.
                    </p>
                </div>

                <a class="contact-info-card"
                   href="mailto:uhsas2026@gmail.com">
                    <span class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="contact-info-text">
                        <small>Adresse e-mail</small>
                        <strong>uhsas2026@gmail.com</strong>
                        <span>Nous envoyer un e-mail</span>
                    </span>
                    <i class="fas fa-arrow-up-right-from-square contact-arrow"></i>
                </a>

                <a class="contact-info-card"
                   href="tel:+221775130253">
                    <span class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </span>
                    <span class="contact-info-text">
                        <small>Téléphone principal</small>
                        <strong>+221 77 513 02 53</strong>
                        <span>Appeler l’UHSAS</span>
                    </span>
                    <i class="fas fa-arrow-up-right-from-square contact-arrow"></i>
                </a>

                <a class="contact-info-card"
                   href="tel:+2211531246">
                    <span class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </span>
                    <span class="contact-info-text">
                        <small>Deuxième numéro communiqué</small>
                        <strong>+221 153 12 46</strong>
                        <span>Appeler ce numéro</span>
                    </span>
                    <i class="fas fa-arrow-up-right-from-square contact-arrow"></i>
                </a>

                <div class="contact-info-card contact-address">
                    <span class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                    <span class="contact-info-text">
                        <small>Notre localisation</small>
                        <strong>Dakar, Rufisque</strong>
                        <span>Sénégal</span>
                    </span>
                </div>

                <a class="contact-whatsapp"
                   href="https://wa.me/221775130253"
                   target="_blank"
                   rel="noopener noreferrer">
                    <i class="fab fa-whatsapp"></i>
                    <span>
                        <strong>Écrivez-nous sur WhatsApp</strong>
                        <small>Un moyen simple et rapide de nous contacter</small>
                    </span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            {{-- Formulaire --}}
            <div class="contact-form-wrapper">
                <div class="contact-form-heading">
                    <span class="contact-kicker">FORMULAIRE DE CONTACT</span>
                    <h3>Envoyez-nous un message</h3>
                    <p>
                        Remplissez les champs ci-dessous pour nous présenter
                        votre demande.
                    </p>
                </div>

                <form class="contact-form"
                      action="#"
                      method="POST"
                      onsubmit="event.preventDefault(); alert('Le formulaire sera activé après la configuration de son traitement côté serveur.');">

                    <div class="contact-form-row">
                        <label>
                            Nom complet <span>*</span>
                            <input
                                type="text"
                                name="name"
                                placeholder="Votre nom et prénom"
                                autocomplete="name"
                                required>
                        </label>

                        <label>
                            Adresse e-mail <span>*</span>
                            <input
                                type="email"
                                name="email"
                                placeholder="exemple@email.com"
                                autocomplete="email"
                                required>
                        </label>
                    </div>

                    <label>
                        Numéro de téléphone
                        <input
                            type="tel"
                            name="phone"
                            placeholder="+221 77 000 00 00"
                            autocomplete="tel">
                    </label>

                    <label>
                        Objet de votre demande <span>*</span>
                        <select name="subject" required>
                            <option value="">Sélectionnez un objet</option>
                            <option value="adhesion">Adhésion à l’UHSAS</option>
                            <option value="cotisation">Cotisations et contributions</option>
                            <option value="partenariat">Partenariat</option>
                            <option value="activites">Nos activités et projets</option>
                            <option value="information">Demande d’information</option>
                            <option value="autre">Autre demande</option>
                        </select>
                    </label>

                    <label>
                        Votre message <span>*</span>
                        <textarea
                            name="message"
                            rows="6"
                            placeholder="Expliquez-nous votre demande..."
                            required></textarea>
                    </label>

                    <p class="contact-form-note">
                        <i class="fas fa-lock"></i>
                        Vos informations sont destinées au traitement
                        de votre demande par l’UHSAS.
                    </p>

                    <button class="btn btn-green contact-submit" type="submit">
                        Envoyer le message
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection