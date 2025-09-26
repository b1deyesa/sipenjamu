<x-modal>
    <x-slot:label><i class="fa-solid fa-plus"></i>Add data</x-slot:label>
    <x-form wire="store">
        @foreach ($fields as $field)
            <x-input type="{{ $field['type'] }}" label="{{ ucfirst($field['name']) }}" wire="form.{{ $field['name'] }}" />
        @endforeach
        <x-slot:bottom>
            <x-button type="submit">Add</x-button>
        </x-slot:bottom>
    </x-form>
</x-modal>
