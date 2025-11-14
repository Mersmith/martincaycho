@section('tituloPagina', 'Formulario libro reclamación')

@section('anchoPantalla', '100%')

<div class="g_gap_pagina">
    <!--CABECERA TITULO PAGINA-->
    <div class="g_panel cabecera_titulo_pagina">
        <!--TITULO-->
        <h2>Formulario libro reclamación</h2>

        <!--BOTONES-->
        <div class="cabecera_titulo_botones">
            <a href="{{ route('admin.formulario-libro-reclamacion.vista.todo') }}" class="g_boton g_boton_light">
                Inicio <i class="fa-solid fa-house"></i></a>
        </div>
    </div>

    <!--TABLA-->
    <div class="g_panel">
        @if ($formularios->count())
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
                                <th>Ticket</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Documento</th>
                                <th>Descripción</th>
                                <th>Leido</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formularios as $index => $item)
                                <tr>
                                    <td> {{ $index + 1 }} </td>
                                    <td class="g_resaltar">{{ $item->codigo }}</td>
                                    <td class="g_resaltar">{{ $item->nombre }}</td>
                                    <td class="g_resaltar">{{ $item->apellido_paterno }}, {{ $item->apellido_materno }}</td>
                                    <td class="g_resaltar">{{ $item->email }}</td>
                                    <td class="g_resaltar">{{ $item->telefono }}</td>
                                    <td class="g_inferior g_resumir g_mayuscula">{{ $item->tipo_documento }}: {{ $item->numero_documento }}</td>
                                    <td class="g_inferior g_resumir">{{ $item->descripcion }}</td>
                                    <td>
                                        @if ($item->leido)
                                            <span class="estado g_desactivado">
                                                <i class="fa-solid fa-circle"></i> 
                                            </span>
                                            Leído
                                        @else
                                            <span class="estado g_activo">
                                                <i class="fa-solid fa-circle"></i> 
                                            </span>
                                            No leído
                                        @endif
                                    </td>
                                    <td>
                                        @switch($item->estado)
                                            @case('nuevo')
                                                <span class="estado g_activo">
                                                    <i class="fa-solid fa-circle"></i>
                                                </span>
                                                Nuevo
                                            @break

                                            @case('revision')
                                                <span class="estado g_accion_ver">
                                                    <i class="fa-solid fa-circle"></i>
                                                </span>
                                                En revisión
                                            @break

                                            @case('resuelto')
                                                <span class="estado g_accion_editar">
                                                    <i class="fa-solid fa-circle"></i>
                                                </span>
                                                Resuelto
                                            @break

                                            @case('cerrado')
                                                <span class="estado g_desactivado">
                                                    <i class="fa-solid fa-circle"></i>
                                                </span>
                                                Cerrado
                                            @break

                                            @default
                                                <span class="estado g_resaltar">
                                                    <i class="fa-solid fa-circle"></i>
                                                </span>
                                                Desconocido
                                        @endswitch
                                    </td>
                                    <td class="g_resaltar">{{ $item->created_at }}</td>
                                    <td class="centrar_iconos">
                                        <a href="{{ route('admin.formulario-libro-reclamacion.vista.editar', $item) }}"
                                            class="g_accion_editar">
                                            <span><i class="fa-solid fa-pencil"></i></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @if ($formularios->hasPages())
                <div class="g_paginacion">
                    {{ $formularios->links('vendor.pagination.default-livewire') }}
                </div>
            @endif
        @else
            <div class="g_vacio">
                <p>No hay formularios disponibles.</p>
                <i class="fa-regular fa-face-grin-wink"></i>
            </div>
        @endif
    </div>
</div>
