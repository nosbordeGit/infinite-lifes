<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>
    <div class="container">
        <x-livro.livro_informacoes :livro="$livro">
            <x-slot name="botoes">
                <div class="col-5">
                    <form action="{{ route('carrinho.adicionar') }}" method="post">
                        @csrf
                        <x-text-input id="livro_id" class="block mt-1 w-full" type="hidden" name="livro_id"
                            :value="$livro->id" />
                        <x-primary-button>{{ __('Alter') }}</x-primary-button>
                    </form>
                </div>
                <div class="col-5">
                    <form action="{{ route('livro.deletar', $livro->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <x-danger-button>{{ __('Delete') }}</x-danger-button>
                    </form>
                </div>
            </x-slot>
        </x-livro.livro_informacoes>
    </div>
</x-app-layout>
