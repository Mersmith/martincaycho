@if (!empty($p_elemento) && !empty($p_elemento->contenido))

@php
$p = $p_elemento->contenido;

$titulo = $p['titulo'] ?? '';
$titulo_descripcion = $p['titulo_descripcion'] ?? '';
$lista = $p['lista'] ?? [];
@endphp

@include('partials.titulo-encabezado', [
'titulo' => $titulo,
'descripcion' => $titulo_descripcion,
'alineacion' => 'center',
'color' => 'color_1',
])

@if (!empty($lista) && is_array($lista))
<section class="bloque_3">
    @foreach ($lista as $item)
    <div class="card">

        @if (!empty($item['titulo']))
        <h3>{!! $item['titulo'] !!}</h3>
        @endif

        @if (!empty($item['descripcion']))
        <p>{!! $item['descripcion'] !!}</p>
        @endif

        @if (!empty($item['imagen']))
        <img src="{{ $item['imagen'] }}" alt="{{ $item['imagen_seo'] ?? '' }}">
        @endif

        @if (!empty($item['subtitulo']))
        <div class="contenido">
            <p>{!! $item['subtitulo'] !!}</p>
        </div>
        @endif

        @php
        $boton = $item['boton'] ?? null;
        @endphp

        @if (!empty($boton) && !empty($boton['texto']))
        <a href="{{ $boton['link'] ?? '#' }}" target="_blank" class="btn-whatsapp"
            style="background-color: {{ $boton['fondo_color'] ?? '#000' }}; color: {{ $boton['texto_color'] ?? '#fff' }}">
            @if (!empty($boton['icono']))
            <i class="{{ $boton['icono'] }}"></i>
            @endif
            {{ $boton['texto'] }}
        </a>
        @endif

    </div>
    @endforeach
</section>
@endif
@endif
