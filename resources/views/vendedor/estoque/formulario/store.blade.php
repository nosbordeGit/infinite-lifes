<x-app-layout>
    <div class="container">
        <x-vendedor.estoque.formulario.base :generos="$generos" :dimensoes="$dimensoes">
            <x-slot name="formulario">
            <x-vendedor.estoque.formulario.store :generos="$generos" :dimensoes="$dimensoes"></x-vendedor.estoque.formulario.store>
            </x-slot>
        </x-vendedor.estoque.formulario.base>
    </div>
</x-app-layout>
