<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\MetodoValuacionController;
use App\Http\Controllers\DetalleIngresoController   ;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth',)->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('estados', EstadoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('metodo-pagos', MetodoPagoController::class);
    Route::resource('proveedors', ProveedorController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('productos', ProductoController::class);
    Route::get('/catalogo', [ProductoController::class, 'CatalogoView'])->name('producto.catalogo');
    Route::resource('ingresos', IngresoController::class);
    Route::resource('metodo-valuacions', MetodoValuacionController::class);
    Route::resource('detalle-ingresos', DetalleIngresoController::class);
    Route::resource('ordens', OrdenController::class);
    Route::resource('detalle-ordens', DetalleOrdenController::class);
});
#Route::get('/clientes', [ClienteController::class, 'index'])->name('cliente.index');

#Route::middleware(['auth', 'role:cliente'])->group(function () {    
    #Route::resource('clientes', ClienteController::class);

#});

require __DIR__.'/auth.php';
