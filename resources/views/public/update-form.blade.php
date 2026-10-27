@extends('layouts.public-site')

@section('title', 'Modifier ma fiche membre - UHSAS')

@section('content')

    <style>
        /* =========================================
       UHSAS — Aperçu photo de profil
       ========================================= */

        .uhsas-photo-group {
            margin-bottom: 28px;
        }

        .uhsas-photo-group>label:first-child {
            display: block;
            margin-bottom: 12px;
            color: #173f35;
            font-size: 14px;
            font-weight: 700;
        }

        .uhsas-photo-preview-wrapper {
            display: flex;
            align-items: center;
            gap: 22px;
            padding: 22px;
            background: #fafbf9;
            border: 1px solid #e3e9e3;
            border-radius: 16px;
        }

        .uhsas-photo-preview {
            position: relative;
            display: flex;
            flex-shrink: 0;
            align-items: center;
            justify-content: center;
            width: 132px;
            height: 132px;
            overflow: hidden;
            background: #edf2ed;
            border: 3px solid #fff;
            border-radius: 50%;
            box-shadow: 0 0 0 1px #dce5dd, 0 5px 16px rgba(23, 63, 53, 0.10);
        }

        .uhsas-photo-preview img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .uhsas-photo-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            color: #789084;
            font-size: 11px;
        }

        .uhsas-photo-placeholder[hidden],
        .uhsas-photo-preview img[hidden],
        .uhsas-photo-check[hidden],
        .uhsas-photo-error[hidden] {
            display: none !important;
        }

        .uhsas-photo-placeholder i {
            font-size: 32px;
            color: #a5b8aa;
        }

        .uhsas-photo-check {
            position: absolute;
            right: 2px;
            bottom: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 29px;
            height: 29px;
            color: #fff;
            background: #173f35;
            border: 2px solid #fff;
            border-radius: 50%;
            font-size: 12px;
        }

        .uhsas-photo-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 9px;
            min-width: 0;
        }

        .uhsas-photo-info strong {
            color: #173f35;
            font-size: 15px;
        }

        .uhsas-photo-info p {
            margin: 0;
            color: #718078;
            font-size: 13px;
            line-height: 1.7;
        }

        .uhsas-photo-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 11px 16px;
            color: #fff !important;
            background: #173f35;
            border: 1px solid #173f35;
            border-radius: 9px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 700;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .uhsas-photo-button:hover {
            background: #245b4b;
            transform: translateY(-1px);
        }

        .uhsas-photo-info small {
            color: #8a958d;
            font-size: 11px;
        }

        .uhsas-photo-input {
            position: absolute;
            width: 1px;
            height: 1px;
            overflow: hidden;
            clip-path: inset(50%);
            white-space: nowrap;
        }

        .uhsas-photo-input:focus-visible+.uhsas-photo-error {
            outline: 2px solid #d4af37;
        }

        .uhsas-photo-error {
            display: block;
            margin-top: 10px;
            color: #b42318;
            font-size: 13px;
        }

        /* Mobile */

        @media (max-width: 520px) {
            .uhsas-photo-preview-wrapper {
                align-items: center;
                flex-direction: column;
                padding: 22px 16px;
                text-align: center;
            }

            .uhsas-photo-info {
                align-items: center;
            }

            .uhsas-photo-preview {
                width: 120px;
                height: 120px;
            }
        }


/* Champ date de naissance UHSAS */

.uhsas-date-wrapper {
    position: relative;
    min-height: 54px;
    background: #fff;
    border: 1px solid #dce4dd;
    border-radius: 12px;
    transition: border-color 0.25s ease, box-shadow 0.25s ease;
}

.uhsas-date-wrapper:hover {
    border-color: #a5b8aa;
}

.uhsas-date-wrapper:focus-within {
    border-color: #173f35;
    box-shadow: 0 0 0 4px rgba(23, 63, 53, 0.10);
}

.uhsas-date-wrapper .uhsas-input-icon {
    width: 48px;
    flex-shrink: 0;
    color: #b3932d;
    font-size: 16px;
}

.uhsas-date-wrapper input[type="date"] {
    min-width: 0;
    min-height: 52px;
    padding: 12px 14px 12px 0;
    color: #173f35;
    background: transparent;
    border: none;
    border-radius: 12px;
    outline: none;
    box-shadow: none;
    font-family: inherit;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
}

.uhsas-date-wrapper input[type="date"]:focus {
    border: none;
    outline: none;
    box-shadow: none;
}

.uhsas-date-wrapper input[type="date"]::-webkit-calendar-picker-indicator {
    padding: 5px;
    cursor: pointer;
    opacity: 0.75;
}

.uhsas-date-wrapper input[type="date"]::-webkit-calendar-picker-indicator:hover {
    opacity: 1;
}

.uhsas-date-wrapper input[type="date"]:invalid {
    color: #758178;
}


/* Popup de succès UHSAS */

.uhsas-success-popup {
    border-radius: 20px !important;
    padding: 30px 24px !important;
    box-shadow: 0 20px 60px rgba(23, 63, 53, 0.16) !important;
}

.uhsas-success-title {
    color: #173f35 !important;
    font-weight: 800 !important;
}

.uhsas-success-button {
    padding: 12px 28px !important;
    border-radius: 9px !important;
    font-weight: 700 !important;
}

.swal2-icon.swal2-success {
    border-color: #173f35 !important;
    color: #173f35 !important;
}

.swal2-icon.swal2-success [class^="swal2-success-line"] {
    background-color: #173f35 !important;
}

