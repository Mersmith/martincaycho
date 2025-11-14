<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pagina>
 */
class PaginaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulo = $this->faker->sentence(3);
        return [
            'titulo' => $titulo,
            'slug' => Str::slug($titulo),
            'contenido' => $this->faker->paragraphs(5, true),
            'imagen' => 'https://via.placeholder.com/800x400.png?text=Pagina',
            'mostrar_en_menu' => true,
            'orden' => 0,
            'estado' => true,
        ];
    }
}
