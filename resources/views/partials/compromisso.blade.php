{{-- Linha da agenda. Uso: @include('partials.compromisso', ['item' => $item]) --}}
<article @class(['compromisso', 'revelar', 'compromisso--hoje' => $item->data->isToday()])>
    <div class="compromisso__data">
        <small>{{ $item->data->isToday() ? 'Hoje' : $item->data->translatedFormat('D') }}</small>
        <b>{{ $item->data->format('d') }}</b>
        <span>{{ $item->data->translatedFormat('M') }}</span>
    </div>

    <div>
        <span class="etiqueta etiqueta--linha">{{ $item->categoria_nome }}</span>
        <h3>{{ $item->titulo }}</h3>
        @if ($item->descricao)
            <p>{{ $item->descricao }}</p>
        @endif
    </div>

    <div class="infos">
        <span><x-icone nome="relogio" /> {{ $item->periodo }}</span>
        @if ($item->local)
            <span><x-icone nome="mapa" /> {{ $item->local }}</span>
        @endif
    </div>
</article>
