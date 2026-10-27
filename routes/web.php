<?php

use App\Http\Controllers\Admin\ContributionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\MemberAdminController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Public\MemberController;
use App\Http\Controllers\Public\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\SiteController;

// Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('inscription')->name('registration.')->group(function () {

    Route::get('/', [
        RegistrationController::class,
        'create'
    ])->name('create');

    Route::post('/', [
        RegistrationController::class,
        'store',
    ])->name('store');

    Route::get('/success/{member}', [
        RegistrationController::class,
        'success',
    ])->name('success');
});



Route::get('/api/regions/{region}/departments', [
    RegistrationController::class,
    'departments',
])->name('api.regions.departments');

Route::get('/api/departments/{department}/communes', [
    RegistrationController::class,
    'communes',
])->name('api.departments.communes');


// Route::get(
//     '/departments/{department}/communes',
//     [LocationController::class, 'communes']
// );

Route::get(
    '/inscription/{member}/carte/pdf',
    [RegistrationController::class, 'pdf']
)->name('registration.card.pdf');
Route::get(
    '/membre/{member}',
    [MemberController::class, 'show']
)->name('member.public');



Route::middleware(['auth'])

    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('members', MemberAdminController::class);

        Route::resource('contributions', ContributionController::class);

        Route::resource('professions', ProfessionController::class);

        /*
        |--------------------------------------------------------------------------
        | Membres
        |--------------------------------------------------------------------------
        */

        // Liste des membres
        Route::get(
            'members',
            [MemberAdminController::class, 'index']
        )->name('members.index');

        // Formulaire de création
        Route::get(
            'members/create',
            [MemberAdminController::class, 'create']
        )->name('members.create');

        // Enregistrer un membre
        Route::post(
            'members',
            [MemberAdminController::class, 'store']
        )->name('members.store');

        // Voir un membre
        Route::get(
            'members/{member}',
            [MemberAdminController::class, 'show']
        )->name('members.show');

        // Formulaire de modification
        Route::get(
            'members/{member}/edit',
            [MemberAdminController::class, 'edit']
        )->name('members.edit');

        // Modifier un membre
        Route::put(
            'members/{member}',
            [MemberAdminController::class, 'update']
        )->name('members.update');

        // Désactiver/supprimer un membre
        Route::delete(
            'members/{member}',
            [MemberAdminController::class, 'destroy']
        )->name('members.destroy');

        // Activer un membre
        Route::post(
            'members/{member}/activate',
            [MemberAdminController::class, 'activate']
        )->name('members.activate');
        Route::resource(
            'contributions',
            ContributionController::class
        );

        Route::get(
            'locations/regions',
            [LocationController::class, 'regions']
        )->name('locations.regions');

        Route::get(
            'locations/departments',
            [LocationController::class, 'departments']
        )->name('locations.departments');

        Route::post('/regions', [LocationController::class, 'storeRegion'])
            ->name('regions.store');

        Route::resource('professions', ProfessionController::class);

    });

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
})->name('logout');

Route::get('/membre/{member}', [
    MemberController::class,
    'show',
])->name('member.public');

Route::get('/membre/{member}/qr', [
    MemberController::class,
    'qr',
])->name('member.public.qr');



Route::get('/', [SiteController::class, 'home'])
    ->name('site.home');

Route::get('/cooperative', [SiteController::class, 'about'])
    ->name('site.about');

Route::get('/activites', [SiteController::class, 'activities'])
    ->name('site.activities');

Route::get('/projets', [SiteController::class, 'projects'])
    ->name('site.projects');

Route::get('/partenaires', [SiteController::class, 'partners'])
    ->name('site.partners');

Route::get('/actualites', [SiteController::class, 'news'])
    ->name('site.news');

Route::get('/contact', [SiteController::class, 'contact'])
    ->name('site.contact');

Route::prefix('mise-a-jour-membre')
    ->name('member.public.update.')
    ->controller(MemberController::class)
    ->group(function () {

        // Page de recherche par téléphone
        Route::get('/', 'index')->name('index');

        // Recherche d'une fiche à modifier
        Route::post('/rechercher', 'search')
            ->middleware('throttle:5,1')
            ->name('search');

        // Recherche d'un membre pour afficher sa carte virtuelle
        Route::post('/voir-ma-carte', 'searchCard')
            ->middleware('throttle:5,1')
            ->name('card.search');

        // Affichage de la carte virtuelle
        Route::get('/{member}/ma-carte', 'card')
            ->whereNumber('member')
            ->name('card');

        // Formulaire de modification
        // À sécuriser avec un jeton temporaire avant la mise en production.
        Route::get('/{member}/modifier', 'edit')
            ->whereNumber('member')
            ->name('edit');

        // Enregistrement des modifications
        Route::put('/{member}', 'update')
            ->whereNumber('member')
            ->middleware('throttle:5,1')
            ->name('save');
    });
require __DIR__.'/auth.php';
