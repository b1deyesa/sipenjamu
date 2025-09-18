<div class="table__action" style="font-size: 1em">
    <x-button class="bg-danger" wire="update('rejected')" style="background: {{ $item->verification_status == 'rejected' ? '' : 'transparent !important' }}"><i class="fa-solid fa-xmark"></i></x-button>
    <x-button class="bg-warning" wire="update('pending')" style="background: {{ $item->verification_status == 'pending' ? '' : 'transparent !important' }}"><i class="fa-solid fa-clock"></i></x-button>
    <x-button class="bg-success" wire="update('accepted')" style="background: {{ $item->verification_status == 'accepted' ? '' : 'transparent !important' }}"><i class="fa-solid fa-check"></i></x-button>
</div>