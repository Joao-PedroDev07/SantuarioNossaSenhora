{{-- Card de evento. Uso: @include('partials.card-evento', ['evento' => $evento]) --}}
<a class="card revelar" href="{{ route('eventos-show', ['slug' => $evento->slug]) }}">
    <div @class(['card__midia', 'midia-vazia' => ! $evento->imagem_url])>
        @if ($evento->imagem_url)
            <img src="{{ $evento->imagem_url }}" alt="" loading="lazy">
        @endif

        <div class="data-bloco">
            <b>{{ $evento->data_inicio->format('d') }}</b>
            <span>{{ $evento->data_inicio->translatedFormat('M') }}</span>
        </div>
    </div>

    <div class="card__corpo">
        <h3>{{ $evento->titulo }}</h3>
        <p>{{ $evento->resumo }}</p>
        <div class="card__meta">
            <span>{{ $evento->quando }}</span>
            @if ($evento->local)
                <i></i><span>{{ $evento->local }}</span>
            @endif
        </div>
    </div>
</a>
