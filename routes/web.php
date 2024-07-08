<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\ProveedorController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');

Route::resource('estados', EstadoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('metodo-pagos', MetodoPagoController::class);
Route::resource('proveedors', ProveedorController::class);

