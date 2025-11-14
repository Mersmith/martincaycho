<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagina;
use App\Models\Seccion;

class PaginaController extends Controller
{
    public function show($slug = '/')
    {
        $slug = $slug === '' ? '/' : $slug;

        $pagina = Pagina::where('slug', $slug)
            ->where('activo', true)
            ->firstOrFail();

        // Si es personalizada → renderiza vista fija
        /*if ($pagina->tipo === 'personalizado') {
            return view('web.paginas.' . $pagina->slug, compact('pagina'));
        }*/

        // Si es de secciones → renderizar con bloques
        if ($pagina->tipo === 'secciones') {
            $bloques = collect($pagina->contenido['lista'] ?? [])
                ->map(function ($item) {
                    $seccion = Seccion::find($item['seccion_id']);
                    return [
                        'id' => $item['id'],
                        'tipo' => $item['tipo'],
                        'seccion' => $seccion,
                    ];
                });

            return view('web.builder.index', compact('pagina', 'bloques'));
        }

        abort(404);
    }
}
