<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloqueEntrenamiento extends Model
{
    // Nombre de la tabla (porque NO sigue la convención de Laravel)
    protected $table = 'bloque_entrenamiento';

    // La tabla NO tiene timestamps (created_at, updated_at)
    public $timestamps = false;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo',
        'duracion_estimada',
        'potencia_pct_min',
        'potencia_pct_max',
        'pulso_pct_max',
        'pulso_reserva_pct',
        'comentario'
    ];
}