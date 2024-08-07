<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriaSugestao;

class CategoriaSugestaoSeeder extends Seeder
{
    public function run(): void
    {
        CategoriaSugestao::factory()->count(5)->sequence(
            ['tipo'=> 'Ótimo'],
            ['tipo'=> 'Bom'],
            ['tipo'=> 'Médio'],
            ['tipo'=> 'Ruim'],
            ['tipo'=> 'Péssimo'],)->create();
    }
}
