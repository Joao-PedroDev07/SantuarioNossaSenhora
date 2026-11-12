<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comunidade extends Model
{
    protected $fillable = ['nome', 'slug', 'tipo', 'endereco', 'bairro', 'cidade', 'descricao', 'imagem', 'ordem'];

    // Uma comunidade tem vários horários de missa
    public function missas()
    {
        return $this->hasMany(Missa::class)->orderBy('dia_semana')->orderBy('horario');
    }

    // Uso na view: $comunidade->imagem_url
    public function getImagemUrlAttribute()
    {
        return url_imagem($this->imagem);
    }
}
