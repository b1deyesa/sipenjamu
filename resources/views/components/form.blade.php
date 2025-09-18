<form 
    class="form{{ $class }}"
    action="{{ $action }}"
    method="{{ $method }}"
    @if($wire) wire:submit="{{ $wire }}" @endif
    @if($enctype) enctype="{{ $enctype }}" @endif
    {{ $attributes }}
    >
    @csrf
    @if ($method_name)
        @method($method_name)
    @endif
    {{ $slot }}
    @if ($bottom)
        <div class="form__bottom">
            {{ $bottom }}
        </div>
    @endif
</form>