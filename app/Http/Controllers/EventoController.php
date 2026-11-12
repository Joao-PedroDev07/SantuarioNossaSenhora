<?php

namespace App\Http\Controllers;

use App\Models\Evento;

class EventoController extends Controller
{
    // Lista de eventos: os próximos primeiro, depois os que já passaram
    public function index()
    {
        $hoje = now()->startOfDay();

        $proximos = Evento::where('data_inicio', '>=', $hoje)->orderBy('data_inicio')->get();
        $anteriores = Evento::where('data_inicio', '<', $hoje)->orderByDesc('data_inicio')->take(6)->get();

        return view('eventos.index', [
            'proximos' => $proximos,
            'anteriores' => $anteriores,
        ]);
    }

    // Página de um evento (o endereço usa o slug: /eventos/festa-da-padroeira-2027)
    public function show($slug)
    {
        $evento = Evento::where('slug', $slug)->first();

        if (empty($evento)) {
            return redirect()->route('eventos-index');
        }

        $outros = Evento::where('id', '!=', $evento->id)
            ->where('data_inicio', '>=', now()->startOfDay())
            ->orderBy('data_inicio')
            ->take(3)
            ->get();

        return view('eventos.show', [
            'evento' => $evento,
            'outros' => $outros,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | TODO (você): CRUD dos eventos
    |--------------------------------------------------------------------------
    | create(), store(), edit(), update() e destroy()
    | no mesmo padrão do UsuarioController da Hamburgueria.
    |
    | Dica: gere o slug a partir do título -> Str::slug($request->titulo)
    */
}
