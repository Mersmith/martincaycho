<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imagen>
 */
class ImagenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => 'https://via.placeholder.com/600x400.png?text=Imagen',
            'titulo' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph(),
            'imagenable_id' => 1,
            'imagenable_type' => 'App\\Models\\Candidato',
        ];
    }
}
