<x-layout.dashboard class="monev">
    <div class="monev__container two-section">
        
        {{-- Two Section Header --}}
        <div class="two-section__header">
            <i class="header__icon fa-solid fa-clipboard-list"></i>
            <div class="header__right">
                <h1 class="header__title">{{ $monev->name }}</h1>
                <h4 class="header__subtitle">{{ $upps->name }}</h4>
            </div>
        </div>
    
        {{-- Two Section Content --}}
        <div class="two-section__content">
            @livewire('dashboard.monev.read', ['slug' => $monev->slug, 'upps' => $upps])
        </div>
        
    </div>
</x-layout.dashboard>