<x-modal title="Pengendalian" subtitle="{{ $item->name }}" width="60em">
    
    {{-- Button --}}
    <x-slot:label>
        <span class="modal__notif">
            <i class="fa-solid fa-bell"></i>
            @php
                $pendingCount = $pengendalianUppses
                    ->where('verification_status', 'pending')
                    ->filter(fn($item) =>
                        $item->link_rtm ||
                        $item->link_rtl ||
                        $item->link_rtm_testimony ||
                        $item->link_rtl_testimony
                    )
                    ->count();
            @endphp
            @if ($pendingCount > 0)
                <small class="notif__number">{{ $pendingCount }}</small>
            @endif
        </span>
    </x-slot:label>
    
    {{-- Table --}}
    <x-table>
        <x-slot:head>
            <th>UPPS</th>
            <th>RTM</th>
            <th>RTM Testimony</th>
            <th>RTL</th>
            <th>RTL Testimony</th>
            <th>Verification</th>
        </x-slot:head>

        <x-slot:body>
            @foreach ($pengendalianUppses as $pengendalianUpps)
                <tr>
                    <td>{{ $pengendalianUpps->upps->name }}</td>
                    <td width="1%">{!! linkIcon($pengendalianUpps->link_rtm) !!}</td>
                    <td width="1%">{!! linkIcon($pengendalianUpps->link_rtm_testimony) !!}</td>
                    <td width="1%">{!! linkIcon($pengendalianUpps->link_rtl) !!}</td>
                    <td width="1%">{!! linkIcon($pengendalianUpps->link_rtl_testimony) !!}</td>
                    <td width="1%">
                        <div class="table__action"
                            @if (
                                is_null($pengendalianUpps->link_rtm) &&
                                is_null($pengendalianUpps->link_rtl) &&
                                is_null($pengendalianUpps->link_rtm_testimony) &&
                                is_null($pengendalianUpps->link_rtl_testimony)
                            )
                                style="opacity: 30%; pointer-events: none"
                            @endif>
                            <x-button class="bg-danger"
                                wire="updateStatus({{ $pengendalianUpps->upps_id }}, 'rejected')"
                                style="background: {{ $pengendalianUpps->verification_status == 'rejected' ? '' : 'transparent !important' }}">
                                <i class="fa-solid fa-xmark"></i>
                            </x-button>
                            <x-button class="bg-warning"
                                wire="updateStatus({{ $pengendalianUpps->upps_id }}, 'pending')"
                                style="background: {{ $pengendalianUpps->verification_status == 'pending' ? '' : 'transparent !important' }}">
                                <i class="fa-solid fa-clock"></i>
                            </x-button>
                            <x-button class="bg-success"
                                wire="updateStatus({{ $pengendalianUpps->upps_id }}, 'accepted')"
                                style="background: {{ $pengendalianUpps->verification_status == 'accepted' ? '' : 'transparent !important' }}">
                                <i class="fa-solid fa-check"></i>
                            </x-button>
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