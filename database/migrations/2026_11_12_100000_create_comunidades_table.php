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
        // Santuário (matriz) e capelas que pertencem à paróquia
        Schema::create('comunidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 120);
            $table->string('slug', 140)->unique();
            $table->string('tipo', 20)->default('capela'); // santuario | capela
            $table->string('endereco')->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 100)->default('Presidente Prudente (SP)');
            $table->text('descricao')->nullable();
            $table->string('imagem')->nullable(); // URL completa ou arquivo em public/img
            $table->unsignedTinyInteger('ordem')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunidades');
    }
};
