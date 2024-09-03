@props(['pedidos'])
<div class="col-md-6 col-lg-12 order-md-last">
    <ul class="list-group mb-3">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">{{ __('Your orders') }}</span>
            <span class="badge bg-primary rounded-pill">{{ $pedidos->count() }}</span>
        </h4>
        @foreach ($pedidos as $pedido)
            <li class="list-group-item d-flex justify-content-between lh-sm mt-1">
                <div>
                    <small class="text-body-secondary">{{ __('Status') }}: {{ $pedido->status }}</small>
                    <small class="text-body-secondary">{{ __('Carrier') }}: {{ $pedido->transportadora->empresa }}</small>
                    <div class="row">
                        <div class="col-4">
                            <form action="{{ route('pedido.pedido', ['id' => $pedido->id ]) }}" method="GET">
                                <x-primary-button>{{ __('Informations') }}</x-primary-button>
                            </form>
                        </div>
                    </div>
                </div>
                <span class="text-body-secondary">R${{ $pedido->valor }}</span>
            </li>
        @endforeach
    </ul>
</div>
