<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Personal Information -->

        <div class="col-md-6-mb-3">
            <label for="tipoUsuario" class="form-label">Escolha o tipo de usuário:</label>
            <select class="form-select" id="tipoUsuario" name="tipoUsuario" onchange="showFields(this.value)">
                <option value="cliente">Cliente</option>
                <option value="vendedor">Vendedor</option>
            </select>
        </div>

        <!-- Cliente -->
        <div id="clienteFields" style="display: none">

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div>
                <x-input-label for="lastname" :value="__('Last Name')" />
                <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')"
                    required  autocomplete="lastname" />
                <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
            </div>

            <!-- CPF -->
            <div>
                <x-input-label for="cpf" :value="__('CPF')" />
                <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')"
                    required  autocomplete="cpf" />
                <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
            </div>

            <!-- Birthday -->
            <div>
                <x-input-label for="birthday" :value="__('Birthday')" />
                <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday')"
                    required  autocomplete="birthday" />
                <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
            </div>
        </div>

        <!-- Vendedor -->
        <div id="vendedorFields" style="display: none">

            <!-- Company -->
            <div>
                <x-input-label for="company" :value="__('Company')" />
                <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')"
                    required  autocomplete="company" />
                <x-input-error :messages="$errors->get('company')" class="mt-2" />
            </div>

            <!-- CNPJ -->
            <div>
                <x-input-label for="cnpj" :value="__('CNPJ')" />
                <x-text-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj" :value="old('cnpj')"
                    required  autocomplete="cnpj" />
                <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
            </div>
        </div>

        <!-- Contact -->

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone Number')" />
            <x-text-input id="phone" class="" type="text" name="phone" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Adddress -->

        <!-- CEP -->
        <div class="mt-4">
            <x-input-label for="cep" :value="__('CEP')" />
            <x-text-input id="cep" class="" type="text" name="cep" required />
            <x-input-error :messages="$errors->get('cep')" class="mt-2" />
        </div>

        <!-- Country -->
        <div class="mt-4">
            <x-input-label for="country" :value="__('Country')" />
            <x-text-input id="country" class="" type="text" name="country" required />
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>

        <!-- State -->
        <div class="mt-4">
            <x-input-label for="state" :value="__('State')" />
            <x-text-input id="state" class="" type="text" name="state" required />
            <x-input-error :messages="$errors->get('state')" class="mt-2" />
        </div>

        <!-- City -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" class="" type="text" name="city" required />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- Neighborhood -->
        <div class="mt-4">
            <x-input-label for="neighborhood" :value="__('Neighborhood')" />
            <x-text-input id="neighborhood" class="" type="text" name="neighborhood" required />
            <x-input-error :messages="$errors->get('neighborhood')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="" type="text" name="address" required />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Complement -->
        <div class="mt-4">
            <x-input-label for="complement" :value="__('Complement')" />
            <x-text-input id="complement" class="" type="text" name="complement" required />
            <x-input-error :messages="$errors->get('complent')" class="mt-2" />
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
