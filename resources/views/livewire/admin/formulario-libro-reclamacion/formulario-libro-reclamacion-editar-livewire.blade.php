@section('tituloPagina', 'Editar formulario libro reclamación')

<div class="g_gap_pagina">
    <!-- CABECERA -->
    <div class="g_panel cabecera_titulo_pagina">
        <h2>Editar formulario libro reclamación</h2>

        <div class="cabecera_titulo_botones">
            <a href="{{ route('admin.formulario-libro-reclamacion.vista.todo') }}" class="g_boton g_boton_light">
                Inicio <i class="fa-solid fa-house"></i>
            </a>

            <a href="{{ route('admin.formulario-libro-reclamacion.vista.todo') }}" class="g_boton g_boton_darkt">
                <i class="fa-solid fa-arrow-left"></i> Regresar
            </a>
        </div>
    </div>

    <!-- FORMULARIO -->
    <div class="formulario">
        <div class="g_fila">
            <!-- IZQUIERDA -->
            <div class="g_columna_8 g_gap_pagina">
                <div class="g_panel">
                    <h4 class="g_panel_titulo">1.- Información del consumidor reclamante</h4>

                    <div class="g_fila">
                        <div class="g_margin_bottom_10 g_columna_4">
                            <label>Nombre</label>
                            <input type="text" value="{{ $formulario->nombre }}" readonly disabled>
                        </div>

                        <div class="g_margin_bottom_10 g_columna_4">
                            <label>Apellido Paterno</label>
                            <input type="text" value="{{ $formulario->apellido_paterno }}" readonly disabled>
                        </div>

                        <div class="g_margin_bottom_10 g_columna_4">
                            <label>Apellido Materno</label>
                            <input type="text" value="{{ $formulario->apellido_materno }}" readonly disabled>
                        </div>
                    </div>

                    <div class="g_fila">
                        <div class="g_margin_bottom_10 g_columna_4">
                            <label>Domicilio</label>
                            <input type="text" value="{{ $formulario->domicilio }}" readonly disabled>
                        </div>

                        <div class="g_margin_bottom_10 g_columna_4">
                            <label>Teléfono</label>
                            <input type="text" value="{{ $formulario->telefono }}" readonly disabled>
                        </div>

                        <div class="g_columna_4">
                            <label>Correo electrónico</label>
                            <input type="text" value="{{ $formulario->email }}" readonly disabled>
                        </div>
                    </div>

                    <div class="g_fila">
                        <div class="g_margin_bottom_10 g_columna_4">
                            <label>Tipo Documento</label>
                            <input type="text" value="{{ $formulario->tipo_documento }}" readonly disabled>
                        </div>

                        <div class="g_margin_bottom_10 g_columna_4">
                            <label>Número de Documento</label>
                            <input type="text" value="{{ $formulario->numero_documento }}" readonly disabled>
                        </div>
                    </div>
                </div>

                <div class="g_panel">
                    <h4 class="g_panel_titulo">2.- Identificación del bien contratado</h4>

                    <div class="g_fila">
                        <div class="g_margin_bottom_10 g_columna_6">
                            <label>Tipo de bien contratado:</label>
                            <input type="text" value="{{ $formulario->tipo_bien_contratado }}" readonly disabled>
                        </div>

                        <div class="g_margin_bottom_10 g_columna_6">
                            <label>Monto Reclamado</label>
                            <input type="number" value="{{ $formulario->monto_reclamado }}" readonly disabled>
                        </div>
                    </div>

                    <div class="g_fila">
                        <div class="g_margin_bottom_10 g_columna_12">
                            <label>Descripción del producto o servicio</label>
                            <textarea rows="5" readonly disabled>{{ $formulario->descripcion }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="g_panel">
                    <h4 class="g_panel_titulo">3.- Detalle de la reclamación y pedido del consumidor</h4>

                    <div class="g_fila">
                        <div class="g_margin_bottom_10 g_columna_6">
                            <label>Tipo de solicitud:</label>
                            <input type="text" value="{{ $formulario->tipo_pedido }}" readonly disabled>
                        </div>
                    </div>

                    <div class="g_fila">
                        <div class="g_margin_bottom_10 g_columna_12">
                            <label>Detalle del reclamo o queja</label>
                            <textarea rows="5" readonly disabled>{{ $formulario->detalle }}</textarea>
                        </div>
                    </div>

                    <div class="g_fila">
                        <div class="g_margin_bottom_10 g_columna_12">
                            <label>Pedido del consumidor</label>
                            <textarea rows="5" readonly disabled>{{ $formulario->pedido }}</textarea>
                        </div>
                    </div>
                </div>

                <form wire:submit.prevent="actualizarObservaciones">
                    <div class="g_panel">
                        <h4 class="g_panel_titulo">4.- Observaciones y acciones adoptadas</h4>
                        <textarea wire:model.live="observaciones" rows="6" @if ($formulario->estado === 'cerrado' || !empty($formulario->observaciones)) readonly disabled @endif
                            class="g_margin_bottom_10"></textarea>

                        <div class="formulario_botones">
                            <button type="submit" class="guardar"
                            @if ($formulario->estado === 'cerrado' || !empty($formulario->observaciones)) disabled @endif>
                            Guardar observaciones
                        </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- DERECHA -->
            <div class="g_columna_4 g_gap_pagina g_columna_invertir">
                <div class="g_panel">
                    <div class="g_margin_bottom_10">
                        <label>Fecha envio</label>
                        <input type="text" value="{{ $formulario->created_at->format('Y-m-d H:i:s') }}" readonly
                            disabled>
                    </div>

                    <div class="g_margin_bottom_10">
                        <label>Fecha respuesta</label>
                        <input type="text" value="{{ $formulario->fecha_respuesta?->format('Y-m-d H:i:s') }}"
                            readonly disabled>
                    </div>
                </div>

                <div class="g_panel">
                    @if ($leido)
                        <span class="estado g_desactivado"><i class="fa-solid fa-circle"></i> </span>Leído
                    @else
                        <span class="estado g_activo"><i class="fa-solid fa-circle"></i> </span>No leído
                    @endif
                </div>

                <form wire:submit.prevent="actualizarEstado">
                    <div class="g_panel">
                        <h4 class="g_panel_titulo">Estado</h4>
                        <select wire:model.live="estado" {{ empty($estadosDisponibles) ? 'disabled' : '' }}
                            class="g_margin_bottom_10">
                            <option value="{{ $formulario->estado }}" selected>
                                Actual: {{ ucfirst($formulario->estado) }}
                            </option>
                            @foreach ($estadosDisponibles as $estadoDisponible)
                                <option value="{{ $estadoDisponible }}">{{ ucfirst($estadoDisponible) }}</option>
                            @endforeach
                        </select>

                        <div class="formulario_botones">
                            <button type="submit" class="guardar"
                                {{ $formulario->estado === 'cerrado' ? 'disabled' : '' }}>
                                Cambiar estado
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>


    </div>
</div>
