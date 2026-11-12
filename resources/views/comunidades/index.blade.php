@extends('layouts.site')

@section('titulo', 'Comunidades')
@section('descricao', 'Conheça o Santuário e as capelas Santa Terezinha, São Vicente de Paulo e São Vicente Pallotti.')

@section('conteudo')

    @include('partials.topo', [
        'titulo' => 'Nossas comunidades',
        'sobretitulo' => 'Uma só família',
        'texto' => 'Além da igreja matriz, a paróquia está presente nos bairros por meio de suas capelas.',
        'imagem' => foto('fachada'),
    ])

    <section class="secao">
        <div class="container">
            @foreach ($comunidades as $comunidade)
                <article class="comunidade-larga revelar" id="{{ $comunidade->slug }}">
                    <div @class(['comunidade-larga__midia', 'midia-vazia' => ! $comunidade->imagem_url])>
                        @if ($comunidade->imagem_url)
                            <img src="{{ $comunidade->imagem_url }}" alt="{{ $comunidade->nome }}" loading="lazy">
                        @endif
                    </div>

                    <div>
                        <span class="etiqueta etiqueta--linha">{{ $comunidade->tipo === 'santuario' ? 'Igreja matriz' : 'Capela' }}</span>
                        <h2>{{ $comunidade->nome }}</h2>

                        @if ($comunidade->descricao)
                            <p class="texto-2">{{ $comunidade->descricao }}</p>
                        @endif

                        <div class="infos">
                            <span><x-icone nome="mapa" /> {{ collect([$comunidade->endereco, $comunidade->bairro, $comunidade->cidade])->filter()->join(' · ') }}</span>
                        </div>

                        <div class="horas-semana">
                            @forelse ($comunidade->missas->groupBy('dia_semana') as $dia => $missas)
                                <div>
                                    <span>{{ \App\Models\Missa::DIAS[$dia] }}</span>
                                    <b>{{ $missas->pluck('hora')->join(' · ') }}</b>
                                </div>
                            @empty
                                <div><span>Horários de missa a confirmar</span></div>
                            @endforelse
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

@endsection
