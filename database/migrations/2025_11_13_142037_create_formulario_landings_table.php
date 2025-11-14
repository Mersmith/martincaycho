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
        Schema::create('formulario_landings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tipo_formulario_id')->constrained('tipo_formularios')->onDelete('cascade');

            $table->string('nombre');
            $table->string('apellido')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('asunto')->nullable();
            $table->text('mensaje')->nullable();
            $table->boolean('leido')->default(false);
            $table->enum('estado', ['nuevo', 'revision', 'resuelto', 'cerrado'])->default('nuevo');

            $table->boolean('whatsapp_enviado')->default(false);
            $table->string('whatsapp_message_id')->nullable();
            $table->string('whatsapp_status')->nullable();
            $table->text('whatsapp_response')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario_landings');
    }
};
