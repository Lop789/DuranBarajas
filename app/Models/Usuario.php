<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'contrasena',
        'direccion',
        'imagen',
        'estado',
    ];

    public function registrosHuella(): HasMany
    {
        return $this->hasMany(RegistroHuella::class);
    }
    protected $hidden = [
    'contrasena',
];
}