@extends('layouts.web.layout-web')

@section('titulo', $pagina->titulo ?: '')
@section('descripcion', $pagina->meta_description ?: '')

@section('meta_title', $pagina->meta_titulo ?: '')
@section('meta_description', $pagina->meta_description ?: '')

@section('contenido')
<div class="r_centrar_pagina">
    <div class="r_pading_pagina r_gap_pagina">
        <div class="r_contenedor_columna">
            @foreach ($bloques as $bloque)
            @include('bloques.' . $bloque["tipo"], ['p_elemento' => $bloque["seccion"]])
            @endforeach
        </div>
    </div>
</div>
@endsection