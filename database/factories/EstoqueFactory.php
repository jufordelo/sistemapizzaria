<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estoque>
 */
class EstoqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mprima' => $this->faker->word(),
            'tipo' => $this->faker->randomElement(['Utensílio', 'Alimento', 'Embalagens', 'Decoração', 'Outro']),
            'validade' => $this->faker->paragraph(),
            'quantidade' => $this->faker->word(),
        ];
    }
}
