@props(['livro'])
<div class="container">
    <div class="row mt-4">

        <div class="col-8">
            <div>
                <img src="/imagem/livros/{{ $livro->imagem }}" alt="{{ $livro->tipo }}" class="img-fluid">
            </div>

            <div class="row mt-2">
                <div class="col-4">
                    @php
                        if (Auth::check() && Auth::user()->cliente) {
                            $cliente = Auth::user()->cliente;
                            $carrinho = $cliente->carrinhos->firstWhere('status', 1);
                            if ($carrinho != null) {
                                $temNoCarrinho = $carrinho
                                    ->livros()
                                    ->where('livro_id', $livro->id)
                                    ->first();
                            } else {
                                $temNoCarrinho = null;
                            }

                            $favorito = $cliente->favoritos->firstWhere('livro_id', $livro->id);
                            //dd($favorito);
                        } else {
                            $temNoCarrinho = null;
                            $favorito = null;
                        }
                    @endphp

                    @if ($temNoCarrinho == null)
                        @if ($livro->estoque > 0)
                            <form action="{{ route('carrinho.adicionar') }}" method="post">
                                @csrf
                                <x-text-input id="livro_id" class="block mt-1 w-full" type="hidden" name="livro_id"
                                    :value="$livro->id" />
                                <x-primary-button>{{ __('Add') }}</x-primary-button>
                            </form>
                        @else
                            <x-primary-button disabled>{{ __('Sold out') }}</x-primary-button>
                        @endif
                    @else
                        <form action="{{ route('carrinho.remover') }}" method="GET">
                            @csrf
                            <x-text-input id="carrinho_id" class="block mt-1 w-full" type="hidden" name="carrinho_id"
                                :value="$carrinho->id" />
                            <x-text-input id="livro_id" class="block mt-1 w-full" type="hidden" name="livro_id"
                                :value="$livro->id" />
                            <x-danger-button>{{ __('Remove') }}</x-danger-button>
                        </form>
                    @endif
                </div>
                <div class="col-4">
                    @if ($favorito == null)
                        <form action="{{ route('favorito.adicionar') }}" method="POST">
                            @csrf
                            <x-text-input id="livro_id" class="block mt-1 w-full" type="hidden" name="livro_id"
                                :value="$livro->id" />
                            <x-primary-button>{{ __('Favorite') }}</x-primary-button>
                        </form>
                    @else
                        <form action="{{ route('favorito.remover') }}" method="GET">
                            <x-text-input id="favorito_id" class="block mt-1 w-full" type="hidden" name="favorito_id"
                                :value="$favorito->id" />
                            <x-danger-button>{{ __('Unfavorite') }}</x-danger-button>
                        </form>
                    @endif
                </div>
                <div class="col-4">
                    <form action="{{ route('pedido.formulario') }}" method="GET">
                        @csrf
                        <x-text-input id="tipo_id" class="block mt-1 w-full" type="hidden" name="tipo_id"
                            :value="'livro'" />
                        <x-text-input id="livro_id" class="block mt-1 w-full" type="hidden" name="livro_id"
                            :value="$livro->id" />
                        <x-primary-button>{{ __('Order') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div>
                <h2 class="mb-3 card-title"><strong>{{ $livro->titulo }}</strong></h2>
                <p class="card-text"><strong>{{ __('Author') }}:</strong> {{ $livro->autor }}</p>
                <p class="card-text"><strong>{{ __('Amount of Pages') }}:</strong> {{ $livro->quantidade_paginas }}
                </p>
                <p class="card-text"><strong>{{ __('Edition') }}:</strong> {{ $livro->edicao }}</p>
                <p class="card-text"><strong>{{ __('Language') }}:</strong> {{ $livro->idioma }}</p>
                <p class="card-text"><strong>{{ __('Type') }}:</strong> {{ $livro->genero->genero }}</p>
                <p class="card-text"><strong>{{ __('Recommended for') }}:</strong> +{{ $livro->idade }}
                    {{ __('years') }}</p>
                <p class="card-text"><strong>{{ __('Publisher') }}:</strong> {{ $livro->editora }}</p>
                <p class="card-text"><strong>{{ __('ISBN13') }}:</strong> {{ $livro->isbn13 }}</p>
                <p class="card-text"><strong>{{ __('Dimension') }}:</strong> {{ $livro->dimensao }}</p>
                <p class="card-text"><strong>{{ __('Date of publication') }}:</strong> {{ $livro->data_publicacao }}
                </p>
                <p class="card-text"><strong>{{ __('Amount') }}:</strong> {{ $livro->estoque }}</p>
            </div>
            <div class="mt-2">
                <h3><strong>{{ __('About') }}</strong></h3>
                <p><span>{{ $livro?->resumo }}</span></p>
            </div>
            <div class="mt-2">
                <h3><strong>{{ __('About of Vendor') }}</strong></h3>
                <p><strong>{{ __('Name') }}:</strong> {{ $livro->vendedor?->empresa }}</p>
                <p><strong>{{ __('Email Address') }}:</strong> {{ $livro->vendedor->usuario?->email }}</p>
                <p><strong>{{ __('Phone Number') }}:</strong> {{ $livro->vendedor->usuario?->telefone }}</p>
            </div>
            <div class="mt-2">
                <h3><strong>{{ __('Address of Vendor') }}</strong></h3>
                <p><strong>{{ __('CEP') }}:</strong> {{ $livro->vendedor->usuario?->endereco?->cep }}</p>
                <p><strong>{{ __('endereco.Country') }}:</strong> {{ $livro->vendedor->usuario?->endereco?->pais }}
                </p>
                <p><strong>{{ __('endereco.State') }}:</strong> {{ $livro->vendedor->usuario?->endereco?->estado }}
                </p>
                <p><strong>{{ __('endereco.City') }}:</strong> {{ $livro->vendedor->usuario?->endereco?->cidade }}</p>
                <p><strong>{{ __('endereco.Neighborhood') }}:</strong>
                    {{ $livro->vendedor->usuario?->endereco?->bairro }}
                </p>
                <p><strong>{{ __('endereco.Address') }}:</strong
                        {{ $livro->vendedor->usuario?->endereco?->endereco }}></p>
            </div>
        </div>

    </div>

    <div class="border-bottom border-light-subtle">
        <h5><strong>{{ __('Comments') }}</strong></h5>
    </div>
</div>
