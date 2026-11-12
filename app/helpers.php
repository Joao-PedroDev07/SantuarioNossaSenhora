<?php

/*
|--------------------------------------------------------------------------
| Funções auxiliares do site
|--------------------------------------------------------------------------
|
| Este arquivo é carregado automaticamente pelo Composer
| (veja "autoload" > "files" no composer.json).
|
*/

if (! function_exists('url_imagem')) {
    /**
     * Transforma o valor salvo no banco em um endereço de imagem.
     * Aceita URL completa (https://...) ou o nome de um arquivo em public/img.
     */
    function url_imagem(?string $caminho): ?string
    {
        if (empty($caminho)) {
            return null;
        }

        if (str_starts_with($caminho, 'http://') || str_starts_with($caminho, 'https://')) {
            return $caminho;
        }

        return asset('img/' . ltrim($caminho, '/'));
    }
}

if (! function_exists('foto')) {
    /**
     * Devolve o endereço de uma das fotos cadastradas em config/santuario.php.
     * Ex.: foto('fachada')
     */
    function foto(string $nome): ?string
    {
        return url_imagem(config('santuario.fotos.' . $nome));
    }
}

if (! function_exists('hora_curta')) {
    /**
     * "19:30:00" vira "19h30" e "07:00:00" vira "7h".
     */
    function hora_curta(?string $hora): string
    {
        if (empty($hora)) {
            return '';
        }

        [$h, $m] = explode(':', $hora);

        return (int) $h . 'h' . ($m !== '00' ? $m : '');
    }
}
