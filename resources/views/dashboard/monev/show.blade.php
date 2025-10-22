<x-layout.monev title="{{ $monev->name }}" subtitle="{{ $programStudi->name }}">
    
    <a class="monev__redirect" href="{{ route('dashboard.monev.index', compact('upps', 'programStudi', 'periode')) }}"><div class="fa-solid fa-angle-left"></div>Back</a>
    
    @livewire('dashboard.monev.read', ['upps' => $upps, 'programStudi' => $programStudi, 'periode' => $periode, 'slug' => $monev->slug])
    
</x-layout.monev>