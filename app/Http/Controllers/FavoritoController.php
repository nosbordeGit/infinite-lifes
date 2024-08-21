<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FavoritoController extends Controller
{
    public function index() : View {
        $cliente = Auth::user()->cliente;
        $favoritos = $cliente->favoritos()->get();
        return view('cliente.favorito.index', compact('favoritos'));
    }
}
