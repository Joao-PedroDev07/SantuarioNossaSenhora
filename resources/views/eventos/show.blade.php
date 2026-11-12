@extends('layouts.site')

@section('titulo', $evento->titulo)
@section('descricao', $evento->resumo)
@section('imagem', $evento->imagem_url ?? foto('fachada'))

@section('conteudo')

    @include('partials.topo', [
        'titulo' => $evento->titulo,
        'sobretitulo' => 'Evento',
        'texto' => $evento->resumo,
        'imagem' => $evento->imagem_url ?? foto('nave'),
        'migalhas' => ['Eventos' => route('eventos-index')],
    ])

    <section class="secao">
        <div class="container duas-colunas">
            <article>
                @if ($evento->imagem_url)
                    <figure class="artigo__capa">
                        <img src="{{ $evento->imagem_url }}" alt="">
                    </figure>
                @endif

                {{-- O texto é simples: cada linha em branco vira um parágrafo --}}
                <div class="prosa">
                    @foreach (preg_split('/\R{2,}/', trim($evento->descricao ?? '')) as $paragrafo)
                        @if (trim($paragrafo) !== '')
                            <p>{!! nl2br(e($paragrafo)) !!}</p>
                        @endif
                    @endforeach
                </div>

                <div class="artigo__rodape">
                    <a class="link-seta" href="{{ route('eventos-index') }}"><x-icone nome="seta-esquerda" /> Todos os eventos</a>
                    <button class="btn btn--contorno btn--pequeno" type="button" data-compartilhar><x-icone nome="compartilhar" /> <span>Compartilhar</span></button>
                </div>
            </article>

            <aside class="ficha revelar">
                <h3>Informações</h3>
                <ul>
                    <li>
                        <x-icone nome="calendario" />
                        <div><small>Quando</small>{{ $evento->quando }}</div>
                    </li>
                    @if ($evento->local)
                        <li>
                            <x-icone nome="mapa" />
                            <div><small>Onde</small>{{ $evento->local }}</div>
                        </li>
                    @endif
                    <li>
                        <x-icone nome="telefone" />
                        <div><small>Dúvidas</small>{{ config('santuario.telefone') }}</div>
                    </li>
                </ul>
                <a class="btn btn--whats" href="{{ config('santuario.whatsapp_link') }}" target="_blank" rel="noopener"><x-icone nome="whatsapp" /> Falar com a secretaria</a>
            </aside>
        </div>
    </section>

    @if ($outros->isNotEmpty())
        <section class="secao secao--2">
            <div class="container">
                <div class="secao__topo revelar">
                    <h2>Outros eventos</h2>
                    <a class="link-seta" href="{{ route('eventos-index') }}">Ver todos <x-icone nome="seta" /></a>
                </div>

                <div class="cards">
                    @foreach ($outros as $outro)
                        @include('partials.card-evento', ['evento' => $outro])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
