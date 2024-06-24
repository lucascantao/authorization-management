<?php

namespace Database\Seeders;

use App\Models\Rota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rota::create([
            'endpoint' => 'user',
        ]);

        Rota::create([
            'endpoint' => 'rota',
        ]);
    }
}
