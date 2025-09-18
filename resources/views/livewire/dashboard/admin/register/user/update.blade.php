<x-modal title="Edit User">

    {{-- Button --}}
    <x-slot:label><i class="fa-solid fa-pencil"></i></x-slot:label>
    
    {{-- Form --}}
    <x-form wire="update">
        @if ($step == 1)
            <x-input type="text" label="Name" wire="name" />
            <x-input type="text" label="Email" wire="email" />
            <hr class="modal__separator">
            @if ($change_password)
                <x-button class="button__outline" type="button" wire="changePassword(0)">Unchange Password<i class="fa-solid fa-unlock"></i></x-button>
            @else
                <x-button type="button" wire="changePassword(1)">Change Password<i class="fa-solid fa-lock"></i></x-button>
            @endif
            @if ($change_password)
                <x-input type="password" label="Change Password" wire="password" />
                <x-input type="password" label="Confirm Change Password" wire="password_confirmation" />
            @endif
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
                <x-button type="submit">Update</x-button>
            </x-slot:bottom>
        @endif
    </x-form>
    
</x-modal>