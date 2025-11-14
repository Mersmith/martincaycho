@section('tituloPagina', 'Editar bloque 2')
@section('anchoPantalla', '100%')

<div x-data="dataBloque2Editar" class="g_gap_pagina">

    <!-- CABECERA -->
    <div class="g_panel cabecera_titulo_pagina">
        <h2>Editar bloque 2</h2>

        <div class="cabecera_titulo_botones">
            <a href="{{ route('admin.seccion.bloque-dos.vista.todo') }}" class="g_boton g_boton_light">
                Inicio <i class="fa-solid fa-house"></i></a>

            <a href="{{ route('admin.seccion.bloque-dos.vista.crear') }}" class="g_boton g_boton_primary">
                Crear <i class="fa-solid fa-square-plus"></i></a>

            <button type="button" class="g_boton g_boton_danger" onclick="alertaEliminarBloque2()">
                Eliminar <i class="fa-solid fa-trash-can"></i>
            </button>

            <a href="{{ route('admin.seccion.bloque-dos.vista.todo') }}" class="g_boton g_boton_darkt">
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

                <!-- TITULO -->
                <div class="g_panel">
                    <div class="g_margin_bottom_10">
                        <label for="titulo">Título</label>
                        <input type="text" id="titulo" wire:model.live="titulo">
                        @error('titulo')
                        <p class="mensaje_error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="titulo_descripcion">Descripción</label>
                        <textarea id="titulo_descripcion" wire:model.live="titulo_descripcion" rows="3"></textarea>
                        @error('titulo_descripcion')
                        <p class="mensaje_error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- SUBTITULO -->
                <div class="g_panel">
                    <div class="g_margin_bottom_10">
                        <label for="subtitulo">Subtítulo</label>
                        <input type="text" id="subtitulo" wire:model.live="subtitulo">
                        @error('subtitulo')
                        <p class="mensaje_error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="subtitulo_descripcion">Descripción</label>
                        <textarea id="subtitulo_descripcion" wire:model.live="subtitulo_descripcion"
                            rows="3"></textarea>
                        @error('subtitulo_descripcion')
                        <p class="mensaje_error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- LISTA -->
                <div class="g_panel">
                    <h4 class="g_panel_titulo">Lista</h4>

                    <div class="formulario_botones g_margin_bottom_10">
                        <button type="button" wire:click="agregarItem" class="agregar">
                            <i class="fa-solid fa-plus"></i> Agregar item
                        </button>
                    </div>

                    <table class="tabla_eliminar">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Icono</th>
                                <th>Texto</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody x-sort="handleBloque2Editar">
                            @foreach ($lista as $index => $item)
                            <tr class="sorteable_item" x-sort:item="{{ $item['id'] }}" wire:key="item-{{ $index }}">
                                <td>
                                    <div x-sort:handle class="handle cursor-move" title="Arrastra aquí"
                                        style="touch-action: none; cursor: grab;">
                                        <i class="fa-solid fa-up-down-left-right"></i>
                                        {{ $item['id'] }}
                                    </div>
                                </td>
                                <td>
                                    <input type="text" wire:model="lista.{{ $index }}.icono"
                                        wire:key="icono-{{ $index }}" @pointerdown.stop @mousedown.stop @touchstart.stop
                                        draggable="false">
                                    <input type="color" wire:model="lista.{{ $index }}.icono_color"
                                        wire:key="icono_color-{{ $index }}">
                                </td>
                                <td>
                                    <input type="text" wire:model="lista.{{ $index }}.texto"
                                        wire:key="texto-{{ $index }}" @pointerdown.stop @mousedown.stop @touchstart.stop
                                        draggable="false">
                                    <input type="color" wire:model="lista.{{ $index }}.texto_color"
                                        wire:key="texto_color-{{ $index }}">
                                    @error("lista.$index.texto")
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

            <!-- COLUMNA DERECHA -->
            <div class="g_columna_4 g_gap_pagina g_columna_invertir">
                <!-- ACTIVO -->
                <div class="g_panel">
                    <h4 class="g_panel_titulo">Activo</h4>

                    <select id="activo" name="activo" wire:model.live="activo">
                        <option value="0">DESACTIVADO</option>
                        <option value="1">ACTIVO</option>
                    </select>
                </div>

                <!-- INVERTIR -->
                <div class="g_panel">
                    <h4 class="g_panel_titulo">Invertir</h4>

                    <select id="activo" name="activo" wire:model.live="invertir">
                        <option value="0">NO</option>
                        <option value="1">SI</option>
                    </select>
                </div>

                <!-- IMAGEN -->
                <div class="g_panel">
                    <div class="g_margin_bottom_10">
                        <label for="imagen">Imagen <span class="obligatorio"><i
                                    class="fa-solid fa-asterisk"></i></span></label>
                        <input type="text" id="imagen" wire:model.live="imagen">
                        @error('imagen')
                        <p class="mensaje_error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="imagen_seo">Descripción SEO <span class="obligatorio"><i
                                    class="fa-solid fa-asterisk"></i></span></label>
                        <textarea id="imagen_seo" wire:model.live="imagen_seo" rows="3"></textarea>
                        <p class="leyenda">Se mostrará en el SEO.</p>
                        @error('imagen_seo')
                        <p class="mensaje_error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- BOTÓN -->
                <div class="g_panel">
                    <h4 class="g_panel_titulo">Botón</h4>

                    <div class="g_margin_bottom_10">
                        <label for="boton.icono">Icono</label>
                        <input type="text" id="boton.icono" name="boton.icono" wire:model.live="boton.icono">
                    </div>

                    <div class="g_margin_bottom_10">
                        <label for="boton.fondo_color">Fondo</label>
                        <input type="color" id="boton.fondo_color" name="boton.fondo_color"
                            wire:model.live="boton.fondo_color">
                    </div>

                    <div class="g_margin_bottom_10">
                        <label for="boton.texto">Texto</label>
                        <input type="text" id="boton.texto" name="boton.texto" wire:model.live="boton.texto">
                        @error('boton.texto')
                        <p class="mensaje_error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="g_margin_bottom_10">
                        <label for="boton.texto_color">Color texto</label>
                        <input type="color" id="boton.texto_color" name="boton.texto_color"
                            wire:model.live="boton.texto_color">
                    </div>

                    <div>
                        <label for="boton.link">Link</label>
                        <input type="text" id="boton.link" name="boton.link" wire:model.live="boton.link">
                        @error('boton.link')
                        <p class="mensaje_error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="g_margin_top_20">
            <div class="formulario_botones">
                <button type="submit" class="guardar" wire:loading.attr="disabled" wire:target="store">
                    <span wire:loading.remove wire:target="store">Actualizar</span>
                    <span wire:loading wire:target="store">Actualizando...</span>
                </button>

                <a href="{{ route('admin.seccion.bloque-dos.vista.todo') }}" class="cancelar">Cancelar</a>
            </div>
        </div>
    </form>

    <script>
        function dataBloque2Editar() {
            return {
                handleBloque2Editar(item, position) {
                    Livewire.dispatch('handleBloque2EditarOn', {
                        item,
                        position
                    });
                },
            }
        }

        function alertaEliminarBloque2() {
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
                    Livewire.dispatch('eliminarSeccion2On');

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