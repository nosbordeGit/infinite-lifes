<?php

namespace App\Http\Controllers;

use App\Models\Cartao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Return_;

class CartaoController extends Controller
{

    public function index() : View {
        $cliente = Auth::user()->cliente;
        $cartoes = Cartao::where('status', 1)->where('cliente_id', $cliente->id)->get();
        return view('cliente.cartao.cartoes', compact('cartoes'));
    }

    public function formulario() : View {
        return view('cliente.cartao.store');
    }

    public function informacoes() : View {
        $cliente = Auth::user()->cliente;
        $cartao = Cartao::where('status', 1)->cliente()->get();
        return view('cliente.cartao.cartoes', compact('cartao'));
    }

    public function atualizar() : RedirectResponse {
        $cliente = Auth::user()->cliente;

        return redirect(route('cartao.index'));
    }

    public function deletar() : RedirectResponse {
        $cliente = Auth::user()->cliente;

        return redirect(route('cartao.index'));
    }

    public function store(Request $request) : RedirectResponse {
        $date = Carbon::now();

        $request->validate([
            'cvc' => ['required', 'string', 'max:5', 'regex: /^[0-9]{3,4}$/'],
            'numero' => ['required', 'string', 'max:20', 'regex: /^[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}$/'],
            'validate' => ['required', 'date', 'after:' . $date],
            'tipo' => ['required', 'string']
        ]);

        return redirect(route(''));
    }

}
