<x-layout.dashboard class="monev">
    <div class="monev__container index">
        
        {{-- Index Header --}}
        <div class="index__header">
            
        </div>
        
        {{-- Index List --}}
        <div class="index__list">
            @foreach ($monevs as $monev)
                <div class="list__item">
                    <div class="item__text">
                        <h3 class="text__title">{{ $monev->name }}</h3>
                    </div>
                    <x-button type="link" href="{{ route('dashboard.monev.show', ['upps' => $upps, 'slug' => $monev->slug]) }}">Open</x-button>
                </div>
            @endforeach
        </div>    
        
    </div>
</x-layout.dashboard>