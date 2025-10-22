<x-modal title="Edit Peningkatan">

    {{-- Button --}}
    <x-slot:trigger>
        <x-button class="button__info"><i class="fa-solid fa-pencil"></i></x-button>
    </x-slot:trigger>
    
    {{-- Form --}}
    <x-form wire="update">
        <x-input type="text" label="Setting Name" wire="name" />
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Update</x-button>
        </x-slot:bottom>
    </x-form>
    
</x-modal>