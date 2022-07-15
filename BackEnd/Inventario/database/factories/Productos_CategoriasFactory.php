<?php

namespace Database\Factories;

use App\Models\Categorias;
use App\Models\Productos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos_Categorias>
 */
class Productos_CategoriasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $producto = Productos::whereRaw('id = (select max(`id`) from productos)')->get();
        $categoria = Categorias::whereRaw('id = (select max(`id`) from categorias)')->get();
        return [
            'productos_id' => fake()->numberBetween($min = 1, $max = $producto[0]->id),
            'categorias_id' => fake()->numberBetween($min = 1, $max = $categoria[0]->id),
        ];
    }
}
