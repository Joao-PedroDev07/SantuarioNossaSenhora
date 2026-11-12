{{-- Layout principal do site.
     Toda página começa com:  @extends('layouts.site')
     e coloca o conteúdo em:  @section('conteudo') ... @endsection --}}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo', 'Início') · {{ config('santuario.nome_curto') }}</title>
    <meta name="description" content="@yield('descricao', 'Santuário Diocesano Nossa Senhora Aparecida, em Presidente Prudente (SP). Horários de missas, agenda, eventos e notícias.')">
    <meta name="theme-color" content="#060607">

    {{-- Como o link aparece quando é compartilhado no WhatsApp/Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('santuario.nome') }}">
    <meta property="og:title" content="@yield('titulo', 'Início') · {{ config('santuario.nome_curto') }}">
    <meta property="og:description" content="@yield('descricao', 'Horários de missas, agenda, eventos e notícias do Santuário.')">
    <meta property="og:image" content="@yield('imagem', foto('fachada'))">

    <link rel="icon" type="image/svg+xml" href="{{ asset('img/simbolo.svg') }}">

    {{-- Fontes --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500;1,600&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- O "?v=" faz o navegador baixar o arquivo de novo sempre que ele for alterado --}}
    <link rel="stylesheet" href="{{ asset('css/santuario.css') }}?v={{ filemtime(public_path('css/santuario.css')) }}">
</head>
<body>
    <a class="pular" href="#conteudo">Pular para o conteúdo</a>

    @include('partials.cabecalho')

    <main id="conteudo">
        @yield('conteudo')
    </main>

    @include('partials.rodape')

    <script src="{{ asset('js/santuario.js') }}?v={{ filemtime(public_path('js/santuario.js')) }}" defer></script>
</body>
</html>
