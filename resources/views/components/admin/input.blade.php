@props([
    'name' => null,
    'label' => null,
    'type' => 'text',
    'value' => null,
    'placeholder' => null,
    'icon' => null,
    'help' => null,
])

<div class="form-group">
    @if($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif

    @if($icon)
        <div class="input-group">
            <span class="input-group-addon"><i class="{{ $icon }}"></i></span>
            <input
                type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $name }}"
                value="{{ old($name, $value) }}"
                placeholder="{{ $placeholder }}"
                {{ $attributes->merge(['class' => 'form-control']) }}
            >
        </div>
    @else
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name, $value) }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes->merge(['class' => 'form-control']) }}
        >
    @endif

    @if($help)
        <span class="help-block">{{ $help }}</span>
    @endif

    @if(isset($errors) && $errors->has($name))
        <span class="help-block text-danger">{{ $errors->first($name) }}</span>
    @endif
</div>
