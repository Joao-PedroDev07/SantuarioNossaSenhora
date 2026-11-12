{{-- Card de notícia. Uso: @include('partials.card-noticia', ['noticia' => $noticia]) --}}
<a class="card revelar" href="{{ route('noticias-show', ['slug' => $noticia->slug]) }}">
    <div @class(['card__midia', 'midia-vazia' => ! $noticia->imagem_url])>
        @if ($noticia->imagem_url)
            <img src="{{ $noticia->imagem_url }}" alt="" loading="lazy">
        @endif
        <span class="etiqueta">{{ $noticia->categoria }}</span>
    </div>

    <div class="card__corpo">
        <h3>{{ $noticia->titulo }}</h3>
        <p>{{ $noticia->resumo }}</p>
        <div class="card__meta">
            <time datetime="{{ $noticia->publicado_em->toDateString() }}">{{ $noticia->publicado_em->translatedFormat('j \d\e M \d\e Y') }}</time>
            <i></i>
            <span>{{ $noticia->tempo_leitura }}</span>
        </div>
    </div>
</a>
