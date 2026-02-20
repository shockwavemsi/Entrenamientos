<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(CiclistaSeeder::class);
<<<<<<< HEAD
        $this->call(BloqueEntrenamientoSeeder::class);
        $this->call(SesionEntrenamientoSeeder::class);
        $this->call(PlanEntrenamientoSeeder::class); 
        $this->call(HistoricoCiclistaSeeder::class);

=======
        $this->call(PlanEntrenamientoSeeder::class);
        $this->call(BloqueEntrenamientoSeeder::class);
        $this->call(SesionEntrenamientoSeeder::class);
        $this->call(SesionBloqueSeeder::class);
>>>>>>> 9fa50a7b4beef02ddfdaef498c5645841fbcfe97
    }
}
