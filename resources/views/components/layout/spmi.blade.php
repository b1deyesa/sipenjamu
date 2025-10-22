<x-layout.dashboard class="spmi" :upps="$upps">
    
    {{-- Navigation --}}
    <x-navigation.spmi :upps="$upps" />
    
    {{-- Section --}}
    <section class="spmi__content">
        
        {{-- Header --}}
        <div class="content__header">
            <h1 class="header__title">Sistem Penjaminan Mutu Internal</h1>
            <div class="header__select">
                <div class="input" style="width: 250px">
                    <div class="select">
                        <select onchange="location.href = '{{ route(Route::currentRouteName(), ['upps' => '__UPPS__', 'periode' => request()->route('periode')]) }}'.replace('__UPPS__', this.value);">
                            @foreach (Auth::user()->uppses as $upps)
                                <option value="{{ $upps->id }}" @selected($upps->id == request()?->route('upps')?->id)>{{ $upps->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="input" style="width: 130px">
                    <div class="select">
                        <select onchange="location.href = '{{ route(Route::currentRouteName(), ['upps' => request()->route('upps'), 'periode' => '__PERIODE__']) }}'.replace('__PERIODE__', this.value);">
                            @foreach ($periodes as $periode)
                                <option value="{{ $periode->id }}" @selected($periode->id == request()?->route('periode')?->id)>{{ $periode->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Container --}}
        <div class="content__container{{ $class }}">
            {{ $slot }}
        </div>
        
    </section>
    
</x-layout.dashboard>