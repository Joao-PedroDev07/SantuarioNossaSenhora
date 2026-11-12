<?php

namespace Database\Seeders;

use App\Models\Comunidade;
use App\Models\Missa;
use Illuminate\Database\Seeder;

class ComunidadeSeeder extends Seeder
{
    /**
     * Comunidades e horários de missa REAIS, conforme o site da Diocese
     * (última atualização informada lá: julho de 2025).
     */
    public function run(): void
    {
        // dia_semana: 0 = domingo, 1 = segunda ... 6 = sábado
        $comunidades = [
            [
                'nome' => 'Santuário Diocesano Nossa Senhora Aparecida',
                'slug' => 'santuario',
                'tipo' => 'santuario',
                'endereco' => 'Rua Sargento Firmino Leão, 100',
                'bairro' => 'Vila Marcondes',
                'descricao' => 'Igreja matriz e sede da paróquia, casa da Mãe Aparecida em Presidente Prudente.',
                'imagem' => config('santuario.fotos.fachada'),
                'missas' => [
                    [0, '07:00'], [0, '10:00'], [0, '19:00'],
                    [1, '19:30'],
                    [3, '19:30'],
                    [4, '19:30'],
                    [5, '15:00'],
                    [6, '07:00'], [6, '19:00'],
                ],
            ],
            [
                'nome' => 'Capela Santa Terezinha',
                'slug' => 'capela-santa-terezinha',
                'tipo' => 'capela',
                'bairro' => 'Jardim Itapura I',
                'descricao' => 'Comunidade dedicada a Santa Teresinha do Menino Jesus.',
                'missas' => [[0, '09:00']],
            ],
            [
                'nome' => 'Capela São Vicente de Paulo',
                'slug' => 'capela-sao-vicente-de-paulo',
                'tipo' => 'capela',
                'bairro' => 'Parque Furquim',
                'descricao' => 'Comunidade dedicada a São Vicente de Paulo, pai dos pobres.',
                'missas' => [[0, '08:00']],
            ],
            [
                'nome' => 'Capela São Vicente Pallotti',
                'slug' => 'capela-sao-vicente-pallotti',
                'tipo' => 'capela',
                'bairro' => 'Vila Rainho',
                'descricao' => 'Comunidade dedicada a São Vicente Pallotti, apóstolo de Roma.',
                'missas' => [[6, '19:30']],
            ],
        ];

        foreach ($comunidades as $ordem => $dados) {
            $missas = $dados['missas'];
            unset($dados['missas']);

            $comunidade = Comunidade::create($dados + ['ordem' => $ordem]);

            foreach ($missas as [$dia, $horario]) {
                Missa::create([
                    'comunidade_id' => $comunidade->id,
                    'dia_semana' => $dia,
                    'horario' => $horario,
                ]);
            }
        }
    }
}
