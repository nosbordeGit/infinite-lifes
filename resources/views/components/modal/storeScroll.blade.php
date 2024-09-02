<div class="modal fade" id="storeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="storeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="storeModalLabel">{{ $titulo }}</h1>
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
