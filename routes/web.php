<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\MissaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ComunidadeController;

// Página inicial
Route::get('/', [SiteController::class, 'index'])->name('home');

// Páginas institucionais
Route::get('/santuario', [SiteController::class, 'santuario'])->name('santuario');
Route::get('/contato', [SiteController::class, 'contato'])->name('contato');

// Horários de missas
Route::prefix('missas')->group(function () {
    Route::get('/', [MissaController::class, 'index'])->name('missas-index');

    // TODO (você): CRUD das missas
    // Route::get('/create', [MissaController::class, 'create'])->name('missas-create');
    // Route::post('/', [MissaController::class, 'store'])->name('missas-store');
    // Route::get('/{id}/edit', [MissaController::class, 'edit'])->name('missas-edit');
    // Route::put('/{id}', [MissaController::class, 'update'])->name('missas-update');
    // Route::delete('/{id}', [MissaController::class, 'destroy'])->name('missas-destroy');
});

// Agenda paroquial
Route::prefix('agenda')->group(function () {
    Route::get('/', [AgendaController::class, 'index'])->name('agenda-index');

    // TODO (você): CRUD da agenda (create, store, edit, update, destroy)
});

// Eventos
Route::prefix('eventos')->group(function () {
    Route::get('/', [EventoController::class, 'index'])->name('eventos-index');

    // TODO (você): CRUD dos eventos (create, store, edit, update, destroy)
    // Atenção: as rotas /create e /{id}/edit precisam ficar ANTES da rota /{slug}

    Route::get('/{slug}', [EventoController::class, 'show'])->name('eventos-show');
});

// Notícias
Route::prefix('noticias')->group(function () {
    Route::get('/', [NoticiaController::class, 'index'])->name('noticias-index');

    // TODO (você): CRUD das notícias (create, store, edit, update, destroy)
    // Atenção: as rotas /create e /{id}/edit precisam ficar ANTES da rota /{slug}

    Route::get('/{slug}', [NoticiaController::class, 'show'])->name('noticias-show');
});

// Comunidades (capelas)
Route::prefix('comunidades')->group(function () {
    Route::get('/', [ComunidadeController::class, 'index'])->name('comunidades-index');

    // TODO (você): CRUD das comunidades (create, store, edit, update, destroy)
});

// TODO (você): login e cadastro de usuários
// Route::get('/login', [LoginController::class, 'index'])->name('login');

// Rota não encontrada
Route::fallback(function () {
    return response()->view('erro', [], 404);
});
