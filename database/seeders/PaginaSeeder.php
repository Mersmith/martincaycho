<?php

namespace Database\Seeders;

use App\Models\Pagina;
use Illuminate\Database\Seeder;

class PaginaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paginas = [   
            [
                'tipo' => 'secciones',
                'titulo' => 'Terminos y Condiciones',
                'slug' => 'terminos-y-condiciones',
                'contenido' => [
                    'lista' => [
                        [
                            'id' => 1,
                            'seccion_id' => 18,
                            'tipo' => 'bloque-9',
                        ],
                    ],
                ],
                'activo' => true,
            ],
            [
                'tipo' => 'secciones',
                'titulo' => 'Políticas de Privacidad',
                'slug' => 'politicas-de-privacidad',
                'contenido' => [
                    'lista' => [
                        [
                            'id' => 1,
                            'seccion_id' => 19,
                            'tipo' => 'bloque-9',
                        ],
                    ],
                ],
                'activo' => true,
            ],
        ];

        foreach ($paginas as $pagina) {
            Pagina::create($pagina);
        }
    }
}
