<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = ['titulo', 'slug', 'resumo', 'descricao', 'data_inicio', 'data_fim', 'local', 'imagem', 'destaque'];

    protected $casts = [
        'data_inicio' => 'datetime',
        'data_fim' => 'datetime',
        'destaque' => 'boolean',
    ];

    // Uso na view: $evento->imagem_url
    public function getImagemUrlAttribute()
    {
        return url_imagem($this->imagem);
    }

    // Uso na view: $evento->quando  ->  "8 de dezembro, às 19h30" ou "3 a 11 de outubro"
    public function getQuandoAttribute()
    {
        $inicio = $this->data_inicio;
        $fim = $this->data_fim;

        if ($fim && ! $fim->isSameDay($inicio)) {
            if ($fim->isSameMonth($inicio)) {
                return $inicio->day . ' a ' . $fim->translatedFormat('j \d\e F');
            }

            return $inicio->translatedFormat('j \d\e F') . ' a ' . $fim->translatedFormat('j \d\e F');
        }

        return $inicio->translatedFormat('j \d\e F') . ', às ' . hora_curta($inicio->format('H:i'));
    }
}
