<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sku' => fake()->numberBetween($min = 1000, $max = 9999). fake()->word(),
            'nombre' => fake()->word(),
            'descripcion' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            'precio' => fake()->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'cantidad' => fake()->randomNumber($nbDigits = NULL, $strict = false),
            'estado' => fake()->boolean(),
        ];
    }
}
