<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $fillable = [
        'categoria_id',
        'nombre',
        'descripcion',
        'unidad',
        'factor_emision',
        'tipo',
        'imagen',
        'estado',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function registrosHuella(): HasMany
    {
        return $this->hasMany(RegistroHuella::class);
    }
}