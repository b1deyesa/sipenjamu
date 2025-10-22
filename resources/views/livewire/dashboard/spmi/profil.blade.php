<x-form wire="save(Object.fromEntries(new FormData($event.target)))">
    @foreach ($profilUppses as $profilUpps)
        <x-input
            type="{{ $profilUpps->profil->type }}"
            label="{{ $profilUpps->profil->name }}"
            name="{{ $profilUpps->id }}"
            value="{{ $profilUpps->value }}"
            class="{{ $profilUpps->value ? 'success' : '' }}"
        />
    @endforeach

    <x-slot:bottom>
        <span style="position: sticky; bottom: 0">
            <x-button type="submit">Save</x-button>
        </span>
    </x-slot:bottom>
</x-form>
