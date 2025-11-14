@if (!empty($p_elemento) && !empty($p_elemento->contenido))

    @php
        $p = $p_elemento->contenido;

        $titulo = $p['titulo'];
        $subtitulo = $p['subtitulo'];

    @endphp

    <div class="bloque_6">
        @include('partials.titulo-encabezado', [
            'titulo' => $titulo,
            'descripcion' => $subtitulo,
            'alineacion' => 'center',
            'color' => 'color_1',
        ])
    </div>
@endif
