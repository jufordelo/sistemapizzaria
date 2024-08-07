<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriaEstoque;

class CategoriaEstoqueSeeder extends Seeder
{
    public function run(): void
    {
        CategoriaEstoque::factory()->count(5)->sequence(
            ['tipo'=> 'Utencílio'],
            ['tipo'=> 'Alimento'],
            ['tipo'=> 'Decoração'],
            ['tipo'=> 'Embalagens'],
            ['tipo'=> 'Outro'],)->create();
    }
}
