@extends('layouts.web.layout-web')

@section('contenido')
    <div class="contenedor_login">
        <div class="contenedor_login_imagen">
            <!--IMAGEN-->
            <img src="{{ asset('assets/imagenes/nosotros/nosotros-2.jpg') }}" alt="" />
            <!--TEXTO-->
            <div>
                <h2>"Sorteamos cada mes miles de productos"</h2>
                <h3>Nickol Sinchi </h3>
                <p>Propietaria de Aybar Las</p>
            </div>
        </div>

        <div class="contenedor_login_formulario">
            <!--FORMULARIO CENTRAR-->
            <div class="login_formulario_centrar">

                <!--LOGO-->
                <div class="login_formulario_logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/imagen/logo.png') }}" alt="" />
                    </a>
                </div>

                <!--TITULO-->
                <h1 class="titulo_formulario">¡HOLA! BIENVENIDO DE NUEVO </h1>

                <!--PÁRRAFO-->
                <p class="descripcion_formulario">Inicie sesión con los datos correctos.
                </p>

                @if ($errors->any())
                    <div class="g_alerta_error">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <div>
                            <strong>Por favor corrige los siguientes errores:</strong>
                        </div>
                    </div>
                @endif

                <form action="{{ route('ingresar.admin') }}" method="POST" class="g_formulario">
                    @csrf

                    <div class="form_grupo">
                        <label for="email">Correo electrónico</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form_grupo">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" required>
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit">
                        Ingresar
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
