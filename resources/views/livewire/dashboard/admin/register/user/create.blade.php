<x-modal title="Add User">

    {{-- Button --}}
    <x-slot:trigger>
        <x-button class="button__success"><i class="fa-solid fa-plus"></i>Tambahkan User</x-button>
    </x-slot:trigger>
    
    {{-- Form --}}
    <x-form wire="store">
        @if ($step == 1)
            <x-input type="text" label="Name" wire="name" />
            <x-input type="text" label="Email" wire="email" />
            <hr class="modal__separator">
            <x-input type="password" label="Password" wire="password" />
            <x-input type="password" label="Confirm Password" wire="password_confirmation" />
            <x-slot:bottom>
                <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
                <x-button type="button" wire="next()">Role Access<i class="fa-solid fa-angle-right"></i></x-button>
            </x-slot:bottom>
        @elseif ($step == 2)
            <x-input type="checkbox" label="Role" wire="role" :options="$roles" />
            @if ($uppses)
                <hr class="modal__separator">
                <x-input type="checkbox" label="UPPS" wire="upps" :options="$uppses" />
            @endif
            <x-slot:bottom>
                <x-button class="button__outline" type="button" wire="previous()"><i class="fa-solid fa-angle-left"></i>Back</x-button>
                <x-button type="submit">Add</x-button>
            </x-slot:bottom>
        @endif
    </x-form>
    
</x-modal>