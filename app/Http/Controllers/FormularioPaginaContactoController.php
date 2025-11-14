<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormularioPaginaContacto;

class FormularioPaginaContactoController extends Controller
{
    public function index()
    {
        return view('web.paginas.contacto');
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'mensaje' => 'required|string|min:5',
            'telefono' => 'nullable|regex:/^[0-9]{9}$/',
            'asunto' => 'nullable|string|max:255',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El nombre debe contener solo texto válido.',
            'nombre.max' => 'El nombre no puede superar los 255 caracteres.',

            'email.required' => 'El campo correo es obligatorio.',
            'email.email' => 'Debes ingresar un correo electrónico válido.',

            'mensaje.required' => 'El campo mensaje es obligatorio.',
            'mensaje.string' => 'El mensaje debe ser un texto válido.',
            'mensaje.min' => 'El mensaje debe tener al menos 5 caracteres.',

            'telefono.regex' => 'El número de teléfono debe tener exactamente 9 dígitos numéricos.',

            'asunto.string' => 'El asunto debe ser un texto válido.',
            'asunto.max' => 'El asunto no puede superar los 255 caracteres.',
        ]);

        FormularioPaginaContacto::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
            'tipo_formulario_id' => 1,
        ]);

        return back()->with('success', 'Gracias por tu mensaje. ¡Te contactaremos pronto!');
    }
}
