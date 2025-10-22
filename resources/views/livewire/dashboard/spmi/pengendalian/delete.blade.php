<x-modal title="Delete Pengendalian">
    
    {{-- Button --}}
    <x-slot:trigger>
        <x-button class="button__danger"><i class="fa-solid fa-trash"></i></x-button>
    </x-slot:trigger>
    
    {{-- Disclaimer --}}
    <p class="disclaimer">Deleting this data is permanent and cannot be undone. Password confirmation is required.</p>
    
    {{-- Form --}}
    <x-form wire="destroy">
        <x-input type="password" label="Your Password" wire="password" />
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Delete</x-button>
        </x-slot:bottom>
    </x-form>
    
</x-modal>