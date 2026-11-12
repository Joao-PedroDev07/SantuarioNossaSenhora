<?php

namespace Database\Seeders;

use App\Models\Agenda;
use App\Models\Comunidade;
use Illuminate\Database\Seeder;

class AgendaSeeder extends Seeder
{
    /**
     * ATENÇÃO: DADOS DE EXEMPLO!
     * As datas são calculadas a partir de hoje, só para a agenda nunca ficar vazia.
     * Troque pelos compromissos verdadeiros da paróquia.
     */
    public function run(): void
    {
        $hoje = now()->startOfDay();
        $pallotti = Comunidade::where('slug', 'capela-sao-vicente-pallotti')->value('id');
        $terezinha = Comunidade::where('slug', 'capela-santa-terezinha')->value('id');

        $itens = [
            [2, 'Reunião do Conselho Pastoral Paroquial', 'pastoral', '20:00', '21:30', 'Salão paroquial', null,
                'Encontro mensal dos coordenadores de pastorais e movimentos.'],
            [4, 'Adoração ao Santíssimo e bênção', 'liturgia', '18:30', '19:30', 'Santuário', null,
                'Momento de oração silenciosa diante de Jesus Eucarístico.'],
            [6, 'Encontro de Catequese - Primeira Eucaristia', 'formacao', '09:00', '10:30', 'Salas de catequese', null,
                'Encontro semanal das turmas de Primeira Eucaristia.'],
            [9, 'Terço dos Homens', 'pastoral', '19:30', '20:30', 'Santuário', null,
                'Todos os homens da comunidade são convidados.'],
            [11, 'Formação para ministros e leitores', 'formacao', '19:30', '21:00', 'Salão paroquial', null,
                'Formação litúrgica para as equipes de celebração.'],
            [13, 'Encontro de preparação para o Batismo', 'formacao', '19:30', '21:30', 'Salão paroquial', null,
                'Para pais e padrinhos. Inscrições na secretaria paroquial.'],
            [15, 'Celebração e convivência da comunidade', 'pastoral', '19:30', null, 'Capela São Vicente Pallotti', $pallotti,
                'Missa seguida de partilha fraterna.'],
            [18, 'Campanha de arrecadação de alimentos', 'social', null, null, 'Todas as comunidades', null,
                'As doações podem ser entregues nas missas do fim de semana.'],
            [21, 'Grupo de oração', 'pastoral', '20:00', '21:30', 'Capela Santa Terezinha', $terezinha,
                'Louvor, Palavra e oração.'],
            [27, 'Retiro de jovens', 'formacao', '08:00', '17:00', 'Salão paroquial', null,
                'Um dia de espiritualidade para jovens a partir de 15 anos.'],
        ];

        foreach ($itens as [$dias, $titulo, $categoria, $inicio, $fim, $local, $comunidadeId, $descricao]) {
            Agenda::create([
                'titulo' => $titulo,
                'descricao' => $descricao,
                'data' => $hoje->copy()->addDays($dias),
                'hora_inicio' => $inicio,
                'hora_fim' => $fim,
                'local' => $local,
                'categoria' => $categoria,
                'comunidade_id' => $comunidadeId,
            ]);
        }
    }
}
