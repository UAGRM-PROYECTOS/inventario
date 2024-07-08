<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\ProveedorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

#Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');

Route::resource('estados', EstadoController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('metodo-pagos', MetodoPagoController::class);
Route::resource('proveedors', ProveedorController::class);
Route::resource('clientes', ClienteController::class);

require __DIR__.'/auth.php';
