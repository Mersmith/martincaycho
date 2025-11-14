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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('slug')->nullable();
            $table->string('url')->nullable(); // Enlace externo o interno
            $table->foreignId('pagina_id')->nullable()->constrained('paginas')->nullOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('menus')->nullOnDelete(); // relación recursiva
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
        Schema::dropIfExists('menus');
    }
};
