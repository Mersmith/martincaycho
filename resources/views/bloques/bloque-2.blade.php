@if (!empty($p_elemento) && !empty($p_elemento->contenido))
@php
$p = $p_elemento->contenido;

$invertir = $p['invertir'];

$titulo = $p['titulo'];
$titulo_descripcion = $p['titulo_descripcion'];

$imagen = $p['imagen'];
$imagen_seo = $p['imagen_seo'];

$subtitulo = $p['subtitulo'];
$subtitulo_descripcion = $p['subtitulo_descripcion'];

$lista = $p['lista'] ?? [];

$boton = $p['boton'] ?? [];
$boton_icono = $boton['icono'];
$boton_fondo_color = $boton['fondo_color'];
$boton_texto = $boton['texto'];
$boton_texto_color = $boton['texto_color'];
$boton_link = $boton['link'];
@endphp

@include('partials.titulo-encabezado', [
'titulo' => $titulo,
'descripcion' => $titulo_descripcion,
'alineacion' => 'center',
'color' => 'color_1',
])

<section class="bloque_2 {{ $invertir ? 'invertir' : '' }}">
    <div class="bloque_imagen">
        <img src="{{ $imagen }}" alt="{{ $imagen_seo }}">
    </div>

    <div class="bloque_cuerpo">

        @if (!empty($subtitulo))
        <h3 class="r_sub_titulo_1 color_1">{!! $subtitulo !!}</h3>
        @endif

        @if (!empty($subtitulo_descripcion))
        <p class="r_parrafo color_1">{!! $subtitulo_descripcion !!}</p>
        @endif

        @if (!empty($lista) && is_array($lista))
        <ul class="r_lista">
            @foreach ($lista as $item)
            <li>
                @if (!empty($item['icono']))
                <i class="{{ $item['icono'] }}" style="color: {{ $item['icono_color'] }}"></i>
                @endif
                <span style="color: {{ $item['texto_color'] }}">
                    {{ $item['texto'] }}
                </span>
            </li>
            @endforeach
        </ul>
        @endif

        @if (!empty($boton_texto))
        <a @if (!empty($boton_link)) href="{{ $boton_link }}" @endif target="_blank" class="btn-whatsapp"
            style="background-color: {{ $boton_fondo_color }}; color: {{ $boton_texto_color }}">
            @if (!empty($boton_icono))
            <i class="{{ $boton_icono }}"></i>
            @endif
            {{ $boton_texto }}
        </a>
        @endif
    </div>
</section>
@endif
