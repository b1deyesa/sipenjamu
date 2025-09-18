<x-modal title="Add Program Studi">

    {{-- Button --}}
    <x-slot:label><i class="fa-solid fa-plus"></i>Tambahkan Program Studi</x-slot:label>
    
    {{-- Form --}}
    <x-form wire="store">
        <x-input type="text" label="Program Studi Name" wire="name" />
        <x-input type="text" label="Program Studi Initial" wire="initial" />
        <hr class="modal__separator">
        <x-input type="select-search" label="UPPS" wire="upps" :options="$uppses" />
        <x-input type="select-search" label="Jenjang" wire="jenjang" :options="$jenjangs" />
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Add</x-button>
        </x-slot:bottom>
    </x-form>
    
</x-modal>