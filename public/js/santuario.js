/* ==========================================================================
   Santuário Diocesano Nossa Senhora Aparecida - comportamentos do site
   (JavaScript puro, sem bibliotecas)
   ========================================================================== */

document.documentElement.classList.add('js');

document.addEventListener('DOMContentLoaded', function () {
    cabecalho();
    menuCelular();
    fotosDoHero();
    revelarAoRolar();
    contagemProximaMissa();
    missasQueJaPassaram();
    abas();
    galeria();
    imagensQuebradas();
    paralaxe();
    pedidoDeOracao();
    compartilhar();
});

/* Cabeçalho ganha fundo quando a página rola */
function cabecalho() {
    var topo = document.querySelector('.cabecalho');
    if (!topo) return;

    function conferir() {
        topo.classList.toggle('rolou', window.scrollY > 30);
    }

    conferir();
    window.addEventListener('scroll', conferir, { passive: true });
}

/* Botão "Menu" no celular */
function menuCelular() {
    var botao = document.querySelector('.botao-menu');
    if (!botao) return;

    function fechar() {
        document.body.classList.remove('menu-aberto');
        botao.setAttribute('aria-expanded', 'false');
    }

    botao.addEventListener('click', function () {
        var aberto = document.body.classList.toggle('menu-aberto');
        botao.setAttribute('aria-expanded', aberto ? 'true' : 'false');
    });

    document.querySelectorAll('.menu a').forEach(function (link) {
        link.addEventListener('click', fechar);
    });

    document.addEventListener('keydown', function (evento) {
        if (evento.key === 'Escape') fechar();
    });
}

/* Troca as fotos da capa a cada 7 segundos */
function fotosDoHero() {
    var fotos = document.querySelectorAll('.hero__foto');
    if (fotos.length < 2) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    var atual = 0;

    setInterval(function () {
        fotos[atual].classList.remove('ativa');
        atual = (atual + 1) % fotos.length;
        fotos[atual].classList.add('ativa');
    }, 7000);
}

