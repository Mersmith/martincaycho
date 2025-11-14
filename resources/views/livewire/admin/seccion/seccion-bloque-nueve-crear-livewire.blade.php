@section('tituloPagina', 'Crear bloque 9')
@section('anchoPantalla', '100%')

<div class="g_gap_pagina">

    <!-- CABECERA -->
    <div class="g_panel cabecera_titulo_pagina">
        <h2>Crear bloque 9</h2>

        <div class="cabecera_titulo_botones">
            <a href="{{ route('admin.seccion.bloque-nueve.vista.todo') }}" class="g_boton g_boton_light">
                Inicio <i class="fa-solid fa-house"></i></a>

            <a href="{{ route('admin.seccion.bloque-nueve.vista.todo') }}" class="g_boton g_boton_darkt">
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

                <div class="g_panel">
                    <!--TITULO-->
                    <h4 class="g_panel_titulo">Contenido</h4>

                    <!-- CONTENIDO -->
                    <div wire:ignore style="g_ckeditor" class="g_margin_bottom_10">
                        <textarea id="content_html" class="w-full form-control" rows="6" wire:ignore x-data x-init="ClassicEditor.create($refs.miEditor, {
                                toolbar: [
                                    'undo', 'redo', '|',
                                    'heading', '|',
                                    'bold', 'italic', '|',
                                    'link', 'uploadImage', 'insertTable', 'blockQuote',
                                    'mediaEmbed', '|',
                                    'bulletedList', 'numberedList', '|',
                                    'outdent', 'indent'
                                ],
                                ckfinder: {
                                    uploadUrl: '{{ route('admin.imagen.upload-local') }}?_token={{ csrf_token() }}'
                                },
                                link: {
                                    addTargetToExternalLinks: true,
                                    defaultProtocol: 'https://'
                                }
                            })
                            .then(editor => {
                                editor.model.document.on('change:data', () => {
                                    @this.set('content_html', editor.getData())
                                });
                            })
                            .catch(error => {
                                console.error(error);
                            });" x-ref="miEditor">{!! $content_html !!}</textarea>

                        @error('content_html')
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
            </div>
        </div>

        <div class="g_margin_top_20">
            <div class="formulario_botones">
                <button type="submit" class="guardar" wire:loading.attr="disabled" wire:target="store">
                    <span wire:loading.remove wire:target="store">Crear</span>
                    <span wire:loading wire:target="store">Guardando...</span>
                </button>

                <a href="{{ route('admin.seccion.bloque-nueve.vista.todo') }}" class="cancelar">Cancelar</a>
            </div>
        </div>
    </form>
</div>