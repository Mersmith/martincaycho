<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->id();

            $table->enum('tipo', ['secciones', 'personalizado'])->default('personalizado');
            $table->string('titulo');
            $table->string('slug')->unique();

            $table->json('contenido')->nullable();

            // SEO opcional
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_imagen')->nullable();
            $table->string('meta_imagen_alt')->nullable();

            $table->unsignedBigInteger('views')->default(0);

            $table->boolean('mostrar_en_menu')->default(true);
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paginas');
    }
};
