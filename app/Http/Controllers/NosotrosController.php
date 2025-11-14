<?php

namespace App\Http\Controllers;

class NosotrosController extends Controller
{
    public function index()
    {
        $bloque5_1 = app(SeccionController::class)->getSeccionPorTipo(5, 'bloque-5'); //banner

        $bloque2_1 = app(SeccionController::class)->getSeccionPorTipo(2, 'bloque-2'); //dos columnas

        $bloque3_1 = app(SeccionController::class)->getSeccionPorTipo(3, 'bloque-3');//tambien soy

        $bloque7_1 = app(SeccionController::class)->getSeccionPorTipo(10, 'bloque-7'); //valores

        $bloque4_1 = app(SeccionController::class)->getSeccionPorTipo(11, 'bloque-4');//call

        return view('web.paginas.nosotros', compact('bloque5_1', 'bloque2_1',  'bloque3_1', 'bloque4_1', 'bloque7_1'));
    }
}
