<footer class="rodape">
    <div class="container">
        <div class="rodape__grade">
            <div>
                <a class="marca" href="{{ route('home') }}">
                    @include('partials.simbolo', ['classe' => 'marca__simbolo'])
                    <span class="marca__texto">
                        <small>Santuário Diocesano</small>
                        <strong>Nossa Senhora Aparecida</strong>
                    </span>
                </a>
                <p>Casa da Mãe Aparecida em Presidente Prudente desde {{ \Illuminate\Support\Carbon::parse(config('santuario.fundacao'))->year }}. {{ config('santuario.diocese') }}.</p>

                <div class="redes">
                    <a href="{{ config('santuario.whatsapp_link') }}" target="_blank" rel="noopener" aria-label="WhatsApp"><x-icone nome="whatsapp" /></a>
                    <a href="{{ config('santuario.instagram') }}" target="_blank" rel="noopener" aria-label="Instagram"><x-icone nome="instagram" /></a>
                    <a href="{{ config('santuario.facebook') }}" target="_blank" rel="noopener" aria-label="Facebook"><x-icone nome="facebook" /></a>
                </div>
            </div>

            <div>
                <h4>Navegue</h4>
                <ul>
                    <li><a href="{{ route('missas-index') }}">Horários de missas</a></li>
                    <li><a href="{{ route('agenda-index') }}">Agenda paroquial</a></li>
                    <li><a href="{{ route('eventos-index') }}">Eventos</a></li>
                    <li><a href="{{ route('noticias-index') }}">Notícias</a></li>
                    <li><a href="{{ route('santuario') }}">O Santuário</a></li>
                    <li><a href="{{ route('comunidades-index') }}">Comunidades</a></li>
                </ul>
            </div>

            <div>
                <h4>Missas no Santuário</h4>
                {{-- $missasRodape vem do AppServiceProvider (funciona em todas as páginas) --}}
                <ul class="rodape__horas">
                    @foreach ($missasRodape as $dia => $missas)
                        <li><span>{{ \App\Models\Missa::DIAS[$dia] }}</span> <b>{{ $missas->pluck('hora')->join(' · ') }}</b></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4>Contato</h4>
                <ul>
                    <li>{{ config('santuario.endereco') }}<br>{{ config('santuario.bairro') }} · {{ config('santuario.cidade') }} ({{ config('santuario.uf') }})<br>CEP {{ config('santuario.cep') }}</li>
                    <li><a href="{{ config('santuario.telefone_link') }}">{{ config('santuario.telefone') }}</a></li>
                    <li><a href="{{ config('santuario.whatsapp_link') }}" target="_blank" rel="noopener">{{ config('santuario.whatsapp') }} (WhatsApp)</a></li>
                    <li><a href="mailto:{{ config('santuario.email') }}" style="overflow-wrap:anywhere">{!! str_replace('@', '@<wbr>', e(config('santuario.email'))) !!}</a></li>
                </ul>
            </div>
        </div>

        <div class="rodape__base">
            <span>© {{ date('Y') }} {{ config('santuario.nome') }}. Todos os direitos reservados.</span>
            <em>Ó Maria concebida sem pecado, rogai por nós.</em>
        </div>
    </div>
</footer>

{{-- Botão flutuante do WhatsApp --}}
<a class="flutuante" href="{{ config('santuario.whatsapp_link') }}" target="_blank" rel="noopener" aria-label="Conversar pelo WhatsApp">
    <x-icone nome="whatsapp" />
</a>
