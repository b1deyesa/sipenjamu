<x-layout.two-section class="pelaksanaan" title="Pelaksanaan" subtitle="Standar Nasional Pendidikan Tinggi">
    
    {{-- Pelaksanaan Table --}}
    <x-table>
        <x-slot:head>
            <th>No</th>
            <th>Nama Pengaturan</th>
            <th width="1%">Status Pengaturan</th>
            <th width="1%">Tautan</th>
            <th width="1%">Status Verifikasi</th>
            <th width="1%">Status Dokumen</th>
            <th width="100px">Aksi</th>
        </x-slot:head>
        <x-slot:body>
            @forelse ($pelaksanaanUppses as $pelaksanaanUpps)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pelaksanaanUpps->pelaksanaan->name }}</td>
                    <td>@livewire('dashboard.spmi.pelaksanaan.status', compact('upps', 'pelaksanaanUpps'), key($pelaksanaanUpps->id))</td>
                    @if ($pelaksanaanUpps->setting_status == 'Ada')
                        <td align="center">{!! linkIcon($pelaksanaanUpps->link) !!}</td>
                        <td align="center">{!! status($pelaksanaanUpps->verification_status) !!}</td>
                        <td align="center">{!! accept($pelaksanaanUpps->document_status ? 'Document Verified' : 'Dokument Proccess') !!}</td>
                        <td>
                            <div class="table__action">
                                @livewire('dashboard.spmi.pelaksanaan.update', compact('upps', 'pelaksanaanUpps'), key($pelaksanaanUpps->id))
                            </div>
                        </td>
                    @else
                        @if ($pelaksanaanUpps->setting_status)
                            <td colspan="3" align="center"><small style="font-size: .9em">{{ $pelaksanaanUpps->setting_status }}</small></td>
                            <td>
                                <div class="table__action">
                                    @livewire('dashboard.spmi.pelaksanaan.update', compact('upps', 'pelaksanaanUpps'), key($pelaksanaanUpps->id))
                                </div>
                            </td>
                        @else
                            <td colspan="999" align="center"><small style="font-size: .9em; opacity: 50%">Belum Disi</small></td>
                        @endif
                    @endif
                </tr>
            @empty
                <td colspan="999" align="center"><small class="table__empty">No Data.</small></td>
            @endforelse
        </x-slot:body>
    </x-table>
    
</x-layout.two-section>