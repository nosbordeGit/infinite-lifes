<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sales') }}
        </h2>
    </x-slot>

    <div class="container">
        {!! $vendasChart->container() !!}
        {!! $vendasChart->script() !!}

    </div>
</x-app-layout>
