<?php

namespace Database\Factories;

use App\Models\TipoFormulario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FormularioLibroReclamacion>
 */
class FormularioLibroReclamacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_formulario_id' => TipoFormulario::inRandomOrder()->value('id') ?? 1,
            'serie' => 'TCK',
            'nombre' => $this->faker->firstName(),
            'apellido_paterno' => $this->faker->lastName(),
            'apellido_materno' => $this->faker->lastName(),
            'domicilio' => $this->faker->address(),
            'telefono' => $this->faker->optional()->phoneNumber(),
            'email' => $this->faker->optional()->safeEmail(),
            'tipo_documento' => $this->faker->randomElement(['dni', 'ruc', 'ce']),
            'numero_documento' => $this->faker->numerify('########'),
            'tipo_bien_contratado' => $this->faker->randomElement(['producto', 'servicio']),
            'monto_reclamado' => $this->faker->randomFloat(2, 10, 5000),
            'descripcion' => $this->faker->sentence(10),
            'tipo_pedido' => $this->faker->randomElement(['reclamo', 'queja']),
            'detalle' => $this->faker->paragraph(),
            'pedido' => $this->faker->sentence(),
            //'observaciones' => $this->faker->optional()->sentence(),
            //'fecha_respuesta' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
            'leido' => $this->faker->boolean(30),
            'estado' => $this->faker->randomElement(['nuevo', 'revision', 'resuelto', 'cerrado']),
        ];
    }
}
