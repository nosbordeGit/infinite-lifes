@props(['endereco'])

<div>
    <h2 class="mt-4 mb-3 text-center text-primary">{{ __('endereco.Delivery Address') }}</h2>
    <div class="row">
        <div class="col-md-6 mb-3">
            <strong for="cep" class="form-label">{{ __('endereco.Country') }}: </strong>
            <label for="cep" class="form-label">{{ $endereco?->pais }}</label>
        </div>

        <div class="col-md-6 mb-3">
            <strong for="neighborhood" class="form-label">{{ __('endereco.State') }}: </strong>
            <label for="cep" class="form-label">{{  $endereco?->estado }}</label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <strong for="state" class="form-label">{{ __('endereco.City') }}: </strong>
            <label for="cep" class="form-label">{{  $endereco?->cidade }}</label>
        </div>

        <div class="col-md-6 mb-3">
            <strong for="city" class="form-label">{{ __('endereco.Neighborhood') }}: </strong>
            <label for="cep" class="form-label">{{  $endereco?->bairro }}</label>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <strong for="cep" class="form-label">{{ __('endereco.Address') }}: </strong>
            <label for="n_house" class="form-label">{{ $endereco?->endereco }}</label>
        </div>

        <div class="col-md-6 mb-3">
            <strong for="cep" class="form-label">{{ __('Complement') }}: </strong>
            <label for="complement" class="form-label">{{ $endereco?->complemento }}</label>
        </div>
    </div>
</div>
