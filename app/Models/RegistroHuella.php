<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistroHuella extends Model
{
    protected $table = 'registro_huellas';

    protected $fillable = [
        'usuario_id',
        'actividad_id',
        'cantidad',
        'unidad',
        'impacto_calculado',
        'fecha',
        'observaciones',
        'estado',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function actividad(): BelongsTo
    {
        return $this->belongsTo(Actividad::class);
    }
}