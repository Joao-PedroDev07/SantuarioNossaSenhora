<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Padre extends Model
{
    protected $fillable = ['nome', 'funcao', 'foto', 'bio', 'ordem'];

    // Uso na view: $padre->foto_url
    public function getFotoUrlAttribute()
    {
        return url_imagem($this->foto);
    }

    // Uso na view: $padre->iniciais  ->  "CP" (aparece quando não há foto)
    public function getIniciaisAttribute()
    {
        $nome = trim(str_replace(['Pe.', ', SAC'], '', $this->nome));
        $partes = explode(' ', $nome);

        return mb_strtoupper(mb_substr($partes[0], 0, 1) . mb_substr($partes[1] ?? '', 0, 1));
    }
}
