<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SegUsuarioSeeder extends Seeder
{
    public function run()
    {
        $estados = ['Activo', 'Inactivo'];
        $conectado = ['S', 'N'];
        $dominios = ['gmail.com', 'hotmail.com', 'empresa.com', 'dominio.net'];

        for ($i = 1; $i <= 20; $i++) {
            $nombre = fake()->firstName();
            $apellido = fake()->lastName();
            $email = Str::lower($nombre[0].$apellido).rand(1,99).'@'.$dominios[array_rand($dominios)];
            
            DB::table('seg_usuario')->insert([
                'usuarioAlias' => Str::lower(substr($nombre, 0, 3).substr($apellido, 0, 3).rand(1,9)),
                'usuarioPassword' => md5('Password'.$i), // Hash MD5 aquí
                'usuarioNombre' => "$nombre $apellido",
                'usuarioEmail' => $email,
                'usuarioEstado' => $estados[array_rand($estados)],
                'usuarioConectado' => $conectado[array_rand($conectado)],
                'usuarioUltimaConexion' => Carbon::now()->subDays(rand(0, 90)),
            ]);
        }

        $this->command->info('✅ 20 usuarios de prueba creados en seg_usuario con MD5');
    }
}