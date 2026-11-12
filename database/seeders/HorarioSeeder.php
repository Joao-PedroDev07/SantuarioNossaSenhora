<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * ATENÇÃO: DADOS DE EXEMPLO!
     * O site da Diocese não informa estes horários. Troque pelos horários
     * verdadeiros da secretaria, confissões etc. antes de publicar o site.
     */
    public function run(): void
    {
        $horarios = [
            ['confissoes', 'Confissões no Santuário', 'Terça a sexta-feira', '15:00', '17:00', 'Ou com hora marcada na secretaria'],
            ['confissoes', 'Confissões antes da missa', 'Sábado', '17:30', '18:45', null],
            ['secretaria', 'Atendimento da secretaria', 'Segunda a sexta-feira', '08:00', '17:30', 'Fecha para almoço das 11h30 às 13h'],
            ['secretaria', 'Atendimento da secretaria', 'Sábado', '08:00', '11:30', null],
            ['adoracao', 'Adoração ao Santíssimo Sacramento', 'Quinta-feira', '18:30', '19:30', 'Antes da Santa Missa'],
            ['devocao', 'Terço da Misericórdia', 'Sexta-feira', '15:00', null, 'Seguido da Santa Missa'],
            ['devocao', 'Santo Terço', 'Todos os dias', '18:30', null, 'Meia hora antes da missa da noite'],
        ];

        foreach ($horarios as $ordem => [$categoria, $titulo, $dias, $inicio, $fim, $observacao]) {
            Horario::create([
                'categoria' => $categoria,
                'titulo' => $titulo,
                'dias' => $dias,
                'hora_inicio' => $inicio,
                'hora_fim' => $fim,
                'observacao' => $observacao,
                'ordem' => $ordem,
            ]);
        }
    }
}
