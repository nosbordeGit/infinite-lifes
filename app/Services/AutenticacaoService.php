<?php

namespace App\Services;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AutenticacaoService
{

    public function usuarioNormal(LoginRequest $request) : ?RedirectResponse {
        if (!Auth::user()->administrador) {
            $request->session()->regenerate();

            return redirect()->route('site');
        } else {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'These credentials were not found in our records.',
            ]);
        }
    }

    public function administrador(){}

}
