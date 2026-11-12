<?php

/*
|--------------------------------------------------------------------------
| Dados fixos do Santuário
|--------------------------------------------------------------------------
|
| Informações que quase nunca mudam (endereço, telefone, redes sociais...).
| Nas views use: config('santuario.telefone'), config('santuario.email') etc.
|
| Fonte: https://www.diocesepresidenteprudente.com.br/paroquia/santuario-diocesano-nossa-senhora-aparecida/
|
*/

return [

    'nome' => 'Santuário Diocesano Nossa Senhora Aparecida',
    'nome_curto' => 'Santuário N. Sra. Aparecida',
    'diocese' => 'Diocese de Presidente Prudente',
    'fundacao' => '1940-08-28',

    // Endereço
    'endereco' => 'Rua Sargento Firmino Leão, 100',
    'bairro' => 'Vila Marcondes',
    'cidade' => 'Presidente Prudente',
    'uf' => 'SP',
    'cep' => '19031-100',

    // Contato
    'telefone' => '(18) 3222-4137',
    'telefone_link' => 'tel:+551832224137',
    'whatsapp' => '(18) 98203-0330',
    'whatsapp_link' => 'https://wa.me/5518982030330',
    'email' => 'santuarioaparecida.pp@diocesepresidenteprudente.com.br',

    // Redes sociais
    'instagram' => 'https://www.instagram.com/santuario_nsa/',
    'facebook' => 'https://www.facebook.com/santuariopp/',
    'site_diocese' => 'https://www.diocesepresidenteprudente.com.br/',

    // Mapa (Google Maps)
    'mapa_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462.0009015579583!2d-51.382267326446424!3d-22.12570071176896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9493f5ae23ef4267%3A0x58d6b3e8ed7ec8ba!2sSantu%C3%A1rio+Nossa+Senhora+Aparecida!5e0!3m2!1spt-PT!2sbr!4v1562769750181!5m2!1spt-PT!2sbr',
    'mapa_link' => 'https://www.google.com/maps/search/?api=1&query=Santu%C3%A1rio+Nossa+Senhora+Aparecida+Presidente+Prudente',

    /*
    |--------------------------------------------------------------------------
    | Fotos usadas no layout
    |--------------------------------------------------------------------------
    |
    | Pode ser um endereço completo (https://...) ou o nome de um arquivo
    | dentro de public/img (ex.: 'fachada.jpg').
    | Para trocar uma foto do site, basta mudar aqui.
    |
    */
    'fotos' => [
        'fachada' => 'https://www.diocesepresidenteprudente.com.br/wp-content/uploads/2019/07/santuario-nossa-senhora-1-regiao-03.jpg',
        'nave' => 'https://www.diocesepresidenteprudente.com.br/wp-content/uploads/2019/07/Design-sem-nome-23.png',
        'nave_fundo' => 'https://www.diocesepresidenteprudente.com.br/wp-content/uploads/2019/07/Design-sem-nome-24.png',
        'imagem' => 'https://www.diocesepresidenteprudente.com.br/wp-content/uploads/2019/07/santuario-nossa-senhora-1-regiao-01.jpg',
        'sacrario' => 'https://www.diocesepresidenteprudente.com.br/wp-content/uploads/2019/07/SANTUARIO-D.-N.-S.-APARECIDA.png',

        // Arte sacra em domínio público (Wikimedia Commons)
        'anunciacao' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Fra_Angelico_-_Annunciation.jpg/1280px-Fra_Angelico_-_Annunciation.jpg',
        'ultima_ceia' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/La_%C3%9Altima_Cena_%28Juan_de_Juanes%29_%28restaurada%29.jpg/1280px-La_%C3%9Altima_Cena_%28Juan_de_Juanes%29_%28restaurada%29.jpg',
        'pentecostes' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Restout_-_La_Pentec%C3%B4te_01.jpg/1280px-Restout_-_La_Pentec%C3%B4te_01.jpg',
        'imaculada' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Inmaculada_Concepci%C3%B3n_%28Murillo%2C_1662%29.jpg/1280px-Inmaculada_Concepci%C3%B3n_%28Murillo%2C_1662%29.jpg',
    ],

];
