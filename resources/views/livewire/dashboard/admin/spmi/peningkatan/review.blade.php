<x-modal title="Peningkatan" subtitle="{{ $item->name }}" width="45em">
    
    {{-- Button --}}
    <x-slot:label>
        <span class="modal__notif">
            <i class="fa-solid fa-bell"></i>
            @if ($peningkatanUppses->where('setting_status', 'Ada')->where('verification_status', 'pending')->count() > 0)  
                <small class="notif__number">{{ $peningkatanUppses->where('setting_status', 'Ada')->where('verification_status', 'pending')->count() }}</small>
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
            @foreach ($peningkatanUppses as $peningkatanUpps)
                <tr>
                    <td>{{ $peningkatanUpps->upps->name }}</td>
                    <td width="1%">
                        @if ($peningkatanUpps->setting_status == 'Ada')
                            <div class="table__action">
                                {!! linkIcon($peningkatanUpps->link) !!}
                                @if (!$peningkatanUpps->document_status)
                                    <x-button wire="updateDocument({{ $peningkatanUpps->upps_id }}, {{ true }})"><i class="fa-solid fa-check"></i></x-button>
                                @endif
                            </div>
                        @else
                            <span style="white-space: nowrap">{{ $peningkatanUpps->setting_status }}</span>
                        @endif
                    </td>
                    <td width="1%">
                        <div class="table__action" @if ($peningkatanUpps->setting_status !== 'Ada') style="opacity: 30%; pointer-events: none" @endif>
                            <x-button class="bg-danger" wire="updateStatus({{ $peningkatanUpps->upps_id }}, 'rejected')" style="background: {{ $peningkatanUpps->verification_status == 'rejected' && $peningkatanUpps->setting_status == 'Ada' ? '' : 'transparent !important' }}"><i class="fa-solid fa-xmark"></i></x-button>
                            <x-button class="bg-warning" wire="updateStatus({{ $peningkatanUpps->upps_id }}, 'pending')" style="background: {{ $peningkatanUpps->verification_status == 'pending' && $peningkatanUpps->setting_status == 'Ada' ? '' : 'transparent !important' }}"><i class="fa-solid fa-clock"></i></x-button>
                            <x-button class="bg-success" wire="updateStatus({{ $peningkatanUpps->upps_id }}, 'accepted')" style="background: {{ $peningkatanUpps->verification_status == 'accepted' && $peningkatanUpps->setting_status == 'Ada' ? '' : 'transparent !important' }}"><i class="fa-solid fa-check"></i></x-button>
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