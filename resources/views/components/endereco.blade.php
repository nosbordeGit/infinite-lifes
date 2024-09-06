@props(['endereco'])

<div>
    <h2 class="mt-4 mb-3 text-center text-primary">{{ __('endereco.Address') }}</h2>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="cep" class="form-label">{{ __('endereco.Country') }}: </label>
            <label for="cep" class="form-label">{{ $endereco->pais }}</label>
        </div>

        <div class="col-md-6 mb-3">
            <label for="neighborhood" class="form-label">{{ __('endereco.State') }}: </label>
            <label for="cep" class="form-label">{{  $endereco->estado }}</label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="state" class="form-label">{{ __('endereco.City') }}: </label>
            <label for="cep" class="form-label">{{  $endereco->cidade }}</label>
        </div>

        <div class="col-md-6 mb-3">
            <label for="city" class="form-label">{{ __('endereco.Neighborhood') }}: </label>
            <label for="cep" class="form-label">{{  $endereco->bairro }}</label>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="cep" class="form-label">{{ __('endereco.Address') }}: </label>
            <label for="n_house" class="form-label">{{ $endereco->endereco }}</label>
        </div>

        <div class="col-md-6 mb-3">
            <label for="cep" class="form-label">{{ __('Complement') }}: </label>
            <label for="complement" class="form-label">{{ $endereco->complemento }}</label>
        </div>
    </div>
</div>
