<?php

namespace Database\Seeders;

use App\Models\Noticia;
use Illuminate\Database\Seeder;

class NoticiaSeeder extends Seeder
{
    /**
     * ATENÇÃO: DADOS DE EXEMPLO!
     * Textos escritos só para mostrar o layout. Troque pelas notícias da paróquia.
     * O conteúdo é texto simples: uma linha em branco separa os parágrafos.
     */
    public function run(): void
    {
        $fotos = config('santuario.fotos');

        $noticias = [
            [
                'titulo' => 'Santuário lança novo site para ficar mais perto dos fiéis',
                'categoria' => 'Paróquia',
                'resumo' => 'Horários de missa, agenda, eventos e notícias das comunidades agora em um só lugar.',
                'conteudo' => "O Santuário Diocesano Nossa Senhora Aparecida está de casa nova na internet. O novo site reúne em um só lugar tudo o que o fiel precisa para participar da vida da comunidade.\n\nAqui você encontra os horários de missa do Santuário e das capelas, a agenda paroquial, os próximos eventos e as notícias das nossas comunidades.\n\nSalve o endereço nos favoritos do seu celular e compartilhe com a sua família. Evangelizar também é compartilhar!",
                'imagem' => $fotos['fachada'],
                'dias' => 0,
                'destaque' => true,
            ],
            [
                'titulo' => 'Advento: tempo de preparar o coração para o Natal',
                'categoria' => 'Liturgia',
                'resumo' => 'Quatro semanas para vigiar, rezar e esperar com Maria a vinda do Senhor.',
                'conteudo' => "O Advento abre o novo ano litúrgico e nos convida à vigilância e à esperança. São quatro semanas em que a Igreja se prepara para celebrar o nascimento de Jesus.\n\nUma bela tradição para viver em família é a coroa do Advento: a cada domingo acende-se uma vela, acompanhada de uma oração e da leitura do Evangelho.\n\nAproveite este tempo também para procurar o sacramento da Confissão e chegar ao Natal com o coração renovado.",
                'imagem' => $fotos['anunciacao'],
                'dias' => 2,
            ],
            [
                'titulo' => 'Inscrições abertas para a Catequese',
                'categoria' => 'Catequese',
                'resumo' => 'Turmas de Primeira Eucaristia, Crisma e catequese de adultos. Procure a secretaria paroquial.',
                'conteudo' => "Estão abertas as inscrições para as novas turmas de catequese: Primeira Eucaristia, Crisma e catequese de adultos.\n\nPara fazer a inscrição, os pais ou responsáveis devem procurar a secretaria paroquial levando a certidão de nascimento e a lembrança do batismo da criança.\n\nA catequese é o caminho para conhecer, amar e seguir Jesus. Não deixe para depois!",
                'imagem' => $fotos['ultima_ceia'],
                'dias' => 5,
            ],
            [
                'titulo' => 'Dízimo: gesto de fé, gratidão e partilha',
                'categoria' => 'Dízimo',
                'resumo' => 'É com o dízimo de cada família que o Santuário mantém suas obras de evangelização e caridade.',
                'conteudo' => "O dízimo é um gesto de gratidão a Deus por tudo o que recebemos. É também compromisso com a comunidade, pois sustenta a evangelização, a liturgia, a manutenção da igreja e a caridade com os mais necessitados.\n\nPara se tornar dizimista, procure a Pastoral do Dízimo ao final das missas ou a secretaria paroquial.",
                'imagem' => $fotos['sacrario'],
                'dias' => 9,
            ],
            [
                'titulo' => 'Vinde, Espírito Santo: grupos de oração acolhem novos participantes',
                'categoria' => 'Pastoral',
                'resumo' => 'Encontros semanais de louvor, escuta da Palavra e oração nas comunidades.',
                'conteudo' => "Os grupos de oração da paróquia se reúnem todas as semanas para louvar, escutar a Palavra de Deus e rezar uns pelos outros.\n\nOs encontros são abertos a todos. Consulte a agenda paroquial e participe na comunidade mais perto da sua casa.",
                'imagem' => $fotos['pentecostes'],
                'dias' => 14,
            ],
            [
                'titulo' => 'A casa da Mãe Aparecida em Presidente Prudente',
                'categoria' => 'Santuário',
                'resumo' => 'Criada em 28 de agosto de 1940, a paróquia acolhe os devotos da Padroeira do Brasil.',
                'conteudo' => "Criada em 28 de agosto de 1940, a paróquia Nossa Senhora Aparecida, na Vila Marcondes, é hoje Santuário Diocesano e acolhe todos os dias os devotos da Padroeira do Brasil.\n\nAlém da igreja matriz, a paróquia reúne três capelas: Santa Terezinha, São Vicente de Paulo e São Vicente Pallotti.\n\nVenha visitar o Santuário, rezar diante da imagem de Nossa Senhora Aparecida e participar das nossas celebrações.",
                'imagem' => $fotos['imagem'],
                'dias' => 20,
            ],
        ];

        foreach ($noticias as $noticia) {
            $dias = $noticia['dias'];
            unset($noticia['dias']);

            Noticia::create($noticia + [
                'slug' => str($noticia['titulo'])->slug(),
                'autor' => 'Pastoral da Comunicação',
                'publicado_em' => now()->subDays($dias)->setTime(9, 0),
            ]);
        }
    }
}
