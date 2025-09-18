<x-layout.app class="dashboard">
    
    {{-- Dashboard Navigation --}}
    <x-navigation.dashboard :upps="$upps" />
    
    {{-- Dashboard Section --}}
    <section class="dashboard__content{{ $class }}">
        {{ $slot }}
    </section>
    
</x-layout.app>