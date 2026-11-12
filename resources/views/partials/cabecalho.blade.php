@php
    // [texto do link, nome da rota, padrão que deixa o link "ativo"]
    $menu = [
        ['Início', 'home', 'home'],
        ['Missas', 'missas-index', 'missas-*'],
        ['Agenda', 'agenda-index', 'agenda-*'],
        ['Eventos', 'eventos-index', 'eventos-*'],
        ['Notícias', 'noticias-index', 'noticias-*'],
        ['O Santuário', 'santuario', 'santuario'],
        ['Comunidades', 'comunidades-index', 'comunidades-*'],
        ['Contato', 'contato', 'contato'],
    ];
@endphp

<header class="cabecalho">
    <div class="container cabecalho__dentro">
        <a class="marca" href="{{ route('home') }}" aria-label="{{ config('santuario.nome') }} - página inicial">
            @include('partials.simbolo', ['classe' => 'marca__simbolo'])
            <span class="marca__texto">
                <small>Santuário Diocesano</small>
                <strong>Nossa Senhora Aparecida</strong>
            </span>
        </a>

        <nav class="menu" id="menu" aria-label="Menu principal">
            @foreach ($menu as [$texto, $rota, $padrao])
                <a href="{{ route($rota) }}" @class(['ativo' => request()->routeIs($padrao)])>{{ $texto }}</a>
            @endforeach

            {{-- TODO (você): quando criar o login, coloque aqui o link "Entrar"
            <a href="{{ route('login') }}">Entrar</a> --}}
        </nav>

        <div class="cabecalho__acoes">
            <a class="btn btn--ouro btn--pequeno" href="{{ config('santuario.whatsapp_link') }}" target="_blank" rel="noopener">
                <x-icone nome="whatsapp" /> Fale conosco
            </a>

            <button class="botao-menu" type="button" aria-controls="menu" aria-expanded="false">
                <i></i><span>Menu</span>
            </button>
        </div>
    </div>
</header>
