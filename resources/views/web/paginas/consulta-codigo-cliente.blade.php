@extends('layouts.web.layout-web')

@section('titulo', 'Consulta código cliente')

@section('contenido')

<div class="r_centrar_pagina">
    <div class="r_pading_pagina">
        <div class="consulta_codigo_cliente">
            <div class="card_consulta">
                <div class="card_consulta_cabecera">
                    <img src="https://aybarcorp.com/resource/1738076896_logo%20aybar%20blanco.svg" class="logo"
                        alt="Aybar Corp">
                    <h2>Consulta tu código</h2>
                </div>

                <div class="card_consulta_formulario">
                    <form method="GET" action="{{ route('consulta-codigo-cliente.index') }}">
                        <label for="dni">Ingresa tu DNI/RUC:</label>
                        <input type="text" id="dni" name="dni" value="{{ old('dni', $dni) }}"
                            placeholder="Ejemplo: 76729131">
                        <button type="submit">🔍 Buscar</button>
                    </form>
                </div>

                <div class="card_consulta_resultado">
                    @if ($informaciones->isNotEmpty())
                    <div class="resultado_ok">✅ Se encontraron {{ $informaciones->count() }} resultado(s)</div>

                    @foreach ($informaciones as $informacion)
                    <div class="resultado_datos">
                        <p><strong>Razón Social:</strong> {{ $informacion->razon_social }}</p>
                        <p><strong>Proyecto:</strong> {{ $informacion->proyecto }}</p>
                        <p><strong>N° Lote:</strong> {{ $informacion->numero_lote }}</p>

                        <p><strong>Nombre Completo:</strong> {{ $informacion->nombre_completo_cliente }}</p>
                        <p><strong>Código Cliente:</strong> {{ $informacion->codigo_cliente }}</p>
                        <p><strong>DNI/RUC:</strong> {{ $informacion->dni_ruc_cliente }}</p>
                    </div>

                    @if (!$loop->last)
                    <hr style="border: 1px dashed #ccc; margin: 20px 0;">
                    @endif
                    @endforeach
                    @elseif ($dni)
                    <div class="resultado_error">❌ No se encontró información para el DNI/RUC ingresado.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

@endsection