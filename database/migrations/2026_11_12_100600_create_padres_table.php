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
        Schema::create('padres', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 120);
            $table->string('funcao', 80)->nullable(); // ex.: Pároco, Vigário paroquial
            $table->string('foto')->nullable();       // URL completa ou arquivo em public/img
            $table->text('bio')->nullable();
            $table->unsignedTinyInteger('ordem')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('padres');
    }
};
