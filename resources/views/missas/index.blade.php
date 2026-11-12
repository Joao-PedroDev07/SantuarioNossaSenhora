@extends('layouts.site')

@section('titulo', 'Horários de missas')
@section('descricao', 'Horários de missas do Santuário Diocesano Nossa Senhora Aparecida e das capelas, confissões e atendimento da secretaria.')

@section('conteudo')

    @include('partials.topo', [
        'titulo' => 'Horários de missas',
        'sobretitulo' => 'Santa Missa',
        'texto' => 'Confira os horários do Santuário e das capelas e venha celebrar a Eucaristia conosco.',
        'imagem' => foto('nave'),
    ])

    {{-- Grade da semana, uma aba para cada comunidade --}}
    <section class="secao">
        <div class="container" data-abas>
            <div class="secao__topo">
                <div>
                    <p class="sobretitulo">Semana</p>
                    <h2>Escolha a comunidade</h2>
                </div>

                @if ($proxima)
                    <div class="proxima">
                        <span class="proxima__icone"><x-icone nome="igreja" /></span>
                        <span class="proxima__texto">
                            <small>Próxima missa</small>
                            <strong>{{ ucfirst($proxima['quando']->isToday() ? 'hoje' : ($proxima['quando']->isTomorrow() ? 'amanhã' : $proxima['quando']->translatedFormat('l'))) }}, às {{ $proxima['missa']->hora }}</strong>
                            <span>{{ $proxima['missa']->comunidade->nome }}</span>
                        </span>
                    </div>
                @endif
            </div>

            <div class="abas" role="tablist">
                @foreach ($comunidades as $comunidade)
                    <button type="button" role="tab" @class(['aba', 'ativa' => $loop->first]) data-painel="painel-{{ $comunidade->slug }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        {{ $comunidade->tipo === 'santuario' ? 'Santuário' : $comunidade->nome }}
                    </button>
                @endforeach
            </div>

            @foreach ($comunidades as $comunidade)
                <div @class(['painel', 'ativo' => $loop->first]) id="painel-{{ $comunidade->slug }}" role="tabpanel">
                    <h3 class="painel__titulo">{{ $comunidade->nome }}</h3>

                    @include('partials.grade-missas', ['grade' => $comunidade->missas->groupBy('dia_semana')])

                    <p class="aviso-horario">
                        <x-icone nome="mapa" />
                        {{ $comunidade->nome }} · {{ collect([$comunidade->endereco, $comunidade->bairro, $comunidade->cidade])->filter()->join(' · ') }}
                    </p>
                </div>
            @endforeach

            <p class="aviso-horario"><x-icone nome="info" /> Horários sujeitos a alterações em festas religiosas ou datas especiais.</p>
        </div>
    </section>

    {{-- Confissões, secretaria, adoração... --}}
    @if ($horarios->isNotEmpty())
        @php
            $icones = ['confissoes' => 'cruz', 'secretaria' => 'pessoas', 'adoracao' => 'chama', 'devocao' => 'relogio'];
        @endphp
        <section class="secao secao--2">
            <div class="container">
                <div class="secao__topo revelar">
                    <div>
                        <p class="sobretitulo">Além da missa</p>
                        <h2>Confissões e atendimento</h2>
                    </div>
                </div>

                <div class="atendimentos">
                    @foreach ($horarios as $categoria => $itens)
                        <div class="atendimento revelar" style="--atraso: {{ $loop->index * 0.06 }}s">
                            <div class="atendimento__topo">
                                <span class="atendimento__icone"><x-icone :nome="$icones[$categoria] ?? 'relogio'" /></span>
                                <h3>{{ \App\Models\Horario::CATEGORIAS[$categoria] ?? ucfirst($categoria) }}</h3>
                            </div>
                            <ul>
                                @foreach ($itens as $horario)
                                    <li>
                                        <span>
                                            {{ $horario->dias }}
                                            <small>{{ $horario->titulo }}@if ($horario->observacao) · {{ $horario->observacao }}@endif</small>
                                        </span>
                                        <b>{{ $horario->periodo }}</b>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="secao">
        <div class="container container--estreito revelar" style="text-align:center">
            <div class="ornamento"><span></span></div>
            <h2 style="font-size:clamp(1.6rem,3vw,2.3rem);margin-bottom:14px">Quer marcar uma intenção de missa?</h2>
            <p class="texto-2" style="margin-bottom:28px">Procure a secretaria paroquial ou fale conosco pelo WhatsApp.</p>
            <a class="btn btn--whats" href="{{ config('santuario.whatsapp_link') }}" target="_blank" rel="noopener"><x-icone nome="whatsapp" /> {{ config('santuario.whatsapp') }}</a>
        </div>
    </section>

@endsection
