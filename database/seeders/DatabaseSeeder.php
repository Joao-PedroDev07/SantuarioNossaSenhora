<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * Para recriar o banco do zero com estes dados:
     * php artisan migrate:fresh --seed
     */
    public function run(): void
    {
        $this->call([
            ComunidadeSeeder::class, // dados reais (comunidades + missas)
            PadreSeeder::class,      // dados reais
            HorarioSeeder::class,    // exemplo - conferir
            AgendaSeeder::class,     // exemplo
            EventoSeeder::class,     // exemplo
            NoticiaSeeder::class,    // exemplo
        ]);
    }
}
