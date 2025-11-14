<div class="partials_titulo_encabezado ">
    @if (!empty($titulo))
    <h2 class="r_titulo_1 {{ $color }}" style="text-align: {{ $alineacion }}">{!! $titulo !!}</h2> @endif

    @if (!empty($descripcion))
    <p class="r_parrafo {{ $color }}" style="text-align: {{ $alineacion }}">{!! $descripcion !!}</p>
    @endif
</div>