<x-layout.two-section class="pengendalian" title="Pengendalian" subtitle="Standar Nasional Pendidikan Tinggi">
    
    {{-- Create Pengaturan --}}
    <span style="align-self: flex-end">
        @livewire('dashboard.spmi.pengendalian.create', compact('upps'))
    </span>
    
    {{-- Pengendalian Table --}}
    <x-table>
        <x-slot:head>
            <th>No</th>
            <th>Nama Pengaturan</th>
            <th width="1%">Tautan RTM</th>
            <th width="1%">Tautan Bukti RTM</th>
            <th width="1%">Tautan RTL</th>
            <th width="1%">Tautan Bukti RTL</th>
            <th width="1%">Status Verifikasi</th>
            <th width="1%">Status Dokumen</th>
            <th width="100px">Aksi</th>
        </x-slot:head>
        <x-slot:body>
            @forelse ($pengendalianUppses as $pengendalianUpps)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pengendalianUpps->pengendalian->name }}</td>
                    <td align="center">{!! linkIcon($pengendalianUpps->link_rtm) !!}</td>
                    <td align="center">{!! linkIcon($pengendalianUpps->link_rtm_testimony) !!}</td>
                    <td align="center">{!! linkIcon($pengendalianUpps->link_rtl) !!}</td>
                    <td align="center">{!! linkIcon($pengendalianUpps->link_rtl_testimony) !!}</td>
                    <td align="center">{!! status($pengendalianUpps->verification_status) !!}</td>
                    <td align="center">{!! accept($pengendalianUpps->document_status ? 'Document Verified' : 'Dokument Proccess') !!}</td>
                    <td>
                        <div class="table__action">
                            @livewire('dashboard.spmi.pengendalian.update', compact('upps', 'pengendalianUpps'), key('update-'. $pengendalianUpps->id))
                            @livewire('dashboard.spmi.pengendalian.delete', compact('upps', 'pengendalianUpps'), key('delete-'. $pengendalianUpps->id))
                        </div>
                    </td>
                </tr>
            @empty
                <td colspan="999" align="center"><small class="table__empty">No Data.</small></td>
            @endforelse
        </x-slot:body>
    </x-table>
    
</x-layout.two-section>