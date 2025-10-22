<x-modal title="Add Instumen TKS" width="500px">

    {{-- Button --}}
    <x-slot:trigger>
        <x-button class="button__success"><i class="fa-solid fa-plus"></i>Tambahkan Form Baru</x-button>
    </x-slot:trigger>
    
    {{-- Form --}}
    <x-form wire="store">
        <x-input type="text" wire="name" placeholder="Table Name" />
        <hr class="modal__separator">
        @foreach ($datas as $key => $data)
            <div style="display: flex; align-items: flex-start; gap: .8em">
                <span style="width: 100%">
                    <x-input type="text" wire="datas.{{ $key }}.name" placeholder="Data Name" />
                </span>
                <span style="width: 50%">
                    <x-input type="select" wire="datas.{{ $key }}.type" :options="$types"  />
                </span>
                <div style="display: flex; align-items: center; height: 100%; background:red">
                    <button type="button" wire:click="removeData({{ $key }})" style="width: 1em"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
        @endforeach
        <x-slot:bottom>
            <div style="display: flex; justify-content: space-between; width: 100%">
                <x-button class="button__outline" type="button" wire="addData">Add Colomn</x-button>
                <div style="display: flex; gap: .5em">
                    <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
                    <x-button type="submit">Add</x-button>
                </div>
            </div>
        </x-slot:bottom>
    </x-form>
    
</x-modal>