<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Comunidade;
use App\Models\Evento;
use App\Models\Missa;
use App\Models\Noticia;
use App\Models\Padre;

class SiteController extends Controller
{
    // Página inicial
    public function index()
    {
        $hoje = now();

        // Missas de hoje em todas as comunidades
        $missasHoje = Missa::with('comunidade')
            ->where('ativo', true)
            ->where('dia_semana', $hoje->dayOfWeek)
            ->orderBy('horario')
            ->get();

        // Grade da semana só do Santuário (a completa fica na página de missas)
        $santuario = Comunidade::where('tipo', 'santuario')->first();
        $gradeSantuario = $santuario
            ? $santuario->missas()->where('ativo', true)->get()->groupBy('dia_semana')
            : collect();

        $eventos = Evento::where('data_inicio', '>=', $hoje->copy()->startOfDay())
            ->orderBy('data_inicio')
            ->take(4)
            ->get();

        $agenda = Agenda::with('comunidade')
            ->where('data', '>=', $hoje->toDateString())
            ->orderBy('data')
            ->orderBy('hora_inicio')
            ->take(5)
            ->get();

        $noticias = Noticia::where('publicado_em', '<=', $hoje)
            ->orderByDesc('publicado_em')
            ->take(6)
            ->get();

        return view('site.home', [
            'proxima' => Missa::proxima(),
            'missasHoje' => $missasHoje,
            'gradeSantuario' => $gradeSantuario,
            'eventos' => $eventos,
            'agenda' => $agenda,
            'noticias' => $noticias,
            'comunidades' => Comunidade::withCount('missas')->orderBy('ordem')->get(),
            'totalMissas' => Missa::where('ativo', true)->count(),
        ]);
    }

    // Página "O Santuário"
    public function santuario()
    {
        return view('site.santuario', [
            'padres' => Padre::orderBy('ordem')->get(),
            'comunidades' => Comunidade::orderBy('ordem')->get(),
            'totalMissas' => Missa::where('ativo', true)->count(),
        ]);
    }

    // Página de contato
    public function contato()
    {
        return view('site.contato');
    }
}
