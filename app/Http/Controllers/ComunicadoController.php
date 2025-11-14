<?php

namespace App\Http\Controllers;
use App\Models\Comunicado;

class ComunicadoController extends Controller
{
    public function index()
    {
        $posts = Comunicado::where('activo', true)->latest()->paginate(6);
        return view('web.paginas.comunicado', compact('posts'));
    }

    public function show($slug)
    {
        $post = Comunicado::where('slug', $slug)->where('activo', true)->firstOrFail();

        $otrosPosts = Comunicado::where('activo', true)->latest()
            ->paginate(5);

        return view('web.paginas.comunicado-item', compact('post', 'otrosPosts'));
    }
}
