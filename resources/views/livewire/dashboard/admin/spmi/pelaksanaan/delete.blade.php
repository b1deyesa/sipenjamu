<x-modal title="Delete Pelaksanaan">
    
    {{-- Button --}}
    <x-slot:label><i class="fa-solid fa-trash"></i></x-slot:label>
    
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