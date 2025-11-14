@extends('layouts.web.layout-web')

@section('titulo', 'Soy Martín Caycho')

@section('descripcion', 'Soy Martín Caycho Autor y Emprendedor Peruano Desde El Agustino para el Perú. Empresario,
comunicador y apasionado por el desarrollo social. Autor del libro “Perú, Tierra de Incautos”, una mirada crítica y
reflexiva sobre nuestra realidad nacional, con el deseo de inspirar un cambio verdadero basado en valores, trabajo y
esperanza.')

@section('imagen', asset('assets/imagenes/nosotros/nosotros-1.jpg'))

@section('contenido')

@include('bloques.bloque-1', ['p_elemento' => $bloque1_1])

<div class="r_centrar_pagina">
    <div class="r_pading_pagina">
        <div class="r_contenedor_columna">
            @include('bloques.bloque-6', ['p_elemento' => $bloque6_1])

            @include('bloques.bloque-2', ['p_elemento' => $bloque2_1])
        </div>


        <div class="r_contenedor_columna">
            @include('bloques.bloque-2', ['p_elemento' => $bloque2_2])
        </div>
    </div>
</div>

<div class="r_contenedor_columna">
    @include('bloques.bloque-4', ['p_elemento' => $bloque4_1])
</div>

<div class="r_centrar_pagina">
    <div class="r_pading_pagina">
        <div class="r_contenedor_columna">
            @include('bloques.bloque-8', ['p_elemento' => $bloque8_1])
        </div>


        <div class="r_margin_bottom_40">
            @include('partials.titulo-encabezado', [
            'titulo' => 'Blog',
            'alineacion' => 'left',
            'color' => 'color_1',
            ])
            @include('partials.slider-post', ['p_elemento' => $posts])
        </div>
    </div>
</div>

@endsection