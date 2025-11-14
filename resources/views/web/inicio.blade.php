@extends('layouts.web.layout-web')

@section('titulo', 'Inicio')

@section('contenido')

    @include('bloques.bloque-1', ['p_elemento' => $bloque1_1])

    <div class="r_centrar_pagina">
        <div class="r_pading_pagina">
            <div class="r_gap_pagina r_margin_top_40 r_margin_bottom_40">
                @include('bloques.bloque-6', ['p_elemento' => $bloque6_1])

                @include('bloques.bloque-2', ['p_elemento' => $bloque2_1])

                @include('bloques.bloque-2', ['p_elemento' => $bloque2_2])
            </div>
        </div>
    </div>

    <div class="r_gap_pagina r_margin_bottom_40">
        @include('bloques.bloque-4', ['p_elemento' => $bloque4_1])
    </div>

    <div class="r_centrar_pagina">
        <div class="r_pading_pagina">
            <div class="r_gap_pagina">

                <div>
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
    </div>

@endsection
