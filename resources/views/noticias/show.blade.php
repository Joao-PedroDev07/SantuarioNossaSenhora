@extends('layouts.site')

@section('titulo', $noticia->titulo)
@section('descricao', $noticia->resumo)
@section('imagem', $noticia->imagem_url ?? foto('fachada'))

@section('conteudo')

    @include('partials.topo', [
        'titulo' => $noticia->titulo,
        'sobretitulo' => $noticia->categoria,
        'texto' => $noticia->resumo,
        'imagem' => $noticia->imagem_url ?? foto('nave'),
        'migalhas' => ['Notícias' => route('noticias-index')],
    ])

    <section class="secao">
        <article class="container container--estreito">
            <div class="infos" style="margin-bottom:28px">
                <span><x-icone nome="calendario" /> {{ $noticia->publicado_em->translatedFormat('j \d\e F \d\e Y') }}</span>
                <span><x-icone nome="relogio" /> {{ $noticia->tempo_leitura }}</span>
                @if ($noticia->autor)
                    <span><x-icone nome="pessoas" /> {{ $noticia->autor }}</span>
                @endif
            </div>

            @if ($noticia->imagem_url)
                <figure class="artigo__capa">
                    <img src="{{ $noticia->imagem_url }}" alt="">
                </figure>
            @endif

            {{-- O texto é simples: cada linha em branco vira um parágrafo --}}
            <div class="prosa">
                @foreach (preg_split('/\R{2,}/', trim($noticia->conteudo)) as $paragrafo)
                    @if (trim($paragrafo) !== '')
                        <p>{!! nl2br(e($paragrafo)) !!}</p>
                    @endif
                @endforeach
            </div>

            <div class="artigo__rodape">
                <a class="link-seta" href="{{ route('noticias-index') }}"><x-icone nome="seta-esquerda" /> Todas as notícias</a>
                <button class="btn btn--contorno btn--pequeno" type="button" data-compartilhar><x-icone nome="compartilhar" /> <span>Compartilhar</span></button>
            </div>
        </article>
    </section>

    @if ($outras->isNotEmpty())
        <section class="secao secao--2">
            <div class="container">
                <div class="secao__topo revelar">
                    <h2>Leia também</h2>
                    <a class="link-seta" href="{{ route('noticias-index') }}">Ver todas <x-icone nome="seta" /></a>
                </div>

                <div class="cards">
                    @foreach ($outras as $outra)
                        @include('partials.card-noticia', ['noticia' => $outra])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
