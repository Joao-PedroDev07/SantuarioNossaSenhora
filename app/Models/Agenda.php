<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = ['titulo', 'descricao', 'data', 'hora_inicio', 'hora_fim', 'local', 'categoria', 'comunidade_id'];

    protected $casts = ['data' => 'date'];

    public const CATEGORIAS = [
        'liturgia' => 'Liturgia',
        'formacao' => 'Formação',
        'pastoral' => 'Pastoral',
        'social' => 'Ação social',
        'geral' => 'Geral',
    ];

    public function comunidade()
    {
        return $this->belongsTo(Comunidade::class);
    }

    // Uso na view: $item->periodo  ->  "19h30 às 21h"
    public function getPeriodoAttribute()
    {
        if (! $this->hora_inicio) {
            return 'Dia todo';
        }

        $inicio = hora_curta($this->hora_inicio);

        return $this->hora_fim ? $inicio . ' às ' . hora_curta($this->hora_fim) : $inicio;
    }

    // Uso na view: $item->categoria_nome  ->  "Formação"
    public function getCategoriaNomeAttribute()
    {
        return self::CATEGORIAS[$this->categoria] ?? ucfirst($this->categoria);
    }
}
