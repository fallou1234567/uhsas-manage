<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Public\RegistrationController;

Route::view('/', 'welcome');

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
        'store'
    ])->name('store');

    Route::get('/success/{member}', [
        RegistrationController::class,
        'success'
    ])->name('success');
});

Route::get('/api/regions/{region}/departments', [
    RegistrationController::class,
    'departments'
])->name('api.regions.departments');

Route::get('/api/departments/{department}/communes', [
    RegistrationController::class,
    'communes'
    ])->name('api.departments.communes');

require __DIR__.'/auth.php';
