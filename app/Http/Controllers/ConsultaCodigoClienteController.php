<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaCodigoClienteController extends Controller
{
    public function index(Request $request)
    {
        $dni = $request->input('dni');
        $informaciones = collect();

        if ($dni) {
            $informaciones = DB::table('clientes')
                ->where('dni_ruc_cliente', $dni)
                ->get();
        }

        return view('web.paginas.consulta-codigo-cliente', compact('informaciones', 'dni'));
    }
}
