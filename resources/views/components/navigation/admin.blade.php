<nav class="admin__sidebar" x-data="{ showLabels: localStorage.getItem('adminSidebar') === 'true' }" x-init="$watch('showLabels', val => localStorage.setItem('adminSidebar', val))">
    
    {{-- Sidebar Toggle --}}
    <button class="sidebar__toggle" x-on:click="showLabels = false" x-show="showLabels"><i class="fa-solid fa-angles-left"></i></button>
    <button class="sidebar__toggle" x-on:click="showLabels = true" x-show="!showLabels"><i class="fa-solid fa-angles-right"></i></button>
    
    {{-- Sidebar Menu --}}
    <div class="sidebar__menu" :class="{ 'open': showLabels }">
        <div class="menu__dropdown" x-data="{ open: {{ request()->routeIs('dashboard.admin.register.*') ? 'true' : 'false' }} }">
            <span class="dropdown__item {{ request()->routeIs('dashboard.admin.register.*') ? 'active' : '' }}" x-on:click="open = !open"><i class="fa-solid fa-lock"></i><span x-show="showLabels" x-transition>Register</span></span>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.admin.register.role') ? 'active' : '' }}" href="{{ route('dashboard.admin.register.role') }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>Role</span></a>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.admin.register.upps') ? 'active' : '' }}" href="{{ route('dashboard.admin.register.upps') }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>UPPS</span></a>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.admin.register.jenjang') ? 'active' : '' }}" href="{{ route('dashboard.admin.register.jenjang') }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>Jenjang</span></a>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.admin.register.program-studi') ? 'active' : '' }}" href="{{ route('dashboard.admin.register.program-studi') }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>Program Studi</span></a>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.admin.register.user') ? 'active' : '' }}" href="{{ route('dashboard.admin.register.user') }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>User</span></a>
        </div>
        <hr class="menu__separator">
        <div class="menu__dropdown" x-data="{ open: {{ request()->routeIs('dashboard.admin.spmi.*') ? 'true' : 'false' }} }">
            <span class="dropdown__item {{ request()->routeIs('dashboard.admin.spmi.*') ? 'active' : '' }}" x-on:click="open = !open"><i class="fa-solid fa-shield-halved"></i><span x-show="showLabels" x-transition>SPMI</span></span>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.admin.spmi.standar-yang-ditetapkan-institusi') ? 'active' : '' }}" href="{{ route('dashboard.admin.spmi.standar-yang-ditetapkan-institusi') }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>Standar Yang Ditetapkan Institusi</span></a>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.admin.spmi.standar-lain') ? 'active' : '' }}" href="{{ route('dashboard.admin.spmi.standar-lain') }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>Standar Lain</span></a>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.admin.spmi.pelaksanaan') ? 'active' : '' }}" href="{{ route('dashboard.admin.spmi.pelaksanaan') }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>Pelaksanaan</span></a>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.admin.spmi.evaluasi') ? 'active' : '' }}" href="{{ route('dashboard.admin.spmi.evaluasi') }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>Evaluasi</span></a>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.admin.spmi.pengendalian') ? 'active' : '' }}" href="{{ route('dashboard.admin.spmi.pengendalian') }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>Pengendalian</span></a>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.admin.spmi.peningkatan') ? 'active' : '' }}" href="{{ route('dashboard.admin.spmi.peningkatan') }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>Peningkatan</span></a>
        </div>
        <hr class="menu__separator">
        <div class="menu__dropdown" x-data="{ open: {{ request()->routeIs('dashboard.admin.monev.*') ? 'true' : 'false' }} }">
            <span class="dropdown__item {{ request()->routeIs('dashboard.admin.monev.*') ? 'active' : '' }}" x-on:click="open = !open"><i class="fa-solid fa-chart-line"></i><span x-show="showLabels" x-transition>MONEV</span></span>
            <a x-show="open" class="menu__item {{ request()->routeIs('dashboard.admin.monev.buku') ? 'active' : '' }}" href="{{ route('dashboard.admin.monev.buku') }}"><i class="fa-solid fa-circle-notch"></i><span x-show="showLabels" x-transition>Buku IV</span></a>
        </div>
    </div>
    
</nav>