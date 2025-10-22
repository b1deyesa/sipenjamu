<x-layout.spmi class="two-section">
    
    {{-- Header --}}
    <div class="two-section__header">
        <img src="{{ asset('assets/img/ambon-island.png') }}">
        <i class="header__icon fa-solid fa-clipboard-list"></i>
        <div class="header__right">
            <h1 class="header__title">{{ $title }}</h1>
            <h4 class="header__subtitle">{{ $subtitle }}</h4>
        </div>
    </div>

    {{-- Content --}}
    <div class="two-section__content{{ $class }}">
        {{ $slot }}
    </div>
    
</x-layout.spmi>