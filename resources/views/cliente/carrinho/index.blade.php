<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="container mt-3">
                <x-carrinho :carrinho="$carrinho"></x-carrinho>
    </div>
</x-app-layout>
