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
            // Usamos una imagen falsa por URL o ruta dummy
            'image_path' => 'https://via.placeholder.com/640x480.png?text=Producto+Fake', // O puedes usar una URL como https://via.placeholder.com/640x480
            'precio' => $this->faker->randomFloat(2, 1, 1000),
            'subcategoria_id' => $this->faker->numberBetween(1, 11),
        ];
    }
}
