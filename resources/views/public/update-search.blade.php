@extends('layouts.public-site')

@section('title', 'MAJ publique - UHSAS')

@section('content')

    <style>
        /* Formulaire public UHSAS */
        .uhsas-form-group {
            display: flex;
            flex-direction: column;
            gap: 9px;
            margin-bottom: 25px;
            width: 100%;
        }

        .uhsas-form-group>label {
            display: block;
            margin: 0;
            color: #173f35;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.1px;
        }

        /* Champ de téléphone */
        .uhsas-form-group .uhsas-input {
            display: block;
            width: 100%;
            min-width: 0;
            min-height: 56px;
            margin: 0;
            padding: 15px 17px;
            border: 1px solid #dce4dd;
            border-radius: 12px;
            outline: none;
            background-color: #fff;
            color: #173f35;
            font-family: inherit;
            font-size: 16px;
            font-weight: 500;
            line-height: 1.5;
            box-shadow: 0 2px 5px rgba(23, 63, 53, 0.04);
            appearance: none;
            -webkit-appearance: none;
            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background-color 0.2s ease;
        }

        .uhsas-form-group .uhsas-input:hover {
            border-color: #a5b8aa;
        }

        .uhsas-form-group .uhsas-input:focus {
            border-color: #173f35;
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 0 4px rgba(23, 63, 53, 0.12);
        }

        .uhsas-form-group .uhsas-input::placeholder {
            color: #9ba69e;
            font-size: 14px;
            font-weight: 400;
            opacity: 1;
        }

        /* Champ invalide */
        .uhsas-form-group .uhsas-input.is-invalid,
        .uhsas-form-group .uhsas-input:invalid:not(:placeholder-shown) {
            border-color: #dc5353;
        }

        .uhsas-form-group .uhsas-input.is-invalid:focus {
            box-shadow: 0 0 0 4px rgba(220, 83, 83, 0.10);
        }

        /* Message d'aide */
        .uhsas-input-help {
            margin: 0;
            color: #758178;
            font-size: 12px;
            line-height: 1.6;
        }

        /* Mobile */
        @media (max-width: 600px) {
            .uhsas-form-group {
                gap: 8px;
                margin-bottom: 22px;
            }

            .uhsas-form-group .uhsas-input {
                min-height: 52px;
                padding: 13px 14px;
                font-size: 16px;
            }
        }
    </style>


    <section class="content-section" style="padding: 70px 0;">
        <div class="container" style="max-width: 650px; margin: auto;">
            <h1>Mettre à jour ma fiche membre</h1>

            <p>
                Saisissez le numéro de téléphone associé à votre inscription
                à l’UHSAS pour retrouver votre fiche.
            </p>

            @if (session('search_error'))
                <div class="alert alert-danger">
                    {{ session('search_error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif



            <form method="POST" action="{{ route('member.public.update.search') }}">
                @csrf

                <div class="uhsas-form-group">
                    <label for="phone">Numéro de téléphone</label>

                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                        class="uhsas-input @error('phone') is-invalid @enderror" placeholder="Ex. : 77 123 45 67"
                        autocomplete="tel" inputmode="tel" maxlength="30" required aria-describedby="phone-help"
                        aria-invalid="{{ $errors->has('phone') ? 'true' : 'false' }}">

                    <small id="phone-help" class="uhsas-input-help">
                        Utilisez le numéro associé à votre inscription UHSAS.
                    </small>

                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="uhsas-search-actions">
                    <button type="submit" class="btn btn-gold">
                        Rechercher ma fiche
                    </button>

                    <button type="submit" formaction="{{ route('member.public.update.card.search') }}" formmethod="POST"
                        class="btn uhsas-view-card-btn">
                        Voir ma carte
                    </button>
                </div>
            </form>


        </div>
    </section>
@endsection
