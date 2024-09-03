<x-app-layout>
    <div class="container">
        <x-livro.livro_informacoes :livro="$livro"></x-livro.livro_informacoes>
        <div class="border-bottom border-light-subtle">
            <h5><strong>{{ __('Comments') }}</strong></h5>
        </div>
        @if ($comentarios->isNotEmpty())
            <x-livro.comentario :comentarios="$comentarios"></x-livro.comentario>
        @endif
    </div>
</x-app-layout>
