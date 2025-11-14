@extends('layouts.web.layout-web')

@section('titulo', $post->meta_title ?: '')

@section('descripcion', $post->meta_description ?: '')

@section('imagen', $post->meta_image ? url($post->meta_image) : asset('assets/imagen/default.jpg'))

@section('contenido')
    <div class="r_centrar_pagina">
        <div class="r_pading_pagina">

            <div class="pagina_post_grid">

                <!-- COLUMNA 1: Post principal -->
                <div class="grid_1">
                    <article>

                        <!-- Título -->
                        <h1 class="titulo">{{ $post->titulo }}</h1>

                        <!-- AUTOR -->
                        <a class="contenedor_autor" href=" ">

                            <div class="imagen">

                                <img src="{{ asset('assets/imagen/default.jpg') }}">

                            </div>

                            <div class="datos">
                                <p> Nombre </p>
                                <span> Cargo</span>
                            </div>
                        </a>

                        <!-- FECHA -->
                        <div class="fecha">
                            <i class="fa-solid fa-clock"></i>
                            @php
                                use Carbon\Carbon;
                                setlocale(LC_TIME, 'es_ES.UTF-8'); // Establece español
                                $fecha = Carbon::parse($post->created_at)->translatedFormat('d M Y');
                            @endphp

                            <span>{{ $fecha }}</span>
                        </div>
                        @php
                            // Reemplaza todos los <oembed> por <iframe>
                            $contenido = preg_replace_callback(
                                '/<oembed url="([^" ]+)">
                                <\/oembed>/i',
                                function ($matches) {
                                    $url = $matches[1];
                                    // Extraer el ID del video de YouTube
                                    if (preg_match('/(?:v=|\/)([a-zA-Z0-9_-]{11})/', $url, $id)) {
                                        $videoId = $id[1];
                                        return '<iframe width="560" height="315" src="https://www.youtube.com/embed/' .
                                            $videoId .
                                            '" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>';
                                    }
                                    return '';
                                },
                                $post->contenido,
                            );
                        @endphp

                        <div class="g_ck_editor">
                            {!! $contenido !!}
                        </div>

                        @php
                            $p = $post->documento;

                            $lista = $p['lista'] ?? [];
                        @endphp
                        @if (!empty($lista) && is_array($lista))

                            <div class="documentos_adjuntos r_margin_top_40">
                                <h2><strong class="r_negrita">Documentos adjuntos:</strong></h2>
                                @foreach ($lista as $item)
                                    @if (!empty($item['link']))
                                        <a href="{{ $item['link'] }}" target="_blank"
                                            style="background: {{ $item['texto_color'] }}; color: {{ $item['boton_color'] }}">
                                            <i class="fa-solid fa-link"></i> {{ $item['texto'] }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        @endif

                    </article>

                    @include('partials.compartir-redes', [
                        'url' => url()->current(),
                        'title' => $post->meta_title ?? '',
                        'description' => $post->meta_description ?? '',
                        'image' => $post->meta_image ? url($post->meta_image) : asset('assets/imagen/default.jpg'),
                    ])
                </div>

                <!-- COLUMNA 2: Sidebar o contenido adicional -->
                <div class="grid_2">
                    @if ($otrosPosts->count())
                        <div class="contenedor_lista_post">
                            @foreach ($otrosPosts as $post)
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    <div class="post_card_contenedor">
                                        <img src="{{ $post->imagen }}">
                                        <div class="post_datos">
                                            <div class="fecha">
                                                <b>{{ $post->created_at->format('d') }}</b>
                                                <p>{{ $post->created_at->format('M') }}</p>
                                                <p>{{ $post->created_at->format('Y') }}</p>
                                            </div>
                                            <div class="datos">
                                                <p class="titulo">{{ $post->meta_title }}</p>
                                                <p class="descripcion">{{ $post->meta_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <!-- links de paginación -->
                        <div class="g_paginacion r_margin_top_40">
                            {{ $otrosPosts->links('vendor.pagination.default') }}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
