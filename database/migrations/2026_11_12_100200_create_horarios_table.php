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
        // Horários de atendimento: confissões, secretaria, adoração, terço...
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->string('categoria', 40); // confissoes | secretaria | adoracao | devocao
            $table->string('titulo', 120);
            $table->string('dias', 120);     // ex.: "Terça a sexta-feira"
            $table->time('hora_inicio');
            $table->time('hora_fim')->nullable();
            $table->string('observacao')->nullable();
            $table->unsignedTinyInteger('ordem')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
