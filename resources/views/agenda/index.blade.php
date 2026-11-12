@extends('layouts.site')

@section('titulo', 'Agenda paroquial')
@section('descricao', 'Agenda do Santuário Diocesano Nossa Senhora Aparecida: encontros, formações, celebrações e ações das pastorais.')

@section('conteudo')

    @include('partials.topo', [
        'titulo' => 'Agenda paroquial',
        'sobretitulo' => 'Participe',
        'texto' => 'Encontros, formações, celebrações e ações das pastorais e movimentos. Há sempre um lugar para você.',
        'imagem' => foto('nave_fundo'),
    ])

    <section class="secao">
        <div class="container">
            @forelse ($meses as $mes => $itens)
                <div class="agenda-grupo">
                    <h2 class="agenda-mes revelar">{{ ucfirst($itens->first()->data->translatedFormat('F \d\e Y')) }}</h2>

                    <div class="compromissos">
                        @foreach ($itens as $item)
                            @include('partials.compromisso', ['item' => $item])
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="vazio">
                    <h3>Nenhum compromisso por enquanto</h3>
                    Volte em breve para conferir a agenda da paróquia.
                </div>
            @endforelse
        </div>
    </section>

@endsection
