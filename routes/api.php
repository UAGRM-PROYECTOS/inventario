<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\PagoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
Route::post('/coordenadas', [CoordenadaController::class, 'storeApi'])->middleware('auth:sanctum');
Route::get('/coordenadas', [CoordenadaController::class, 'indexApi'])->middleware('auth:sanctum');
Route::get('/coordenadas/{id}/show', [CoordenadaController::class, 'showApi'])->middleware('auth:sanctum');
Route::put('/coordenadas/{id}/update', [CoordenadaController::class, 'updateApi'])->middleware('auth:sanctum');
Route::delete('/coordenadas/{id}/destroy', [CoordenadaController::class, 'destroyApi'])->middleware('auth:sanctum');


Route::post('/coordenadas/{id}/cortar-servicio', [CoordenadaController::class, 'cortarServicioApi'])->middleware('auth:sanctum');
Route::post('/coordenadas/{id}/restaurar-servicio', [CoordenadaController::class, 'restaurarServicioApi'])->middleware('auth:sanctum');
Route::get('/coordenadas/sin-cortar', [CoordenadaController::class, 'sinCortarApi'])->middleware('auth:sanctum');
Route::get('/coordenadas/cortadas', [CoordenadaController::class, 'cortadasApi'])->middleware('auth:sanctum');


Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/logout', [AuthApiController::class, 'logout'])->middleware('auth:sanctum');

*/
Route::get('/consultarlo', [PagoController::class, 'AccessPagoFacilv2']);
