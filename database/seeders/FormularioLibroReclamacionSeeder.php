<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormularioLibroReclamacion;

class FormularioLibroReclamacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormularioLibroReclamacion::factory()->count(50)->create();
    }
}
