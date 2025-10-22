<x-modal title="Add Bentuk Pengendalian">

    {{-- Button --}}
    <x-slot:trigger>
        <x-button class="button__success"><i class="fa-solid fa-plus"></i>Tambahkan Pengendalian</x-button>
    </x-slot:trigger>
    
    {{-- Form --}}
    <x-form wire="store">
        <x-input type="select" label="Nama Bidang Pengaturan Standar" wire="pengendalian" :options="$pengendalians" placeholder="Pilih Nama Bidang" />
        <hr class="modal__separator">
        <x-input type="radio" label="Apakah ada tautan RTM (Rapat Tinjau Manajemen) ?" wire="show_rtm" :options="json_encode([true => 'Ada', false => 'Tidak'])" />
        @if ($show_rtm)
            <x-input type="input" label="Masukkan tautan Pelaksanaan RTM :" wire="link_rtm" />
            <x-input type="input" label="Masukkan tautan bukti Pelaksanaan RTM :" wire="link_rtm_testimony" />
        @endif
        <hr class="modal__separator">
        <x-input type="radio" label="Apakah ada tautan RTL (Rencana Tindak Lanjut) ?" wire="show_rtl" :options="json_encode([true => 'Ada', false => 'Tidak'])" />
        @if ($show_rtl)
            <x-input type="input" label="Masukkan tautan Pelaksanaan RTL :" wire="link_rtl" />
            <x-input type="input" label="Masukkan tautan bukti Pelaksanaan RTL :" wire="link_rtl_testimony" />
        @endif
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Save</x-button>
        </x-slot:bottom>
    </x-form>
    
</x-modal>