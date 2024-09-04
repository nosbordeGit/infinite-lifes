@props(['comentarios'])
<div class="col-md-6 col-lg-12 order-md-last">
    <ul class="list-group mt-3">
        @foreach ($comentarios as $comentario)
            <li class="list-group-item d-flex justify-content-between lh-sm mb-3">
                <div>
                    <p class="text-body-secondary">{{ $comentario->cliente->nome }}
                        {{ $comentario->cliente->sobrenome }}</p>
                    <p class="text-body-secondary">{{ $comentario->corpo }}</p>
                    <small class="text-body-secondary">{{ $comentario->updated_at }}</small>

                    @if (Auth::check() && Auth::user()->cliente && $comentario->cliente_id == Auth::user()->cliente->id)
                        <div class="row mt-2">
                            <div class="col-4 mr-3">
                                <x-primary-button type="button"  data-bs-toggle="modal" data-bs-target="#baseModal">{{ __('Alter') }}</x-primary-button>
                                </form>
                            </div>

                            <div class="col-4">
                                <form action="{{ route('comentario.deletar', $comentario->id) }}"
                                    method="post">
                                    @csrf
                                    <x-danger-button>{{ __('Delete') }}</x-danger-button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>


<!-- Modal Atualizar Comments -->
<x-modal.baseScroll :modal-id="$comentario->id">
    <x-slot name="titulo">{{ __('Feedback Open') }}</x-slot>
    <x-slot name="corpo">
        <div class="mt-4">
            <x-input-label for="corpo" value="{{ $comentario->corpo }}" />
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-primary-button>{{ __('Alter') }}</x-primary-button>
    </x-slot>
</x-modal.baseScroll>
