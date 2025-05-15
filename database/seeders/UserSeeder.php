<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear 20 usuarios de prueba
        for ($i = 1; $i <= 20; $i++) {
            DB::table('users')->insert([
                'name' => 'Usuario ' . $i,
                'email' => 'usuario' . $i . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),  
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Mensaje de confirmación
        $this->command->info('¡20 usuarios de prueba creados exitosamente!');
    }
}