<x-modal title="Add Buku IV" width="500px">

    {{-- Button --}}
    <x-slot:label><i class="fa-solid fa-plus"></i>Tambahkan Form Baru</x-slot:label>
    
    {{-- Form --}}
    <x-form wire="store">
        <x-input type="text" wire="name" placeholder="Table Name" />
        <hr class="modal__separator">
        @foreach ($datas as $key => $data)
            <div style="display: flex; align-items: flex-start; gap: .8em">
                <x-input type="text" wire="datas.{{ $key }}.name" placeholder="Data Name" />
                <x-input type="select" wire="datas.{{ $key }}.type" placeholder="Data Type" :options="$types" width="30%" />
                <x-button class="button__outline" type="button" wire="removeData({{ $key }})"><i class="fa-solid fa-xmark"></i></x-button>
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