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
        // Agenda paroquial: compromissos com data marcada (reuniões, encontros, celebrações)
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 150);
            $table->text('descricao')->nullable();
            $table->date('data');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fim')->nullable();
            $table->string('local', 150)->nullable();
            $table->string('categoria', 40)->default('geral'); // liturgia | formacao | pastoral | social | geral
            $table->foreignId('comunidade_id')->nullable()->constrained('comunidades')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
