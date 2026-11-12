@extends('layouts.site')

@section('titulo', 'Eventos')
@section('descricao', 'Festas, novenas e celebrações especiais do Santuário Diocesano Nossa Senhora Aparecida.')

@section('conteudo')

    @include('partials.topo', [
        'titulo' => 'Eventos',
        'sobretitulo' => 'Celebre conosco',
        'texto' => 'Festas, novenas, solenidades e momentos especiais da vida do Santuário.',
        'imagem' => foto('imagem'),
    ])

    <section class="secao">
        <div class="container">
            <div class="secao__topo revelar">
                <h2>Próximos eventos</h2>
            </div>

            @if ($proximos->isNotEmpty())
                <div class="cards">
                    @foreach ($proximos as $evento)
                        @include('partials.card-evento', ['evento' => $evento])
                    @endforeach
                </div>
            @else
                <div class="vazio">
                    <h3>Nenhum evento marcado</h3>
                    Assim que houver novidades, elas aparecem aqui.
                </div>
            @endif
        </div>
    </section>

    @if ($anteriores->isNotEmpty())
        <section class="secao secao--2">
            <div class="container">
                <div class="secao__topo revelar">
                    <h2>Já aconteceu</h2>
                </div>

                <div class="cards">
                    @foreach ($anteriores as $evento)
                        @include('partials.card-evento', ['evento' => $evento])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
