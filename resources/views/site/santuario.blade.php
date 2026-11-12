@extends('layouts.site')

@section('titulo', 'O Santuário')
@section('descricao', 'Conheça a história do Santuário Diocesano Nossa Senhora Aparecida, em Presidente Prudente, seus padres e a devoção à Padroeira do Brasil.')

@section('conteudo')

    @include('partials.topo', [
        'titulo' => 'O Santuário',
        'sobretitulo' => 'Desde 1940',
        'texto' => 'Lugar de oração, de reconciliação e de encontro com Deus pelas mãos de Maria.',
        'imagem' => foto('fachada'),
    ])

    {{-- História --}}
    <section class="secao">
        <div class="container sobre">
            <div class="sobre__fotos revelar">
                <div class="sobre__foto sobre__foto--1"><img src="{{ foto('nave') }}" alt="Interior do Santuário, com a nave e o altar ao fundo" loading="lazy"></div>
                <div class="sobre__foto sobre__foto--2"><img src="{{ foto('imagem') }}" alt="Imagem de Nossa Senhora Aparecida no altar" loading="lazy"></div>
                <div class="sobre__selo"><span><small>Desde</small><b>1940</b></span></div>
            </div>

            <div class="revelar">
                <p class="sobretitulo">Nossa história</p>
                <h2>A casa da Mãe Aparecida <span class="destaque-serifa">em Presidente Prudente</span></h2>

                {{-- TODO (você): este texto é um resumo com o que consta no site da Diocese.
                     Complete com a história verdadeira da paróquia (construção da igreja,
                     elevação a Santuário, padres que passaram por aqui...). --}}
                <div class="prosa">
                    <p>
                        A paróquia Nossa Senhora Aparecida foi criada em <strong>28 de agosto de 1940</strong>,
                        na Vila Marcondes, um dos bairros mais antigos de Presidente Prudente.
                        Desde então, gerações de famílias foram batizadas, se casaram e cresceram
                        na fé à sombra das duas torres da igreja.
                    </p>
                    <p>
                        Hoje <strong>Santuário Diocesano</strong>, a igreja é lugar de peregrinação para os
                        devotos da Padroeira do Brasil e reúne, além da matriz, três capelas em outros bairros da cidade.
                    </p>
                </div>

                <div class="numeros">
                    <div><b>{{ now()->year - 1940 }}</b><span>anos de história</span></div>
                    <div><b>{{ $comunidades->count() }}</b><span>comunidades</span></div>
                    <div><b>{{ $totalMissas }}</b><span>missas por semana</span></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Devoção --}}
    <section class="citacao">
        <div class="citacao__fundo" style="background-image: url('{{ foto('imagem') }}')"></div>
        <div class="container revelar">
            <div class="ornamento"><span></span></div>
            <blockquote>
                “A minha alma engrandece o Senhor.”
                <cite>Evangelho de São Lucas 1,46</cite>
            </blockquote>
        </div>
    </section>

    <section class="secao">
        <div class="container duas-colunas">
            <div class="revelar">
                <p class="sobretitulo">A Padroeira</p>
                <h2 style="font-size:clamp(1.8rem,3.4vw,2.7rem);margin-bottom:24px">Nossa Senhora da Conceição Aparecida</h2>
                <div class="prosa">
                    <p>
                        Em outubro de 1717, três pescadores — Domingos Garcia, João Alves e Filipe Pedroso —
                        lançavam suas redes no rio Paraíba do Sul quando retiraram das águas uma pequena imagem
                        de Nossa Senhora da Conceição: primeiro o corpo, depois a cabeça. Em seguida, a pesca,
                        até então sem resultado, foi abundante.
                    </p>
                    <p>
                        A devoção à imagem “aparecida” cresceu de casa em casa e se espalhou por todo o país.
                        Em 1930, o Papa Pio XI proclamou Nossa Senhora Aparecida <strong>Rainha e Padroeira do Brasil</strong>.
                        Sua festa é celebrada em <strong>12 de outubro</strong>.
                    </p>
                </div>
            </div>

            <div class="caixa revelar">
                <p class="sobretitulo">Carisma</p>
                <h2>Padres palotinos</h2>
                <p class="texto-2">
                    Os padres que servem o Santuário pertencem à Sociedade do Apostolado Católico (SAC),
                    fundada em Roma por São Vicente Pallotti, em 1835. O carisma palotino convida todos os
                    batizados a serem apóstolos, reavivando a fé e reacendendo a caridade.
                </p>
                <a class="link-seta" href="{{ route('comunidades-index') }}">Conheça nossas comunidades <x-icone nome="seta" /></a>
            </div>
        </div>
    </section>

    {{-- Padres --}}
    @if ($padres->isNotEmpty())
        <section class="secao secao--2">
            <div class="container">
                <div class="secao__topo revelar">
                    <div>
                        <p class="sobretitulo">A serviço do povo de Deus</p>
                        <h2>Nossos padres</h2>
                    </div>
                </div>

                <div class="padres">
                    @foreach ($padres as $padre)
                        <div class="padre revelar" style="--atraso: {{ $loop->index * 0.08 }}s">
                            <div class="padre__foto">
                                @if ($padre->foto_url)
                                    <img src="{{ $padre->foto_url }}" alt="{{ $padre->nome }}">
                                @else
                                    {{ $padre->iniciais }}
                                @endif
                            </div>
                            <div>
                                @if ($padre->funcao)
                                    <span>{{ $padre->funcao }}</span>
                                @endif
                                <h3>{{ $padre->nome }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Galeria --}}
    <section class="secao">
        <div class="container">
            <div class="secao__topo revelar">
                <div>
                    <p class="sobretitulo">Galeria</p>
                    <h2>Conheça o Santuário por dentro</h2>
                </div>
            </div>

            @php
                $galeria = [
                    'nave' => 'Nave central e altar-mor',
                    'fachada' => 'Fachada e torres do Santuário',
                    'imagem' => 'Imagem de Nossa Senhora Aparecida',
                    'sacrario' => 'Sacrário',
                    'nave_fundo' => 'Vista do altar para a entrada',
                ];
            @endphp

            <div class="galeria revelar">
                @foreach ($galeria as $nome => $legenda)
                    <button type="button" aria-label="Ampliar foto: {{ $legenda }}">
                        <img src="{{ foto($nome) }}" alt="{{ $legenda }}" loading="lazy">
                        <span>{{ $legenda }}</span>
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Janela que abre a foto grande --}}
    <dialog class="visor">
        <button type="button" aria-label="Fechar"><x-icone nome="fechar" /></button>
        <img src="" alt="">
        <p></p>
    </dialog>

@endsection
