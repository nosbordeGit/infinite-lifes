<?php

namespace App\Services;

use App\Models\Administrador;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class registroUsuarioService
{
    public function storeUsuario($request)
    {
        $usuario = User::create([
            'telefone' => $request->telefone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $usuario;
    }

    public function storeCliente($request, $usuario) {
        $cliente = $usuario->cliente()->create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'cpf' => $request->cpf,
            'data_nascimento' => $request->data_nascimento,
        ]);

        return $cliente;
    }

    public function storeVendedor($request, $usuario) {
        $vendedor = $usuario->vendedor()->create([
            'cnpj' => $request->cnpj,
            'empresa' => $request->empresa,
        ]);

        return $vendedor;

    }

    public function storeTransportadora($request, $usuario) {
        $transportadora = $usuario->transportadora()->create([
            'empresa' => $request->empresa,
            'cnpj' => $request->cnpj,
            'administrador_id' => $request->cpf
        ]);

        return $transportadora;

    }

    public function storeAdministrador($request, $usuario) {
        $administrador = Administrador::create([
            'nome' => $request->nome,
            'tipo' => $request->tipo,
            'user_id' => $usuario->id
        ]);

        return $administrador;
    }
}
