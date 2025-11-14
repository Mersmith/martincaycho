<div class="r_centrar_pagina">
    <div class="r_pading_pagina r_gap_pagina">
        <div class="r_contenedor_columna">

            <div class="g_formulario">
                <h3>Subir comprobante de pago</h3>

                @if (session('success'))
                    <div>
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="text-red-600 mb-2">{{ session('error') }}</div>
                @endif

                @if (!$datos)
                    <input type="file" wire:model="imagen" accept="image/*" class="mb-3">

                    @error('imagen')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror

                    <button wire:click="procesarImagen" wire:loading.attr="disabled"
                        class="bg-blue-600 text-white px-4 py-2 rounded">
                        Analizar comprobante
                    </button>

                    <div wire:loading class="mt-3 text-gray-600">Procesando imagen...</div>
                @else
                    <h4 class="font-semibold mb-2">Datos detectados:</h4>
                    <ul class="mb-3">
                        <li><strong>N° Comprobante:</strong> {{ $datos['numero'] ?? '—' }}</li>
                        <li><strong>Banco:</strong> {{ $datos['banco'] ?? '—' }}</li>
                        <li><strong>Monto:</strong> {{ $datos['monto'] ?? '—' }}</li>
                        <li><strong>Fecha:</strong> {{ $datos['fecha'] ?? '—' }}</li>
                    </ul>

                    <button wire:click="guardar">
                        Guardar comprobante
                    </button>
                @endif
            </div>

        </div>
    </div>
</div>
