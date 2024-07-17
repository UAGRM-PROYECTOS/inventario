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
use App\Http\Controllers\DetalleIngresoController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleOrdenController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\CheckPermission;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified', 'visits'])->name('dashboard');

Route::middleware('auth',)->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth','role:admin' ])->group(function () {
    Route::resource('estados', EstadoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('metodo-pagos', MetodoPagoController::class);
    Route::resource('proveedors', ProveedorController::class);
    #Route::resource('clientes', ClienteController::class);
    Route::resource('productos', ProductoController::class);
#    Route::get('/catalogo', [ProductoController::class, 'CatalogoView'])->name('producto.catalogo');
    Route::resource('ingresos', IngresoController::class);
    Route::resource('metodo-valuacions', MetodoValuacionController::class);
    Route::resource('detalle-ingresos', DetalleIngresoController::class);
    Route::resource('ordens', OrdenController::class);
    Route::resource('ventas', VentaController::class);
    Route::resource('entregas', EntregaController::class);
    Route::get('/addDetalleOrden', [OrdenController::class, 'addDetalleOrden'])->name('ordens.addDetalleOrden');
    Route::get('/orden-pedido/{id}', [OrdenController::class, 'ordenPedido'])->name('orden.pedido');
    Route::resource('detalle-ordens', DetalleOrdenController::class);
    Route::resource('salidas', SalidaController::class);
    Route::resource('inventarios', InventarioController::class);
    Route::resource('pagos', PagoController::class);
    Route::get('/orden-pago/{id}', [PagoController::class, 'ordenPago'])->name('orden.pago');
    

    #PAGOFACIL
    Route::post('/consumirServicio', [PagoController::class, 'RecolectarDatos'])->name('pago.consumirservicio');
    Route::post('/consultar', [PagoController::class, 'ConsultarEstado']);

    #Route::get('/consultarlo', [PagoController::class, 'AccessPagoFacil']);

#Rutas con nombres para clientes
Route::get('/clientes', [ClienteController::class, 'index'])
            ->name('clientes.index')
            ->middleware('auth', 'visits');

Route::get('/clientes/create', [ClienteController::class, 'create'])
            ->name('clientes.create')
            ->middleware('auth');

Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])
            ->name('clientes.edit')
            ->middleware('auth');

Route::delete('/clientes/{id}/destroy', [ClienteController::class, 'destroy'])
            ->name('clientes.destroy')
            ->middleware('auth');

Route::get('/clientes/{id}/show', [ClienteController::class, 'show'])
            ->name('clientes.show')->middleware('auth')
            ->middleware('auth');
#------------------------------------------------------
});

Route::middleware(['auth'])->group(function () {
    Route::get('/catalogo', [ProductoController::class, 'CatalogoView'])->name('producto.catalogo') ;
    Route::resource('detalle-ordens', DetalleOrdenController::class);
    Route::get('/addDetalleOrden', [OrdenController::class, 'addDetalleOrden'])->name('ordens.addDetalleOrden');
    Route::get('/orden-pedido/{id}', [OrdenController::class, 'ordenPedido'])->name('orden.pedido');
});


require __DIR__.'/auth.php';
