<span x-data="searchableTable()" x-init="updateVisibleRows(); $watch('search', () => { setTimeout(() => updateVisibleRows(), 10); });">
    {{-- Features --}}
    <div class="content__feature">
        @livewire('dashboard.monev.create', ['slug' => $slug, 'upps' => $upps])

        <x-input type="search" placeholder="Search here.." x-model="search" />
    </div>
    
    {{-- Table --}}
    <x-table class="content__table">
        <x-slot:head>
            @foreach ($searchField as $label => $field)
                <th>{{ $label }}</th>
            @endforeach
            <th></th>
        </x-slot:head>

        <x-slot:body>
            @foreach ($tables as $row)
                <tr 
                    class="data-row" 
                    x-show="search === '' || '{{ strtolower($row->searchable_text) }}'.includes(search.toLowerCase())"
                >
                    @foreach ($searchField as $label => $field)
                        @if ($field === 'link')
                            <td>{!! linkIcon($row->$field ?? '') !!}</td>
                        @else
                            <td x-html="highlight('{{ addslashes($row->$field ?? '') }}')"></td>
                        @endif
                    @endforeach

                    <td width="1%">
                        <div class="table__action">
                                @livewire('dashboard.monev.update', ['row' => $row->id,'slug' => $slug,'upps' => $upps], key('dashboard.monev.update' . $row->id))
                                @livewire('dashboard.monev.delete', ['row' => $row->id,'slug' => $slug,'upps' => $upps], key('dashboard.monev.delete' . $row->id))
                        </div>
                    </td>
                </tr>
            @endforeach

            <tr x-show="visibleRowsCount === 0">
                <td colspan="{{ count($searchField) + 1 }}" align="center">
                    <small class="table__empty">No Data.</small>
                </td>
            </tr>
        </x-slot:body>
    </x-table>
</span>

@push('scripts')
<script>
    function searchableTable() {
        return {
            search: '',
            visibleRowsCount: 0,
            updateVisibleRows() {
                const rows = this.$el.querySelectorAll('.data-row');
                this.visibleRowsCount = Array.from(rows).filter(row =>
                    window.getComputedStyle(row).display !== 'none'
                ).length;
            },
            highlight(text) {
                if (!this.search) return text;
                const regex = new RegExp(`(${this.search})`, 'gi');
                return text.replace(regex, '<mark>$1</mark>');
            }
        }
    }
</script>
@endpush