<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //Validando tipo de usuario
        if ($request->input('tipoUsuario') == 'vendedor') {
            $request->validate([
                'empresa' => ['required', 'string', 'max:100'],
                'cnpj' => ['required', 'string', 'max:19', 'regex:/^[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}$/'],
            ]);
        } else {
            $date = Carbon::now()->subYear(17);
            $request->validate([
                'nome' => ['required', 'string', 'max:50'],
                'sobrenome' => ['required', 'string', 'max:50'],
                'cpf' => ['required', 'string', 'max:15', 'regex:/^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/'],
                'data_nascimento' => ['required', 'date', 'before_or_equal:' .$date],
            ]);
        }

        //Validando usuario
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'telefone' => ['required', 'string', 'max:17', 'regex:/^[0-9]{2} [0-9]{2} [0-9]{5}-[0-9]{4}$/'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        //Validando o endereco
        $request->validate([
            'cep' => ['required', 'string', 'max:10', 'regex:/^[0-9]{5}-[0-9]{3}$/'],
            'pais' => ['required', 'string', 'max:90'],
            'estado' => ['required', 'string', 'max:90'],
            'cidade' => ['required', 'string', 'max:90'],
            'bairro' => ['required', 'string', 'max:90'],
            'endereco' => ['required', 'string', 'max:90'],
            'complemento' => ['nullable', 'string'],
        ]);

        $user = User::create([
            'telefone' => $request->telefone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $endereco = $user->endereco()->create([
            'cep' => $request->cep,
            'pais' => $request->pais,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'bairro' => $request->bairro,
            'endereco' => $request->endereco,
            'complemento' => $request->complemento,
        ]);

        if($request->input('tipoUsuario') == 'vendedor'){
            $vendedor = $user->vendedor()->create([
                'cnpj' => $request->cnpj,
                'empresa' => $request->empresa,
            ]);
        }else{
            $cliente = $user->cliente()->create([
                'nome' => $request->nome,
                'sobrenome' => $request->sobrenome,
                'cpf' => $request->cpf,
                'data_nascimento' => $request->data_nascimento,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
