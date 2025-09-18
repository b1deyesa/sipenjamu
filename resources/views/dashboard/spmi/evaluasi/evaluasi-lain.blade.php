<x-layout.evaluasi class="evaluasi-lain" subtitle="Evaluasi Lain" :upps="$upps">
    
    {{-- Evaluasi Add Button --}}
    <span style="align-self: flex-end">
        @livewire('dashboard.spmi.evaluasi.create', compact('upps'))
    </span>
    
    {{-- Evaluasi Table --}}
    <x-table>
        <x-slot:head>
            <th>No</th>
            <th>Nama Pengaturan</th>
            <th width="1%">Tautan</th>
            <th width="1%">Tanggal Diperbarui</th>
            <th width="1%">Status Verifikasi</th>
            <th width="1%">Status Dokumen</th>
            <th width="100px">Aksi</th>
        </x-slot:head>
        <x-slot:body>
            @forelse ($evaluasis as $evaluasi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $evaluasi->name }}</td>
                    <td align="center">{!! linkIcon($evaluasi->link) !!}</td>
                    <td>{{ \Carbon\Carbon::parse($evaluasi->date)->format('d/m/Y') }}</td>
                    <td align="center">{!! status($evaluasi->verification_status) !!}</td>
                    <td align="center">{!! accept($evaluasi->document_status ? 'Document Verified' : 'Dokument Proccess') !!}</td>
                    <td>
                        <div class="table__action">
                            @livewire('dashboard.spmi.evaluasi.update', compact('upps', 'evaluasi'), key($evaluasi->id))
                        </div>
                    </td>
                </tr>
            @empty
                <td colspan="999" align="center"><small class="table__empty">No Data.</small></td>
            @endforelse
        </x-slot:body>
    </x-table>
    
</x-layout.evaluasi>