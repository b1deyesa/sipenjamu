<x-form wire="save(Object.fromEntries(new FormData($event.target)))">
    @foreach ($profil_uppses as $index => $profil_upps)
        <x-input type="{{ $profil_upps->profil->type }}" label="{{ $profil_upps->profil->name }}" name="{{ $profil_upps->id }}" value="{{ $profil_upps->value }}" class="{{ $profil_upps->value ? 'success' : '' }}" />
    @endforeach
    <x-slot:bottom>
        <span style="position: sticky; bottom: 0">
            <x-button type="submit">Save</x-button>
        </span>
    </x-slot:bottom>
</x-form>