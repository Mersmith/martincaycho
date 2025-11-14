@section('tituloPagina', 'Editar bloque 1')

@section('anchoPantalla', '100%')

<div x-data="dataBloque1Editar" class="g_gap_pagina">

    <!--CABECERA TITULO PAGINA-->
    <div class="g_panel cabecera_titulo_pagina">
        <!--TITULO-->
        <h2>Editar bloque 1</h2>

        <!--BOTONES-->
        <div class="cabecera_titulo_botones">
            <a href="{{ route('admin.seccion.bloque-uno.vista.todo') }}" class="g_boton g_boton_light">
                Inicio <i class="fa-solid fa-house"></i></a>

            <a href="{{ route('admin.seccion.bloque-uno.vista.crear') }}" class="g_boton g_boton_primary">
                Crear <i class="fa-solid fa-square-plus"></i></a>

            <button type="button" class="g_boton g_boton_danger" onclick="alertaEliminarBloque1()">
                Eliminar <i class="fa-solid fa-trash-can"></i>
            </button>

            <a href="{{ route('admin.seccion.bloque-uno.vista.todo') }}" class="g_boton g_boton_darkt">
                <i class="fa-solid fa-arrow-left"></i> Regresar</a>
        </div>
    </div>

    <form wire:submit.prevent="store" class="formulario">
        <div class="g_fila">
            <div class="g_columna_8 g_gap_pagina">
                <div class="g_panel">
                    <!--TITULO-->
                    <h4 class="g_panel_titulo">General</h4>

                    <!--NOMBRE-->
                    <div>
                        <label for="nombre">Nombre <span class="obligatorio"><i
                                    class="fa-solid fa-asterisk"></i></span></label>
                        <input type="text" id="nombre" name="nombre" wire:model.live="nombre">
                        @error('nombre')
                        <p class="mensaje_error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="g_panel">
                    <h4 class="g_panel_titulo">Lista</h4>

                    <!--BOTON-->
                    <div class="formulario_botones g_margin_bottom_20">
                        <button type="button" wire:click="agregarItem()" class="agregar">
                            <i class="fa-solid fa-plus"></i>
                            Agregar item
                        </button>
                    </div>

                    <table class="tabla_eliminar">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Imagen Computadora</th>
                                <th>Imagen Móvil</th>
                                <th>Link</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody x-sort="handleBloque1Editar">
                            @foreach ($lista as $index => $imagen)
                            <tr x-sort:item="{{ $imagen['id'] }}" wire:key="imagen-{{ $index }}">
                                <td>
                                    <div x-sort:handle class="handle cursor-move" title="Arrastra aquí"
                                        style="touch-action: none; cursor: grab;">
                                        <i class="fa-solid fa-up-down-left-right"></i>
                                        {{ $imagen['id'] }}
                                    </div>
                                </td>
                                <td>
                                    <input type="text" wire:model="lista.{{ $index }}.imagen_computadora"
                                        wire:key="imagen_computadora-{{ $index }}" @pointerdown.stop @mousedown.stop
                                        @touchstart.stop draggable="false">
                                    @error("lista.$index.imagen_computadora")
                                    <p class="mensaje_error">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" wire:model="lista.{{ $index }}.imagen_movil"
                                        wire:key="imagen_movil-{{ $index }}" @pointerdown.stop @mousedown.stop
                                        @touchstart.stop draggable="false">
                                    @error("lista.$index.imagen_movil")
                                    <p class="mensaje_error">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" wire:model="lista.{{ $index }}.link" wire:key="link-{{ $index }}"
                                        @pointerdown.stop @mousedown.stop @touchstart.stop draggable="false">
                                    @error("lista.$index.link")
                                    <p class="mensaje_error">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <button type="button" wire:click="eliminarItem({{ $index }})" class="boton_eliminar"
                                        wire:key="boton-eliminar-{{ $index }}" @pointerdown.stop @mousedown.stop
                                        @touchstart.stop draggable="false">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="g_columna_4 g_gap_pagina">
                <div class="g_panel">
                    <!--TITULO-->
                    <h4 class="g_panel_titulo">Activo</h4>

                    <!--ACTIVO-->
                    <select id="activo" name="activo" wire:model.live="activo">
                        <option value="0">DESACTIVADO</option>
                        <option value="1">ACTIVO</option>
                    </select>
                    @error('activo')
                    <p class="mensaje_error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="g_margin_top_20">
            <div class="formulario_botones">
                <button type="submit" class="guardar" wire:loading.attr="disabled" wire:target="store">
                    <span wire:loading.remove wire:target="store">Actualizar</span>
                    <span wire:loading wire:target="store">Actualizando...</span>
                </button>

                <a href="{{ route('admin.seccion.bloque-uno.vista.todo') }}" class="cancelar">Cancelar</a>
            </div>
        </div>
    </form>

    <script>
        function dataBloque1Editar() {
            return {
                handleBloque1Editar(item, position) {
                    Livewire.dispatch('handleBloque1EditarOn', {
                        item: item,
                        position: position,
                    });
                },
            }
        }

        function alertaEliminarBloque1() {
            Swal.fire({
                title: '¿Quieres eliminar?',
                text: "No podrás recuperarlo.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('eliminarSeccion1On');

                    Swal.fire(
                        '¡Eliminado!',
                        'Eliminaste correctamente.',
                        'success'
                    )
                }
            });
        }
    </script>
</div>