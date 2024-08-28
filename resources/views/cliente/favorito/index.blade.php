<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Favorites') }}
        </h2>
    </x-slot>

    <div class="container mt-3">
        @if ($favoritos->isNotEmpty())
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">{{ __('Your favorites') }}</span>
            <span class="badge bg-primary rounded-pill">{{ $favoritos->count() }}</span>
        </h4>
            @foreach ($favoritos as $favorito)
                <x-cliente.favorito.favorito :favorito="$favorito"></x-cliente.favorito.favorito>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
                <span>Total (Real)</span>
                <strong>R${{ $favorito->livro->sum('valor') }}</strong>
            </li>
        @else
            <x-h1 class="mt-5">{{ __('No favorites found') }}</x-h1>
        @endif
    </div>
</x-app-layout>
