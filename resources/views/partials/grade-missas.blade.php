{{-- Grade da semana com os horários de missa.
     Uso: @include('partials.grade-missas', ['grade' => $missasAgrupadasPorDia])
     $grade = coleção de missas agrupada por dia_semana (0 = domingo ... 6 = sábado) --}}
@php $diaDeHoje = now()->dayOfWeek; @endphp

<div class="grade">
    @foreach (\App\Models\Missa::DIAS as $numero => $nomeDia)
        <div @class(['grade__dia', 'grade__dia--hoje' => $numero === $diaDeHoje])>
            <span class="grade__nome">{{ $nomeDia }}</span>

            @if (isset($grade[$numero]) && $grade[$numero]->isNotEmpty())
                <div class="grade__horas">
                    @foreach ($grade[$numero] as $missa)
                        <span class="grade__hora">
                            {{ $missa->hora }}
                            @if ($missa->observacao)
                                <small>{{ $missa->observacao }}</small>
                            @endif
                        </span>
                    @endforeach
                </div>
            @else
                <span class="grade__vazio">Sem missa</span>
            @endif
        </div>
    @endforeach
</div>
