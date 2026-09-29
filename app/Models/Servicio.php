<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'duracion',
        'imagen',
        'disponibilidad',
        'estado'
    ];

    public function reservaciones()
    {
        return $this->hasMany(Reservacion::class);
    }
}