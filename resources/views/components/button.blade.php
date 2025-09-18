@switch($type)
    @case('link')
        <a class="button{{ $class }}" href="{{ $href }}">{{ $slot }}</a>
        @break
    @default
        <button
            class="button{{ $class }}"
            type="{{ $type }}"
            @if($wire) wire:click="{{ $wire }}" @endif
            @if($id) id="{{ $id }}" @endif
            {{ $attributes }}
            >{{ $slot }}</button>
@endswitch