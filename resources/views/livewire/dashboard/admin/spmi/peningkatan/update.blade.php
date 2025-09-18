<x-modal title="Edit Peningkatan">

    {{-- Button --}}
    <x-slot:label><i class="fa-solid fa-pencil"></i></x-slot:label>
    
    {{-- Form --}}
    <x-form wire="update">
        <x-input type="text" label="Setting Name" wire="name" />
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Update</x-button>
        </x-slot:bottom>
    </x-form>
    
</x-modal>