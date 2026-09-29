<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';

    protected $fillable = [
        'reservacion_id',
        'monto',
        'metodo',
        'referencia',
        'fecha_pago',
        'estado',
        'comprobante'
    ];

    public function reservacion()
    {
        return $this->belongsTo(Reservacion::class);
    }
}