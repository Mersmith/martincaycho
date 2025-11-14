@extends('layouts.web.layout-web')

@section('titulo', 'Contacto')

@section('contenido')
<div class="r_centrar_pagina">
    <div class="r_pading_pagina r_gap_pagina">

        <div class="g_contenedor_columna">
            @include('partials.titulo-encabezado', [
            'titulo' => 'Contáctame y <span>construyamos</span>',
            'descripcion' => 'Un mejor Perú',
            'alineacion'=> 'center',
            'color' => 'color_1',
            ])

            <div class="contacto_grid">
                <!-- INFORMACIÓN -->
                <div class="contacto_info">
                    <p><i class="fa-solid fa-phone"></i> <strong>Celular:</strong><br> +51 924218321</p>
                    <p>
                        <i class="fa-solid fa-envelope"></i>
                        <strong>Email:</strong>
                        <br> contacto@martincaycho.com<br>
                    </p>
                    <p><i class="fa-solid fa-location-dot"></i> <strong>Desde:</strong><br> El Agustino
                    </p>

                    <div class="contacto_mapa">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31216.11751430149!2d-77.01767660903339!3d-12.042509523504059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c676e6cef7e3%3A0x5e83b54b9576d7ec!2sEl%20Agustino!5e0!3m2!1sen!2spe!4v1763142081980!5m2!1sen!2spe"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <!-- FORMULARIO -->
                <div class="contacto_formulario">
                    @if (session('success'))
                    <div class="g_alerta_succes">
                        <i class="fa-solid fa-circle-check"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="g_alerta_error">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <div>
                            <strong>Por favor corrige los siguientes errores:</strong>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('contacto.enviar') }}" method="POST" class="g_formulario">
                        @csrf

                        <div class="form_grupo">
                            <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" required>
                            @error('nombre')
                            <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form_grupo">
                            <input type="email" name="email" placeholder="Correo" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form_grupo">
                            <input type="text" name="telefono" placeholder="Celular" value="{{ old('telefono') }}">
                            @error('telefono')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form_grupo">
                            <input type="text" name="asunto" placeholder="Asunto" value="{{ old('asunto') }}">
                            @error('asunto')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form_grupo">
                            <textarea name="mensaje" placeholder="Detalle" required>{{ old('mensaje') }}</textarea>
                            @error('mensaje')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit"><i class="fa-solid fa-paper-plane"></i> Enviar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection