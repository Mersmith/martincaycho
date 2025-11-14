@section('tituloPagina', 'Crear Página')

@section('anchoPantalla', '100%')

<div x-data="dataPaginaCrear" class="g_gap_pagina">
    <!-- CABECERA -->
    <div class="g_panel cabecera_titulo_pagina">
        <h2>Crear Página</h2>

        <!--BOTONES-->
        <div class="cabecera_titulo_botones">
            <a href="{{ route('admin.pagina.vista.todo') }}" class="g_boton g_boton_light">
                Inicio <i class="fa-solid fa-house"></i></a>

            <a href="{{ route('admin.pagina.vista.todo') }}" class="g_boton g_boton_darkt">
                <i class="fa-solid fa-arrow-left"></i> Regresar</a>
        </div>
    </div>

    <!-- FORMULARIO -->
    <form wire:submit.prevent="store" class="formulario">
        <div class="g_fila">
            <div class="g_columna_8 g_gap_pagina">
                <div class="g_panel">
                    <!-- Titulo -->
                    <div class="g_margin_bottom_10">
                        <label for="titulo">Titulo <span class="obligatorio"><i
                                    class="fa-solid fa-asterisk"></i></span></label>
                        <input type="text" id="titulo" wire:model.live="titulo" required>
                        @error('titulo')
                        <p class="mensaje_error">{{ $message }}</p>
                        @enderror
                    </div>

                    <!--SLUG-->
                    <div class="g_margin_bottom_10">
                        <label for="slug">Slug <span class="obligatorio"><i
                                    class="fa-solid fa-asterisk"></i></span></label>
                        <input type="text" id="slug" name="slug" wire:model.live="slug" required disabled>
                        <p class="leyenda">Se genera automático</p>
                        @error('slug')
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
                                <th>SECCIÓN ID</th>
                                <th>TIPO</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody x-sort="handlePaginaCrear">
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
                                    <input type="number" wire:model="lista.{{ $index }}.seccion_id"
                                        wire:key="seccion_id-{{ $index }}" @pointerdown.stop @mousedown.stop
                                        @touchstart.stop draggable="false">
                                    @error("lista.$index.seccion_id")
                                    <p class="mensaje_error">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <input type="text" wire:model="lista.{{ $index }}.tipo" wire:key="tipo-{{ $index }}"
                                        @pointerdown.stop @mousedown.stop @touchstart.stop draggable="false">
                                    @error("lista.$index.tipo")
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

            <div class="g_columna_4 g_gap_pagina g_columna_invertir">
                <div class="g_panel">
                    <h4 class="g_panel_titulo">Activo</h4>
                    <select wire:model.live="activo">
                        <option value="0">DESACTIVADO</option>
                        <option value="1">ACTIVO</option>
                    </select>
                </div>

                <div class="g_panel">
                    <h4 class="g_panel_titulo">Imagen</h4>
                    <div class="g_margin_bottom_10">
                        <!-- Imagen -->
                        <input type="text" wire:model.live="meta_imagen">
                        @error('meta_imagen')
                        <p class="mensaje_error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- BOTONES -->
        <div class="g_margin_top_20">
            <div class="formulario_botones">
                <button type="submit" class="guardar" wire:loading.attr="disabled" wire:target="store">
                    <span wire:loading.remove wire:target="store">Crear</span>
                    <span wire:loading wire:target="store">Guardando...</span>
                </button>

                <a href="{{ route('admin.pagina.vista.todo') }}" class="cancelar">Cancelar</a>
            </div>
        </div>
    </form>

    <script>
        function dataPaginaCrear() {
            return {
                handlePaginaCrear(item, position) {
                    Livewire.dispatch('handlePaginaCrearOn', {
                        item: item,
                        position: position,
                    });
                },
            }
        }
    </script>
</div>