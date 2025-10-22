<x-modal title="Update Profil">

    {{-- Button Trigger --}}
    <x-slot:trigger>
        <x-button class="button__info"><i class="fa-solid fa-pencil"></i></x-button>
    </x-slot:trigger>

    {{-- Form Update --}}
    <x-form wire="update">
        <x-input type="text" label="Profil Name" wire="data.name" />
        <x-input type="select" label="Type" wire="data.type" placeholder="Select Type" :options="$types" />
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Update</x-button>
        </x-slot:bottom>
    </x-form>

</x-modal>
