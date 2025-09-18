<x-modal title="Add Standar Lain">

    {{-- Button --}}
    <x-slot:label><i class="fa-solid fa-plus"></i>Tambahkan Standar Lain</x-slot:label>
    
    {{-- Form --}}
    <x-form wire="store">
        <x-input type="text" label="Nama Bidang Pengaturan Standar" wire="name" />
        <x-input type="text" label="Description" wire="description" />
        <hr class="modal__separator">
        <p class="disclaimer">Note: Please ensure that the link provided is publicly accessible/readable!<br>(General Access: Anyone with the link)</p>
        <x-input type="text" label="Link" wire="link" />
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Add</x-button>
        </x-slot:bottom>
    </x-form>
    
</x-modal>