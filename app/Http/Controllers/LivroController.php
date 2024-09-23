<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $vendedor = Auth::user()->vendedor;
        $livros = $vendedor->livros()->get();
        return view('vendedor.estoque.index' ,compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function formulario()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function livro(string $titulo = null, string $id) : View
    {
        $livro = Livro::find($id);
        return view('vendedor.estoque.livro', compact('livro'));
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
    public function atualizar(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletar(string $id)
    {
        //
    }
}
