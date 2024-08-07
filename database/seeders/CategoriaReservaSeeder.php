<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriaReserva;

class CategoriaReservaSeeder extends Seeder
{
    public function run(): void
    {
        CategoriaReserva::factory()->count(6)->sequence(
            ['nome'=> 'Mesa 1'],
            ['nome'=> 'Mesa 2'],
            ['nome'=> 'Mesa 3'],
            ['nome'=> 'Mesa 4'],
            ['nome'=> 'Local todo'],
            ['nome'=> 'Área externa'] )->create();
    }
}
