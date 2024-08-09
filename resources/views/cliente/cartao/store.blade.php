<x-app-layout>
    <form method="POST" action="{{ route('cartao.store') }}">
        @csrf

        <x-cartao>
            <x-slot name="tipo">
                <x-input-label for="numero" :value="__('Number')" />
                <x-text-input id="numero" class="block mt-1 w-full" type="numero" name="numero" :value="old('numero')" required  autocomplete="numero"/>
                <x-input-error :messages="$errors->get('numero')" class="mt-2" />
            </x-slot>

            <x-slot name="numero"></x-slot>

            <x-slot name="cvc"></x-slot>

            <x-slot name="validade"></x-slot>

        </x-cartao>
        <div class="d-flex justify-content-center container mt-5">
            <div class="card card border border-dark-subtle shadow p-3 mb-5 col-md-5 bg-body-tertiary rounded">

                        <div class="card-body">
                            <label for="numero" class="form-label">{{ __('Número') }}</label>
                            <input type="text" class="form-control  @error('numero') is-invalid @enderror"
                                id="numero" name="numero" placeholder="3456.5432.7895.1210">

                            @error('numero')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="card-body">
                            <label for="tipo" class="form-label">{{ __('Tipo de Cartão') }}</label>
                            <select class="form-select" id="tipo" name="tipo">
                                <option value="Crédito">Crédito</option>
                                <option value="Débito">Débito</option>
                            </select>
                        </div>

                <div class="container mt-2">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="cvc" class="form-label">{{ __('CVC') }}</label>
                            <input type="text" class="form-control @error('cvc') is-invalid @enderror" id="cvc"
                                name="cvc" placeholder="345 ou 5467">

                            @error('cvc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-5">
                            <label for="validade" class="form-label">{{ __('Validade') }}</label>
                            <input type="date" class="form-control  @error('validade') is-invalid @enderror"
                                id="validade" name="validade">

                            @error('validade')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="d-flex justify-content-center container mt-1">
            <div class="d-grid gap-2 col-5 mx-auto shadow">
                <x-primary-button>Cadastrar</x-primary-button>
            </div>
        </div>

    </form>
</x-app-layout>
