<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FavoritoController extends Controller
{
    public function index() : View {
        $cliente = Auth::user()->cliente;
        $favoritos = $cliente->favoritos()->get();
        return view('cliente.favorito.index', compact('favoritos'));
    }

    public function remover(Request $request) : RedirectResponse {
        $favorito = Favorito::find($request->favorito_id);
        $favorito->delete();
        return redirect(route('favorito.index'));
    }

    public function store(Request $request) : RedirectResponse {
        return redirect(route('favorito.index'));
    }
}
