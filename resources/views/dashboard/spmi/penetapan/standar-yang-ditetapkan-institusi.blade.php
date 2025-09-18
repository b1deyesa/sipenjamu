<x-layout.penetapan class="standar-yang-ditetapkan-institusi" subtitle="Standar Yang Ditetapkan Institusi">
    
    {{-- Standar Yang Ditetapkan Institusi Table --}}
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
            @forelse ($standarYangDitetapkanInstitusiUppses as $standarYangDitetapkanInstitusiUpps)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $standarYangDitetapkanInstitusiUpps->standarYangDitetapkanInstitusi->name }}</td>
                    <td>@livewire('dashboard.spmi.standar-yang-ditetapkan-institusi.status', compact('upps', 'standarYangDitetapkanInstitusiUpps'), key($standarYangDitetapkanInstitusiUpps->id))</td>
                    @if ($standarYangDitetapkanInstitusiUpps->setting_status == 'Ada')
                        <td align="center">{!! linkIcon($standarYangDitetapkanInstitusiUpps->link) !!}</td>
                        <td align="center">{!! status($standarYangDitetapkanInstitusiUpps->verification_status) !!}</td>
                        <td align="center">{!! accept($standarYangDitetapkanInstitusiUpps->document_status ? 'Document Verified' : 'Dokument Proccess') !!}</td>
                        <td>
                            <div class="table__action">
                                @livewire('dashboard.spmi.standar-yang-ditetapkan-institusi.update', compact('upps', 'standarYangDitetapkanInstitusiUpps'), key($standarYangDitetapkanInstitusiUpps->id))
                            </div>
                        </td>
                    @else
                        @if ($standarYangDitetapkanInstitusiUpps->setting_status)
                            <td colspan="3" align="center"><small style="font-size: .9em">{{ $standarYangDitetapkanInstitusiUpps->setting_status }}</small></td>
                            <td>
                                <div class="table__action">
                                    @livewire('dashboard.spmi.standar-yang-ditetapkan-institusi.update', compact('upps', 'standarYangDitetapkanInstitusiUpps'), key($standarYangDitetapkanInstitusiUpps->id))
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
    
</x-layout.penetapan>