<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the carrinho_livro.
     */
    public function index(): View
    {
        $cliente = Auth::user()->cliente;
        $carrinho = $cliente->carrinhos()->where('status', 1)->first();

        return view('cliente.carrinho.index', compact('carrinho'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in carrinho_livro.
     */
    public function store(Request $request)
    {
        $cliente = Auth::user()->cliente;
        $carrinho = $cliente->carrinhos()->where('status', 1)->first();
        $carrinho->livros()->attach($request->livro_id);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from carrinho_livro.
     */
    public function remover(Request $request): RedirectResponse
    {
        $cliente = Auth::user()->cliente;
        $carrinho = $cliente->carrinhos()->where('status', 1)->first();
        $carrinho->livros()->detach($request->livro_id);

        return redirect()->back();
    }
}
