<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Livro;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->cliente) {
            $cliente = Auth::user()->cliente;
            $pedidos = $cliente->pedidos()->get();
            return view('cliente.pedido.index', compact('pedidos'));
        } else if (Auth::user()->transportadora) {
            $transportadora = Auth::user()->transportadora;
            $pedidos = $transportadora->pedidos()->get();
            return view('cliente.pedido.index', compact('pedidos'));
        }

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $cliente = Auth::user()->cliente;
        if ($request->input('tipo_id') == 'livro') {
            $carrinho = $cliente->carrinhos()->create();
            $livro = Livro::find($request->livro_id);
            $carrinho->livros()->attach($livro->id);
            return view('cliente.pedido.formulario', compact('carrinho'));
        } else {
            $carrinho = Carrinho::find($request->id);
            return view('cliente.pedido.formulario', compact('carrinho'));
        }

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'valor' => ['required', 'numeric'],
            'nome' => ['required', 'string', 'max:50'],
            'sobrenome' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'telefone' => ['required', 'string', 'max:17', 'regex:/^[0-9]{2} [0-9]{2} [0-9]{5}-[0-9]{4}$/'],
            'cep' => ['required', 'string', 'max:10', 'regex:/^[0-9]{5}-[0-9]{3}$/'],
            'pais' => ['required', 'string', 'max:90'],
            'estado' => ['required', 'string', 'max:90'],
            'cidade' => ['required', 'string', 'max:90'],
            'bairro' => ['required', 'string', 'max:90'],
            'endereco' => ['required', 'string', 'max:90'],
            'complemento' => ['required', 'string'],
        ]);

        $cliente = Auth::user()->cliente;
        $usuario = $cliente->usuario;
        $endereco = $usuario->endereco;

        $input = $request->only(['nome', 'sobrenome']);
        foreach ($input as $key => $value) {
            $cliente->$key = $value;
        }
        $cliente->save();

        $input = $request->only(['email', 'telefone']);
        foreach ($input as $key => $value) {
            $usuario->$key = $value;
        }
        $usuario->save();

        $input = $request->only(['cep', 'pais', 'estado', 'cidade', 'bairro', 'endereco', 'complemento']);
        foreach ($input as $key => $value) {
            $endereco->$key = $value;
        }
        $endereco->save();

        $pedido = $cliente->pedidos()->create([
            'carrinho_id' => $request->carrinho_id,
            'cartao_id' => $request->cartao,
            'valor' => $request->valor
        ]);

        $carrinho = Carrinho::find($request->carrinho_id);
        $carrinho->status = 0;
        $carrinho->save();

        return redirect(route('pedido.pedido', $pedido->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd($id);
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
