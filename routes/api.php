<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuarioApiController;
use App\Http\Controllers\Api\ActividadApiController;
use App\Http\Controllers\Api\RegistroHuellaApiController;

Route::get('/usuarios', [UsuarioApiController::class, 'index']);
Route::get('/usuarios/{usuario}', [UsuarioApiController::class, 'show']);
Route::post('/usuarios', [UsuarioApiController::class, 'store']);
Route::put('/usuarios/{usuario}', [UsuarioApiController::class, 'update']);
Route::delete('/usuarios/{usuario}', [UsuarioApiController::class, 'destroy']);

Route::get('/actividades', [ActividadApiController::class, 'index']);
Route::get('/actividades/{actividad}', [ActividadApiController::class, 'show']);
Route::post('/actividades', [ActividadApiController::class, 'store']);
Route::put('/actividades/{actividad}', [ActividadApiController::class, 'update']);
Route::delete('/actividades/{actividad}', [ActividadApiController::class, 'destroy']);

Route::get('/registros-huella', [RegistroHuellaApiController::class, 'index']);
Route::get('/registros-huella/{registroHuella}', [RegistroHuellaApiController::class, 'show']);
Route::post('/registros-huella', [RegistroHuellaApiController::class, 'store']);
Route::put('/registros-huella/{registroHuella}', [RegistroHuellaApiController::class, 'update']);
Route::delete('/registros-huella/{registroHuella}', [RegistroHuellaApiController::class, 'destroy']);