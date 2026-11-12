<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    // Cria as tabelas num banco de teste (em memória) antes de cada teste
    use RefreshDatabase;

    private const PAGINAS = ['/', '/missas', '/agenda', '/eventos', '/noticias', '/santuario', '/comunidades', '/contato'];

    /**
     * Com o banco vazio as páginas não podem dar erro.
     */
    public function test_as_paginas_abrem_com_o_banco_vazio(): void
    {
        foreach (self::PAGINAS as $pagina) {
            $this->get($pagina)->assertStatus(200);
        }
    }

    /**
     * Com os dados dos seeders as páginas abrem e mostram o conteúdo.
     */
    public function test_as_paginas_abrem_com_os_dados_dos_seeders(): void
    {
        $this->seed();

        foreach (self::PAGINAS as $pagina) {
            $this->get($pagina)->assertStatus(200);
        }

        $this->get('/missas')->assertSee('Capela Santa Terezinha');
        $this->get('/noticias/advento-tempo-de-preparar-o-coracao-para-o-natal')->assertStatus(200);
        $this->get('/eventos/nao-existe')->assertRedirect('/eventos');
    }

    public function test_endereco_inexistente_mostra_a_pagina_de_erro(): void
    {
        $this->get('/pagina-que-nao-existe')->assertStatus(404);
    }
}
