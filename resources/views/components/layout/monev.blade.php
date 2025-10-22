<x-layout.dashboard class="monev">
    
    {{-- Monev Navigation --}}
    <x-navigation.monev />
    
    {{-- Monev Section --}}
    <div class="monev__container two-section">
        
        {{-- Two Section Header --}}
        <div class="two-section__header">
            <i class="header__icon fa-solid fa-clipboard-list"></i>
            <div class="header__right">
                <h1 class="header__title">{{ $title }}</h1>
                <h4 class="header__subtitle">{{ $subtitle }}</h4>
            </div>
        </div>
    
        {{-- Two Section Content --}}
        <div class="two-section__content{{ $class }}">
            {{ $slot }}
        </div>
        
    </div>
</x-layout.dashboard>