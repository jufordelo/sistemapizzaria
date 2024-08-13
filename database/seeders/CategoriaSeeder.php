<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::factory()->count(9)->sequence(
            ['nome'=> 'Pizza Marguerita'],
            ['nome'=> 'Pizza Portuguesa'],
            ['nome'=> 'Pizza Calabresa'],
            ['nome'=> 'Pizza Quatro Queijos'],
            ['nome'=> 'Pizza Salmão'],
            ['nome'=> 'Pizza California'],
            ['nome'=> 'Pizza Brocolis com Rucula'],
            ['nome'=> 'Pizza Milho com Bacon '],
            ['nome'=> 'Pizza Frango com Catupiry'],
            ['nome'=> 'Pizza Coração'],)->create();
    }
}
