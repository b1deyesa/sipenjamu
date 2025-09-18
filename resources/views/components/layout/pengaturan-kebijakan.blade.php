<x-layout.two-section class="pengaturan-kebijakan" title="Pengaturan Tentang Kebijakan SPMI" subtitle="{{ $subtitle }}">
    
    {{-- Pengaturan Kebijakan Navigation --}}
    <x-navigation.pengaturan-kebijakan :upps="$upps" />
    
    {{-- Pengaturan Kebijakan Content --}}
    <section class="pengaturan-kebijakan__content{{ $class }}">
        {{ $slot }}
    </section>
    
</x-layout.two-section>