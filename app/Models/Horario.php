<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = ['categoria', 'titulo', 'dias', 'hora_inicio', 'hora_fim', 'observacao', 'ordem'];

    // Nome bonito de cada categoria (a chave é o que fica salvo no banco)
    public const CATEGORIAS = [
        'confissoes' => 'Confissões',
        'secretaria' => 'Secretaria paroquial',
        'adoracao' => 'Adoração ao Santíssimo',
        'devocao' => 'Terço e devoções',
    ];

    // Uso na view: $horario->periodo  ->  "8h às 11h30"
    public function getPeriodoAttribute()
    {
        $inicio = hora_curta($this->hora_inicio);

        return $this->hora_fim ? $inicio . ' às ' . hora_curta($this->hora_fim) : $inicio;
    }
}
