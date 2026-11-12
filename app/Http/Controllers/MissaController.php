<?php

namespace App\Http\Controllers;

use App\Models\Comunidade;
use App\Models\Horario;
use App\Models\Missa;

class MissaController extends Controller
{
    // Página pública com os horários de missas e de atendimento
    public function index()
    {
        // Cada comunidade com suas missas ativas
        $comunidades = Comunidade::with(['missas' => function ($consulta) {
            $consulta->where('ativo', true);
        }])->orderBy('ordem')->get();

        // Outros horários (confissões, secretaria...) agrupados pela categoria
        $horarios = Horario::orderBy('ordem')->get()->groupBy('categoria');

        return view('missas.index', [
            'comunidades' => $comunidades,
            'horarios' => $horarios,
            'proxima' => Missa::proxima(),
            'hoje' => now()->dayOfWeek,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | TODO (você): CRUD das missas
    |--------------------------------------------------------------------------
    | Faça igual ao UsuarioController da Hamburgueria:
    |
    |   create()            -> return view('missas.create');  (mande também as comunidades para o <select>)
    |   store(Request)      -> Missa::create($request->all());
    |   edit($id)           -> return view('missas.edit', ['missa' => $missa]);
    |   update(Request,$id) -> Missa::where('id', $id)->update($data);
    |   destroy($id)        -> Missa::where('id', $id)->delete();
    |
    | As rotas já estão comentadas em routes/web.php.
    */
}
