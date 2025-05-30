<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sku' => $this->faker->unique()->numberBetween(100000, 999999),
            'nombre' => $this->faker->sentence(),
            'descripcion' => $this->faker->text(200),
            'image_path' => 'producto/' . $this->faker->image('public/storage/producto', 640, 480, null, false),
            'precio' => $this->faker->randomFloat(2, 1, 1000),
            'subcategoria_id' => $this->faker->numberBetween(1,11)
        ];
    }
}
