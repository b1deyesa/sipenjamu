<x-modal title="Standar Yang Ditetapkan Institusi" subtitle="{{ $item->name }}" width="45em">
    
    {{-- Button --}}
    <x-slot:label>
        <span class="modal__notif">
            <i class="fa-solid fa-bell"></i>
            @if ($standarYangDitetapkanInstitusiUppses->where('setting_status', 'Ada')->where('verification_status', 'pending')->count() > 0)  
                <small class="notif__number">{{ $standarYangDitetapkanInstitusiUppses->where('setting_status', 'Ada')->where('verification_status', 'pending')->count() }}</small>
            @endif
        </span>
    </x-slot:label>
    
    {{-- Table --}}
    <x-table>
        <x-slot:head>
            <th>UPPS</th>
            <th>Document</th>
            <th>Verification</th>
        </x-slot:head>
        <x-slot:body>
            @foreach ($standarYangDitetapkanInstitusiUppses as $standarYangDitetapkanInstitusiUpps)
                <tr>
                    <td>{{ $standarYangDitetapkanInstitusiUpps->upps->name }}</td>
                    <td width="1%">
                        @if ($standarYangDitetapkanInstitusiUpps->setting_status == 'Ada')
                            <div class="table__action">
                                {!! linkIcon($standarYangDitetapkanInstitusiUpps->link) !!}
                                @if (!$standarYangDitetapkanInstitusiUpps->document_status)
                                    <x-button wire="updateDocument({{ $standarYangDitetapkanInstitusiUpps->upps_id }}, {{ true }})"><i class="fa-solid fa-check"></i></x-button>
                                @endif
                            </div>
                        @else
                            <span style="white-space: nowrap">{{ $standarYangDitetapkanInstitusiUpps->setting_status }}</span>
                        @endif
                    </td>
                    <td width="1%">
                        <div class="table__action" @if ($standarYangDitetapkanInstitusiUpps->setting_status !== 'Ada') style="opacity: 30%; pointer-events: none" @endif>
                            <x-button class="bg-danger" wire="updateStatus({{ $standarYangDitetapkanInstitusiUpps->upps_id }}, 'rejected')" style="background: {{ $standarYangDitetapkanInstitusiUpps->verification_status == 'rejected' && $standarYangDitetapkanInstitusiUpps->setting_status == 'Ada' ? '' : 'transparent !important' }}"><i class="fa-solid fa-xmark"></i></x-button>
                            <x-button class="bg-warning" wire="updateStatus({{ $standarYangDitetapkanInstitusiUpps->upps_id }}, 'pending')" style="background: {{ $standarYangDitetapkanInstitusiUpps->verification_status == 'pending' && $standarYangDitetapkanInstitusiUpps->setting_status == 'Ada' ? '' : 'transparent !important' }}"><i class="fa-solid fa-clock"></i></x-button>
                            <x-button class="bg-success" wire="updateStatus({{ $standarYangDitetapkanInstitusiUpps->upps_id }}, 'accepted')" style="background: {{ $standarYangDitetapkanInstitusiUpps->verification_status == 'accepted' && $standarYangDitetapkanInstitusiUpps->setting_status == 'Ada' ? '' : 'transparent !important' }}"><i class="fa-solid fa-check"></i></x-button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-slot:body>
    </x-table>
    
    {{-- Bottom --}}
    <x-slot:bottom>
        <x-button class="button__outline" type="button" x-on:click="open = false">Close</x-button>
    </x-slot:bottom>
    
</x-modal>