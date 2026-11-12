<?php

namespace App\Http\Controllers;

use App\Models\Noticia;

class NoticiaController extends Controller
{
    // Lista de notícias (9 por página)
    public function index()
    {
        $noticias = Noticia::where('publicado_em', '<=', now())
            ->orderByDesc('publicado_em')
            ->paginate(9);

        return view('noticias.index', [
            'noticias' => $noticias,
        ]);
    }

    // Página de uma notícia (o endereço usa o slug)
    public function show($slug)
    {
        $noticia = Noticia::where('slug', $slug)->first();

        if (empty($noticia)) {
            return redirect()->route('noticias-index');
        }

        $outras = Noticia::where('id', '!=', $noticia->id)
            ->where('publicado_em', '<=', now())
            ->orderByDesc('publicado_em')
            ->take(3)
            ->get();

        return view('noticias.show', [
            'noticia' => $noticia,
            'outras' => $outras,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | TODO (você): CRUD das notícias
    |--------------------------------------------------------------------------
    | create(), store(), edit(), update() e destroy()
    | no mesmo padrão do UsuarioController da Hamburgueria.
    |
    | Dica: gere o slug a partir do título -> Str::slug($request->titulo)
    */
}
