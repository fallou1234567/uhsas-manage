<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(
            default: route('dashboard', absolute: false),
            navigate: true
        );
    }
}; ?>

<div class="min-h-screen bg-[#043D23] flex items-center justify-center px-4 py-10 relative overflow-hidden">

    {{-- Décor arrière-plan --}}
    <div class="absolute -top-32 -right-32 w-80 h-80 rounded-full bg-[#075B32]/60 blur-3xl"></div>
    <div class="absolute -bottom-40 -left-32 w-96 h-96 rounded-full bg-[#0B7040]/40 blur-3xl"></div>

    <div class="relative z-10 w-full max-w-md">

        {{-- Logo --}}
        <div class="text-center mb-7">

            <div class="inline-flex items-center justify-center mb-5">
                <div class="w-28 h-28 rounded-2xl bg-white shadow-xl p-3 flex items-center justify-center">
                    <img
                        src="{{ asset('asset/images/logo-uhsas.jpeg') }}"
                        alt="UHSAS"
                        class="w-full h-full object-contain rounded-xl"
                    >
                </div>
            </div>

            <h1 class="text-2xl font-bold text-white">
                UHSAS
            </h1>

            <p class="text-white/70 text-sm mt-1">
                Plateforme de gestion des membres
            </p>

        </div>

        {{-- Carte Login --}}
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            {{-- En-tête --}}
            <div class="px-7 pt-7 pb-4">

                <h2 class="text-2xl font-bold text-[#043D23]">
                    Bienvenue
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Connectez-vous à votre espace administrateur.
                </p>

            </div>

            <div class="px-7 pb-7">

                {{-- Session Status --}}
                <x-auth-session-status
                    class="mb-5"
                    :status="session('status')"
                />

                <form wire:submit="login" class="space-y-5">

                    {{-- Email --}}
                    <div>

                        <label
                            for="email"
                            class="block text-sm font-semibold text-gray-700 mb-2">
                            Adresse e-mail
                        </label>

                        <div class="relative">

                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <i class="fas fa-envelope text-[#075B32]"></i>
                            </div>

                            <input
                                wire:model="form.email"
                                id="email"
                                class="block w-full pl-11 pr-4 py-3.5
                                       border border-gray-200 rounded-xl
                                       bg-gray-50 text-gray-800
                                       placeholder-gray-400
                                       focus:bg-white
                                       focus:ring-2 focus:ring-[#075B32]/20
                                       focus:border-[#075B32]
                                       outline-none transition"
                                type="email"
                                name="email"
                                placeholder="exemple@uhsas.sn"
                                required
                                autofocus
                                autocomplete="username"
                            />

                        </div>

                        <x-input-error
                            :messages="$errors->get('form.email')"
                            class="mt-2"
                        />

                    </div>


                    {{-- Password --}}
                    <div>

                        <label
                            for="password"
                            class="block text-sm font-semibold text-gray-700 mb-2">
                            Mot de passe
                        </label>

                        <div class="relative">

                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <i class="fas fa-lock text-[#075B32]"></i>
                            </div>

                            <input
                                wire:model="form.password"
                                id="password"
                                class="block w-full pl-11 pr-12 py-3.5
                                       border border-gray-200 rounded-xl
                                       bg-gray-50 text-gray-800
                                       placeholder-gray-400
                                       focus:bg-white
                                       focus:ring-2 focus:ring-[#075B32]/20
                                       focus:border-[#075B32]
                                       outline-none transition"
                                type="password"
                                name="password"
                                placeholder="Votre mot de passe"
                                required
                                autocomplete="current-password"
                            />

                        </div>

                        <x-input-error
                            :messages="$errors->get('form.password')"
                            class="mt-2"
                        />

                    </div>


                    {{-- Remember + mot de passe oublié --}}
                    <div class="flex items-center justify-between gap-3">

                        <label
                            for="remember"
                            class="inline-flex items-center cursor-pointer">

                            <input
                                wire:model="form.remember"
                                id="remember"
                                type="checkbox"
                                name="remember"
                                class="w-4 h-4 rounded border-gray-300
                                       text-[#075B32]
                                       focus:ring-[#075B32]">

                            <span class="ml-2 text-sm text-gray-600">
                                Se souvenir de moi
                            </span>

                        </label>

                        @if (Route::has('password.request'))

                            <a
                                href="{{ route('password.request') }}"
                                wire:navigate
                                class="text-sm font-medium text-[#075B32]
                                       hover:text-[#D6A52E] transition">

                                Mot de passe oublié ?

                            </a>

                        @endif

                    </div>


                    {{-- Bouton --}}
                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        class="w-full flex items-center justify-center gap-2
                               py-3.5 px-5 rounded-xl
                               bg-[#075B32] text-white
                               font-semibold
                               hover:bg-[#043D23]
                               focus:outline-none
                               focus:ring-4 focus:ring-[#075B32]/20
                               transition duration-200
                               shadow-lg shadow-[#075B32]/20">

                        <span wire:loading.remove wire:target="login">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Se connecter
                        </span>

                        <span wire:loading wire:target="login">
                            <i class="fas fa-spinner fa-spin mr-2"></i>
                            Connexion...
                        </span>

                    </button>

                </form>

            </div>

            {{-- Footer de la carte --}}
            <div class="px-7 py-4 bg-[#F4F7F3] border-t border-gray-100">

                <div class="flex items-center justify-center gap-2 text-xs text-gray-500">

                    <i class="fas fa-shield-alt text-[#D6A52E]"></i>

                    <span>
                        Accès sécurisé à l'administration UHSAS
                    </span>

                </div>

            </div>

        </div>


        {{-- Footer --}}
        <div class="text-center mt-6">

            <p class="text-xs text-white/50">
                © {{ date('Y') }} UHSAS — Tous droits réservés
            </p>

        </div>

    </div>

</div>