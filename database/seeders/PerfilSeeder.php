<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perfil::create([
            'nome' => 'USUARIO'
        ]);

        Perfil::create([
            'nome' => 'ADMINISTRADOR'
        ]);
    }
}
