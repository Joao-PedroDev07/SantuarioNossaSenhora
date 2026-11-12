<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = ['titulo', 'slug', 'categoria', 'resumo', 'conteudo', 'imagem', 'autor', 'publicado_em', 'destaque'];

    protected $casts = [
        'publicado_em' => 'datetime',
        'destaque' => 'boolean',
    ];

    // Uso na view: $noticia->imagem_url
    public function getImagemUrlAttribute()
    {
        return url_imagem($this->imagem);
    }

    // Uso na view: $noticia->tempo_leitura  ->  "3 min de leitura"
    public function getTempoLeituraAttribute()
    {
        $minutos = max(1, (int) ceil(str_word_count(strip_tags($this->conteudo)) / 200));

        return $minutos . ' min de leitura';
    }
}
