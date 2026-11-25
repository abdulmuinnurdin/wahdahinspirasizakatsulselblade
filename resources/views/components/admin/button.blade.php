@props([
    'variant' => 'default',
    'size' => null,
    'type' => 'button',
    'href' => null,
    'icon' => null,
])

@php
    $classes = 'btn btn-' . $variant . ($size ? ' btn-' . $size : '');
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)<i class="{{ $icon }}"></i>@endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)<i class="{{ $icon }}"></i>@endif
        {{ $slot }}
    </button>
@endif
