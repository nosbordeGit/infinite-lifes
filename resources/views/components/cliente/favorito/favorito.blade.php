@props(['favoritos'])
<div class="col-md-6 col-lg-12 order-md-last">
    <ul class="list-group mb-3">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">{{ __('Your favorites') }}</span>
            <span class="badge bg-primary rounded-pill">{{ $favoritos->count() }}</span>
        </h4>
        @foreach ($favoritos as $favorito)
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
                                    :value="'favorito'" />
                                <x-text-input id="favorito_id" class="block mt-1 w-full" type="hidden"
                                    name="favorito_id" :value="$favorito->id" />
                                <x-primary-button>{{ __('Order') }}</x-primary-button>
                            </form>
                        </div>

                        <div class="col-4">
                            <form action="{{ route('favorito.remover') }}" method="GET">
                                <x-text-input id="favorito_id" class="block mt-1 w-full" type="hidden"
                                    name="favorito_id" :value="$favorito->id" />
                                <x-danger-button>{{ __('Remove') }}</x-danger-button>
                            </form>
                        </div>
                    </div>
                </div>
                <span class="text-body-secondary">R${{ $favorito->livro->valor }}</span>
            </li>
        @endforeach
        <li class="list-group-item d-flex justify-content-between">
            <span>Total (Real)</span>
            <strong>R${{ $favoritos->sum(function ($favorito) {
                return $favorito->livro->valor;
            }) }}</strong>
        </li>

        <div class="row mt-4">
            <div class="col-4">
                <form action="{{ route('pedido.formulario') }}" method="get">
                    <x-text-input id="tipo_id" class="block mt-1 w-full" type="hidden" name="tipo_id"
                        :value="'favoritos'" />
                    <x-text-input id="cliente_id" class="block mt-1 w-full" type="hidden" name="cliente_id"
                        :value="$favorito->cliente->id" />
                    <x-primary-button>{{ __('Order') }}</x-primary-button>
                </form>
            </div>

            <div class="col-4">
                <form action="{{ route('favorito.remover') }}" method="GET">
                    <x-danger-button>{{ __('Remove') }}</x-danger-button>
                </form>
            </div>
        </div>
    </ul>
</div>
