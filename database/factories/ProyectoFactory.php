<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulo = $this->faker->sentence(6);
        $contenido = '<p>Primero, agradezco la fe que muchos peruanos tienen en mí. Aun no soy candidato presidencial, soy afiliado del partido ‘<strong>País para todos</strong>’. Estoy muy agradecido.</p><p>&nbsp;</p><p><picture><source srcset="http://127.0.0.1:8000/assets/imagen/default.jpg" media="(max-width: 639px)"><source srcset="http://127.0.0.1:8000/assets/imagen/default.jpg" media="(min-width: 640px)"><img src="http://127.0.0.1:8000/assets/imagen/default.jpg alt="El virtual candidato presidencial pide mano dura contra extorsionadores que detonan granadas en los pequeños negocios.
            Fotos: Julio Reaño/@photo.gec" width="3110" height="4656"></picture></p><p>&nbsp;</p><p><strong>Eres bien radical con tu propuesta contra la inseguridad...</strong></p><p>Contra la corrupción, contra la inseguridad ciudadana y contra una clase política que es un asco para mí...</p><p>&nbsp;</p><p><strong>Este gobierno se niega admitir que el avance criminal es feroz en el país, ¿por qué?</strong></p><p><strong>Es un gobierno, lamentablemente, ciego, sordo, mudo, indolente, incapaz</strong>. Está preocupado en sus problemas politiqueros al interior. Un ministro del Interior que dijo que iba a renunciar en dos meses y no renunció.</p><p>&nbsp;</p><p><strong>¿Por qué no renunció?</strong></p><p>Así como hay un <strong>pacto infame</strong> entre el Ejecutivo y el Congreso para mantener sus privilegios y llegar al 2026, también hay un pacto infame con los ministros de Estado.</p><p>&nbsp;</p><p><strong>Has dicho que estás de acuerdo con la pena de muerte, ¿te reafirmas?</strong></p><p>Yo la he propuesto hace más de dos años.</p><p>&nbsp;</p><p><strong>¿Por qué crees que la pena de muerte sería la solución?</strong></p><p>No creo que sea la solución, es una de las armas que tenemos que aplicar. <strong>Tenemos que eliminar a estos miserables, a estos malditos</strong>. No creen en nadie, nos quitan la vida, pisotean nuestras leyes, han tomado el país.</p><p>&nbsp;</p><p><strong>¿Te agrada el estilo de Donald Trump?</strong></p><p>Puedo estar de acuerdo o no en ciertas medidas, pero hay algo que debo rescatar: está haciendo respetar a su país.</p><p>&nbsp;</p><p><strong>¿Imitarías esa política?</strong></p><p>Si yo fuera presidente del Perú expulsaría a extranjero que le falta el respeto a un peruano, que se vaya del país. <strong>Al que comete un crimen, se le fusila.</strong></p><p>&nbsp;</p><p><strong>Dijiste que el Perú no necesita un Bukele, sino alguien que no sea pelele, ¿cómo calificarías el gobierno de Dina Boluarte?</strong></p><p>Es un gobierno sin carácter, sin norte, un gobierno pusilánime ante la delincuencia. Lamentablemente, están dando medidas paliativas, bálsamos.</p><p>&nbsp;</p><p><strong>Detonan granadas en cada esquina, balean bodegas, restaurantes, buses...</strong></p><p>En ese tema de los buses, me pareció una afrenta lo que dijo el primer ministro. ¿Cómo puede salir a decir que fracasó el paro? Podrán tener algún defecto en su paro, pero lo están haciendo porque están baleando a los choferes y sus pasajeros.</p><p>&nbsp;</p><p><strong>¿Qué lectura le das a ese mensaje?</strong></p><p>Está empoderando a los criminales, les está diciendo ‘sigan extorsionando, este paro no sirve’.</p><p>&nbsp;</p><p><strong>¿Cuál es la solución para acabar con la criminalidad?</strong></p><p>A parte de la pena de muerte, es construir el mega penal. Declarar al delincuente como objetivo militar. La tenencia ilegal de armas como terrorismo delictivo.</p><p><picture><source srcset="http://127.0.0.1:8000/assets/imagen/default.jpg" media="(max-width: 639px)"><source srcset="http://127.0.0.1:8000/assets/imagen/default.jpg" media="(min-width: 640px)"><img src="http://127.0.0.1:8000/assets/imagen/default.jpg" alt="El humorista, de ser presidente, construiría un megapenal.
            Fotos: Julio Reaño/@photo.gec" width="3493" height="5371"></picture></p>';
        return [
            'titulo' => $titulo,
            'slug' => Str::slug($titulo),
            'contenido' => $contenido,
            'imagen' => 'http://127.0.0.1:8000/assets/imagenes/proyectos/proyecto-1.jpg',
            'publicado_en' => now(),
            'activo' => true,
            'meta_title' => $titulo,
            'meta_description' => $this->faker->sentence(1),
            'meta_image' => 'http://127.0.0.1:8000/assets/imagen/default.jpg',
        ];
    }
}
