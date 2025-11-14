<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class InicioController extends Controller
{
    public function index()
    {
        $bloque1_1 = app(SeccionController::class)->getSeccionPorTipo(1, 'bloque-1'); //slider

        $bloque6_1 = app(SeccionController::class)->getSeccionPorTipo(2, 'bloque-6'); //titulo

        $bloque2_1 = app(SeccionController::class)->getSeccionPorTipo(3, 'bloque-2'); //dos columnas
        $bloque2_2 = app(SeccionController::class)->getSeccionPorTipo(4, 'bloque-2');

        $bloque4_1 = app(SeccionController::class)->getSeccionPorTipo(5, 'bloque-4'); //call

        $bloque8_1 = app(SeccionController::class)->getSeccionPorTipo(6, 'bloque-8'); //testimonio

        $posts = $this->getBlog();

        return view('web.inicio', compact('bloque1_1', 'bloque6_1', 'bloque2_1', 'bloque2_2', 'bloque4_1', 'bloque8_1', 'posts',));
    }

    public function getBlog()
    {
        $consulta_id = 1;

        $titulo = 'Blog';

        $data = Blog::where('activo', true)->latest()->take(6)->get();

        return [
            'id' => $consulta_id,
            'titulo' => $titulo,
            'posts' => $data,
        ];
    }
}
