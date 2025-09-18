<x-layout.penetapan class="standar-lain" subtitle="Standar Lain">
    
    {{-- Standar Lain Add Button --}}
    <span style="align-self: flex-end">
        @livewire('dashboard.spmi.standar-lain.create', compact('upps'))
    </span>
    
    {{-- Standar Lain Table --}}
    <x-table>
        <x-slot:head>
            <th>No</th>
            <th>Nama Pengaturan</th>
            <th width="1%">Tautan</th>
            <th width="1%">Status Verifikasi</th>
            <th width="1%">Status Dokumen</th>
            <th width="100px">Aksi</th>
        </x-slot:head>
        <x-slot:body>
            @forelse ($standarLains as $standar_lain)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $standar_lain->name }}</td>
                    <td align="center">{!! linkIcon($standar_lain->link) !!}</td>
                    <td align="center">{!! status($standar_lain->verification_status) !!}</td>
                    <td align="center">{!! accept($standar_lain->document_status ? 'Document Verified' : 'Dokument Proccess') !!}</td>
                    <td>
                        <div class="table__action">
                            @livewire('dashboard.spmi.standar-lain.update', compact('upps', 'standar_lain'), key($standar_lain->id))
                        </div>
                    </td>
                </tr>
            @empty
                <td colspan="999" align="center"><small class="table__empty">No Data.</small></td>
            @endforelse
        </x-slot:body>
    </x-table>
    
</x-layout.penetapan>