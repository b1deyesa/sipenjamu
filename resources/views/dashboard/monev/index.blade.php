<x-layout.dashboard class="monev">
    
    {{-- Monev Navigation --}}
    <x-navigation.monev />
    
    {{-- Monev Content --}}
    <div class="monev__container index">
        
        {{-- Index Header --}}
        <div class="index__header">
            <h1 class="header__title">{{ $programStudi->name }}</h1>
        </div>
        
        {{-- Index List --}}
        <h3 class="index__title">Buku VI</h3>
        <div class="index__list">
            @foreach ($monevs->where('category', 'buku') as $monev)
                <div class="list__item">
                    <div class="item__text">
                        <h3 class="text__title">{{ $monev->name }}</h3>
                        <h3 class="text__subtitle">{!! $monev->rows->where('program_studi_id', $programStudi->id)->where('periode_id', $periode->id)->count() > 0 ? $monev->rows->where('program_studi_id', $programStudi->id)->where('periode_id', $periode->id)->count(). ' data' : ' <span style="color: red">Belum diisi</span>' !!}</h3>
                    </div>
                    <div class="item__action">
                        <x-modal>
                            <x-slot:trigger><x-button class="button__outline"><i class="fa fa-upload"></i> Import Data</x-button></x-slot:trigger>
                            <p>Data yang di-import harus sesuai dengan template ini. <a href="{{ route('dashboard.monev.export', ['upps' => $programStudi->upps, 'programStudi' => $programStudi, 'periode' => $periode, 'slug' => $monev->slug]) }}">download</a></p>
                            <x-form action="{{ route('dashboard.monev.import', ['upps' => $programStudi->upps, 'programStudi' => $programStudi, 'periode' => $periode, 'slug' => $monev->slug]) }}" method="POST" enctype="multipart/form-data">
                                <x-input type="file" name="file" />
                                <x-slot:bottom>
                                    <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
                                    <x-button type="submit">Import</x-button>
                                </x-slot:bottom>
                            </x-form>
                        </x-modal>
                        <x-button type="link" href="{{ route('dashboard.monev.show', ['upps' => $upps, 'programStudi' => $programStudi, 'periode' => request()->route('periode'), 'slug' => $monev->slug]) }}">Open</x-button>
                    </div>
                </div>
            @endforeach
        </div>
        
        <h3 class="index__title">Instumen TKS</h3>
        <div class="index__list">
            @foreach ($monevs->where('category', 'tks') as $monev)
                <div class="list__item">
                    <div class="item__text">
                        <h3 class="text__title">{{ $monev->name }}</h3>
                        <h3 class="text__subtitle">{!! $monev->rows->where('program_studi_id', $programStudi->id)->where('periode_id', $periode->id)->count() > 0 ? $monev->rows->where('program_studi_id', $programStudi->id)->where('periode_id', $periode->id)->count(). ' data' : ' <span style="color: red">Belum diisi</span>' !!}</h3>
                    </div>
                    <div class="item__action">
                        <x-modal>
                            <x-slot:trigger><x-button class="button__outline"><i class="fa fa-upload"></i> Import Data</x-button></x-slot:trigger>
                            <p>Data yang di-import harus sesuai dengan template ini. <a href="{{ route('dashboard.monev.export', ['upps' => $programStudi->upps, 'programStudi' => $programStudi, 'periode' => $periode, 'slug' => $monev->slug]) }}">download</a></p>
                            <x-form action="{{ route('dashboard.monev.import', ['upps' => $programStudi->upps, 'programStudi' => $programStudi, 'periode' => $periode, 'slug' => $monev->slug]) }}" method="POST" enctype="multipart/form-data">
                                <x-input type="file" name="file" />
                                <x-slot:bottom>
                                    <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
                                    <x-button type="submit">Import</x-button>
                                </x-slot:bottom>
                            </x-form>
                        </x-modal>
                        <x-button type="link" href="{{ route('dashboard.monev.show', ['upps' => $upps, 'programStudi' => $programStudi, 'periode' => request()->route('periode'), 'slug' => $monev->slug]) }}">Open</x-button>
                    </div>
                </div>
            @endforeach
        </div>    
        
    </div>
    
</x-layout.dashboard>