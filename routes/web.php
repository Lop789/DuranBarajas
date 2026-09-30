<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\RegistroHuellaController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\CategoriaController;

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

Route::get('/admin/usuarios/listar', [UsuarioController::class, 'listar']);
Route::get('/admin/usuarios/crear', [UsuarioController::class, 'vistaFormulario']);
Route::post('/admin/usuarios/registrar', [UsuarioController::class, 'registrar']);

Route::get('/admin/usuarios/editar/{usuario}', [UsuarioController::class, 'vistaEdicion']);
Route::put('/admin/usuarios/actualizar/{usuario}', [UsuarioController::class, 'actualizar']);

Route::get('/admin/usuarios/mostrar/{usuario}', [UsuarioController::class, 'vistaMostrar']);
Route::delete('/admin/usuarios/borrar/{usuario}', [UsuarioController::class, 'borrar']);

Route::get('/admin/actividades/listar', [ActividadController::class, 'listar']);
Route::get('/admin/actividades/crear', [ActividadController::class, 'vistaFormulario']);
Route::post('/admin/actividades/registrar', [ActividadController::class, 'registrar']);

Route::get('/admin/actividades/editar/{actividad}', [ActividadController::class, 'vistaEdicion']);
Route::put('/admin/actividades/actualizar/{actividad}', [ActividadController::class, 'actualizar']);

Route::get('/admin/actividades/mostrar/{actividad}', [ActividadController::class, 'vistaMostrar']);
Route::delete('/admin/actividades/borrar/{actividad}', [ActividadController::class, 'borrar']);

Route::get('/admin/registros-huella/listar', [RegistroHuellaController::class, 'listar']);
Route::get('/admin/registros-huella/crear', [RegistroHuellaController::class, 'vistaFormulario']);
Route::post('/admin/registros-huella/registrar', [RegistroHuellaController::class, 'registrar']);

Route::get('/admin/registros-huella/editar/{registroHuella}', [RegistroHuellaController::class, 'vistaEdicion']);
Route::put('/admin/registros-huella/actualizar/{registroHuella}', [RegistroHuellaController::class, 'actualizar']);

Route::get('/admin/registros-huella/mostrar/{registroHuella}', [RegistroHuellaController::class, 'vistaMostrar']);
Route::delete('/admin/registros-huella/borrar/{registroHuella}', [RegistroHuellaController::class, 'borrar']);

Route::get('/admin/administradores/listar', [AdministradorController::class, 'listar']);
Route::get('/admin/administradores/crear', [AdministradorController::class, 'vistaFormulario']);
Route::post('/admin/administradores/registrar', [AdministradorController::class, 'registrar']);

Route::get('/admin/administradores/editar/{administrador}', [AdministradorController::class, 'vistaEdicion']);
Route::put('/admin/administradores/actualizar/{administrador}', [AdministradorController::class, 'actualizar']);

Route::get('/admin/administradores/mostrar/{administrador}', [AdministradorController::class, 'vistaMostrar']);
Route::delete('/admin/administradores/borrar/{administrador}', [AdministradorController::class, 'borrar']);

Route::get('/admin/categorias/listado', [CategoriaController::class, 'listar']);
Route::get('/admin/categorias/formulario', [CategoriaController::class, 'vistaFormulario']);
Route::post('/admin/categorias/registrar', [CategoriaController::class, 'registrar']);

Route::get('/admin/categorias/editar/{categoria}', [CategoriaController::class, 'vistaEdicion']);
Route::put('/admin/categorias/actualizar/{categoria}', [CategoriaController::class, 'actualizar']);
Route::get('/admin/categorias/mostrar/{categoria}', [CategoriaController::class, 'vistaMostrar']);
Route::delete('/admin/categorias/eliminar/{categoria}', [CategoriaController::class, 'borrar']);