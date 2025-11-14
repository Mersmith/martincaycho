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
        Schema::create('comunicados', function (Blueprint $table) {
            $table->id();

            $table->string('titulo');
            $table->string('slug')->unique();
            $table->longText('contenido');
            $table->string('imagen')->nullable();
            $table->dateTime('publicado_en')->nullable();
            $table->boolean('activo')->default(true);

            $table->json('documento')->nullable();

            // SEO opcional
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_image')->nullable();
            $table->unsignedBigInteger('views')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunicados');
    }
};
