<nav class="spmi__sidebar" x-data="{ showLabels: localStorage.getItem('spmiSidebar') === 'true' }" x-init="$watch('showLabels', val => localStorage.setItem('spmiSidebar', val))">
    
    {{-- Sidebar Toggle --}}
    <button class="sidebar__toggle" x-on:click="showLabels = false" x-show="showLabels"><i class="fa-solid fa-angles-left"></i></button>
    <button class="sidebar__toggle" x-on:click="showLabels = true" x-show="!showLabels"><i class="fa-solid fa-angles-right"></i></button>
    
    {{-- Sidebar Menu --}}
    <div class="sidebar__menu" :class="{ 'open': showLabels }">
        <a class="menu__item {{ request()->routeIs('dashboard.spmi.home') ? 'active' : '' }}" href="{{ route('dashboard.spmi.home', ['upps' => $upps, 'periode' => $periode]) }}"><i class="fa-solid fa-house"></i><span x-show="showLabels" x-transition>Home</span></a>
        <a class="menu__item {{ request()->routeIs('dashboard.spmi.profil') ? 'active' : '' }}" href="{{ route('dashboard.spmi.profil', ['upps' => $upps, 'periode' => $periode]) }}"><i class="fa-solid fa-building-user"></i><span x-show="showLabels" x-transition>Profil UPPS</span></a>
        <div class="menu__dropdown" x-data="{ open: {{ request()->routeIs('dashboard.spmi.penetapan.*') ? 'true' : 'false' }} }">
            <span class="dropdown__item {{ request()->routeIs('dashboard.spmi.penetapan.*') ? 'active' : '' }}" x-on:click="open = !open"><i class="fa-solid fa-clipboard-list"></i><span x-show="showLabels" x-transition>Penetapan</span></span>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.spmi.penetapan.kebijakan-spmi', ['upps' => $upps, 'periode' => $periode]) ? 'active' : '' }}" href="{{ route('dashboard.spmi.penetapan.kebijakan-spmi', ['upps' => $upps, 'periode' => $periode]) }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>Pengaturan Tentang Kebijakan SPMI</span></a>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.spmi.penetapan.standar-yang-ditetapkan-institusi', ['upps' => $upps, 'periode' => $periode]) ? 'active' : '' }}" href="{{ route('dashboard.spmi.penetapan.standar-yang-ditetapkan-institusi', ['upps' => $upps, 'periode' => $periode]) }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>Standar Yang Ditetapkan Institusi</span></a>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.spmi.penetapan.standar-lain', ['upps' => $upps, 'periode' => $periode]) ? 'active' : '' }}" href="{{ route('dashboard.spmi.penetapan.standar-lain', ['upps' => $upps, 'periode' => $periode]) }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>Standar Lain</span></a>
        </div>
        <a class="menu__item {{ request()->routeIs('dashboard.spmi.pelaksanaan') ? 'active' : '' }}" href="{{ route('dashboard.spmi.pelaksanaan', ['upps' => $upps, 'periode' => $periode]) }}"><i class="fa-solid fa-play-circle"></i><span x-show="showLabels" x-transition>Pelaksanaan</span></a>
        <a class="menu__item {{ request()->routeIs('dashboard.spmi.evaluasi.*') ? 'active' : '' }}" href="{{ route('dashboard.spmi.evaluasi.evaluasi-lain', ['upps' => $upps, 'periode' => $periode]) }}"><i class="fa-solid fa-magnifying-glass-chart"></i><span x-show="showLabels" x-transition>Evaluasi</span></a>
        <a class="menu__item {{ request()->routeIs('dashboard.spmi.pengendalian') ? 'active' : '' }}" href="{{ route('dashboard.spmi.pengendalian', ['upps' => $upps, 'periode' => $periode]) }}"><i class="fa-solid fa-sliders"></i><span x-show="showLabels" x-transition>Pengendalian</span></a>
        <a class="menu__item {{ request()->routeIs('dashboard.spmi.peningkatan') ? 'active' : '' }}" href="{{ route('dashboard.spmi.peningkatan', ['upps' => $upps, 'periode' => $periode]) }}"><i class="fa-solid fa-arrow-trend-up"></i><span x-show="showLabels" x-transition>Peningkatan</span></a>
    </div>
    
</nav>