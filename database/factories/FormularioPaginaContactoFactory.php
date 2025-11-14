<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FormularioPaginaContacto>
 */
class FormularioPaginaContactoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_formulario_id' => 1,
            'nombre' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'telefono' => $this->faker->phoneNumber(),
            'asunto' => $this->faker->sentence(3),
            'mensaje' => $this->faker->paragraph(2),
            'leido' => false,
        ];
    }
}
