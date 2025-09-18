<div class="option">
    
    {{-- Yes --}}
    <x-modal title="Peningkatan Document">
        <x-slot:trigger>
            <div class="option__item">
                <div class="item__box">
                    @if ($setting_status == 'Ada')
                        <span class="check"></span>
                    @endif
                </div>
                <p class="item__text">Ada</p>
            </div>
        </x-slot:trigger>
        <x-form wire="updateYes">
            <x-input type="text" label="Description" wire="description" />
            <x-input type="date" label="Tanggal Penetapan" wire="penetapan_date" />
            <hr class="modal__separator">
            <p class="disclaimer">Note: Please ensure that the link provided is publicly accessible/readable!<br>(General Access: Anyone with the link)</p>
            <x-input type="text" label="Link" wire="link" />
            <x-slot:bottom>
                <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
                <x-button type="submit">Save</x-button>
            </x-slot:bottom>
        </x-form>
    </x-modal>
    
    {{-- No --}}
    <x-modal title="Peningkatan Document">
        <x-slot:trigger>
            <div class="option__item">
                <div class="item__box">
                    @if ($setting_status !== 'Ada' && $setting_status)
                        <span class="check"></span>
                    @endif
                </div>
                <p class="item__text">Tidak Ada</p>
            </div>
        </x-slot:trigger>
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
    
</div>

