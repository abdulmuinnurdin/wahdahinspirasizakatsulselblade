@props(['variant' => 'default'])

<span {{ $attributes->merge(['class' => 'label label-' . $variant]) }}>{{ $slot }}</span>
