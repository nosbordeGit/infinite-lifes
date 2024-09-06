<x-app-layout>
    <div class="container">
        <x-livro.livro_informacoes :livro="$livro"></x-livro.livro_informacoes>
        <div class="border-bottom border-light-subtle">
            <h5><strong>{{ __('Comments') }}</strong></h5>
        </div>

        <x-primary-button class="mt-1" type="button" data-bs-toggle="modal" data-bs-target="#storeModal">
            {{ __('Add') }}</x-primary-button>

        @if ($comentarios->isNotEmpty())
            <x-livro.comentario :comentarios="$comentarios"></x-livro.comentario>
        @endif
    </div>

    <!-- Modal Comments -->
    <form action="{{ route('comentario.store') }}" method="post">
        @csrf
        <x-modal.storeScroll>
            <x-slot name="titulo">{{ __('Store Comment') }}</x-slot>
            <x-slot name="corpo">
                <div>
                    <x-textarea id="corpo" class="block mt-1 w-full form-control" type="text" name="corpo"
                        required />
                    <x-input-error :messages="$errors->get('corpo')" class="mt-2" />
                </div>
                <x-text-input id="livro_id" class="block mt-1 w-full" type="hidden" name="livro_id" :value="$livro->id"
                    required />
            </x-slot>
            <x-slot name="footer">
                <x-primary-button>{{ __('Add') }}</x-primary-button>
            </x-slot>
        </x-modal.storeScroll>
    </form>
</x-app-layout>
