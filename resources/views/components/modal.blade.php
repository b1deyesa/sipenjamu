<span x-data="{ open: {{ $open ? 'true' : 'false' }} }" style="line-height: 1">
    @if ($trigger)
        <span x-on:click="open = true">
            {{ $trigger }}
        </span>
    @else
        <x-button x-on:click="open = true">{{ $label }}</x-button>
    @endif
    <div class="modal{{ $class }}" x-show="open" x-cloak>
        <div class="modal__container" style="max-width: {{ $width }}">
            @if($close) <i class="modal__close fa-solid fa-xmark" x-on:click="open = false"></i> @endif
            @if ($title || $subtitle)
                <div class="modal__header">
                    @if ($title) <h4 class="header__title">{{ $title }}</h4> @endif
                    @if ($subtitle) <h4 class="header__subtitle">{{ $subtitle }}</h4> @endif
                </div>
                <hr class="modal__separator">
            @endif
            {{ $slot }}
            @if ($bottom)
                <div class="modal__bottom">
                    {{ $bottom }}
                </div>
            @endif
        </div>
    </div>
</span>