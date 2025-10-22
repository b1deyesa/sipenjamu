<x-modal title="Edit Periode">

    {{-- Button --}}
    <x-slot:trigger>
        <x-button class="button__info"><i class="fa-solid fa-pencil"></i></x-button>
    </x-slot:trigger>

    {{-- Form --}}
    <x-form wire="update">
        <x-input type="text" label="Periode Name" wire="name" />
        <x-input type="date" label="Start Date" wire="start_date" />
        <x-input type="date" label="End Date" wire="end_date" />
        <x-input type="radio" label="Status Aktif" wire="is_active" :options="$actives" />
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Update</x-button>
        </x-slot:bottom>
    </x-form>

</x-modal>