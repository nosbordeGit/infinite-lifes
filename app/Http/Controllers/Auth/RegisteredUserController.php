<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
                'company' => ['required', 'string', 'max:100'],
                'cnpj' => ['required', 'string', 'max:19', 'regex:/^[0-9]{2}.[0-9]{3}.[0-9]{3}/[0-9]{4}-[0-9]{2}$/']
            ]);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:50'],
                'lastname' => ['required', 'string', 'max:50'],
                'cpf' => ['required', 'string', 'max:50', 'regex:/^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/'],
                'birthday' => ['required', 'date'],
            ]);
        }

        //Validando usuario
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'string', 'max:17', 'regex:/^[0-9]{2} [0-9]{2} [0-9]{5}-{0-9}{4}$/'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        //Validando o endereco

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
