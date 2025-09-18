<x-modal title="Edit Jenjang">

    {{-- Button --}}
    <x-slot:label><i class="fa-solid fa-pencil"></i></x-slot:label>
    
    {{-- Form --}}
    <x-form wire="update">
        <x-input type="text" label="Jenjang Name" wire="name" />
        <x-input type="text" label="Jenjang Initial" wire="initial" />
        <x-input type="text" label="Badge Color" wire="color" />
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Update</x-button>
        </x-slot:bottom>
    </x-form>
    
</x-modal>