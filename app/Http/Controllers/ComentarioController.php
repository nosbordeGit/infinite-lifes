<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'corpo' => ['required', 'string']
        ]);

        $cliente = Auth::user()->cliente;
        $comentario = $cliente->comentarios()->create([
            'corpo' => $request->corpo,
            'livro_id' => $request->livro_id
        ]);

        $comentario->save();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function atualizar(Request $request, string $id)
    {
        $request->validate([
            'corpo' => ['required', 'string']
        ]);

        $comentario = Comentario::find($id);
        $comentario->corpo = $request->corpo;
        $comentario->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deletar(string $id)
    {
        $comentario = Comentario::find($id);
        $comentario->delete();
        return redirect()->back();
    }
}
