<x-app-layout>
    <div class="container">
        <x-vendedor.estoque.formulario.base :generos="$generos" :dimensoes="$dimensoes">
            <x-slot name="formulario">
            <x-vendedor.estoque.formulario.atualizar :generos="$generos" :dimensoes="$dimensoes" :livro="$livro"></x-vendedor.estoque.formulario.atualizar>
            </x-slot>
        </x-vendedor.estoque.formulario.base>
    </div>
</x-app-layout>
