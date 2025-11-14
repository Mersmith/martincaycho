@props([
'link' => '#',
'titulo' => 'Libro Digital',
'textoBoton' => 'Ver Libro Digital',
])

<div x-data="{ abierto: false }" x-effect="document.documentElement.classList.toggle('no-scroll', abierto)"
    @keydown.escape.window="if (abierto) abierto = false" class="partials_visualizador_pdf">

    <button @click="abierto = true" class="boton_abrir">
        <i class="fa-solid fa-file-pdf"></i>
        {{ $textoBoton }}
    </button>

    <div class="visor_pdf" x-show="abierto" x-transition.opacity.duration.200ms x-cloak :inert="!abierto">
        <iframe id="pdfFrame" src="{{ $link }}" allowfullscreen loading="lazy"></iframe>

        <button @click="abierto = false" class="barra_cerrar" aria-label="Cerrar libro">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
</div>
