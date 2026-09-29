<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    protected $table = 'reservaciones';

    protected $fillable = [
        'cliente_id',
        'servicio_id',
        'fecha',
        'hora',
        'cantidad',
        'subtotal',
        'total',
        'estado'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function pago()
    {
        return $this->hasOne(Pago::class);
    }
}