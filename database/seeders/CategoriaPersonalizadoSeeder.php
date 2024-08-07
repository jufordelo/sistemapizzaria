<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriaPersonalizado;


class CategoriaPersonalizadoSeeder extends Seeder
{

    public function run(): void
    {
        CategoriaPersonalizado::factory()->count(4)->sequence(
            ['nome'=> 'Bolo chocolate Belga kg'],
            ['nome'=> 'Bolo morango com chantilly kg'],
            ['nome'=> 'Bolo Marta Rocha kg'],
            ['nome'=> 'Bolo RedVelvet kg'],
            )->create();
    }

}
