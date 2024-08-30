<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feedbacks') }}
        </h2>
    </x-slot>

    @if (!Auth::user()->administrador)
        <div class="row mt-4">
            <div class="col-3">
                <x-primary-button class="ms-3" type="button" data-bs-toggle="modal" data-bs-target="#baseModal">
                    {{ __('Add') }}
                </x-primary-button>
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

    <x-modal.baseScroll>
        <x-slot name="titulo"></x-slot>
        <x-slot name="corpo"></x-slot>
        <x-slot name="footer"></x-slot>
    </x-modal.baseScroll>
</x-app-layout>
