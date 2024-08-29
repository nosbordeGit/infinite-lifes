@props(['feedbacks'])
<div class="col-md-6 col-lg-12 order-md-last">
    <ul class="list-group mb-3">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            @if (Auth::user()->administrador)
                <span class="text-primary">{{ __('Feedbacks') }}</span>
            @else
                <span class="text-primary">{{ __('Your feedbacks') }}</span>
            @endif
            <span class="badge bg-primary rounded-pill">{{ $feedbacks->count() }}</span>
        </h4>
        @foreach ($feedbacks as $feedback)
            <li class="list-group-item d-flex justify-content-between lh-sm mt-1">
                <div>
                    <h6 class="my-0">{{ $feedback->titulo }}</h6>
                    <small class="text-body-secondary">{{ __('Email Address') }}:
                        {{ $feedback->usuario?->email }}</small>
                    <small class="text-body-secondary">{{ __('Created on') }}:
                        {{ $feedback->created_at }}</small>
                    <small class="text-body-secondary">{{ __('Updated on') }}:
                        {{ $feedback->updated_at }}</small>

                    <div class="col-4">
                        <form action="{{}}" method="GET">
                            <x-text-input id="feedback_id" class="block mt-1 w-full" type="hidden" name="feedback_id"
                                :value="$feedback->id" />
                            <x-primary-button>{{ __('Open') }}</x-primary-button>
                        </form>
                    </div>
                </div>
                <span class="text-body-secondary">{{ __('Status') }}: {{ $feedback->status }}</span>
            </li>
        @endforeach
    </ul>
</div>
