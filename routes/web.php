<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ZapatoController;
use App\Models\Carrito;
use App\Models\Zapato;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('zapatos.index', ['zapatos' => Zapato::all()]);
})->name('inicio');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

Route::resource('zapatos', ZapatoController::class);

Route::get('site/login', function () {
    return view('welcome');
})->name('logueo');

Route::get('carritos/meter{id}', function ($id) {

    $cantidad = Carrito::where('usuario_id', auth()->user()->id)->where('zapato_id', $id)->first()->cantidad ?? 0;

    if ($cantidad > 0) {
        Carrito::where('usuario_id', auth()->user()->id)->where('zapato_id', $id)->update([
            'cantidad' => $cantidad + 1
        ]);
    } elseif ($cantidad == 0) {
        Carrito::create([
            'usuario_id' => auth()->user()->id,
            'zapato_id' => $id,
            'cantidad' => $cantidad + 1,
        ]);
    };


    return redirect()->route('inicio');
})->name('anyadir');

Route::resource('carritos', CarritoController::class);
