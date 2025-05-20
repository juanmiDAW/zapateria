<?php

use App\Http\Controllers\CarritoController;
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

Route::get('site/login', function(){
    return view('welcome');
})->name('logueo');

Route::resource('carritos', CarritoController::class);