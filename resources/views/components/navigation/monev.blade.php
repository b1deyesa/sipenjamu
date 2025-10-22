<nav class="monev__sidebar" x-data="{ showLabels: localStorage.getItem('monevSidebar') === 'true' }" x-init="$watch('showLabels', val => localStorage.setItem('monevSidebar', val))">
    
    {{-- Sidebar Toggle --}}
    <button class="sidebar__toggle" x-on:click="showLabels = false" x-show="showLabels"><i class="fa-solid fa-angles-left"></i></button>
    <button class="sidebar__toggle" x-on:click="showLabels = true" x-show="!showLabels"><i class="fa-solid fa-angles-right"></i></button>
    
    <div class="input" style="width: 93%">
        <div class="select">
            <select onchange="location.href = '{{ route(Route::currentRouteName(), ['upps' => request()->route('upps'), 'programStudi' => request()->route('programStudi'), 'slug' => request()->route('slug'), 'periode' => '__PERIODE__']) }}'.replace('__PERIODE__', this.value);" style="background: rgba(#FFF, 20%)">
                @foreach ($periodes as $periode)
                    <option value="{{ $periode->id }}" @selected($periode->id == request()?->route('periode')?->id)>{{ $periode->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    {{-- Sidebar Menu --}}
    <div class="sidebar__menu" :class="{ 'open': showLabels }">
        @foreach (request()->route('upps')->programStudis as $program_studi)
        @php
            $url = request()->route('slug')
                ? route('dashboard.monev.show', [
                    'upps' => request()->route('upps')?->id,
                    'programStudi' => $program_studi,
                    'periode' => request()->route('periode'),
                    'slug' => request()->route('slug')
                ])
                : route('dashboard.monev.index', [
                    'upps' => request()->route('upps')?->id,
                    'programStudi' => $program_studi,
                    'periode' => request()->route('periode')
                ]);
        @endphp
        
        <a class="menu__item {{ request()->route('programStudi')?->id == $program_studi->id ? 'active' : '' }}" href="{{ $url }}">
            <i class="fa-solid fa-circle-notch"></i>
            <span x-show="showLabels" x-transition>{{ $program_studi->name }}</span>
        </a>
        @endforeach
    </div>
    
</nav>