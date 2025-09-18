<x-modal title="Add UPPS">

    {{-- Button --}}
    <x-slot:label><i class="fa-solid fa-plus"></i>Tambahkan UPPS</x-slot:label>
    
    {{-- Form --}}
    <x-form wire="store">
        <x-input type="text" label="UPPS Name" wire="name" />
        <x-input type="text" label="UPPS Initial" wire="initial" />
        <x-input type="text" label="Badge Color" wire="color" />
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Add</x-button>
        </x-slot:bottom>
    </x-form>
    
</x-modal>