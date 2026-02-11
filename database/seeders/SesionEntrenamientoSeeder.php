<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SesionEntrenamientoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sesion_entrenamientos')->insert([
            [
                'id_plan' => 1,
                'fecha' => '2026-01-03',
                'nombre' => 'Rodaje aeróbico',
                'descripcion' => 'Sesión continua de resistencia',
                'completada' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_plan' => 1,
                'fecha' => '2026-01-05',
                'nombre' => 'Sweet Spot corto',
                'descripcion' => 'Intervalos controlados',
                'completada' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_plan' => 2,
                'fecha' => '2026-01-20',
                'nombre' => 'Sweet Spot progresivo',
                'descripcion' => 'Trabajo de umbral',
                'completada' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

