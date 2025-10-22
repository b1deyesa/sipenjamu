<x-layout.two-section class="peningkatan" title="Peningkatan" subtitle="Standar Nasional Pendidikan Tinggi">
    
    {{-- Peningkatan Table --}}
    <x-table>
        <x-slot:head>
            <th width="1%">No</th>
            <th>Nama Pengaturan</th>
            <th width="1%">Status Pengaturan</th>
            <th width="1%">Tautan</th>
            <th width="1%">Tanggal Penetapan</th>
            <th width="1%">Status Verifikasi</th>
            <th width="1%">Status Dokumen</th>
            <th width="100px">Aksi</th>
        </x-slot:head>
        <x-slot:body>
            @forelse ($peningkatanUppses as $peningkatanUpps)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $peningkatanUpps->peningkatan->name }}</td>
                    <td>@livewire('dashboard.spmi.peningkatan.status', compact('upps', 'periode', 'peningkatanUpps'), key($peningkatanUpps->id))</td>
                    @if ($peningkatanUpps->setting_status == 'Ada')
                        <td align="center">{!! linkIcon($peningkatanUpps->link) !!}</td>
                        <td>{{ \Carbon\Carbon::parse($peningkatanUpps->penetapan_date)->format('d/m/Y') }}</td>
                        <td align="center">{!! status($peningkatanUpps->verification_status) !!}</td>
                        <td align="center">{!! accept($peningkatanUpps->document_status ? 'Document Verified' : 'Dokument Proccess') !!}</td>
                        <td>
                            <div class="table__action">
                                @livewire('dashboard.spmi.peningkatan.update', compact('upps', 'periode', 'peningkatanUpps'), key($peningkatanUpps->id))
                            </div>
                        </td>
                    @else
                        @if ($peningkatanUpps->setting_status)
                            <td colspan="4" align="center"><small style="font-size: .9em">{{ $peningkatanUpps->setting_status }}</small></td>
                            <td>
                                <div class="table__action">
                                    @livewire('dashboard.spmi.peningkatan.update', compact('upps', 'periode', 'peningkatanUpps'), key($peningkatanUpps->id))
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