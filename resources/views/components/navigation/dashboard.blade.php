<nav class="dashboard__sidebar" x-data="{ showLabels: localStorage.getItem('dashboardSidebar') === 'true' }" x-init="$watch('showLabels', val => localStorage.setItem('dashboardSidebar', val))">
    
    {{-- Sidebar Toggle --}}
    <button class="sidebar__toggle" x-on:click="showLabels = false" x-show="showLabels"><i class="fa-solid fa-angles-left"></i></button>
    <button class="sidebar__toggle" x-on:click="showLabels = true" x-show="!showLabels"><i class="fa-solid fa-angles-right"></i></button>
    
    {{-- UPPS --}}
    <div class="input">
        <div class="select">
            <select onchange="location.href = '{{ route(Route::currentRouteName(), ['upps' => '__UPPS__', 'slug' => request()->route('slug')]) }}'.replace('__UPPS__', this.value);">
                @foreach (Auth::user()->uppses as $upps)
                    <option value="{{ $upps->id }}" @selected($upps->id == request()?->route('upps')?->id)>{{ $upps->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    {{-- Sidebar Menu --}}
    <div class="sidebar__menu" :class="{ 'open': showLabels }">
        @role(['admin', 'enumerator'])
            <a class="menu__item {{ request()->routeIs('dashboard.spmi.*') ? 'active' : '' }}" href="{{ route('dashboard.spmi.home', ['upps' => request()->route('upps')?->id ?? $upps_user]) }}"><i class="fa-solid fa-shield-halved"></i><span x-show="showLabels" x-transition>SPMI</span></a>
        @endrole
        @role(['admin', 'evaluator'])
            <a class="menu__item {{ request()->routeIs('dashboard.monev.*') ? 'active' : '' }}" href="{{ route('dashboard.monev.index', ['upps' => request()->route('upps')?->id ?? $upps_user]) }}"><i class="fa-solid fa-chart-line"></i><span x-show="showLabels" x-transition>MONEV</span></a>
        @endrole
        @role(['admin', 'auditor'])
            <a class="menu__item {{ request()->routeIs('dashboard.ami.*') ? 'active' : '' }}" href="{{ route('dashboard.ami.index') }}"><i class="fa-solid fa-clipboard"></i><span x-show="showLabels" x-transition>AMI</span></a>
        @endrole
        @role(['admin', 'evaluator'])
            <a class="menu__item {{ request()->routeIs('dashboard.akreditasi.*') ? 'active' : '' }}" href="{{ route('dashboard.akreditasi.index') }}"><i class="fa-solid fa-certificate"></i><span x-show="showLabels" x-transition>Akreditasi</span></a>
        @endrole
        @role(['admin', 'executive', 'evaluator'])
            <a class="menu__item {{ request()->routeIs('dashboard.perengkingan.*') ? 'active' : '' }}" href="{{ route('dashboard.perengkingan.index') }}"><i class="fa-solid fa-ranking-star"></i><span x-show="showLabels" x-transition>Perengkingan</span></a>
        @endrole
        @role('admin')
            <hr class="menu__separator">
            <a class="menu__item {{ request()->routeIs('dashboard.admin.*') ? 'active' : '' }}" href="{{ route('dashboard.admin.register.index') }}"><i class="fa-solid fa-user-tie"></i><span x-show="showLabels" x-transition>Admin</span></a>
        @endrole
        <x-form action="{{ route('auth.logout') }}" method="POST">
            <button class="menu__item" type="submit"><i class="fa-solid fa-right-from-bracket"></i><span x-show="showLabels" x-transition>Logout</span></button>
        </x-form>
    </div>
    
</nav>