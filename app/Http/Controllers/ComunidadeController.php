<?php

namespace App\Http\Controllers;

use App\Models\Comunidade;

class ComunidadeController extends Controller
{
    // Santuário e capelas, cada um com seus horários de missa
    public function index()
    {
        $comunidades = Comunidade::with(['missas' => function ($consulta) {
            $consulta->where('ativo', true);
        }])->orderBy('ordem')->get();

        return view('comunidades.index', [
            'comunidades' => $comunidades,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | TODO (você): CRUD das comunidades
    |--------------------------------------------------------------------------
    | create(), store(), edit(), update() e destroy()
    | no mesmo padrão do UsuarioController da Hamburgueria.
    */
}
