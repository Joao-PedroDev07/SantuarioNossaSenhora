<?php

namespace App\Providers;

use App\Models\Missa;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // O rodapé aparece em todas as páginas e mostra as missas do Santuário.
        // Em vez de buscar isso em cada controller, enviamos direto para a view do rodapé.
        View::composer('partials.rodape', function ($view) {
            $missas = Missa::where('ativo', true)
                ->whereHas('comunidade', function ($consulta) {
                    $consulta->where('tipo', 'santuario');
                })
                ->orderBy('dia_semana')
                ->orderBy('horario')
                ->get()
                ->groupBy('dia_semana');

            $view->with('missasRodape', $missas);
        });
    }
}
