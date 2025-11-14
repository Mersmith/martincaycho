@section('tituloPagina', 'Sección')

@section('anchoPantalla', '100%')

<div class="g_gap_pagina">
    <!--CABECERA TITULO PAGINA-->
    <div class="g_panel cabecera_titulo_pagina">
        <!--TITULO-->
        <h2>Sección</h2>

        <!--BOTONES-->
        <div class="cabecera_titulo_botones">
            <a href="{{ route('admin.seccion.vista.todo') }}" class="g_boton g_boton_light">
                Inicio <i class="fa-solid fa-house"></i></a>
        </div>
    </div>

    <!--TABLA-->
    <div class="g_panel">
        @if ($secciones->count())
        <!--TABLA CABECERA-->
        <div class="tabla_cabecera">
            <!--TABLA CABECERA BOTONES-->
            <div class="tabla_cabecera_botones">
                <button>
                    PDF <i class="fa-solid fa-file-pdf"></i>
                </button>

                <button>
                    EXCEL <i class="fa-regular fa-file-excel"></i>
                </button>
            </div>

            <!--TABLA CABECERA BUSCAR-->
            <div class="tabla_cabecera_buscar">
                <form action="">
                    <input type="text" id="buscar" name="buscar" placeholder="Buscar...">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </form>
            </div>
        </div>

        <!--TABLA CONTENIDO-->
        <div class="tabla_contenido">
            <div class="contenedor_tabla">
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($secciones as $index => $item)
                        <tr>
                            <td> {{ $index + 1 }} </td>
                            <td class="g_resaltar">{{ $item->nombre }}</td>
                            <td>{{ $item->tipo }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if ($secciones->hasPages())
        <div class="g_paginacion">
            {{ $secciones->links('vendor.pagination.default-livewire') }}
        </div>
        @endif
        @else
        <div class="g_vacio">
            <p>No hay secciones disponibles.</p>
            <i class="fa-regular fa-face-grin-wink"></i>
        </div>
        @endif
    </div>
</div>
