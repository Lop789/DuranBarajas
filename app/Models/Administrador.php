<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administradores';

    protected $fillable = [
        'nombre',
        'apellido',
        'usuario',
        'rol',
        'correo',
        'telefono',
        'contrasena',
        'direccion',
        'imagen',
        'estado',
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];
}