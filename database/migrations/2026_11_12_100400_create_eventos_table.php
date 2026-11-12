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
        // Eventos em destaque (festas, novenas, retiros) - cada um tem página própria
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 150);
            $table->string('slug', 170)->unique();
            $table->string('resumo');
            $table->longText('descricao')->nullable();
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim')->nullable();
            $table->string('local', 150)->nullable();
            $table->string('imagem')->nullable(); // URL completa ou arquivo em public/img
            $table->boolean('destaque')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
