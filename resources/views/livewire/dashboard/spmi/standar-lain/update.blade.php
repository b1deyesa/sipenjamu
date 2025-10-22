<x-modal title="Edit Standar Lain">

    {{-- Button --}}
    <x-slot:trigger>
        <x-button class="button__info"><i class="fa-solid fa-pencil"></i></x-button>
    </x-slot:trigger>
    
    {{-- Form --}}
    <x-form wire="update">
        <x-input type="text" label="Nama Bidang Pengaturan Standar" wire="name" />
        <x-input type="text" label="Description" wire="description" />
        <hr class="modal__separator">
        <p class="disclaimer">Note: Please ensure that the link provided is publicly accessible/readable!<br>(General Access: Anyone with the link)</p>
        <x-input type="text" label="Link" wire="link" />
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Save</x-button>
        </x-slot:bottom>
    </x-form>
    
</x-modal>