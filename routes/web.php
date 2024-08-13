<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CartaoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'site'])->name('site');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rotas de CartaoController
Route::middleware('auth')->group(function(){
    Route::get('/cartao-index', [CartaoController::class, 'index'])->name('cartao.index');
    Route::get('/cartao-formulario', [CartaoController::class, 'formulario'])->name('cartao.formulario');
    Route::post('/cartao-formulario', [CartaoController::class, 'store'])->name('cartao.store');
    Route::post('/cartao-deletar/{id}', [CartaoController::class, 'deletar'])->name('cartao.deletar');
    Route::put('/cartao-atualizar/{id}', [CartaoController::class, 'atualizar'])->name('cartao.atualizar');
});

Route::get('sair', [AuthenticatedSessionController::class, 'destroy'])
->name('sair');

require __DIR__.'/auth.php';
