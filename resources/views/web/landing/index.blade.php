@extends('layouts.web.layout-web')

@section('titulo', 'Landing')

@section('contenido')

@include('bloques.bloque-1', ['p_elemento' => $bloque1_1])

<div class="r_centrar_pagina">
    <div class="r_pading_pagina">
        <div class="r_contenedor_columna">
            @include('bloques.bloque-2', ['p_elemento' => $bloque2_1])
        </div>
    </div>
</div>

<div class="r_contenedor_columna">
    @include('bloques.bloque-4', ['p_elemento' => $bloque4_1])
</div>

<div class="r_centrar_pagina">
    <div class="r_pading_pagina">
        <div class="r_gap_pagina">

            <div class="landing_grid">
                <!-- INFORMACIÓN -->
                <div class="contacto_info">
                    <img src="{{ asset('assets/imagenes/nosotros/nosotros-6.jpg') }}" alt="{{ $alt ?? 'Imagen' }}">
                </div>

                <!-- FORMULARIO -->
                <div class="contacto_formulario" id="formulario-libro">
                    <div class="r_contenedor_columna">
                        @include('partials.titulo-encabezado', [
                        'titulo' => 'Regístrate y <span>recibe el libro</span>',
                        'descripcion' => 'Completa tus datos correctamente y te enviaré.',
                        'alineacion' => 'center',
                        'color' => 'color_1',
                        ])

                        @if (session('success'))
                        <div class="g_alerta_succes">
                            <i class="fa-solid fa-circle-check"></i>
                            <div>{{ session('success') }}</div>
                        </div>

                        @include('partials.visualizador-pdf', [
                        'link' => asset('assets/pdf/peru-tierra-de-incautos.pdf'),
                        'textoBoton' => 'Leer Libro Completo'
                        ])

                        @else

                        @if ($errors->any())
                        <div class="g_alerta_error">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            <div>
                                <strong>Por favor corrige los siguientes errores:</strong>
                            </div>
                        </div>
                        @endif

                        <form action="{{ route('landing.store') }}" method="POST" class="g_formulario">
                            @csrf

                            <!-- NOMBRE -->
                            <div class="form_grupo">
                                <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}"
                                    required minlength="2" maxlength="50" pattern="[A-Za-zÁÉÍÓÚÑáéíóúñ ]+"
                                    title="Solo letras y espacios.">
                                @error('nombre')
                                <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- APELLIDOS -->
                            <div class="form_grupo">
                                <input type="text" name="apellido" placeholder="Apellidos" value="{{ old('apellido') }}"
                                    required minlength="2" maxlength="80" pattern="[A-Za-zÁÉÍÓÚÑáéíóúñ ]+"
                                    title="Solo letras y espacios.">
                                @error('apellido')
                                <div class="error-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- CORREO -->
                            <div class="form_grupo">
                                <input type="email" name="email" placeholder="Correo" value="{{ old('email') }}"
                                    required maxlength="120">
                                @error('email')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- CELULAR -->
                            <div class="form_grupo">
                                <input type="text" name="telefono" placeholder="Celular" value="{{ old('telefono') }}"
                                    inputmode="numeric" pattern="[0-9]{9}" minlength="9" maxlength="9"
                                    title="Debe contener 9 dígitos numéricos.">
                                @error('telefono')
                                <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit"><i class="fa-solid fa-paper-plane"></i> Enviar</button>
                        </form>

                        @endif
                    </div>
                </div>
            </div>

            @include('bloques.bloque-8', ['p_elemento' => $bloque8_1])
        </div>
    </div>
</div>

<div class="r_centrar_pagina">
    <div class="r_pading_pagina r_gap_pagina">
        <div class="r_contenedor_columna">
            @include('bloques.bloque-2', ['p_elemento' => $bloque2_2])
        </div>
    </div>
</div>

<div class="r_margin_top_40">
    @include('bloques.bloque-4', ['p_elemento' => $bloque4_2])
</div>
@endsection