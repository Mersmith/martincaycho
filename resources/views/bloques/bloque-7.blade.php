@if (!empty($p_elemento) && !empty($p_elemento->contenido))

    @php
        $p = $p_elemento->contenido;

        $titulo = $p['titulo'];
        $titulo_descripcion = $p['titulo_descripcion'];
        $lista = $p['lista'] ?? [];
    @endphp

    @include('partials.titulo-encabezado', [
        'titulo' => $titulo,
        'descripcion' => $titulo_descripcion,
        'alineacion' => 'center',
        'color' => 'color_1',
    ])

    @if (!empty($lista) && is_array($lista))
        <div class="bloque_7">
            @foreach ($lista as $item)
                <div class="card">
                    @if (!empty($item['icono']))
                        <i class="{{ $item['icono'] }}"></i>
                    @endif

                    @if (!empty($item['subtitulo']))
                        <h3 class="r_sub_titulo_1 color_2">{!! $item['subtitulo'] !!}</h3>
                    @endif

                    @if (!empty($item['subtitulo_descripcion']))
                        <p class="r_parrafo color_2">{!! $item['subtitulo_descripcion'] !!}</p>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
@endif
