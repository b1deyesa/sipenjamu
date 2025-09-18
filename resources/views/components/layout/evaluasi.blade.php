<x-layout.two-section class="evaluasi" title="Evaluasi" subtitle="{{ $subtitle }}">
    
    {{-- Evaluasi Navigation --}}
    <x-navigation.evaluasi :upps="$upps" />
    
    {{-- Evaluasi Content --}}
    <section class="evaluasi__content{{ $class }}">
        {{ $slot }}
    </section>
    
</x-layout.two-section>