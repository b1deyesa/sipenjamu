<x-modal title="Add Pelaksanaan">

    {{-- Button --}}
    <x-slot:trigger>
        <x-button class="button__success"><i class="fa-solid fa-plus"></i>Tambahkan Pelaksanaan</x-button>
    </x-slot:trigger>
    
    {{-- Form --}}
    <x-form wire="store">
        <x-input type="select-search" label="Setting Name" wire="name" :options="$pelaksanaans" />
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Add</x-button>
        </x-slot:bottom>
    </x-form>
    
</x-modal>