@props(['favorito'])

<div class="col-md-6 col-lg-12 order-md-last">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-primary">{{ __('Your cart') }}</span>
        <span class="badge bg-primary rounded-pill">{{ $favorito->count() }}</span>
    </h4>
    <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
                <h6 class="my-0">{{ $favorito->livro->titulo }}</h6>
                <small class="text-body-secondary">Idioma: {{ $favorito->livro->idioma }}</small>
                <small class="text-body-secondary">Edição: {{ $favorito->livro->edicao }}</small>
                <small class="text-body-secondary">Vendedor: {{ $favorito->livro->vendedor->empresa }}</small>
                <div class="row">
                    <div class="col-4">
                        <form action="{{ route('pedido.formulario') }}" method="GET">
                            <x-text-input id="tipo_id" class="block mt-1 w-full" type="hidden" name="tipo_id"
                                :value="'livro'" />
                            <x-text-input id="livro_id" class="block mt-1 w-full" type="hidden" name="livro_id"
                                :value="$favorito->id" />
                            <x-primary-button>{{ __('Order') }}</x-primary-button>
                        </form>
                    </div>

                    <div class="col-4">
                        <form action="{{ route('favorito.remover') }}" method="GET">
                            <x-text-input id="favorito_id" class="block mt-1 w-full" type="hidden" name="favorito_id"
                                :value="$favorito->id" />
                            <x-text-input id="livro_id" class="block mt-1 w-full" type="hidden" name="livro_id"
                                :value="$favorito->id" />
                            <x-danger-button>{{ __('Remove') }}</x-danger-button>
                        </form>
                    </div>
                </div>
            </div>
            <span class="text-body-secondary">R${{ $favorito->livro->valor }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
            <span>Total (Real)</span>
            <strong>R${{ $favorito->sum('valor') }}</strong>
        </li>

        <form action="{{ route('pedido.formulario') }}" method="get">
            <x-text-input id="tipo_id" class="block mt-1 w-full" type="hidden" name="tipo_id" :value="'favorito'" />
            <x-text-input id="id" class="block mt-1 w-full" type="hidden" name="id" :value="$favorito->id" />
            <x-primary-button class="mt-3">{{ __('Order') }}</x-primary-button>
        </form>
    </ul>
</div>
