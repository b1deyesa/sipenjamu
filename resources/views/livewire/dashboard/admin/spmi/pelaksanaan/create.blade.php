<x-modal title="Add Pelaksanaan">

    {{-- Button --}}
    <x-slot:label><i class="fa-solid fa-plus"></i>Tambahkan Pelaksanaan</x-slot:label>
    
    {{-- Form --}}
    <x-form wire="store">
        <x-input type="text" label="Setting Name" wire="name" />
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Add</x-button>
        </x-slot:bottom>
    </x-form>
    
</x-modal>