@section('tituloPagina', 'Comunicados')

@section('anchoPantalla', '100%')

<div class="g_gap_pagina">
    <!--CABECERA TITULO PAGINA-->
    <div class="g_panel cabecera_titulo_pagina">
        <!--TITULO-->
        <h2>Comunicados</h2>

        <!--BOTONES-->
        <div class="cabecera_titulo_botones">
            <a href="{{ route('admin.comunicado.vista.todo') }}" class="g_boton g_boton_light">
                Inicio <i class="fa-solid fa-house"></i></a>

            <a href="{{ route('admin.comunicado.vista.crear') }}" class="g_boton g_boton_primary">
                Crear <i class="fa-solid fa-square-plus"></i></a>
        </div>
    </div>

    <!--TABLA-->
    <div class="g_panel">
        <div class="tabla_cabecera">
            <div class="tabla_cabecera_buscar">
                <form action="">
                    <input type="text" wire:model.live.debounce.1300ms="buscar" id="buscar" name="buscar"
                        placeholder="Buscar...">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </form>
            </div>
        </div>
        @if ($posts->count())
        <!--TABLA CONTENIDO-->
        <div class="tabla_contenido g_margin_bottom_20">
            <div class="contenedor_tabla">
                <table class="tabla">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Imagen</th>
                            <th>Titulo</th>
                            <th>Slug</th>
                            <th>Descripcion</th>
                            <th>Activo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $index => $item)
                        <tr>
                            <td> {{ $index + 1 }} </td>
                            <td><img src="{{ $item->imagen }}"></td>
                            <td class="g_resaltar">ID: {{ $item->id }} - {{ $item->titulo }}</td>
                            <td class="g_inferior g_resumir">
                                <a href="{{ route('comunicado.show', ['id' => $item->id, 'slug' => $item->slug]) }}"
                                    target="_blank" rel="noopener noreferrer">
                                    <span><i class="fa-solid fa-book"></i></span>
                                    {{ $item->slug }}
                                </a>
                            </td>

                            <td class="g_inferior g_resumir">{{ $item->meta_description }}</td>
                            <td>
                                <span class="estado {{ $item->activo ? 'g_activo' : 'g_desactivado' }}"><i
                                        class="fa-solid fa-circle"></i></span>
                                {{ $item->activo ? 'Activo' : 'Desactivo' }}
                            </td>

                            <td class="centrar_iconos">
                                <a href="{{ route('admin.comunicado.vista.editar', $item->id) }}" class="g_accion_editar">
                                    <span><i class="fa-solid fa-pencil"></i></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if ($posts->hasPages())
        <div class="g_paginacion">
            {{ $posts->links('vendor.pagination.default-livewire') }}
        </div>
        @endif
        @else
        <div class="g_vacio">
            <p>No hay posts disponibles.</p>
            <i class="fa-regular fa-face-grin-wink"></i>
        </div>
        @endif
    </div>
</div>
