@props(['value'])

<h1 {{ $attributes->merge(['class' => 'container text-center text-gray-700 text-xl']) }}>
    {{ $value ?? $slot }}
</h1>
