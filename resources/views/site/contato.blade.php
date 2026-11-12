@extends('layouts.site')

@section('titulo', 'Contato')
@section('descricao', 'Endereço, telefone, WhatsApp e e-mail do Santuário Diocesano Nossa Senhora Aparecida, em Presidente Prudente (SP).')

@section('conteudo')

    @include('partials.topo', [
        'titulo' => 'Fale conosco',
        'sobretitulo' => 'Contato',
        'texto' => 'Estamos de portas abertas. Procure a secretaria paroquial ou envie sua mensagem.',
        'imagem' => foto('nave_fundo'),
    ])

    <section class="secao">
        <div class="container">
            <div class="contato-cards">
                <a class="contato-card revelar" href="{{ config('santuario.mapa_link') }}" target="_blank" rel="noopener">
                    <span class="contato__icone"><x-icone nome="mapa" /></span>
                    <small>Endereço</small>
                    <strong>{{ config('santuario.endereco') }}</strong>
                    <span>{{ config('santuario.bairro') }} · {{ config('santuario.cidade') }} ({{ config('santuario.uf') }})<br>CEP {{ config('santuario.cep') }}</span>
                </a>

                <a class="contato-card revelar" href="{{ config('santuario.telefone_link') }}" style="--atraso:.06s">
                    <span class="contato__icone"><x-icone nome="telefone" /></span>
                    <small>Telefone</small>
                    <strong>{{ config('santuario.telefone') }}</strong>
                    <span>Secretaria paroquial</span>
                </a>

                <a class="contato-card revelar" href="{{ config('santuario.whatsapp_link') }}" target="_blank" rel="noopener" style="--atraso:.12s">
                    <span class="contato__icone"><x-icone nome="whatsapp" /></span>
                    <small>WhatsApp</small>
                    <strong>{{ config('santuario.whatsapp') }}</strong>
                    <span>Toque para iniciar a conversa</span>
                </a>

                <a class="contato-card revelar" href="mailto:{{ config('santuario.email') }}" style="--atraso:.18s">
                    <span class="contato__icone"><x-icone nome="email" /></span>
                    <small>E-mail</small>
                    <strong style="font-size:.9rem">{!! str_replace('@', '@<wbr>', e(config('santuario.email'))) !!}</strong>
                    <span>Respondemos assim que possível</span>
                </a>
            </div>
        </div>
    </section>

    <section class="secao secao--2">
        <div class="container contato">
            <div class="caixa revelar">
                <p class="sobretitulo">Pedido de oração</p>
                <h2>Reze conosco</h2>
                <p class="texto-2" style="margin-bottom:26px">Escreva sua intenção. Ao enviar, a mensagem será aberta no WhatsApp do Santuário.</p>

                {{-- Este formulário só monta a mensagem e abre o WhatsApp (veja pedidoDeOracao() no santuario.js).
                     TODO (você): criar a tabela "pedidos_oracao", trocar por method="POST" + @csrf
                     e salvar no banco com um PedidoOracaoController. --}}
                <form class="formulario formulario--2" data-whatsapp="{{ config('santuario.whatsapp_link') }}">
                    <div class="campo">
                        <label for="nome">Seu nome</label>
                        <input type="text" id="nome" name="nome" placeholder="Como podemos chamar você?" required>
                    </div>

                    <div class="campo">
                        <label for="assunto">Assunto</label>
                        <select id="assunto" name="assunto">
                            <option>Pedido de oração</option>
                            <option>Intenção de missa</option>
                            <option>Batismo</option>
                            <option>Casamento</option>
                            <option>Outro assunto</option>
                        </select>
                    </div>

                    <div class="campo campo--inteiro">
                        <label for="mensagem">Mensagem</label>
                        <textarea id="mensagem" name="mensagem" placeholder="Escreva aqui sua intenção ou sua dúvida" required></textarea>
                    </div>

                    <div class="campo--inteiro">
                        <button class="btn btn--ouro" type="submit"><x-icone nome="whatsapp" /> Enviar pelo WhatsApp</button>
                    </div>
                </form>
            </div>

            <div class="mapa revelar">
                <iframe src="{{ config('santuario.mapa_embed') }}" title="Mapa: localização do Santuário" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
                <a class="btn btn--ouro btn--pequeno mapa__link" href="{{ config('santuario.mapa_link') }}" target="_blank" rel="noopener"><x-icone nome="mapa" /> Como chegar</a>
            </div>
        </div>
    </section>

    <section class="secao">
        <div class="container container--estreito revelar" style="text-align:center">
            <div class="ornamento"><span></span></div>
            <h2 style="font-size:clamp(1.6rem,3vw,2.3rem);margin-bottom:14px">Siga o Santuário nas redes</h2>
            <p class="texto-2" style="margin-bottom:28px">Avisos, transmissões e momentos da nossa comunidade.</p>
            <div class="hero__acoes" style="justify-content:center;margin-top:0">
                <a class="btn btn--contorno" href="{{ config('santuario.instagram') }}" target="_blank" rel="noopener"><x-icone nome="instagram" /> Instagram</a>
                <a class="btn btn--contorno" href="{{ config('santuario.facebook') }}" target="_blank" rel="noopener"><x-icone nome="facebook" /> Facebook</a>
            </div>
        </div>
    </section>

@endsection
