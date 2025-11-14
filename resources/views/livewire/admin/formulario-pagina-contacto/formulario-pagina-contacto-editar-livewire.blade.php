@section('tituloPagina', 'Editar formulario contacto')

<div class="g_gap_pagina">
    <!-- CABECERA -->
    <div class="g_panel cabecera_titulo_pagina">
        <h2>Editar formulario contacto</h2>

        <div class="cabecera_titulo_botones">
            <a href="{{ route('admin.formulario-pagina-contacto.vista.todo') }}" class="g_boton g_boton_light">
                Inicio <i class="fa-solid fa-house"></i>
            </a>

            <a href="{{ route('admin.formulario-pagina-contacto.vista.todo') }}" class="g_boton g_boton_darkt">
                <i class="fa-solid fa-arrow-left"></i> Regresar
            </a>
        </div>
    </div>

    <!-- FORMULARIO -->
    <form wire:submit.prevent="update" class="formulario">
        <div class="g_fila">
            <!-- IZQUIERDA -->
            <div class="g_columna_8 g_gap_pagina">
                <div class="g_panel">
                    <div class="g_margin_bottom_10">
                        <label>Nombre</label>
                        <input type="text" value="{{ $formulario->nombre }}" readonly disabled>
                    </div>

                    <div class="g_margin_bottom_10">
                        <label>Apellido</label>
                        <input type="text" value="{{ $formulario->apellido }}" readonly disabled>
                    </div>

                    <div class="g_margin_bottom_10">
                        <label>Email</label>
                        <input type="text" value="{{ $formulario->email }}" readonly disabled>
                    </div>

                    <div class="g_margin_bottom_10">
                        <label>Teléfono</label>
                        <input type="text" value="{{ $formulario->telefono }}" readonly disabled>
                    </div>

                    <div class="g_margin_bottom_10">
                        <label>Asunto</label>
                        <input type="text" value="{{ $formulario->asunto }}" readonly disabled>
                    </div>

                    <div class="g_margin_bottom_10">
                        <label>Mensaje</label>
                        <textarea rows="5" readonly disabled>{{ $formulario->mensaje }}</textarea>
                    </div>
                </div>
            </div>

            <!-- DERECHA -->
            <div class="g_columna_4 g_gap_pagina g_columna_invertir">
                <div class="g_panel">
                    @if ($leido)
                        <span class="estado g_desactivado"><i class="fa-solid fa-circle"></i> </span>Leído
                    @else
                        <span class="estado g_activo"><i class="fa-solid fa-circle"></i> </span>No leído
                    @endif
                </div>

                <div class="g_panel">
                    <h4 class="g_panel_titulo">Estado</h4>
                    <select wire:model.live="estado" {{ empty($estadosDisponibles) ? 'disabled' : '' }}>
                        <option value="{{ $formulario->estado }}" selected>
                            Actual: {{ ucfirst($formulario->estado) }}
                        </option>
                
                        @foreach ($estadosDisponibles as $estadoDisponible)
                            <option value="{{ $estadoDisponible }}">{{ ucfirst($estadoDisponible) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- BOTONES -->
        <div class="g_margin_top_20">
            <div class="formulario_botones">
                <button type="submit" class="guardar" wire:loading.attr="disabled" wire:target="update">
                    <span wire:loading.remove wire:target="update">Actualizar</span>
                    <span wire:loading wire:target="update">Actualizando...</span>
                </button>
                <a href="{{ route('admin.formulario-pagina-contacto.vista.todo') }}" class="cancelar">Cancelar</a>
            </div>
        </div>
    </form>
</div>
