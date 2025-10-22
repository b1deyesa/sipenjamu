<x-modal title="Add Periode">

    {{-- Button --}}
    <x-slot:trigger>
        <x-button class="button__success"><i class="fa-solid fa-plus"></i>Tambahkan Periode</x-button>
    </x-slot:trigger>
    
    {{-- Form --}}
    <x-form wire="store">
        <x-input type="text" label="Periode Name" wire="name" />
        <x-input type="date" label="Start Date" wire="start_date" />
        <x-input type="date" label="End Date" wire="end_date" />
        <x-input type="radio" label="Set as Active Period" wire="is_active" :options="$actives" />
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Add</x-button>
        </x-slot:bottom>
    </x-form>

</x-modal>
