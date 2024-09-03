<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order') }}
        </h2>
    </x-slot>

    <div class="container">
        <x-pedido.pedido :pedido="$pedido"></x-pedido.pedido>
    </div>
</x-app-layout>
