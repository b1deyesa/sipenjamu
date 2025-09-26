<x-modal>
    <x-slot:label><i class="fa-solid fa-pencil"></i></x-slot:label>
    <x-form wire="update">
        @foreach ($fields as $field)
            <x-input type="{{ $field['type'] }}" label="{{ ucfirst($field['name']) }}" wire="form.{{ $field['name'] }}" />
        @endforeach
        <x-slot:bottom>
            <x-button class="button__outline" type="button" x-on:click="open = false">Cancel</x-button>
            <x-button type="submit">Save</x-button>
        </x-slot:bottom>
    </x-form>
</x-modal>
