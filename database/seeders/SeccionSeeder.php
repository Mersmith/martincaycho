<?php

namespace Database\Seeders;

use App\Models\Seccion;
use Illuminate\Database\Seeder;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $secciones = [
            //INICIO
            [ //1-bloque-1 - SLIDER
                'nombre' => 'Slider Principal - Inicio',
                'tipo' => 'bloque-1',
                'contenido' => [
                    'lista' => [
                        [
                            'id' => 1,
                            'link' => '/peru-tierra-de-incautos',
                            'imagen_movil' => asset('assets/imagenes/slider/sliders-movil-1.jpg'),
                            'imagen_computadora' => asset('assets/imagenes/slider/sliders-computadora-1.jpg'),
                        ],
                        [
                            'id' => 2,
                            'link' => '/martin-caycho',
                            'imagen_movil' => asset('assets/imagenes/slider/sliders-movil-2.jpg'),
                            'imagen_computadora' => asset('assets/imagenes/slider/sliders-computadora-2.jpg'),
                        ],
                    ],
                ],
                'activo' => true,
            ],
            [ //2-bloque-6 - TITULO
                'nombre' => 'Titulo - Nosotros',
                'tipo' => 'bloque-6',
                'contenido' => [
                    'titulo' => 'Bienvenido, soy <span>Martín Caycho</span>',
                    'subtitulo' => 'Vecino del Agustino, empresario y escritor. Creo firmemente en el poder del esfuerzo, la educación y el espíritu emprendedor para construir un Perú con oportunidades reales para todos.',
                ],
                'activo' => true,
            ],
            [ //3-bloque-2 - DESARROLLO
                'nombre' => 'Desarrollo - Nosotros',
                'tipo' => 'bloque-2',
                'contenido' => [
                    'boton' => [
                        'link' => '/martin-caycho',
                        'icono' => 'fa-solid fa-user-tie',
                        'texto' => 'Conóceme',
                        'fondo_color' => '#333333',
                        'texto_color' => '#ffffff',
                    ],
                    'lista' => [
                        [
                            'id' => 1,
                            'icono' => 'fa-solid fa-hand-holding-dollar',
                            'texto' => 'Apoyo a los emprendedores y pequeñas empresas',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 2,
                            'icono' => 'fa-solid fa-chart-line',
                            'texto' => 'Promoción de la economía regional',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 3,
                            'icono' => 'fa-solid fa-industry',
                            'texto' => 'Fomento de la producción nacional',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 4,
                            'icono' => 'fa-solid fa-graduation-cap',
                            'texto' => 'Capacitación técnica y laboral',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 5,
                            'icono' => 'fa-solid fa-briefcase',
                            'texto' => 'Impulso a la formalización y al empleo digno',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                    ],
                    'imagen' => asset('assets/imagenes/nosotros/nosotros-1.jpg'),
                    'invertir' => false,
                    'imagen_seo' => 'Martín Caycho Autor Peruano',
                    'titulo' => '',
                    'titulo_descripcion' => '',
                    'subtitulo' => 'Un Perú que progresa empieza por su gente',
                    'subtitulo_descripcion' => 'Trabajo por un país que valore el esfuerzo de su gente. Mis propuestas se enfocan en fortalecer al emprendedor, impulsar la innovación y generar empleo digno para miles de familias peruanas.',
                ],
                'activo' => true,
            ],
            [ //4-bloque-2 - GESTIÓN
                'nombre' => 'Gestión - Nosotros',
                'tipo' => 'bloque-2',
                'contenido' => [
                    'boton' => [
                        'link' => '/blog/necesitamos-gestionar-con-vision-de-futuro',
                        'icono' => 'fa-solid fa-newspaper',
                        'texto' => 'Ver publicación',
                        'fondo_color' => '#333333',
                        'texto_color' => '#ffffff',
                    ],
                    'lista' => [
                        [
                            'id' => 1,
                            'icono' => 'fa-solid fa-handshake',
                            'texto' => 'Promuevo la transparencia y el uso responsable de los recursos públicos',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 2,
                            'icono' => 'fa-solid fa-laptop-code',
                            'texto' => 'Impulso la digitalización y la modernización del Estado',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 3,
                            'icono' => 'fa-solid fa-city',
                            'texto' => 'Fortalezco la gestión de los gobiernos locales para mejorar los servicios básicos',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 4,
                            'icono' => 'fa-solid fa-chalkboard-user',
                            'texto' => 'Apuesto por la capacitación técnica y profesional de los jóvenes',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 5,
                            'icono' => 'fa-solid fa-scale-balanced',
                            'texto' => 'Combato la corrupción con firmeza y compromiso ciudadano',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                    ],
                    'imagen' => asset('assets/imagenes/nosotros/nosotros-2.jpg'),
                    'titulo' => '',
                    'invertir' => true,
                    'subtitulo' => 'Necesitamos gestionar con visión de futuro',
                    'imagen_seo' => 'Martín Caycho Autor Peruano',
                    'titulo_descripcion' => '',
                    'subtitulo_descripcion' => 'Desde mi experiencia como empresario, sé que ningún proyecto prospera sin orden, planificación y buena administración. Por eso promuevo un Estado que funcione: ágil, digital y al servicio de la gente.',
                ],
                'activo' => true,
            ],
            [ //5-bloque-4 - CALL
                'nombre' => 'Call to Action - Inicio',
                'tipo' => 'bloque-4',
                'contenido' => [
                    'boton' => [
                        'link' => '/peru-tierra-de-incautos',
                        'icono' => 'fa-solid fa-book',
                        'texto' => 'Ver mi libro',
                        'fondo_color' => '#ea8e08',
                        'texto_color' => '#000000',
                    ],
                    'imagen' => asset('assets/imagenes/call-to-action/libro.png'),
                    'imagen_seo' => 'Libro Perú, Tierra de Incautos - Emerson Smith',
                    'imagen_fondo' => asset('assets/imagenes/call-to-action/fondo.jpg'),
                    'imagen_fondo_seo' => 'Fondo promocional del libro Perú, Tierra de Incautos',
                    'titulo' => 'También soy <span>escritor</span>',
                    'titulo_descripcion' => 'Mi obra revela verdades, aprendizajes y reflexiones necesarias para entender el Perú actual.',
                    'subtitulo' => '“Perú, Tierra de Incautos” — Una mirada crítica y constructiva.',
                    'subtitulo_descripcion' => '',
                ],
                'activo' => true,
            ],
            [ //6-bloque-8 - TESTIMONIOS
                'nombre' => 'Testimonios - Inicio',
                'tipo' => 'bloque-8',
                'contenido' => [
                    'titulo' => '¿Qué dicen <span>sobre mí</span>?',
                    'titulo_descripcion' => '',
                    'lista' => [
                        [
                            'id' => 1,
                            'imagen' => asset('assets/imagenes/testimonios/testimonio-1.jpg'),
                            'imagen_seo' => 'Jorge Salazar',
                            'titulo' => 'Jorge Salazar',
                            'subtitulo' => 'Periodista',
                            'descripcion' => '“El enfoque crítico y a la vez humano de Martín Caycho es refrescante. Su libro ofrece una mirada necesaria para entender nuestra realidad.”',
                        ],
                        [
                            'id' => 2,
                            'imagen' => asset('assets/imagenes/testimonios/testimonio-2.jpg'),
                            'imagen_seo' => 'Ana Torres',
                            'titulo' => 'Ana Torres',
                            'subtitulo' => 'Vecina del Agustino',
                            'descripcion' => '“Conozco a Martín desde hace años. Siempre fue un veciono solidario, ayudadano a muchas madres de familia de los comedores.”',
                        ],
                        [
                            'id' => 3,
                            'imagen' => asset('assets/imagenes/testimonios/testimonio-3.jpg'),
                            'imagen_seo' => 'Pedro Gutiérrez',
                            'titulo' => 'Pedro Gutiérrez',
                            'subtitulo' => 'Amigo Empresario',
                            'descripcion' => '“Martín siempre ha sido un empresario, transparente con bastante humilidad y sentido social.”',
                        ],
                        [
                            'id' => 4,
                            'imagen' => asset('assets/imagenes/testimonios/testimonio-4.jpg'),
                            'imagen_seo' => 'Lucía Rojas',
                            'titulo' => 'Lucía Rojas',
                            'subtitulo' => 'Amiga y Estudiante Universitaria',
                            'descripcion' => '“Martín siempre ha tenido la capacidad de cuestionar, proponer y dar solución. Es un gran profesional y empresario.”',
                        ],
                    ],
                ],

                'activo' => true,
            ],

            //CONOCEME
            [ //7-bloque-5 - BANNER
                'nombre' => 'Banner - Nosotros',
                'tipo' => 'bloque-5',
                'contenido' => [
                    'boton' => [
                        'link' => '',
                        'icono' => '',
                        'texto' => '',
                        'fondo_color' => '',
                        'texto_color' => '',
                    ],
                    'imagen' => asset('assets/imagenes/banner/banner-1.jpg'),
                    'titulo' => '¿Quiénes soy?',
                    'subtitulo' => '',
                    'imagen_seo' => '¿Quiénes somos?',
                ],
                'activo' => true,
            ],
            [ //8-bloque-2 - Soy Martín Caycho
                'nombre' => 'Presentación - Inicio',
                'tipo' => 'bloque-2',
                'contenido' => [
                    'boton' => [
                        'link' => '/peru-tierra-de-incautos',
                        'icono' => 'fa-solid fa-book',
                        'texto' => 'Conoce más sobre mi libro',
                        'fondo_color' => '#333333',
                        'texto_color' => '#ffffff',
                    ],
                    'lista' => [
                        [
                            'id' => 1,
                            'icono' => 'fa-solid fa-book-open',
                            'texto' => 'Autor de mi libro “Perú, Tierra de Incautos”',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 2,
                            'icono' => 'fa-solid fa-lightbulb',
                            'texto' => 'Comparto ideas que inspiran el cambio social y político',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 3,
                            'icono' => 'fa-solid fa-briefcase',
                            'texto' => 'Cuento con experiencia en el sector empresarial y gestión pública',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 4,
                            'icono' => 'fa-solid fa-microphone',
                            'texto' => 'Expreso mi voz crítica y analítica desde el periodismo independiente',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                    ],
                    'imagen' => asset('assets/imagenes/nosotros/nosotros-1.jpg'),
                    'titulo' => 'Soy Martín Caycho <span>Autor y Emprendedor Peruano</span>',
                    'invertir' => false,
                    'subtitulo' => 'Soy un <span>pensador</span> comprometido con el futuro del Perú',
                    'imagen_seo' => 'Martín Caycho Autor Peruano',
                    'titulo_descripcion' => 'Desde El Agustino para el Perú. Empresario, comunicador y apasionado por el desarrollo social. Autor del libro <span>“Perú, Tierra de Incautos”</span>, una mirada crítica y reflexiva sobre nuestra realidad nacional, con el deseo de inspirar un cambio verdadero basado en valores, trabajo y esperanza.',
                    'subtitulo_descripcion' => 'Combino mi experiencia como empresario y en gestión pública con mi vocación por el periodismo y la reflexión social. A través de mi obra, busco despertar conciencia, promover la participación ciudadana y contribuir al cambio que nuestro país necesita.',
                ],
                'activo' => true,
            ],
            [ //9-bloque-3 - También soy
                'nombre' => 'Soy También - Inicio',
                'tipo' => 'bloque-3',
                'contenido' => [
                    'lista' => [
                        [
                            'id' => 1,
                            'boton' => [
                                'link' => '',
                                'icono' => '',
                                'texto' => '',
                                'fondo_color' => '#000000',
                                'texto_color' => '#000000',
                            ],
                            'imagen' => asset('assets/imagenes/nosotros/nosotros-2.jpg'),
                            'titulo' => 'Empresario',
                            'subtitulo' => '',
                            'imagen_seo' => 'Empresario',
                            'descripcion' => '',
                        ],
                        [
                            'id' => 2,
                            'boton' => [
                                'link' => '',
                                'icono' => '',
                                'texto' => '',
                                'fondo_color' => '#000000',
                                'texto_color' => '#000000',
                            ],
                            'imagen' => asset('assets/imagenes/nosotros/nosotros-5.jpg'),
                            'titulo' => 'Escritor',
                            'subtitulo' => '',
                            'imagen_seo' => 'Escritor',
                            'descripcion' => '',
                        ],
                        [
                            'id' => 3,
                            'boton' => [
                                'link' => '',
                                'icono' => '',
                                'texto' => '',
                                'fondo_color' => '#000000',
                                'texto_color' => '#000000',
                            ],
                            'imagen' => asset('assets/imagenes/nosotros/nosotros-3.jpg'),
                            'titulo' => 'Líder',
                            'subtitulo' => '',
                            'imagen_seo' => 'Líder',
                            'descripcion' => '',
                        ],
                    ],
                    'titulo' => 'También <span>soy:</span>',
                    'titulo_descripcion' => 'Soy un vecino del Agustino que combina la experiencia empresarial con una profunda pasión por la comunicación y el desarrollo social. En mi libro, invito a reflexionar sobre nuestra realidad nacional y a construir, desde la acción y la conciencia, un Perú más justo y con oportunidades para todos.',
                ],
                'activo' => true,
            ],
            [ //10-bloque-7 - MISION
                'nombre' => 'Compromiso con el Perú - Nosotros',
                'tipo' => 'bloque-7',
                'contenido' => [
                    'lista' => [
                        [
                            'id' => 1,
                            'icono' => 'fa-solid fa-bullseye',
                            'subtitulo' => 'Misión',
                            'subtitulo_descripcion' => 'Mi misión es inspirar a los peruanos a creer en el cambio a través de la educación, la ética y la acción. Busco promover un liderazgo ciudadano que transforme nuestra realidad desde los valores y el compromiso social.',
                        ],
                        [
                            'id' => 2,
                            'icono' => 'fa-solid fa-eye',
                            'subtitulo' => 'Visión',
                            'subtitulo_descripcion' => 'Sueño con un Perú unido, próspero y transparente, donde el esfuerzo, la innovación y la honestidad sean las bases de nuestro desarrollo.',
                        ],
                        [
                            'id' => 3,
                            'icono' => 'fa-solid fa-handshake',
                            'subtitulo' => 'Valores',
                            'subtitulo_descripcion' => 'Me guío por la honestidad, el trabajo, la justicia social, la empatía y la responsabilidad. Estos principios inspiran cada propuesta y cada acción que realizo por el bienestar de nuestro país.',
                        ],
                    ],
                    'titulo' => 'Estoy <span>comprometido</span> con mi Perú',
                    'titulo_descripcion' => 'Conóceme un poco más.',
                ],
                'activo' => true,
            ],
            [ //11-bloque-4 - CALL
                'nombre' => 'Call to Action - Nosotros',
                'tipo' => 'bloque-4',
                'contenido' => [
                    'boton' => [
                        'link' => '/peru-tierra-de-incautos',
                        'icono' => 'fa-solid fa-book',
                        'texto' => 'Ver libro',
                        'fondo_color' => '#ea8e08',
                        'texto_color' => '#000000',
                    ],
                    'imagen' => asset('assets/imagenes/call-to-action/mujer.png'),
                    'imagen_seo' => '“Perú, Tierra de Incautos”, una mirada crítica y constructiva.',
                    'imagen_fondo' => asset('assets/imagenes/call-to-action/fondo.jpg'),
                    'imagen_fondo_seo' => '“Perú, Tierra de Incautos”, una mirada crítica y constructiva.',
                    'titulo' => 'Te invito a leer <span>mi libro</span>',
                    'titulo_descripcion' => '',
                    'subtitulo' => '“Perú, Tierra de Incautos”, una mirada crítica y constructiva.',
                    'subtitulo_descripcion' => '',
                ],
                'activo' => true,
            ],
            [ //12-bloque-2 - VALORES
                'nombre' => 'Valores - Nosotros',
                'tipo' => 'bloque-2',
                'contenido' => [
                    'boton' => [
                        'link' => '',
                        'icono' => '',
                        'texto' => '',
                        'fondo_color' => '',
                        'texto_color' => '',
                    ],
                    'lista' => [
                        [
                            'id' => 1,
                            'icono' => 'fa-solid fa-graduation-cap',
                            'texto' => 'Fomento la educación cívica y moral en todos los niveles',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 2,
                            'icono' => 'fa-solid fa-user-group',
                            'texto' => 'Impulso programas de liderazgo juvenil',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 3,
                            'icono' => 'fa-solid fa-heart',
                            'texto' => 'Promuevo una cultura basada en el respeto y la empatía',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 4,
                            'icono' => 'fa-solid fa-first-aid',
                            'texto' => 'Apoyo la formación en primeros auxilios y convivencia ciudadana',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 5,
                            'icono' => 'fa-solid fa-flag',
                            'texto' => 'Refuerzo la unidad y el orgullo de ser peruanos',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                    ],
                    'imagen' =>  asset('assets/imagenes/nosotros/nosotros-3.jpg'),
                    'titulo' => '',
                    'invertir' => true,
                    'subtitulo' => 'Siempre apoyando a mi Perú',
                    'imagen_seo' => 'Martín Caycho Autor Peruano',
                    'titulo_descripcion' => '',
                    'subtitulo_descripcion' => 'Estoy convencido de que el cambio real comienza en cada persona. Por eso, promuevo la educación en valores, la participación ciudadana y la formación de líderes comprometidos con el bien común y el respeto mutuo.',
                ],
                'activo' => true,
            ],

            //LANDING
            [ //13-bloque-1 - SLIDER
                'nombre' => 'Slider Principal - Landing',
                'tipo' => 'bloque-1',
                'contenido' => [
                    'lista' => [
                        [
                            'id' => 1,
                            'link' => '',
                            'imagen_movil' => asset('assets/imagenes/slider/sliders-movil-1.jpg'),
                            'imagen_computadora' => asset('assets/imagenes/slider/sliders-computadora-1.jpg'),
                        ],
                        [
                            'id' => 2,
                            'link' => '',
                            'imagen_movil' => asset('assets/imagenes/slider/sliders-movil-2.jpg'),
                            'imagen_computadora' => asset('assets/imagenes/slider/sliders-computadora-2.jpg'),
                        ],
                    ],
                ],
                'activo' => true,
            ],
            [ //14-bloque-2 - Una obra que inspira y transforma
                'nombre' => 'Presentación - Landing Libro',
                'tipo' => 'bloque-2',
                'contenido' => [
                    'boton' => [
                        'link' => '#formulario-libro',
                        'icono' => 'fa-solid fa-download',
                        'texto' => 'Descarga el libro ahora',
                        'fondo_color' => '#333333',
                        'texto_color' => '#ffffff',
                    ],
                    'lista' => [
                        [
                            'id' => 1,
                            'icono' => 'fa-solid fa-book-open',
                            'texto' => 'Autor: Martín Caycho, empresario y comunicador',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 2,
                            'icono' => 'fa-solid fa-lightbulb',
                            'texto' => 'Ideas claras para reflexionar y actuar por un Perú mejor',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 3,
                            'icono' => 'fa-solid fa-people-roof',
                            'texto' => 'Analiza la realidad social, política y económica de nuestro país',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 4,
                            'icono' => 'fa-solid fa-flag',
                            'texto' => 'Propone soluciones concretas para generar empleo, educación y desarrollo',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                    ],
                    'imagen' => asset('assets/imagenes/nosotros/nosotros-5.jpg'),
                    'titulo' => 'Descubre <span>“Perú, Tierra de Incautos”</span>',
                    'invertir' => false,
                    'subtitulo' => 'Una obra que <span>inspira y transforma</span>',
                    'imagen_seo' => 'Martín Caycho Autor Peruano',
                    'titulo_descripcion' => 'Un libro que revela la realidad del Perú, analiza los problemas que nos afectan y propone soluciones concretas para construir un país más justo, productivo y solidario. Sumérgete en una lectura que despierta conciencia y acción.',
                    'subtitulo_descripcion' => 'Martín Caycho combina su experiencia como empresario, comunicador y líder social para ofrecer una mirada crítica, profunda y esperanzadora sobre el Perú. Este libro no solo denuncia, sino que propone soluciones claras y prácticas.',
                ],
                'activo' => true,
            ],
            [ //15-bloque-4 - CALL INICIO
                'nombre' => 'Call to Action 1 - Landing Libro',
                'tipo' => 'bloque-4',
                'contenido' => [
                    'boton' => [
                        'link' => '#formulario-libro',
                        'icono' => 'fa-solid fa-book',
                        'texto' => 'Quiero el libro',
                        'fondo_color' => '#ea8e08',
                        'texto_color' => '#000000',
                    ],
                    'imagen' => asset('assets/imagenes/call-to-action/libro.png'),
                    'imagen_seo' => 'Terrenos y lotes en venta por Inmobiliaria Aybar',
                    'imagen_fondo' => asset('assets/imagenes/call-to-action/fondo.jpg'),
                    'imagen_fondo_seo' => 'Terrenos y lotes en venta por Inmobiliaria Aybar',
                    'titulo' => 'Descarga el libro que <span>todo peruano debe leer</span>',
                    'titulo_descripcion' => '',
                    'subtitulo' => '“Perú, Tierra de Incautos”, una mirada crítica y constructiva.',
                    'subtitulo_descripcion' => '',
                ],
                'activo' => true,
            ],
            [ //16-bloque-8 - TESTIMONIOS
                'nombre' => 'Testimonios - Landing Libro',
                'tipo' => 'bloque-8',
                'contenido' => [
                    'titulo' => 'Testimonios de <span>mis lectores</span>',
                    'titulo_descripcion' => '',
                    'lista' => [
                        [
                            'id' => 1,
                            'imagen' => asset('assets/imagenes/testimonios/testimonio-1.jpg'),
                            'imagen_seo' => 'Carlos Méndez',
                            'titulo' => 'Carlos Méndez',
                            'subtitulo' => 'Analista Político',
                            'descripcion' => '“Perú: Tierra de Incautos” es un libro que incomoda, pero necesario. Explica con claridad cómo llegamos a esta crisis y qué podemos hacer como ciudadanos para cambiar el rumbo.',
                        ],
                        [
                            'id' => 2,
                            'imagen' => asset('assets/imagenes/testimonios/testimonio-2.jpg'),
                            'imagen_seo' => 'Ana Torres',
                            'titulo' => 'Ana Torres',
                            'subtitulo' => 'Emprendedora',
                            'descripcion' => 'Leer este libro me hizo entender que la corrupción no es solo un problema de “arriba”, sino algo que debemos enfrentar todos. Inspirador y directo.',
                        ],
                        [
                            'id' => 3,
                            'imagen' => asset('assets/imagenes/testimonios/testimonio-3.jpg'),
                            'imagen_seo' => 'Jorge Salazar',
                            'titulo' => 'Jorge Salazar',
                            'subtitulo' => 'Periodista',
                            'descripcion' => 'Martín Caycho presenta una radiografía contundente del Perú. Es un llamado urgente a despertar como sociedad. Un libro valiente.',
                        ],
                        [
                            'id' => 4,
                            'imagen' => asset('assets/imagenes/testimonios/testimonio-4.jpg'),
                            'imagen_seo' => 'Lucía Rojas',
                            'titulo' => 'Lucía Rojas',
                            'subtitulo' => 'Estudiante de Ciencias Políticas',
                            'descripcion' => 'Me ayudó a comprender, con ejemplos simples y reales, cómo se ha venido manejando el país. Perfecto para jóvenes que quieren formarse criterio.',
                        ],
                    ]
                ],

                'activo' => true,
            ],
            [ //17-bloque-2 - Un pensador comprometido con el Perú
                'nombre' => 'Autor - Landing Libro',
                'tipo' => 'bloque-2',
                'contenido' => [
                    'titulo' => 'Martín Caycho <span>Autor y Emprendedor Peruano</span>',
                    'titulo_descripcion' => '',
                    'lista' => [
                        [
                            'id' => 1,
                            'icono' => 'fa-solid fa-book-open',
                            'texto' => 'Autor de “Perú, Tierra de Incautos”',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 2,
                            'icono' => 'fa-solid fa-lightbulb',
                            'texto' => 'Ideas que inspiran acción y cambio social',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 3,
                            'icono' => 'fa-solid fa-briefcase',
                            'texto' => 'Experiencia en empresas y gestión pública',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                        [
                            'id' => 4,
                            'icono' => 'fa-solid fa-microphone',
                            'texto' => 'Voz crítica desde el periodismo y la comunicación',
                            'icono_color' => '#333333',
                            'texto_color' => '#333',
                        ],
                    ],
                    'invertir' => false,
                    'imagen' => asset('assets/imagenes/nosotros/nosotros-1.jpg'),
                    'imagen_seo' => 'Martín Caycho Autor Peruano',
                    'subtitulo' => 'Un pensador comprometido con el Perú',
                    'subtitulo_descripcion' => 'Desde El Agustino, Martín Caycho combina su experiencia empresarial, su trayectoria en gestión pública y su pasión por el periodismo para inspirar cambios reales en nuestro país. Autor de <span>“Perú, Tierra de Incautos”</span>, propone soluciones concretas y reflexiones profundas sobre la realidad peruana.',
                    'boton' => [
                        'link' => '',
                        'icono' => '',
                        'texto' => '',
                        'fondo_color' => '',
                        'texto_color' => '',
                    ],
                ],
                'activo' => true,
            ],
            [ //18-bloque-4 - CALL FINAL
                'nombre' => 'Call to Action Final - Landing Libro',
                'tipo' => 'bloque-4',
                'contenido' => [
                    'boton' => [
                        'link' => '#formulario-libro',
                        'icono' => 'fa-solid fa-book',
                        'texto' => 'Obtener el libro',
                        'fondo_color' => '#ea8e08',
                        'texto_color' => '#000000',
                    ],
                    'imagen' => asset('assets/imagenes/call-to-action/mujer.png'),
                    'imagen_seo' => '',
                    'imagen_fondo' => asset('assets/imagenes/call-to-action/fondo.jpg'),
                    'imagen_fondo_seo' => '',
                    'titulo' => 'Solo registrate y <span>ten el libro</span>',
                    'titulo_descripcion' => '',
                    'subtitulo' => 'Se te enviará automaticamente el link.',
                    'subtitulo_descripcion' => '',
                ],
                'activo' => true,
            ],

            //POLITICAS
            [ //19-bloque-9 - TERMINOS
                'nombre' => 'Terminos y Condiciones',
                'tipo' => 'bloque-9',
                'contenido' => [
                    'titulo' => 'Terminos y Condiciones',
                    'subtitulo' => '',
                    'content_html' => '<p>Declaro haber sido informado, conforme a Ley N° 29733 - Ley de Protección de Datos Personales (“la Ley”) y al Decreto Supremo 003-2013/JUS - Reglamento de la Ley (“el Reglamento)”, doy mi consentimiento libre, previo , informado, expreso e inequívoco para que <strong>AYBAR S.A.C. </strong>realice el tratamiento de mis datos personales que le proporcione de manera física o digital , con la finalidad de ejecutar cualquier relación contractual que mantengo y/o mantendré con la misma, contactarme y para fines estadísticos y/o analíticos.</p>',
                ],
                'activo' => true,
            ],
            [ //20-bloque-9 - POLITICAS
                'nombre' => 'Políticas de Privacidad',
                'tipo' => 'bloque-9',
                'contenido' => [
                    'titulo' => 'Políticas de Privacidad',
                    'subtitulo' => '',
                    'content_html' => '<p>Declaro haber sido informado, conforme a Ley N° 29733 - Ley de Protección de Datos Personales (“la Ley”) y al Decreto Supremo 003-2013/JUS - Reglamento de la Ley (“el Reglamento)”, doy mi consentimiento libre, previo , informado, expreso e inequívoco para que <strong>AYBAR S.A.C. </strong>realice el tratamiento de mis datos personales que le proporcione de manera física o digital , con la finalidad de ejecutar cualquier relación contractual que mantengo y/o mantendré con la misma, contactarme y para fines estadísticos y/o analíticos.</p>',
                ],
                'activo' => true,
            ],
        ];

        foreach ($secciones as $seccion) {
            Seccion::create($seccion);
        }
    }
}
