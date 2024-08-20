@props(['livro'])
<div class="container">
    <div class="row mt-4">

        <div class="col-8">
            <div>
                <img src="/imagem/livros/{{ $livro->imagem }}" alt="{{ $livro->tipo }}" class="img-fluid">
            </div>

            <div class="row mt-2">
                <div class="col-6">
                    @php
                        if (Auth::check() && Auth::user()->cliente) {
                            $cliente = Auth::user()->cliente;
                            $carrinho = $cliente->carrinhos->firstWhere('status', 1);
                            $temNoCarrinho = $carrinho->livros->first();
                            //dd($carrinho, $temNoCarrinho);
                        } else {
                            dd('n ta logado');
                            $temNoCarrinho = null;
                        }

                    @endphp

                    @if ($temNoCarrinho == null)
                        @if ($livro->estoque > 0)
                            <form action="{{ route('carrinho.adicionar') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $livro->id }}" name="livro_id">
                                <x-primary-button>{{ __('Add') }}</x-primary-button>
                            </form>
                        @else
                            <x-primary-button disabled>{{ __('Sold out') }}</x-primary-button>
                        @endif
                    @else
                        <form action="{{ route('carrinho.remover') }}" method="GET">
                            @csrf
                            <input type="hidden" value="{{ $livro->id }}" name="livro_id">
                            <x-danger-button>{{ __('Remove') }}</x-danger-button>

                        </form>
                    @endif
                </div>
                <div class="col-6">
                    <form action="{{ route('pedido.formulario') }}" method="GET">
                        @csrf
                        <input type="hidden" value="{{ $livro->id }}" name="livro_id">
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
                <p class="card-text"><strong>{{ __('Amount') }}:</strong> {{ $livro->quantidade }}</p>
            </div>
            <div class="mt-2">
                <h3><strong>{{ _('About') }}</strong></h3>
                <p><span>{{ $livro?->resumo }}</span></p>
            </div>
            <div class="mt-2">
                <h3><strong>{{ _('About of Vendor') }}</strong></h3>
                <p><strong>{{ __('Name') }}:</strong> {{ $livro->vendedor?->empresa }}</p>
                <p><strong>{{ __('Email Address') }}:</strong> {{ $livro->vendedor->usuario?->email }}</p>
                <p><strong>{{ __('Phone Number') }}:</strong> {{ $livro->vendedor->usuario?->telefone }}</p>
            </div>
            <div class="mt-2">
                <h3><strong>{{ _('Address of Vendor') }}</strong></h3>
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
