<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SugestaoModel>
 */
class SugestaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'assunto' => $this->faker->word(),
            'tipo' => $this->faker->randomElement(['Ótimo', 'Bom', 'Médio', 'Ruim', 'Péssimo']),
            'comentario' => $this->faker->paragraph(),
        ];
    }
}
