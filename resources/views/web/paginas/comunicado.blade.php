@extends('layouts.web.layout-web')

@section('titulo', 'Comunicado')

@section('contenido')

<div class="r_centrar_pagina">
    <div class="r_pading_pagina">

        <div class="r_contenedor_columna">
            @include('partials.titulo-encabezado', [
            'titulo' => 'Comunicados',
            'color' => 'color_1',
            'alineacion' => 'center',
            ])

            <div class="partials_contenedor_grid_post">
                <div class="grid_post">
                    @foreach ($posts as $post)
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

                <div class="g_paginacion r_margin_top_40">
                    {{ $posts->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection