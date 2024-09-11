<div {{ $attributes->merge(['class' => 'mb-3 ml-4 mt-4']) }}>
    <div class="card border border-dark-subtle shadow p-3 mb-5 bg-body-tertiary rounded">
        <div class="card-body">
            <div class="d-flex justify-content-center">
                {{ $tipo }}
            </div>

            <div class="d-flex justify-content-center">
                {{ $numero }}
            </div>

            <div class="d-flex justify-content-center">
                {{ $validade }}
            </div>
        </div>
    </div>
</div>
