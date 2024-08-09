<x-app-layout>
    <div class="row mt-4">
        <div class="col-3">
            <form action="{{ route('cartao.formulario') }}" method="get">
                <x-primary-button class="ms-3">
                    {{ __('Add') }}
                </x-primary-button>
            </form>
        </div>

        <div class="col-8">
            <x-h1>{{ __('Registered Cards') }}</x-h1>
        </div>
    </div>

    @if ($cartoes->isNotEmpty())
        <div class="container">
            <div class="row">
                @foreach ($cartoes as $cartao)
                    <div class="col-md-5">
                        <x-cartao.base>
                            <x-slot name="tipo">
                                <h5 class="card-title">{{ $cartao->tipo }}</h5>
                            </x-slot>

                            <x-slot name="numero">
                                <h5 class="card-title">{{ $cartao->numero }}</h5>
                            </x-slot>

                            <x-slot name="cvc">
                                <p class="card-text"><strong>{{ __('CVC') }}: </strong>{{ $cartao->cvc }}</p>
                            </x-slot>

                            <x-slot name="validade">
                                <p class="card-text"><strong>{{ __('Validate') }}: </strong>{{ $cartao->validade }}</p>
                            </x-slot>
                        </x-cartao.base>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal">
            {{ __('Update') }}
        </button>
    @else
        <x-h1 class="mt-5">{{ __('No registered cards found') }}</x-h1>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
