# Santuário Diocesano Nossa Senhora Aparecida

Site da paróquia/santuário de Presidente Prudente (SP), feito em **Laravel 12** seguindo a mesma organização do projeto Hamburgueria (controllers simples, rotas com `prefix` e nomes no padrão `missas-index`, views em pastas, MySQL do XAMPP).

## Como rodar

1. Abra o XAMPP e inicie o **MySQL**.
2. Na pasta do projeto:

```bash
php artisan migrate:fresh --seed
```

```bash
php artisan serve
```

3. Acesse http://localhost:8000

O banco se chama `santuario` (veja o `.env`). Se ele não existir, crie pelo phpMyAdmin antes do `migrate`.
Não precisa de `npm`: o CSS e o JS são arquivos puros dentro de `public/`.

## Onde fica cada coisa

| O quê | Onde |
|---|---|
| Rotas | `routes/web.php` |
| Controllers | `app/Http/Controllers` (`SiteController`, `MissaController`, `AgendaController`, `EventoController`, `NoticiaController`, `ComunidadeController`) |
| Models | `app/Models` (`Comunidade`, `Missa`, `Horario`, `Agenda`, `Evento`, `Noticia`, `Padre`) |
| Tabelas | `database/migrations` |
| Dados iniciais | `database/seeders` |
| Telefone, endereço, redes sociais e fotos | `config/santuario.php` |
| Layout (cabeçalho, rodapé) | `resources/views/layouts/site.blade.php` e `resources/views/partials` |
| Páginas | `resources/views/site`, `missas`, `agenda`, `eventos`, `noticias`, `comunidades` |
| Ícones | `resources/views/components/icone.blade.php` → `<x-icone nome="relogio" />` |
| Visual | `public/css/santuario.css` (tem índice no topo) |
| Animações e interações | `public/js/santuario.js` |
| Funções auxiliares (`foto()`, `url_imagem()`, `hora_curta()`) | `app/helpers.php` |

## Tabelas

- **comunidades** – o Santuário e as capelas
- **missas** – horários fixos da semana (`dia_semana`: 0 = domingo … 6 = sábado), ligados a uma comunidade
- **horarios** – confissões, secretaria, adoração, terço
- **agendas** – compromissos com data (reuniões, encontros, formações)
- **eventos** – festas e celebrações especiais, com página própria
- **noticias** – notícias, com página própria
- **padres** – padres do Santuário

## O que é dado real e o que é exemplo

**Real** (copiado do site da Diocese): comunidades, horários de missa, nomes dos padres, endereço, telefones, e-mail, redes sociais, data de fundação e as 5 fotos do Santuário.

**Exemplo — precisa trocar antes de publicar:**

- `HorarioSeeder` – horários de confissão, secretaria, adoração e terço (o site da Diocese não informa)
- `AgendaSeeder`, `EventoSeeder`, `NoticiaSeeder` – textos, datas e horários inventados só para mostrar o layout
- Texto da história em `resources/views/site/santuario.blade.php`
- Função do Pe. Cláudio em `PadreSeeder` (ficou em branco)

## O que ficou para você fazer

Procure por `TODO (você)` no projeto para achar os pontos exatos.

- [ ] **Login e cadastro de usuários** (rota comentada em `routes/web.php`, link "Entrar" comentado em `partials/cabecalho.blade.php`)
- [ ] **CRUD de missas** – `create`, `store`, `edit`, `update`, `destroy` (rotas já comentadas em `routes/web.php`)
- [ ] **CRUD de agenda**
- [ ] **CRUD de eventos** (gerar o `slug` com `Str::slug($request->titulo)`)
- [ ] **CRUD de notícias**
- [ ] **CRUD de comunidades**, **horários** e **padres**
- [ ] **Pedidos de oração**: hoje o formulário de contato só abre o WhatsApp. Criar a tabela `pedidos_oracao` e salvar no banco
- [ ] Upload de imagem nos cadastros (salvar em `public/img` e gravar só o nome do arquivo no banco)
- [ ] Proteger as rotas de cadastro para só quem fez login acessar

Ideias de tabelas novas: `pastorais` (pastorais e movimentos), `galerias`/`fotos`, `avisos`.

### Visual pronto para as suas telas de cadastro

O CSS já tem classes para formulários e tabelas no mesmo estilo do site:

```blade
@extends('layouts.site')

@section('titulo', 'Nova missa')

@section('conteudo')
    @include('partials.topo', ['titulo' => 'Nova missa'])

    <section class="secao">
        <div class="container container--estreito">
            <form class="formulario formulario--2 caixa" action="{{ route('missas-store') }}" method="POST">
                @csrf

                <div class="campo">
                    <label>Horário</label>
                    <input type="time" name="horario">
                </div>

                <div class="campo">
                    <label>Dia da semana</label>
                    <select name="dia_semana">...</select>
                </div>

                <div class="campo campo--inteiro">
                    <button class="btn btn--ouro" type="submit">Cadastrar</button>
                </div>
            </form>
        </div>
    </section>
@endsection
```

Para listagens: `<div class="tabela-rolagem"><table class="tabela">...</table></div>`.

## Imagens

As fotos hoje são carregadas direto do site da Diocese e da Wikimedia Commons (arte sacra em domínio público). Para usar arquivos próprios, coloque a imagem em `public/img` e troque o endereço pelo nome do arquivo em `config/santuario.php` (ou no campo `imagem` da tabela). As duas formas funcionam.
