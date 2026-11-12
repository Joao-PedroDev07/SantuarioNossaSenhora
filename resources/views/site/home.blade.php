@extends('layouts.site')

@section('titulo', 'Início')

@section('conteudo')

    {{-- ================= CAPA ================= --}}
    <section class="hero">
        <div class="hero__fotos" aria-hidden="true">
            <div class="hero__foto ativa" style="background-image: url('{{ foto('nave') }}')"></div>
            <div class="hero__foto" style="background-image: url('{{ foto('fachada') }}')"></div>
            <div class="hero__foto" style="background-image: url('{{ foto('imagem') }}')"></div>
        </div>
        <div class="hero__veu"></div>
        <div class="hero__brilho"></div>

        <div class="container">
            <div class="hero__conteudo">
                <p class="sobretitulo">{{ config('santuario.diocese') }} · Desde 1940</p>

                <h1>Santuário Diocesano <span>Nossa Senhora Aparecida</span></h1>

                <p class="hero__frase">
                    A casa da Mãe Aparecida em Presidente Prudente. Venha rezar, celebrar
                    e caminhar conosco: aqui todos são acolhidos como filhos.
                </p>

                <div class="hero__acoes">
                    <a class="btn btn--ouro" href="{{ route('missas-index') }}">
                        <x-icone nome="relogio" /> Horários de missas
                    </a>
                    <a class="btn btn--contorno" href="{{ route('santuario') }}">
                        Conheça o Santuário <x-icone nome="seta" />
                    </a>
                </div>

                <div class="hero__rodape">
                    @if ($proxima)
                        @php
                            $quando = $proxima['quando'];
                            $dia = $quando->isToday() ? 'Hoje' : ($quando->isTomorrow() ? 'Amanhã' : ucfirst($quando->translatedFormat('l')));
                        @endphp
                        <a class="proxima" href="{{ route('missas-index') }}">
                            <span class="proxima__icone"><x-icone nome="igreja" /></span>
                            <span class="proxima__texto">
                                <small>Próxima missa</small>
                                <strong>{{ $dia }}, às {{ $proxima['missa']->hora }}</strong>
                                <span>{{ $proxima['missa']->comunidade->tipo === 'santuario' ? 'No Santuário' : $proxima['missa']->comunidade->nome }} · <span data-contagem="{{ $quando->toIso8601String() }}" style="display:inline"></span></span>
                            </span>
                        </a>
                    @endif

                    <div class="redes">
                        <a href="{{ config('santuario.whatsapp_link') }}" target="_blank" rel="noopener" aria-label="WhatsApp"><x-icone nome="whatsapp" /></a>
                        <a href="{{ config('santuario.instagram') }}" target="_blank" rel="noopener" aria-label="Instagram"><x-icone nome="instagram" /></a>
                        <a href="{{ config('santuario.facebook') }}" target="_blank" rel="noopener" aria-label="Facebook"><x-icone nome="facebook" /></a>
                        <span class="redes__texto">Acompanhe<br>o Santuário</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= MISSAS DE HOJE ================= --}}
    <section class="hoje" aria-label="Missas de hoje">
        <div class="container hoje__dentro">
            <div class="hoje__titulo">
                <span class="hoje__ponto"></span>
                <div>
                    <small>Missas de hoje</small>
                    <strong>{{ ucfirst(now()->translatedFormat('l, j \d\e F')) }}</strong>
                </div>
            </div>

            <div class="hoje__lista">
                @forelse ($missasHoje as $missa)
                    <span class="hoje__missa" data-hora="{{ substr($missa->horario, 0, 5) }}">
                        <b>{{ $missa->hora }}</b> {{ $missa->comunidade->tipo === 'santuario' ? 'Santuário' : $missa->comunidade->nome }}
                    </span>
                @empty
                    <span class="hoje__missa">Hoje não há missa nas comunidades</span>
                @endforelse
            </div>

            <a class="link-seta" href="{{ route('missas-index') }}">Semana completa <x-icone nome="seta" /></a>
        </div>
    </section>

    {{-- ================= HORÁRIOS NO SANTUÁRIO ================= --}}
    <section class="secao">
        <div class="container">
            <div class="secao__topo revelar">
                <div>
                    <p class="sobretitulo">Santa Missa</p>
                    <h2>Missas no Santuário</h2>
                </div>
                <a class="link-seta" href="{{ route('missas-index') }}">Capelas, confissões e atendimento <x-icone nome="seta" /></a>
            </div>

            <div class="revelar">
                @include('partials.grade-missas', ['grade' => $gradeSantuario])
            </div>

            <p class="aviso-horario revelar"><x-icone nome="info" /> Horários sujeitos a alterações em festas religiosas ou datas especiais.</p>
        </div>
    </section>

    {{-- ================= EVENTOS ================= --}}
    @if ($eventos->isNotEmpty())
        @php $principal = $eventos->first(); @endphp
        <section class="secao secao--2">
            <div class="container">
                <div class="secao__topo revelar">
                    <div>
                        <p class="sobretitulo">Celebre conosco</p>
                        <h2>Próximos eventos</h2>
                    </div>
                    <a class="link-seta" href="{{ route('eventos-index') }}">Ver todos os eventos <x-icone nome="seta" /></a>
                </div>

                <div class="eventos-vitrine">
                    <a class="evento-grande revelar" href="{{ route('eventos-show', ['slug' => $principal->slug]) }}">
                        @if ($principal->imagem_url)
                            <img src="{{ $principal->imagem_url }}" alt="" loading="lazy">
                        @endif
                        <div class="data-bloco">
                            <b>{{ $principal->data_inicio->format('d') }}</b>
                            <span>{{ $principal->data_inicio->translatedFormat('M') }}</span>
                        </div>
                        <div>
                            <span class="etiqueta">Próximo evento</span>
                            <h3>{{ $principal->titulo }}</h3>
                            <p>{{ $principal->resumo }}</p>
                            <div class="infos">
                                <span><x-icone nome="calendario" /> {{ $principal->quando }}</span>
                                @if ($principal->local)
                                    <span><x-icone nome="mapa" /> {{ $principal->local }}</span>
                                @endif
                            </div>
                        </div>
                    </a>

                    <div class="eventos-lista">
                        @foreach ($eventos->skip(1) as $evento)
                            <a class="evento-linha revelar" href="{{ route('eventos-show', ['slug' => $evento->slug]) }}" style="--atraso: {{ $loop->index * 0.08 }}s">
                                <div @class(['evento-linha__midia', 'midia-vazia' => ! $evento->imagem_url])>
                                    @if ($evento->imagem_url)
                                        <img src="{{ $evento->imagem_url }}" alt="" loading="lazy">
                                    @endif
                                </div>
                                <div>
                                    <small>{{ $evento->data_inicio->translatedFormat('j \d\e F') }}</small>
                                    <h3>{{ $evento->titulo }}</h3>
                                    <div class="infos">
                                        <span><x-icone nome="relogio" /> {{ hora_curta($evento->data_inicio->format('H:i')) }}</span>
                                        @if ($evento->local)
                                            <span><x-icone nome="mapa" /> {{ $evento->local }}</span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- ================= NOTÍCIAS ================= --}}
    @if ($noticias->isNotEmpty())
        <section class="secao">
            <div class="container">
                <div class="secao__topo revelar">
                    <div>
                        <p class="sobretitulo">Vida da comunidade</p>
                        <h2>Notícias</h2>
                    </div>
                    <a class="link-seta" href="{{ route('noticias-index') }}">Ver todas as notícias <x-icone nome="seta" /></a>
                </div>

                <div class="cards">
                    @foreach ($noticias as $noticia)
                        @include('partials.card-noticia', ['noticia' => $noticia])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ================= CITAÇÃO ================= --}}
    <section class="citacao">
        <div class="citacao__fundo" style="background-image: url('{{ foto('imagem') }}')"></div>
        <div class="container revelar">
            <div class="ornamento"><span></span></div>
            <blockquote>
                “Fazei tudo o que Ele vos disser.”
                <cite>Evangelho de São João 2,5</cite>
            </blockquote>
        </div>
    </section>

    {{-- ================= O SANTUÁRIO ================= --}}
    <section class="secao">
        <div class="container sobre">
            <div class="sobre__fotos revelar">
                <div class="sobre__foto sobre__foto--1"><img src="{{ foto('fachada') }}" alt="Fachada do Santuário, com suas duas torres" loading="lazy"></div>
                <div class="sobre__foto sobre__foto--2"><img src="{{ foto('sacrario') }}" alt="Sacrário do Santuário" loading="lazy"></div>
                <div class="sobre__selo"><span><small>Desde</small><b>1940</b></span></div>
            </div>

            <div class="revelar">
                <p class="sobretitulo">O Santuário</p>
                <h2>Uma casa de oração <span class="destaque-serifa">no coração da Vila Marcondes</span></h2>
                <p>
                    Criada em 28 de agosto de 1940, a paróquia Nossa Senhora Aparecida é hoje Santuário Diocesano:
                    lugar de peregrinação, de reconciliação e de encontro com Deus pelas mãos de Maria.
                </p>

                <div class="numeros">
                    <div><b>{{ now()->year - 1940 }}</b><span>anos de história</span></div>
                    <div><b>{{ $comunidades->count() }}</b><span>comunidades</span></div>
                    <div><b>{{ $totalMissas }}</b><span>missas por semana</span></div>
                </div>

                <a class="btn btn--contorno" href="{{ route('santuario') }}">Nossa história <x-icone nome="seta" /></a>
            </div>
        </div>
    </section>

    {{-- ================= AGENDA + COMUNIDADES ================= --}}
    <section class="secao secao--2">
        <div class="container">
            <div class="secao__topo revelar">
                <div>
                    <p class="sobretitulo">Participe</p>
                    <h2>Agenda paroquial</h2>
                </div>
                <a class="link-seta" href="{{ route('agenda-index') }}">Agenda completa <x-icone nome="seta" /></a>
            </div>

            <div class="compromissos">
                @forelse ($agenda as $item)
                    @include('partials.compromisso', ['item' => $item])
                @empty
                    <div class="vazio"><h3>Nenhum compromisso por enquanto</h3>Volte em breve para conferir a agenda.</div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="secao">
        <div class="container">
            <div class="secao__topo revelar">
                <div>
                    <p class="sobretitulo">Uma só família</p>
                    <h2>Nossas comunidades</h2>
                </div>
                <a class="link-seta" href="{{ route('comunidades-index') }}">Conheça as comunidades <x-icone nome="seta" /></a>
            </div>

            <div class="comunidades">
                @foreach ($comunidades as $comunidade)
                    <a href="{{ route('comunidades-index') }}#{{ $comunidade->slug }}" @class(['comunidade', 'revelar', 'comunidade--foto' => $comunidade->imagem_url]) style="--atraso: {{ $loop->index * 0.08 }}s">
                        @if ($comunidade->imagem_url)
                            <img src="{{ $comunidade->imagem_url }}" alt="" loading="lazy">
                        @else
                            @include('partials.simbolo', ['classe' => 'comunidade__simbolo'])
                        @endif

                        <small>{{ $comunidade->tipo === 'santuario' ? 'Igreja matriz' : 'Capela' }}</small>
                        <h3>{{ $comunidade->nome }}</h3>
                        <p>{{ $comunidade->bairro }}</p>
                        <div class="comunidade__missas">
                            <span><b>{{ $comunidade->missas_count }}</b> {{ $comunidade->missas_count === 1 ? 'missa semanal' : 'missas por semana' }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= CONTATO ================= --}}
    <section class="secao secao--preta">
        <div class="container contato">
            <div class="revelar">
                <p class="sobretitulo">Venha nos visitar</p>
                <h2>Estamos de portas abertas</h2>
                <p class="texto-2">A secretaria paroquial atende para marcação de batizados, casamentos, intenções de missa e informações.</p>

                <ul class="contato__lista">
                    <li>
                        <span class="contato__icone"><x-icone nome="mapa" /></span>
                        <div><small>Endereço</small><span>{{ config('santuario.endereco') }}, {{ config('santuario.bairro') }}<br>{{ config('santuario.cidade') }} ({{ config('santuario.uf') }}) · CEP {{ config('santuario.cep') }}</span></div>
                    </li>
                    <li>
                        <span class="contato__icone"><x-icone nome="telefone" /></span>
                        <div><small>Telefone</small><a href="{{ config('santuario.telefone_link') }}">{{ config('santuario.telefone') }}</a></div>
                    </li>
                    <li>
                        <span class="contato__icone"><x-icone nome="email" /></span>
                        <div><small>E-mail</small><a href="mailto:{{ config('santuario.email') }}">{!! str_replace('@', '@<wbr>', e(config('santuario.email'))) !!}</a></div>
                    </li>
                </ul>

                <div class="hero__acoes" style="margin-top:0">
                    <a class="btn btn--whats" href="{{ config('santuario.whatsapp_link') }}" target="_blank" rel="noopener"><x-icone nome="whatsapp" /> {{ config('santuario.whatsapp') }}</a>
                    <a class="btn btn--contorno" href="{{ route('contato') }}">Mais contatos</a>
                </div>
            </div>

            <div class="mapa revelar">
                <iframe src="{{ config('santuario.mapa_embed') }}" title="Mapa: localização do Santuário" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
                <a class="btn btn--ouro btn--pequeno mapa__link" href="{{ config('santuario.mapa_link') }}" target="_blank" rel="noopener"><x-icone nome="mapa" /> Como chegar</a>
            </div>
        </div>
    </section>

@endsection
