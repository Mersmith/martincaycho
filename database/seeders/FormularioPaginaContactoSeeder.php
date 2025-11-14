<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormularioPaginaContacto;

class FormularioPaginaContactoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormularioPaginaContacto::factory(13)->create();
    }
}
