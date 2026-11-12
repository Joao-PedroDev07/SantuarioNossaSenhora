<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EventoSeeder extends Seeder
{
    /**
     * ATENÇÃO: DADOS DE EXEMPLO!
     * As festas são verdadeiras do calendário da Igreja, mas os horários e a
     * programação foram inventados. Troque pela programação oficial do Santuário.
     */
    public function run(): void
    {
        $fotos = config('santuario.fotos');

        $padroeira = $this->proxima(10, 12, '10:00');

        $eventos = [
            [
                'titulo' => 'Solenidade da Imaculada Conceição',
                'resumo' => 'Missa solene em honra da Imaculada Conceição de Nossa Senhora.',
                'descricao' => "A Igreja celebra a Virgem Maria, preservada do pecado original desde o primeiro instante da sua existência.\n\nVenha celebrar conosco esta solenidade tão querida ao povo brasileiro. Após a Santa Missa haverá a consagração das famílias a Nossa Senhora.",
                'data_inicio' => $this->proxima(12, 8, '19:30'),
                'local' => 'Santuário',
                'imagem' => $fotos['imaculada'],
            ],
            [
                'titulo' => 'Natal do Senhor - Missa da Noite',
                'resumo' => 'Celebração solene do nascimento de Nosso Senhor Jesus Cristo.',
                'descricao' => "\"Hoje nasceu para nós o Salvador, que é o Cristo Senhor.\"\n\nA comunidade se reúne para a Missa da Noite de Natal. Traga sua família para adorar o Menino Deus.",
                'data_inicio' => $this->proxima(12, 24, '20:00'),
                'local' => 'Santuário',
                'imagem' => $fotos['nave'],
            ],
            [
                'titulo' => 'Santa Maria, Mãe de Deus',
                'resumo' => 'Começamos o ano novo sob a proteção da Mãe de Deus. Dia Mundial da Paz.',
                'descricao' => "No primeiro dia do ano a Igreja celebra a maternidade divina de Maria e reza pela paz no mundo.\n\nMissa de ação de graças e bênção para o ano que se inicia.",
                'data_inicio' => $this->proxima(1, 1, '19:00'),
                'local' => 'Santuário',
                'imagem' => $fotos['anunciacao'],
            ],
            [
                'titulo' => 'Novena da Padroeira',
                'resumo' => 'Nove noites de oração em preparação para a festa de Nossa Senhora Aparecida.',
                'descricao' => "Durante nove noites, as comunidades, pastorais e movimentos se revezam na animação da novena.\n\nTodas as noites: Santo Terço, Santa Missa e bênção. Traga sua família!",
                'data_inicio' => $padroeira->copy()->subDays(9)->setTime(19, 30),
                'data_fim' => $padroeira->copy()->subDay()->setTime(21, 0),
                'local' => 'Santuário',
                'imagem' => $fotos['sacrario'],
            ],
            [
                'titulo' => 'Festa de Nossa Senhora Aparecida',
                'resumo' => 'Solenidade da Padroeira do Brasil e do nosso Santuário, com missas ao longo do dia.',
                'descricao' => "O grande dia da nossa Padroeira! Missas durante todo o dia, procissão com a imagem de Nossa Senhora Aparecida e coroação.\n\nVenha agradecer e pedir a intercessão da Mãe Aparecida, Rainha e Padroeira do Brasil.",
                'data_inicio' => $padroeira,
                'local' => 'Santuário',
                'imagem' => $fotos['imagem'],
                'destaque' => true,
            ],
        ];

        foreach ($eventos as $evento) {
            // O slug leva o ano para não repetir quando a festa for cadastrada de novo
            $evento['slug'] = str($evento['titulo'] . ' ' . $evento['data_inicio']->year)->slug();

            Evento::create($evento);
        }
    }

    /**
     * Próxima vez que o dia/mês informado vai acontecer (este ano ou no ano que vem).
     */
    private function proxima(int $mes, int $dia, string $hora): Carbon
    {
        $data = Carbon::create(now()->year, $mes, $dia)->setTimeFromTimeString($hora);

        return $data->isPast() ? $data->addYear() : $data;
    }
}
