@section('tituloPagina', 'Usuario')

@section('anchoPantalla', '100%')

<div class="g_gap_pagina">
    <!--CABECERA TITULO PAGINA-->
    <div class="g_panel cabecera_titulo_pagina">
        <!--TITULO-->
        <h2>Usuario</h2>

        <!--BOTONES-->
        <div class="cabecera_titulo_botones">
            <a href="{{ route('admin.usuario.vista.todo') }}" class="g_boton g_boton_light">
                Inicio <i class="fa-solid fa-house"></i></a>

            <a href="{{ route('admin.usuario.vista.crear') }}" class="g_boton g_boton_primary">
                Crear <i class="fa-solid fa-square-plus"></i></a>
        </div>
    </div>

    <!--TABLA-->
    <div class="g_panel">
        @if ($users->count())
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
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Fecha Creación</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $item)
                        <tr>
                            <td> {{ $index + 1 }} </td>
                            <td class="g_resaltar">{{ $item->name }}</td>
                            <td class="g_resaltar">{{ $item->email }}</td>
                            <td class="g_resaltar">{{ $item->role }}</td>
                            <td class="g_resaltar">{{ $item->created_at }}</td>

                            <td class="centrar_iconos">
                                <a href="{{ route('admin.usuario.vista.editar', $item) }}" class="g_accion_editar">
                                    <span><i class="fa-solid fa-pencil"></i></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if ($users->hasPages())
        <div class="g_paginacion">
            {{ $users->links('vendor.pagination.default-livewire') }}
        </div>
        @endif
        @else
        <div class="g_vacio">
            <p>No hay users disponibles.</p>
            <i class="fa-regular fa-face-grin-wink"></i>
        </div>
        @endif
    </div>
</div>