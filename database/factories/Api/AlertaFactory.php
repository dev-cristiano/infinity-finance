<?php

namespace Database\Factories\Api;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Api\Alerta>
 */
class AlertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(3),
            'descricao' => fake()->sentence(10),
            'valor' => fake()->randomFloat(2, 0, 1000),
            'data_alerta' => fake()->date(),
            'user_id' => 2,
            'created_at' => now(),
            'data_alerta_final' => fake()->date(),
            'alerta_recorrente' => fake()->boolean(),
        ];
    }
}
