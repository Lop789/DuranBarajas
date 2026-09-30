<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\RegistroHuellaController;
use App\Http\Controllers\AdministradorController;

Route::get('/', function () {
    return view('ecologia');
});

Route::get('/servicios', function () {
    return view('servicios');
});

Route::get('/reservaciones', function () {
    return view('reservaciones');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/ecologia', function () {
    return view('ecologia');
});

Route::get('/admin', function () {
    return view('admin.admin');
});

Route::get('/admin/usuarios/listado', [UsuarioController::class, 'listado']);
Route::get('/admin/usuarios/formulario', [UsuarioController::class, 'formulario']);
Route::post('/admin/usuarios/guardar', [UsuarioController::class, 'guardar']);

Route::get('/admin/usuarios/editar/{usuario}', [UsuarioController::class, 'editar']);
Route::put('/admin/usuarios/actualizar/{usuario}', [UsuarioController::class, 'actualizar']);
Route::delete('/admin/usuarios/eliminar/{usuario}', [UsuarioController::class, 'eliminar']);

Route::get('/admin/actividades/listado', [ActividadController::class, 'listado']);
Route::get('/admin/actividades/formulario', [ActividadController::class, 'formulario']);
Route::post('/admin/actividades/guardar', [ActividadController::class, 'guardar']);

Route::get('/admin/actividades/editar/{actividad}', [ActividadController::class, 'editar']);
Route::put('/admin/actividades/actualizar/{actividad}', [ActividadController::class, 'actualizar']);
Route::delete('/admin/actividades/eliminar/{actividad}', [ActividadController::class, 'eliminar']);

Route::get('/admin/registros-huella/listado', [RegistroHuellaController::class, 'listado']);
Route::get('/admin/registros-huella/formulario', [RegistroHuellaController::class, 'formulario']);
Route::post('/admin/registros-huella/guardar', [RegistroHuellaController::class, 'guardar']);

Route:: get('/admin/registros-huella/editar/{registroHuella}', [RegistroHuellaController::class, 'editar']);
Route::put('/admin/registros-huella/actualizar/{registroHuella}', [RegistroHuellaController::class, 'actualizar']);
Route::delete('/admin/registros-huella/eliminar/{registroHuella}', [RegistroHuellaController::class, 'eliminar']);  

Route::get('/admin/administradores/listado', [AdministradorController::class, 'listado']);
Route::get('/admin/administradores/formulario', [AdministradorController::class, 'formulario']);
Route::post('/admin/administradores/guardar', [AdministradorController::class, 'guardar']);

Route::get('/admin/administradores/editar/{administrador}', [AdministradorController::class, 'editar']);
Route::put('/admin/administradores/actualizar/{administrador}', [AdministradorController::class, 'actualizar']);
Route::delete('/admin/administradores/eliminar/{administrador}', [AdministradorController::class, 'eliminar']);