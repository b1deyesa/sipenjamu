<x-layout.dashboard class="admin">
    
    {{-- Admin Navigation --}}
    <x-navigation.admin />
    
    
    {{-- Admin Section --}}
    <section class="admin__content{{ $class }}">
        
        {{-- Two Section Header --}}
        <div class="two-section__header">
            <img src="{{ asset('assets/img/ambon-island.png') }}">
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
        
    </section>
    
</x-layout.dashboard>