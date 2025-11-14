@if (!empty($p_elemento) && !empty($p_elemento->contenido))

@php
$p = $p_elemento->contenido;

$titulo = $p['titulo'];

$imagen = $p['imagen'];
$imagen_seo = $p['imagen_seo'];
@endphp

<div class="bloque_5">
    @if (!empty($imagen))
    <img src="{{ asset($imagen) }}" alt="{{ $imagen_seo }}">
    @endif

    @if (!empty($titulo))
    <h3>{{ $titulo }}</h3>
    @endif
</div>
@endif