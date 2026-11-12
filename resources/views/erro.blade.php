@extends('layouts.site')

@section('titulo', 'Página não encontrada')

@section('conteudo')

    <section class="erro">
        <div class="container container--estreito">
            <b>404</b>
            <h1>Página não encontrada</h1>
            <p>O endereço que você procura não existe ou mudou de lugar.</p>
            <div class="hero__acoes" style="justify-content:center;margin-top:0">
                <a class="btn btn--ouro" href="{{ route('home') }}">Voltar ao início</a>
                <a class="btn btn--contorno" href="{{ route('missas-index') }}">Horários de missas</a>
            </div>
        </div>
    </section>

@endsection
