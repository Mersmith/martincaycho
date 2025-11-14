<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class InicioController extends Controller
{
    public function index()
    {
        $bloque1_1 = app(SeccionController::class)->getSeccionPorTipo(1, 'bloque-1');//slider

        $bloque6_1 = app(SeccionController::class)->getSeccionPorTipo(6, 'bloque-6');//titulo

        $bloque2_1 = app(SeccionController::class)->getSeccionPorTipo(7, 'bloque-2');//dos columnas
        $bloque2_2 = app(SeccionController::class)->getSeccionPorTipo(8, 'bloque-2');
        $bloque2_3 = app(SeccionController::class)->getSeccionPorTipo(9, 'bloque-2');
        
        $bloque4_1 = app(SeccionController::class)->getSeccionPorTipo(4, 'bloque-4');//call

        $bloque8_1 = app(SeccionController::class)->getSeccionPorTipo(15, 'bloque-8');//testimonio
        
        $posts = $this->getBlog();

        return view('web.inicio', compact('bloque1_1', 'bloque6_1', 'bloque2_1', 'bloque2_2', 'bloque8_1', 'posts', 'bloque4_1', ));
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
