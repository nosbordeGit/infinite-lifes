@props(['modalId'])

<!-- Depuração -->
@if(isset($modalId))
    <div style="color: green;">modalId está definido: {{ $modalId }}</div>
@else
    <div style="color: red;">Erro: modalId não está definido!</div>
@endif

<div class="modal fade" id="baseModal{{ $modalId }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="baseModall{{ $modalId }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="baseModall{{ $modalId }}Label">{{ $titulo }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $corpo }}
            </div>
            <div class="modal-footer">
                {{ $footer }}
                <x-primary-button type="button" data-bs-dismiss="modal">{{ __('Close') }}</x-primary-button>
            </div>
        </div>
    </div>
</div>
