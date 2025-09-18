<div class="option">
    @if ($this->setting_status == 'Ada')
    
        {{-- Yes --}}
        <x-modal title="Pelaksanaan Document">
            <x-slot:label><i class="fa-solid fa-pencil"></i></x-slot:label>
            <x-form wire="updateYes">
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
    @else
        {{-- No --}}
        <x-modal title="Pelaksanaan Document">
            <x-slot:label><i class="fa-solid fa-pencil"></i></x-slot:label>
            <x-form wire="updateNo">
                <x-input type="radio" wire="setting_status" :options="$statuses" />
                @if ($this->setting_status == 'Lainnya')
                    <hr class="modal__separator">
                    <x-input type="text" wire="lainnya" placeholder="Lainnya" />
                @endif
                <x-slot:bottom>
                    <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
                    <x-button type="submit">Save</x-button>
                </x-slot:bottom>
            </x-form>
        </x-modal>
        
    @endif
</div>
