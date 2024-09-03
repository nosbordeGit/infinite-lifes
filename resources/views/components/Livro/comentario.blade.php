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
                    @php
                        if (Auth::check() && Auth::user()->cliente) {
                            $comentario = Auth::user()
                                ->cliente->comentarios->firstWhere('id', $comentario->id)
                                ->first();
                            dd($comentario);
                        } else {
                            $comentario = null;
                        }
                    @endphp

                    @if ($comentario != null)
                        <div class="row mt-2">
                            <div class="col-4">
                                <form action="" method="GET">
                                    <x-text-input id="comentario_id" class="block mt-1 w-full" type="hidden"
                                        name="comentario_id" :value="$comentario->id" />
                                    <x-primary-button>{{ __('Alter') }}</x-primary-button>
                                </form>
                            </div>

                            <div class="col-4">
                                <form action="" method="GET">
                                    <x-text-input id="comentario_id" class="block mt-1 w-full" type="hidden"
                                        name="comentario_id" :value="$comentario->id" />
                                    <x-danger-button>{{ __('Remove') }}</x-danger-button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
