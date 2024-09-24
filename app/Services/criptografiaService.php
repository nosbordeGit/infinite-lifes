<?php

namespace App\Services;

use Illuminate\Support\Facades\Crypt;

class criptografiaService
{

    function criptografarCartao($request)
    {
        $numero = Crypt::encryptString($request->numero);
        $validade = Crypt::encryptString($request->validade);

        $request->merge(['numero' => $numero, 'validade' => $validade]);
        return $request;
    }

    public function descriptografarCartao($request){
        $numero_descriptografado = Crypt::decryptString($request->numero);
        $numero_descriptografado = substr_replace($numero_descriptografado, ' **** **** ', 4, -4);
        $validade_descriptografada = Crypt::decryptString($request->validade);
        $request->numero = $numero_descriptografado;
        $request->validade = $validade_descriptografada;

        return;
    }

    public function criptografarCpf($cpf)  {
        $cpf = Crypt::encryptString($cpf);
        return $cpf;
    }

    public function descriptografarCpf($request)  {
        $cpf_descriptografado = Crypt::decryptString($request->cpf);
        $cpf_descriptografado = substr_replace($cpf_descriptografado, ' ***.***.', 6, -6);
        $request->cpf = $cpf_descriptografado;

        return;
    }

    public function criptografarCnpj($cnpj)  {
        $cnpj = Crypt::encryptString($cnpj);
        return $cnpj;
    }

    public function descriptografarCnpj($request)  {
        $cnpj_descriptografado = Crypt::decryptString($request->cnpj);
        $cnpj_descriptografado = substr_replace($cnpj_descriptografado, ' **.***.***', 8, -8);
        $request->cpf = $cnpj_descriptografado;

        return;
    }
}
