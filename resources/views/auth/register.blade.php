<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <x-h1 :value="__('Register')"></x-h1>

        <!-- Personal Information -->

        <div class="col-md-6-mb-3 mt-4">
            <x-input-label for="tipoUsuario" class="form-label" :value="__('Select type of user')" />
            <x-select class="form-select" id="tipoUsuario" name="tipoUsuario" onchange="showFields(this.value)">
                <option value="cliente">{{ __("Customer") }}</option>
                <option value="vendedor">{{ __("Vendor") }}</option>
            </x-select>
        </div>

        <!-- Cliente -->
        <div id="clienteFields" style="display: none">

            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="nome" :value="__('Name')" />
                <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')"
                     autofocus autocomplete="nome" />
                <x-input-error :messages="$errors->get('nome')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-input-label for="sobrenome" :value="__('Last Name')" />
                <x-text-input id="sobrenome" class="block mt-1 w-full" type="text" name="sobrenome" :value="old('sobrenome')"
                      autocomplete="sobrenome" />
                <x-input-error :messages="$errors->get('sobrenome')" class="mt-2" />
            </div>

            <!-- CPF -->
            <div class="mt-4">
                <x-input-label for="cpf" :value="__('CPF')" />
                <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')"
                      autocomplete="cpf" />
                <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
            </div>

            <!-- Birthday -->
            <div class="mt-4">
                <x-input-label for="data_nascimento" :value="__('Birthday')" />
                <x-text-input id="data_nascimento" class="block mt-1 w-full" type="date" name="data_nascimento" :value="old('data_nascimento')"
                      autocomplete="data_nascimento" />
                <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
            </div>
        </div>

        <!-- Vendedor -->
        <div id="vendedorFields" style="display: none">

            <!-- Company -->
            <div class="mt-4">
                <x-input-label for="empresa" :value="__('Company')" />
                <x-text-input id="empresa" class="block mt-1 w-full" type="text" name="empresa" :value="old('empresa')"
                      autocomplete="empresa" />
                <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
            </div>

            <!-- CNPJ -->
            <div class="mt-4">
                <x-input-label for="cnpj" :value="__('CNPJ')" />
                <x-text-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj" :value="old('cnpj')"
                      autocomplete="cnpj" />
                <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
            </div>
        </div>

        <!-- Contact -->

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                 autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="telefone" :value="__('Phone Number')" />
            <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')"
            autocomplete="telefone" />
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation"  autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Adddress -->

        <!-- CEP -->
        <div class="mt-4">
            <x-input-label for="cep" :value="__('CEP')" />
            <x-text-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')"
            autocomplete="cep" />
            <x-input-error :messages="$errors->get('cep')" class="mt-2" />
        </div>

        <!-- Country -->
        <div class="mt-4">
            <x-input-label for="pais" :value="__('endereco.Country')" />
            <x-text-input id="pais" class="block mt-1 w-full" type="text" name="pais" :value="old('pais')"
            autocomplete="pais" />
            <x-input-error :messages="$errors->get('pais')" class="mt-2" />
        </div>

        <!-- State -->
        <div class="mt-4">
            <x-input-label for="estado" :value="__('endereco.State')" />
            <x-text-input id="estado" class="block mt-1 w-full" type="text" name="estado" :value="old('estado')"
            autocomplete="estado" />
            <x-input-error :messages="$errors->get('estado')" class="mt-2" />
        </div>

        <!-- City -->
        <div class="mt-4">
            <x-input-label for="cidade" :value="__('endereco.City')" />
            <x-text-input id="cidade" class="block mt-1 w-full" type="text" name="cidade" :value="old('cidade')"
            autocomplete="cidade" />
            <x-input-error :messages="$errors->get('cidade')" class="mt-2" />
        </div>

        <!-- Neighborhood -->
        <div class="mt-4">
            <x-input-label for="bairro" :value="__('endereco.Neighborhood')" />
            <x-text-input id="bairro" class="block mt-1 w-full" type="text" name="bairro" :value="old('bairro')"
            autocomplete="bairro" />
            <x-input-error :messages="$errors->get('bairro')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="endereco" :value="__('endereco.Address')" />
            <x-text-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" :value="old('endereco')"
            autocomplete="endereco" />
            <x-input-error :messages="$errors->get('endereco')" class="mt-2" />
        </div>

        <!-- Complement -->
        <div class="mt-4">
            <x-input-label for="complemento" :value="__('Complement')" />
            <x-text-input id="complemento" class="block mt-1 w-full" type="text" name="complemento" :value="old('complemento')"
            autocomplete="complemento" />
            <x-input-error :messages="$errors->get('complemento')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <!-- Scrip para trocar tipo de usuario -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showFields(document.getElementById('tipoUsuario').value);
            });

            function showFields(tipoUsuario) {
                if (tipoUsuario === 'cliente') {
                    document.getElementById('clienteFields').style.display = 'block';
                    document.getElementById('vendedorFields').style.display = 'none';
                } else if (tipoUsuario === 'vendedor') {
                    document.getElementById('clienteFields').style.display = 'none';
                    document.getElementById('vendedorFields').style.display = 'block';
                } else {
                    document.getElementById('clienteFields').style.display = 'none';
                    document.getElementById('vendedorFields').style.display = 'none';
                }
            }
        </script>

    </form>
</x-guest-layout>
