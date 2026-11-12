<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Missa extends Model
{
    protected $fillable = ['comunidade_id', 'dia_semana', 'horario', 'observacao', 'ativo'];

    protected $casts = ['ativo' => 'boolean'];

    // dia_semana segue o padrão do PHP/Carbon: 0 = domingo ... 6 = sábado
    public const DIAS = [
        0 => 'Domingo',
        1 => 'Segunda-feira',
        2 => 'Terça-feira',
        3 => 'Quarta-feira',
        4 => 'Quinta-feira',
        5 => 'Sexta-feira',
        6 => 'Sábado',
    ];

    public const DIAS_CURTOS = [0 => 'Dom', 1 => 'Seg', 2 => 'Ter', 3 => 'Qua', 4 => 'Qui', 5 => 'Sex', 6 => 'Sáb'];

    public function comunidade()
    {
        return $this->belongsTo(Comunidade::class);
    }

    // Uso na view: $missa->hora  ->  "19h30"
    public function getHoraAttribute()
    {
        return hora_curta($this->horario);
    }

    // Uso na view: $missa->dia  ->  "Domingo"
    public function getDiaAttribute()
    {
        return self::DIAS[$this->dia_semana] ?? '';
    }

    /**
     * Descobre qual é a próxima missa a partir de agora.
     * Devolve ['missa' => Missa, 'quando' => Carbon] ou null se não houver missas.
     */
    public static function proxima()
    {
        $agora = now();
        $proxima = null;

        foreach (self::with('comunidade')->where('ativo', true)->get() as $missa) {
            // Quantos dias faltam até o dia da semana dessa missa
            $dias = ($missa->dia_semana - $agora->dayOfWeek + 7) % 7;
            $quando = $agora->copy()->startOfDay()->addDays($dias)->setTimeFromTimeString($missa->horario);

            // Se o horário de hoje já passou, só na semana que vem
            if ($quando->lessThan($agora)) {
                $quando->addWeek();
            }

            if ($proxima === null || $quando->lessThan($proxima['quando'])) {
                $proxima = ['missa' => $missa, 'quando' => $quando];
            }
        }

        return $proxima;
    }
}
