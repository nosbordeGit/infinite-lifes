<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order') }}
        </h2>
    </x-slot>

    <div class="container">
        <x-pedido.pedido :pedido="$pedido"></x-pedido.pedido>
        <form action="{{ route('pedido.index') }}" method="get">
            <x-primary-button>{{ __('Back') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
