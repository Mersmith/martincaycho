<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function indexIngresarCliente()
    {
        if (Auth::check() && Auth::user()->role === 'cliente') {
            return redirect()->route('cliente.home');
        }

        return view('web.login.ingresar-cliente');
    }

    public function ingresarCliente(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Buscar si el email existe
        $usuario = User::where('email', $request->email)->first();

        if (!$usuario) {
            return back()
                ->withErrors(['email' => 'Este correo no está registrado.'])
                ->withInput();
        }

        // Verificar contraseña
        if (!Hash::check($request->password, $usuario->password)) {
            return back()
                ->withErrors(['password' => 'La contraseña es incorrecta.'])
                ->withInput();
        }

        // Recordarme (checkbox)
        $remember = $request->has('recordarme');

        // Intentar login con recordar
        if (Auth::attempt($request->only('email', 'password'), $remember)) {

            if (Auth::user()->role === 'cliente') {
                return redirect()->route('cliente.home');
            }

            Auth::logout();
            return back()->withErrors([
                'email' => 'Acceso denegado. Solo clientes pueden ingresar aquí.',
            ]);
        }

        return back()->withErrors([
            'email' => 'No se pudo iniciar sesión. Inténtalo de nuevo.',
        ]);
    }

    public function logoutCliente(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('ingresar.cliente');
    }

    public function indexIngresarAdmin()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.home');
        }

        return view('web.login.ingresar-admin');
    }

    public function ingresarAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.home');
            }

            Auth::logout();
            return back()->withErrors([
                'email' => 'Acceso denegado. Solo cliente pueden ingresar aquí.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ]);
    }

    public function logoutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('ingresar.admin');
    }
}
