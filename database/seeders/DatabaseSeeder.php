<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            // Otros seeders aquí
        ]);
        
        // Crear algunos usuarios de prueba con user_type
        \App\Models\User::factory(5)->create([
            'user_type' => 'externo', // Asignar un tipo por defecto a los usuarios de prueba
        ]);
    }
}