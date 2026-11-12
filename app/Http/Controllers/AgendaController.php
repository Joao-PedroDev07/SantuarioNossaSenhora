<?php

namespace App\Http\Controllers;

use App\Models\Agenda;

class AgendaController extends Controller
{
    // Agenda paroquial: próximos compromissos, agrupados por mês
    public function index()
    {
        $itens = Agenda::with('comunidade')
            ->where('data', '>=', now()->toDateString())
            ->orderBy('data')
            ->orderBy('hora_inicio')
            ->get();

        // Ex.: ['2026-11' => [...], '2026-12' => [...]]
        $meses = $itens->groupBy(function ($item) {
            return $item->data->format('Y-m');
        });

        return view('agenda.index', [
            'meses' => $meses,
            'total' => $itens->count(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | TODO (você): CRUD da agenda
    |--------------------------------------------------------------------------
    | create(), store(), edit(), update() e destroy()
    | no mesmo padrão do UsuarioController da Hamburgueria.
    */
}
