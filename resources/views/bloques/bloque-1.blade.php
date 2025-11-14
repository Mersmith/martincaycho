@if (!empty($p_elemento) && !empty($p_elemento->contenido['lista']))
<div class="g_centrar_contenedor">
    <div class="bloque_1">
        <!-- Swiper -->
        <div class="swiper SwiperBloque1-{{ $p_elemento->id }} ">
            <div class="swiper-wrapper">
                @foreach ($p_elemento->contenido['lista'] as $index => $slide)
                <div class="swiper-slide">
                    <a href="{{ $slide['link'] }}">
                        <img src="{{ $slide['imagen_computadora'] }}" alt="" class="imagen_computadora" />
                        <img src="{{ $slide['imagen_movil'] }}" alt="" class="imagen_movil" />
                    </a>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

<script>
    var swiper = new Swiper(".SwiperBloque1-{{ $p_elemento->id }}", {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: {{ count($p_elemento->contenido['lista']) > 1 ? 'true' : 'false' }},
            autoplay: {
                delay: 5000, // 5000 ms = 5 segundos
                disableOnInteraction: false, // para que siga después de interactuar
            },
            pagination: {
                el: ".SwiperBloque1-{{ $p_elemento->id }} .swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".SwiperBloque1-{{ $p_elemento->id }} .swiper-button-next",
                prevEl: ".SwiperBloque1-{{ $p_elemento->id }} .swiper-button-prev",
            },
        });
</script>
@endif