.swal2-icon.swal2-success .swal2-success-ring {
    border-color: rgba(23, 63, 53, 0.25) !important;
}


@media (max-width: 600px) {
    .uhsas-date-wrapper {
        min-height: 50px;
    }

    .uhsas-date-wrapper .uhsas-input-icon {
        width: 44px;
    }

    .uhsas-date-wrapper input[type="date"] {
        min-height: 48px;
        font-size: 16px;
    }
}



    </style>


@if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Mise à jour réussie !',
                text: @json(session('success')),
                confirmButtonText: 'Continuer',
                confirmButtonColor: '#173f35',
                background: '#ffffff',
                color: '#173f35',
                timer: 4000,
                timerProgressBar: true,
                showConfirmButton: true,
                customClass: {
                    popup: 'uhsas-success-popup',
                    title: 'uhsas-success-title',
                    confirmButton: 'uhsas-success-button'
                }
            });
        });
    </script>
@endif


    <section class="content-section" style="padding: 60px 0;">
        <div class="container" style="max-width: 700px; margin: auto;">
            <h1>Compléter ma fiche membre</h1>

            <p>
                Membre : <strong>{{ $member->first_name }} {{ $member->last_name }}</strong>
                <br>
                Numéro : {{ $member->member_number }}
            </p>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('member.public.update.save', $member->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="form-group uhsas-form-group">
                    <label for="birth_date">Date de naissance</label>

                    <div class="uhsas-input-wrapper uhsas-date-wrapper">
                        <span class="uhsas-input-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </span>

                        <input type="date" id="birth_date" name="birth_date"
                            value="{{ old('birth_date', $member->birth_date?->format('Y-m-d')) }}"
                            class="form-control uhsas-input" max="{{ now()->format('Y-m-d') }}">
                    </div>

                    <small class="uhsas-input-help">
                        Renseignez votre date de naissance exacte.
                    </small>
                </div>



                <div class="form-group uhsas-photo-group">
                    <label for="photo">Photo de profil</label>

                    <div class="uhsas-photo-preview-wrapper">
                        <div class="uhsas-photo-preview" id="photoPreviewContainer">
                            <img id="photoPreview" src="{{ $member->photo ? asset('storage/' . $member->photo) : '' }}"
                                alt="Aperçu de la photo de profil" @if (!$member->photo) hidden @endif>

                            <div class="uhsas-photo-placeholder" id="photoPlaceholder"
                                @if ($member->photo) hidden @endif>
                                <i class="fas fa-user"></i>
                                <span>Aucune photo</span>
                            </div>

                            <span class="uhsas-photo-check" id="photoCheck" hidden>
                                <i class="fas fa-check"></i>
                            </span>
                        </div>

                        <div class="uhsas-photo-info">
                            <strong>Votre photo de profil</strong>
                            <p>
                                Choisissez une image claire pour faciliter
                                l’identification de votre fiche membre.
                            </p>

                            <label for="photo" class="uhsas-photo-button">
                                <i class="fas fa-camera"></i>
                                Choisir une photo
                            </label>

                            <small>JPG, PNG ou WebP · 3 Mo maximum</small>
                        </div>
                    </div>

                    <input type="file" id="photo" name="photo" class="uhsas-photo-input"
                        accept="image/jpeg,image/png,image/webp">

                    <small class="uhsas-photo-error" id="photoError" role="alert" hidden></small>
                </div>


                <button type="submit" class="btn btn-gold">
                    Enregistrer mes modifications
                </button>

                <a href="{{ route('member.public.update.index') }}" class="btn btn-outline">
                    Retour
                </a>
            </form>
        </div>
    </section>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const photoInput = document.getElementById('photo');
            const photoPreview = document.getElementById('photoPreview');
            const photoPlaceholder = document.getElementById('photoPlaceholder');
            const photoCheck = document.getElementById('photoCheck');
            const photoError = document.getElementById('photoError');

            if (!photoInput || !photoPreview) return;

            let previewUrl = null;

            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];

            const maxSize = 3 * 1024 * 1024;

            photoInput.addEventListener('change', function() {
                const file = this.files && this.files[0];

                photoError.textContent = '';
                photoError.hidden = true;

                if (!file) return;

                if (!allowedTypes.includes(file.type)) {
                    showError('Format invalide. Choisissez une image JPG, PNG ou WebP.');
                    this.value = '';
                    return;
                }

                if (file.size > maxSize) {
                    showError('La photo ne doit pas dépasser 3 Mo.');
                    this.value = '';
                    return;
                }

                if (previewUrl) {
                    URL.revokeObjectURL(previewUrl);
                }

                previewUrl = URL.createObjectURL(file);

                photoPreview.onload = function() {
                    photoPreview.hidden = false;
                    photoPlaceholder.hidden = true;
                    photoCheck.hidden = false;
                };

                photoPreview.onerror = function() {
                    showError('Impossible de lire cette image. Choisissez un autre fichier.');
                    photoInput.value = '';
                    photoPreview.removeAttribute('src');
                    photoPreview.hidden = true;
                    photoPlaceholder.hidden = false;
                    photoCheck.hidden = true;

                    URL.revokeObjectURL(previewUrl);
                    previewUrl = null;
                };

                photoPreview.src = previewUrl;
            });

            function showError(message) {
                photoError.textContent = message;
                photoError.hidden = false;
            }

            window.addEventListener('beforeunload', function() {
                if (previewUrl) {
                    URL.revokeObjectURL(previewUrl);
                }
            });
        });
    </script>
@endsection
