@if (!empty($p_elemento) && !empty($p_elemento->contenido))

@php
$p = $p_elemento->contenido;

$titulo = $p['titulo'];
$titulo_descripcion = $p['titulo_descripcion'];
$subtitulo = $p['subtitulo'];
$subtitulo_descripcion = $p['subtitulo_descripcion'];

$imagen = $p['imagen'];
$imagen_seo = $p['imagen_seo'];
$imagen_fondo = $p['imagen_fondo'];
$imagen_fondo_seo = $p['imagen_fondo_seo'];

$boton = $p['boton'] ?? [];
$boton_icono = $boton['icono'];
$boton_fondo_color = $boton['fondo_color'];
$boton_texto = $boton['texto'];
$boton_texto_color = $boton['texto_color'];
$boton_link = $boton['link'];
@endphp

<div class="bloque_4">
    @if (!empty($imagen))
    <img class="imagen" src="{{ asset($imagen_fondo) }}" alt="{{ $imagen_fondo_seo }}">
    @endif

    <div class="cuerpo">
        <div class="r_centrar_pagina" @if (!empty($align)) style="text-align: {{ $align }};" @endif>
            @if (!empty($titulo))
            @include('partials.titulo-encabezado', [
            'titulo' => $titulo,
            'descripcion' => $titulo_descripcion,
            'alineacion' => 'center',
            'color' => 'color_2',
            ])
            @endif

            <div class="contenido">
                <div class="contenedor_imagen">
                    <img src="{{ asset($imagen) }}" alt="{{ $imagen_seo }}">
                </div>
                <div class="contenedor_datos">
                    @if (!empty($subtitulo))
                    <p class="r_sub_titulo_1 color_2">{!! $subtitulo !!}</p>
                    @endif

                    @if (!empty($boton_texto))
                    <a @if (!empty($boton_link)) href="{{ $boton_link }}" @endif target="_blank" class="boton"
                        style="background-color: {{ $boton_fondo_color }}; color: {{ $boton_texto_color }}">
                        @if (!empty($boton_icono))
                        <i class="{{ $boton_icono }}"></i>
                        @endif
                        {{ $boton_texto }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif