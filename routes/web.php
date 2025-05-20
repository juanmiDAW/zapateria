<?php

use App\Http\Controllers\ZapatoController;
use App\Models\Zapato;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('zapatos.index', ['zapatos' => Zapato::all()]);
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::resource('zapatos', ZapatoController::class);