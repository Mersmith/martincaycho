@if (!empty($p_elemento) && $p_elemento['proyectos']->isNotEmpty())

<div class="partials_contenedor_slider_proyectos">
    <!-- Swiper -->
    <div class="swiper SwiperSliderProyectos-{{ $p_elemento['id'] }}">
        <div class="swiper-wrapper">
            @foreach ($p_elemento['proyectos'] as $post)
            <div class="swiper-slide">
                <a href="{{ route('blog.show', $post->slug) }}">
                    <div class="post_imagen_contenedor">
                        <img src="{{ $post->imagen }}">
                        <div class="precio">
                            <span>CUOTAS <br> DESDE:</span>
                            <p><small>S/</small> 895.90</p>
                        </div>
                        <p class="titulo">{{ $post->meta_title }}</p>
                        <div class="pie">
                            <p class="descripcion"> <i class="fa-solid fa-location-dot"></i> {{ $post->meta_description
                                }}
                            </p>

                            <p class="descripcion"> <i class="fa-regular fa-map"></i> {{ $post->meta_description }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    var swiper = new Swiper('.SwiperSliderProyectos-{{ $p_elemento['id'] }}', {
            slidesPerView: 3.5, // 👈 muestra 3 completos + un poco del siguiente
            spaceBetween: 20, // espacio entre slides
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            loop: true,
            grabCursor: true,

            breakpoints: {
                1024: {
                    slidesPerView: 3.5,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2.5,
                    spaceBetween: 20,
                },
                0: {
                    slidesPerView: 1.2,
                    spaceBetween: 20,
                }
            }
        });
</script>
@endif