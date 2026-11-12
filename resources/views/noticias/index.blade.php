@extends('layouts.site')

@section('titulo', 'Notícias')
@section('descricao', 'Notícias e avisos do Santuário Diocesano Nossa Senhora Aparecida e de suas comunidades.')

@section('conteudo')

    @include('partials.topo', [
        'titulo' => 'Notícias',
        'sobretitulo' => 'Vida da comunidade',
        'texto' => 'Avisos, formações e tudo o que acontece no Santuário e nas capelas.',
        'imagem' => foto('fachada'),
    ])

    <section class="secao">
        <div class="container">
            @if ($noticias->isNotEmpty())
                <div class="cards">
                    @foreach ($noticias as $noticia)
                        @include('partials.card-noticia', ['noticia' => $noticia])
                    @endforeach
                </div>

                {{-- Paginação simples: anterior / próxima --}}
                @if ($noticias->hasPages())
                    <nav class="paginacao" aria-label="Páginas">
                        <a @class(['btn', 'btn--contorno', 'btn--pequeno', 'desligado' => $noticias->onFirstPage()]) href="{{ $noticias->previousPageUrl() }}"><x-icone nome="seta-esquerda" /> Anteriores</a>
                        <span>Página {{ $noticias->currentPage() }} de {{ $noticias->lastPage() }}</span>
                        <a @class(['btn', 'btn--contorno', 'btn--pequeno', 'desligado' => ! $noticias->hasMorePages()]) href="{{ $noticias->nextPageUrl() }}">Próximas <x-icone nome="seta" /></a>
                    </nav>
                @endif
            @else
                <div class="vazio">
                    <h3>Nenhuma notícia publicada</h3>
                    Em breve teremos novidades por aqui.
                </div>
            @endif
        </div>
    </section>

@endsection
