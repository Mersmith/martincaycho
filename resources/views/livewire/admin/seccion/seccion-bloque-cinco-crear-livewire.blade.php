@section('tituloPagina', 'Crear bloque 5')
@section('anchoPantalla', '100%')

<div class="g_gap_pagina">

    <!-- CABECERA -->
    <div class="g_panel cabecera_titulo_pagina">
        <h2>Crear bloque 5</h2>

        <div class="cabecera_titulo_botones">
            <a href="{{ route('admin.seccion.bloque-cinco.vista.todo') }}" class="g_boton g_boton_light">
                Inicio <i class="fa-solid fa-house"></i></a>

            <a href="{{ route('admin.seccion.bloque-cinco.vista.todo') }}" class="g_boton g_boton_darkt">
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
                        <label for="subtitulo">Subtítulo</label>
                        <input type="text" id="subtitulo" wire:model.live="subtitulo">
                        @error('subtitulo')
                        <p class="mensaje_error">{{ $message }}</p>
                        @enderror
                    </div>
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
                    <span wire:loading.remove wire:target="store">Crear</span>
                    <span wire:loading wire:target="store">Guardando...</span>
                </button>

                <a href="{{ route('admin.seccion.bloque-cinco.vista.todo') }}" class="cancelar">Cancelar</a>
            </div>
        </div>
    </form>
</div>