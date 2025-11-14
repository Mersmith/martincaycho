<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seccion;

class SeccionController extends Controller
{
    public function getSeccionPorTipo($id, $tipo)
    {
        return Seccion::where('id', $id)
            ->where('tipo', $tipo)
            ->where('activo', true)
            ->first();
    }
}
