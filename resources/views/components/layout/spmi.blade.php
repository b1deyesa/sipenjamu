<x-layout.dashboard class="spmi" :upps="$upps">
    
    {{-- SPMI Navigation --}}
    <x-navigation.spmi :upps="$upps" />
    
    {{-- SPMI Section --}}
    <section class="spmi__content{{ $class }}">
        {{ $slot }}
    </section>
    
</x-layout.dashboard>