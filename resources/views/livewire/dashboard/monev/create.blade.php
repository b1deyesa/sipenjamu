<x-modal>
    
    {{-- Button --}}
    <x-slot:trigger>
        <x-button class="button__success"><i class="fa-solid fa-plus"></i>Tambahkan Data</x-button>
    </x-slot:trigger>
    
    {{-- Form --}}
    <x-form wire="store">
        @foreach ($fields as $field)
            <x-input type="{{ $field['type'] }}" label="{{ ucfirst($field['name']) }}" wire="form.{{ $field['name'] }}" />
        @endforeach
        <x-slot:bottom>
            <x-button type="submit">Add</x-button>
        </x-slot:bottom>
    </x-form>
    
</x-modal>
