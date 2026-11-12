<?php

namespace Database\Seeders;

use App\Models\Padre;
use Illuminate\Database\Seeder;

class PadreSeeder extends Seeder
{
    /**
     * Padres conforme o site da Diocese.
     * CONFERIR: a função do Pe. Cláudio não aparece no site (deixei em branco).
     */
    public function run(): void
    {
        Padre::create([
            'nome' => 'Pe. Cláudio Pereira dos Santos, SAC',
            'funcao' => null,
            'ordem' => 1,
        ]);

        Padre::create([
            'nome' => 'Pe. Reinaldo Aparecido Picolotto, SAC',
            'funcao' => 'Vigário',
            'ordem' => 2,
        ]);
    }
}
