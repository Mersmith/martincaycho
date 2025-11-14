@if (!empty($p_elemento) && !empty($p_elemento->contenido))

    @php
        $p = $p_elemento->contenido;

        $titulo = $p['titulo'];
        $titulo_descripcion = $p['titulo_descripcion'];
        $lista = $p['lista'] ?? [];

        $slidesCount = count($lista);
    @endphp

    @include('partials.titulo-encabezado', [
        'titulo' => $titulo,
        'descripcion' => $titulo_descripcion,
        'alineacion' => 'center',
        'color' => 'color_1',
    ])

    @if (!empty($lista) && is_array($lista))
        <div class="bloque_8">
            <div class="swiper SwiperSliderTestimonios-{{ $p->id ?? 'default' }}">
                <div class="swiper-wrapper">
                    @foreach ($lista as $item)
                        <div class="swiper-slide">
                            <div class="testimonio_card">
                                @if (!empty($item['imagen']))
                                    <div class="testimonio_foto">
                                        <img src="{{ $item['imagen'] }}" alt="{{ $item['imagen_seo'] }}">
                                    </div>
                                @endif

                                <div class="testimonio_datos">
                                    @if (!empty($item['descripcion']))
                                        <blockquote>"</blockquote>
                                        <p class="testimonio_comentario">{{ $item['descripcion'] }}"</p>
                                    @endif

                                    @if (!empty($item['titulo']))
                                        <p class="testimonio_nombre">{{ $item['titulo'] }}</p>
                                    @endif

                                    @if (!empty($item['subtitulo']))
                                        <p class="testimonio_cargo">{{ $item['subtitulo'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <script>
            (function() {
                const slidesCount = {{ $slidesCount }};
                const selector = '.SwiperSliderTestimonios-{{ $p->id ?? 'default' }}';

                new Swiper(selector, {
                    slidesPerView: 1, // 👈 solo un slide visible
                    slidesPerGroup: 1, // 👈 avanza de uno en uno
                    spaceBetween: 20,
                    autoplay: slidesCount > 1 ? {
                        delay: 3500,
                        disableOnInteraction: false,
                    } : false,
                    loop: slidesCount > 1, // 👈 activa loop solo si hay más de un slide
                    grabCursor: slidesCount > 1,

                    // 👇 ya no necesitas breakpoints porque siempre es 1
                });
            })();
        </script>

    @endif
@endif
