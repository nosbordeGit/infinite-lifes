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
}
