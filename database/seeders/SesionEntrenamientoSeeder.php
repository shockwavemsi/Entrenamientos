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
            ],
            [
                'id_plan' => 1,
                'fecha' => '2026-01-05',
                'nombre' => 'Sweet Spot corto',
                'descripcion' => 'Intervalos controlados',
                'completada' => 1,
            ],
            [
                'id_plan' => 1,
                'fecha' => '2026-01-07',
                'nombre' => 'Series VO2Max',
                'descripcion' => 'Bloques de alta intensidad',
                'completada' => 0,
            ],
            [
                'id_plan' => 1,
                'fecha' => '2026-01-10',
                'nombre' => 'Tirada larga',
                'descripcion' => 'Sesión de fondo a ritmo suave',
                'completada' => 1,
            ],
            [
                'id_plan' => 1,
                'fecha' => '2026-01-12',
                'nombre' => 'Cadencia alta',
                'descripcion' => 'Trabajo técnico de pedaleo',
                'completada' => 0,
            ],

            // PLAN 2
            [
                'id_plan' => 2,
                'fecha' => '2026-01-20',
                'nombre' => 'Sweet Spot progresivo',
                'descripcion' => 'Trabajo de umbral',
                'completada' => 0,
            ],
            [
                'id_plan' => 2,
                'fecha' => '2026-01-22',
                'nombre' => 'Umbral sostenido',
                'descripcion' => 'Intervalos largos al 95% FTP',
                'completada' => 1,
            ],
            [
                'id_plan' => 2,
                'fecha' => '2026-01-25',
                'nombre' => 'Fuerza en subida',
                'descripcion' => 'Trabajo de baja cadencia',
                'completada' => 1,
            ],
            [
                'id_plan' => 2,
                'fecha' => '2026-01-27',
                'nombre' => 'Recuperación activa',
                'descripcion' => 'Rodaje suave para soltar piernas',
                'completada' => 1,
            ],
            [
                'id_plan' => 2,
                'fecha' => '2026-01-30',
                'nombre' => 'Test de potencia',
                'descripcion' => 'Evaluación de rendimiento',
                'completada' => 0,
            ],
        ]);
    }
}
