<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feedbacks') }}
        </h2>
    </x-slot>

    @if (!Auth::user()->administrador)
        <div class="row mt-4">
            <div class="col-3">
                <form action="{{ route('cartao.formulario') }}" method="get">
                    <x-primary-button class="ms-3">
                        {{ __('Add') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    @endif

    <div class="container mt-3">
        @if ($feedbacks->isNotEmpty())
            <x-usuarios.feedback.index :feedbacks="$feedbacks"></x-usuarios.feedback.index>
        @else
            <x-h1 class="mt-5">{{ __('No feedbacks found') }}</x-h1>
        @endif
    </div>
</x-app-layout>
