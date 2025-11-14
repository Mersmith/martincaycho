@section('tituloPagina', 'Editar bloque 7')
@section('anchoPantalla', '100%')

<div x-data="dataBloque7Editar()" class="g_gap_pagina">

    <!-- CABECERA -->
    <div class="g_panel cabecera_titulo_pagina">
        <h2>Editar bloque 7</h2>

        <div class="cabecera_titulo_botones">
            <a href="{{ route('admin.seccion.bloque-siete.vista.todo') }}" class="g_boton g_boton_light">
                Inicio <i class="fa-solid fa-house"></i>
            </a>

            <button type="button" class="g_boton g_boton_danger" onclick="alertaEliminarBloque7()">
                Eliminar <i class="fa-solid fa-trash-can"></i>
            </button>

            <a href="{{ route('admin.seccion.bloque-siete.vista.todo') }}" class="g_boton g_boton_darkt">
                <i class="fa-solid fa-arrow-left"></i> Regresar
            </a>
        </div>
    </div>

    <!-- FORMULARIO -->
    <form wire:submit.prevent="store" class="formulario">

        <div class="g_fila">
            <!-- COLUMNA IZQUIERDA -->
            <div class="g_columna_8 g_gap_pagina">

                <!-- GENERAL -->
                <div class="g_panel">
                    <h4 class="g_panel_titulo">General</h4>
                    <div>
                        <label for="nombre">Nombre <span class="obligatorio"><i
                                    class="fa-solid fa-asterisk"></i></span></label>
                        <input type="text" id="nombre" wire:model.live="nombre">
                        @error('nombre')
                        <p class="mensaje_error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- TÍTULO -->
                <div class="g_panel">
                    <div class="g_margin_bottom_10">
                        <label for="titulo">Título</label>
                        <input type="text" id="titulo" wire:model.live="titulo">
                    </div>

                    <div>
                        <label for="titulo_descripcion">Descripción</label>
                        <textarea id="titulo_descripcion" wire:model.live="titulo_descripcion" rows="3"></textarea>
                    </div>
                </div>

                <!-- LISTA -->
                <div class="g_panel">
                    <h4 class="g_panel_titulo">
                        Items
                        <button type="button" @click="toggleAll()">
                            <span x-show="globalVisible"><i class="fa-solid fa-angle-up"></i></span>
                            <span x-show="!globalVisible"><i class="fa-solid fa-angle-down"></i></span>
                        </button>
                    </h4>

                    <!-- BOTÓN AGREGAR ITEM -->
                    <div class="formulario_botones g_margin_bottom_10">
                        <button type="button" wire:click="agregarItem" class="agregar">
                            <i class="fa-solid fa-plus"></i> Agregar item
                        </button>
                    </div>

                    <!-- LISTA -->
                    <div x-sort="handleBloque7Editar" class="g_gap_pagina">
                        @foreach ($lista as $index => $item)
                        <div class="g_panel tabla_caja" x-sort:item="{{ $item['id'] }}">
                            <div class="cabecera">
                                <div x-sort:handle class="handle cursor-move" title="Arrastra aquí"
                                    style="touch-action: none; cursor: grab;">
                                    <i class="fa-solid fa-up-down-left-right"></i>
                                    {{ $item['id'] }}
                                </div>
                                <button type="button"
                                    @click="itemsVisibility[{{ $index }}] = !itemsVisibility[{{ $index }}]">
                                    <span x-show="itemsVisibility[{{ $index }}]"><i
                                            class="fa-solid fa-angle-up"></i></span>
                                    <span x-show="!itemsVisibility[{{ $index }}]"><i
                                            class="fa-solid fa-angle-down"></i></span>
                                </button>
                            </div>

                            <div x-show="itemsVisibility[{{ $index }}]" x-transition>

                                <div class="g_margin_bottom_10">
                                    <label>Icono</label>
                                    <input type="text" wire:model="lista.{{ $index }}.icono" @pointerdown.stop
                                        @mousedown.stop @touchstart.stop draggable="false">
                                </div>

                                <div class="g_margin_bottom_10">
                                    <label>Subtítulo</label>
                                    <input type="text" wire:model="lista.{{ $index }}.subtitulo" @pointerdown.stop
                                        @mousedown.stop @touchstart.stop draggable="false">
                                </div>

                                <div class="g_margin_bottom_10">
                                    <label>Descripción</label>
                                    <textarea wire:model.live="lista.{{ $index }}.subtitulo_descripcion" rows="3"
                                        @pointerdown.stop @mousedown.stop @touchstart.stop draggable="false">
                                    </textarea>
                                </div>

                                <div class="g_margin_bottom_10">
                                    <button type="button" wire:click="eliminarItem({{ $index }})"
                                        class="boton_eliminar">
                                        <i class="fa-solid fa-xmark"></i> Eliminar
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- COLUMNA DERECHA -->
            <div class="g_columna_4 g_gap_pagina g_columna_invertir">
                <div class="g_panel">
                    <h4 class="g_panel_titulo">Activo</h4>
                    <select wire:model.live="activo">
                        <option value="0">DESACTIVADO</option>
                        <option value="1">ACTIVO</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- BOTONES -->
        <div class="g_margin_top_20">
            <div class="formulario_botones">
                <button type="submit" class="guardar" wire:loading.attr="disabled" wire:target="store">
                    <span wire:loading.remove wire:target="store">Actualizar</span>
                    <span wire:loading wire:target="store">Actualizando...</span>
                </button>

                <a href="{{ route('admin.seccion.bloque-siete.vista.todo') }}" class="cancelar">Cancelar</a>
            </div>
        </div>

    </form>

    <script>
        function dataBloque7Editar() {
            return {
                globalVisible: true,
                itemsVisibility: Array(@js(count($lista))).fill(true),

                init() {
                    Livewire.on('lista-updated', count => {
                        this.itemsVisibility = Array(count).fill(this.globalVisible);
                    });
                },

                toggleAll() {
                    this.globalVisible = !this.globalVisible;
                    this.itemsVisibility = Array(this.itemsVisibility.length).fill(this.globalVisible);
                },

                handleBloque7Editar(item, position) {
                    Livewire.dispatch('handleBloque7EditarOn', {
                        item,
                        position
                    });
                }
            }
        }

        function alertaEliminarBloque7() {
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
                    Livewire.dispatch('eliminarSeccion7On');

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