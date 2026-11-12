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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 180);
            $table->string('slug', 200)->unique();
            $table->string('categoria', 40)->default('Paróquia');
            $table->string('resumo');
            $table->longText('conteudo');
            $table->string('imagem')->nullable(); // URL completa ou arquivo em public/img
            $table->string('autor', 100)->nullable();
            $table->dateTime('publicado_em');
            $table->boolean('destaque')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
