@props([
    'title' => null,
    'icon' => null,
    'footer' => null,
])

<div {{ $attributes->merge(['class' => 'panel panel-bd']) }}>
    @if($title)
        <div class="panel-heading">
            <div class="panel-title">
                @if($icon)<i class="{{ $icon }}"></i>@endif
                <h4>{{ $title }}</h4>
            </div>
        </div>
    @endif

    <div class="panel-body">
        {{ $slot }}
    </div>

    @if($footer)
        <div class="panel-footer">
            {{ $footer }}
        </div>
    @endif
</div>
