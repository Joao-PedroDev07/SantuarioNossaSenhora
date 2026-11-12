{{-- Topo das páginas internas.
     Uso:
     @include('partials.topo', [
         'titulo' => 'Agenda paroquial',
         'sobretitulo' => 'Vida em comunidade',   (opcional)
         'texto' => 'Uma frase de apoio',         (opcional)
         'imagem' => foto('nave'),                (opcional)
         'migalhas' => ['Eventos' => route('eventos-index')],  (opcional)
     ]) --}}
<section class="topo">
    <div class="topo__foto" style="background-image: url('{{ $imagem ?? foto('nave') }}')"></div>

    <div class="container">
        <nav class="migalhas" aria-label="Você está em">
            <a href="{{ route('home') }}">Início</a>
            @foreach ($migalhas ?? [] as $nome => $link)
                <i></i><a href="{{ $link }}">{{ $nome }}</a>
            @endforeach
            <i></i><span>{{ \Illuminate\Support\Str::limit($titulo, 40) }}</span>
        </nav>

        @isset($sobretitulo)
            <p class="sobretitulo">{{ $sobretitulo }}</p>
        @endisset

        <h1>{{ $titulo }}</h1>

        @isset($texto)
            <p>{{ $texto }}</p>
        @endisset
    </div>
</section>
