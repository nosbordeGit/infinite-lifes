<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\CartaoController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\VisitadoController;
use Illuminate\Support\Facades\Route;

//Rotas do SiteController
Route::controller(SiteController::class)->group(function(){
    Route::get('/', 'site')->name('site');
    Route::get('/livro-{titulo?}-{id}', 'livro')->name('site.livro');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

//Rotas do CarrinhoController
Route::controller(CarrinhoController::class)->group(function(){
    Route::get('/carrinho-index', 'index')->name('carrinho.index');
    Route::get('/carrinho-remover', 'remover')->name('carrinho.remover');
    Route::post('/carrinho-adicionar', 'store')->name('carrinho.adicionar');
});

//Rotas do PedidoController
Route::controller(PedidoController::class)->group(function(){
    Route::get('/pedido-index', 'index')->name('pedido.index');
    Route::get('/pedido-formulario', 'create')->name('pedido.formulario');
    Route::post('/pedido-cadastrar', 'store')->name('pedido.cadastrar');
    Route::get('/pedido-{id}', 'show')->name('pedido.pedido');
});

//Rotas do VisitadoController
Route::controller(VisitadoController::class)->group(function(){
    Route::get('/visitado-index')->name('visitado.index');
});

//Rotas do FavoritoController
Route::controller(FavoritoController::class)->group(function(){
    Route::get('/favorito-index')->name('favorito.index');
});

Route::get('/sair', [AuthenticatedSessionController::class, 'destroy'])
->name('sair');


require __DIR__.'/auth.php';
