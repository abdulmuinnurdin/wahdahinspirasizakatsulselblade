@props([
    'id' => 'modal-' . Str::random(6),
    'title' => null,
    'footer' => null,
    'size' => null,
])

<div {{ $attributes->merge(['class' => 'modal fade', 'id' => $id, 'tabindex' => '-1', 'role' => 'dialog']) }}>
    <div class="modal-dialog{{ $size ? ' ' . $size : '' }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @if($title)<h4 class="modal-title">{{ $title }}</h4>@endif
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            @if($footer)
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
