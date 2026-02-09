<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ciclista;

class CiclistaSeeder extends Seeder
{
    public function run()
    {
        Ciclista::create([
            'nombre' => 'Pedro',
            'apellidos' => 'López García',
            'email' => 'pedro@example.com',
            'password' =>'123456',
            'fecha_nacimiento' => '1992-04-10',
            'peso_base' => 72.5,
            'altura_base' => 178
        ]);
    }
}
