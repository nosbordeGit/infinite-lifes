<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CartaoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

//Rotas do site
Route::controller(SiteController::class)->group(function(){
    Route::get('/', 'site')->name('site');
    Route::get('/livro-{titulo?}-{id}', 'livro')->name('site.livro');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/livro-{titulo}');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rotas de CartaoController
Route::middleware('auth')->controller(CartaoController::class)->group(function(){
    Route::get('/cartao-index','index')->name('cartao.index');
    Route::get('/cartao-formulario','formulario')->name('cartao.formulario');
    Route::post('/cartao-formulario','store')->name('cartao.store');
    Route::post('/cartao-deletar/{id}','deletar')->name('cartao.deletar');
    Route::put('/cartao-atualizar/{id}','atualizar')->name('cartao.atualizar');
});

Route::get('/sair', [AuthenticatedSessionController::class, 'destroy'])
->name('sair');


require __DIR__.'/auth.php';
