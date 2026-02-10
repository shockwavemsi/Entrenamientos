<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloqueEntrenamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bloque_entrenamiento')->insert([
            'nombre' => 'Calentamiento',
            'descripcion' => 'Rodaje suave progresivo',
            'tipo' => 'rodaje',
            'duracion_estimada' => '00:15:00',
            'potencia_pct_min' => 55.0,
            'potencia_pct_max' => 65.0,
            'pulso_pct_max' => 70.0,
            'pulso_reserva_pct' => 50.0,
            'comentario' => 'Subir pulsaciones gradualmente'
        ]);
    }
}