/* Elementos com a classe .revelar aparecem suavemente ao entrar na tela */
function revelarAoRolar() {
    var itens = document.querySelectorAll('.revelar');

    if (!('IntersectionObserver' in window)) {
        itens.forEach(function (item) { item.classList.add('visivel'); });
        return;
    }

    var observador = new IntersectionObserver(function (entradas) {
        entradas.forEach(function (entrada) {
            if (entrada.isIntersecting) {
                entrada.target.classList.add('visivel');
                observador.unobserve(entrada.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    itens.forEach(function (item) { observador.observe(item); });
}

/* "Começa em 2h 15min" no cartão da próxima missa */
function contagemProximaMissa() {
    var alvo = document.querySelector('[data-contagem]');
    if (!alvo) return;

    var quando = new Date(alvo.dataset.contagem).getTime();

    function atualizar() {
        var minutos = Math.round((quando - Date.now()) / 60000);

        if (minutos <= 0) {
            alvo.textContent = 'Começando agora';
        } else if (minutos < 60) {
            alvo.textContent = 'Começa em ' + minutos + ' min';
        } else if (minutos < 60 * 24) {
            var horas = Math.floor(minutos / 60);
            var resto = minutos % 60;
            alvo.textContent = 'Começa em ' + horas + 'h' + (resto ? ' ' + resto + 'min' : '');
        } else {
            var dias = Math.floor(minutos / (60 * 24));
            alvo.textContent = 'Faltam ' + dias + (dias === 1 ? ' dia' : ' dias');
        }
    }

    atualizar();
    setInterval(atualizar, 30000);
}

/* Na faixa "missas de hoje", apaga as que já passaram */
function missasQueJaPassaram() {
    var agora = new Date();
    var minutosAgora = agora.getHours() * 60 + agora.getMinutes();

    document.querySelectorAll('[data-hora]').forEach(function (missa) {
        var partes = missa.dataset.hora.split(':');
        var minutosMissa = parseInt(partes[0], 10) * 60 + parseInt(partes[1], 10);

        // A missa dura cerca de 1 hora
        if (minutosMissa + 60 < minutosAgora) {
            missa.classList.add('passou');
        }
    });
}

/* Abas (página de missas) */
function abas() {
    document.querySelectorAll('[data-abas]').forEach(function (grupo) {
        var botoes = grupo.querySelectorAll('.aba');
        var paineis = grupo.querySelectorAll('.painel');

        botoes.forEach(function (botao) {
            botao.addEventListener('click', function () {
                botoes.forEach(function (b) {
                    b.classList.toggle('ativa', b === botao);
                    b.setAttribute('aria-selected', b === botao ? 'true' : 'false');
                });

                paineis.forEach(function (painel) {
                    painel.classList.toggle('ativo', painel.id === botao.dataset.painel);
                });
            });
        });
    });
}

/* Galeria: abre a foto grande */
function galeria() {
    var visor = document.querySelector('.visor');
    if (!visor || typeof visor.showModal !== 'function') return;

    var imagem = visor.querySelector('img');
    var legenda = visor.querySelector('p');

    document.querySelectorAll('.galeria button').forEach(function (botao) {
        botao.addEventListener('click', function () {
            var foto = botao.querySelector('img');
            imagem.src = foto.src;
            imagem.alt = foto.alt;
            legenda.textContent = foto.alt;
            visor.showModal();
        });
    });

    visor.addEventListener('click', function (evento) {
        // Clicar fora da foto ou no X fecha
        if (evento.target === visor || evento.target.closest('button')) visor.close();
    });
}

/* Se uma imagem não carregar, mostra o símbolo do Santuário no lugar */
function imagensQuebradas() {
    document.querySelectorAll('img').forEach(function (imagem) {
        function trocar() {
            if (imagem.parentElement) imagem.parentElement.classList.add('sem-imagem');
        }

        if (imagem.complete && imagem.naturalWidth === 0 && imagem.getAttribute('src')) {
            trocar();
        }

        imagem.addEventListener('error', trocar);
    });
}

/* Fundo da citação se move devagar ao rolar */
function paralaxe() {
    var fundo = document.querySelector('.citacao__fundo');
    if (!fundo) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    window.addEventListener('scroll', function () {
        var caixa = fundo.parentElement.getBoundingClientRect();
        if (caixa.bottom < 0 || caixa.top > window.innerHeight) return;

        var progresso = (caixa.top + caixa.height / 2 - window.innerHeight / 2) / window.innerHeight;
        fundo.style.transform = 'translateY(' + (progresso * -60).toFixed(1) + 'px)';
    }, { passive: true });
}

/* Formulário de pedido de oração: monta a mensagem e abre o WhatsApp.
   (Quando você criar a tabela de pedidos, troque isso por um POST normal.) */
function pedidoDeOracao() {
    var formulario = document.querySelector('[data-whatsapp]');
    if (!formulario) return;

    formulario.addEventListener('submit', function (evento) {
        evento.preventDefault();

        var nome = formulario.querySelector('[name="nome"]').value.trim();
        var assunto = formulario.querySelector('[name="assunto"]').value;
        var mensagem = formulario.querySelector('[name="mensagem"]').value.trim();

        var texto = 'Olá! Meu nome é ' + nome + '.\n' + assunto + ':\n' + mensagem;

        window.open(formulario.dataset.whatsapp + '?text=' + encodeURIComponent(texto), '_blank', 'noopener');
    });
}

/* Botão "Compartilhar" (usa o compartilhamento do celular quando existe) */
function compartilhar() {
    document.querySelectorAll('[data-compartilhar]').forEach(function (botao) {
        botao.addEventListener('click', function () {
            var dados = { title: document.title, url: window.location.href };

            if (navigator.share) {
                navigator.share(dados).catch(function () {});
            } else if (navigator.clipboard) {
                navigator.clipboard.writeText(dados.url).then(function () {
                    var rotulo = botao.querySelector('span');
                    if (rotulo) rotulo.textContent = 'Link copiado!';
                });
            }
        });
    });
}
