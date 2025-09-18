<div>

    {{-- Form Input --}}
    <x-form wire="save">
        @foreach ($fields as $field)
            <div>
                <x-input type="{{ $field['type'] }}" label="{{ ucfirst($field['name']) }}" wire="form.{{ $field['name'] }}" />
            </div>
        @endforeach
        <x-slot:bottom>
            <x-button type="submit">Add</x-button>
        </x-slot:bottom>
    </x-form>
    
    {{-- Data Table --}}
    <x-crud-table 
        :items="$tables" 
        :searchField="$searchField"
    ></x-crud-table>
    npm
</div>
