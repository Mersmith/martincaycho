@if (!empty($p_elemento) && !empty($p_elemento->contenido))

@php
$p = $p_elemento->contenido;

$titulo = $p['titulo'];
$subtitulo = $p['subtitulo'];
$content_html = $p['content_html'];

@endphp

@include('partials.titulo-encabezado', [
'titulo' => $titulo,
'descripcion' => $subtitulo,
'color' => 'color_1',
'alineacion' => 'center',
])

@if (!empty($content_html) && !empty($content_html))
<div class="g_ck_editor">
    @php
    $contenido = preg_replace_callback(
    '/<oembed\s+url="([^"]+)"\s*>\s*<\/oembed>/i',
            function ($matches) {
            $url = $matches[1];

            // Extraer el ID del video de YouTube
            if (preg_match('/(?:v=|\/)([a-zA-Z0-9_-]{11})/', $url, $id)) {
            $videoId = $id[1];
            return '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $videoId . '"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>';
            }

            // Si no es un enlace válido de YouTube, devuelve vacío
            return '';
            },
            $content_html
            );
            @endphp


            {!! $contenido !!}
</div>
@endif
@endif