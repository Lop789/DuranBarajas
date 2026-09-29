<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'contrasena',
        'direccion',
        'imagen',
        'estado'
    ];

    public function reservaciones()
    {
        return $this->hasMany(Reservacion::class);
    }
}