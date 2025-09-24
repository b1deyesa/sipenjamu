<span x-data="searchableTable()" 
      x-init="updateVisibleRows(); $watch('search', () => { setTimeout(() => updateVisibleRows(), 10); });">
      
    {{-- Features --}}
    <div class="content__feature">
        @if('dashboard.monev.create')
            @livewire('dashboard.monev.create', ['slug' => $slug, 'upps' => $upps])
        @endif
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
                @php
                    // buat searchableText per-row
                    $searchableText = strtolower(
                        collect($searchField)
                            ->map(function ($field) use ($row) {
                                $value = data_get((array) $row, $field) ?? '';
                                if (is_array($value)) {
                                    $value = implode(' ', $value);
                                } elseif (!is_string($value)) {
                                    $value = (string) json_encode($value);
                                }
                                return $value;
                            })
                            ->join(' ')
                    );
                @endphp

                <tr class="data-row" 
                    x-show="search === '' || '{{ $searchableText }}'.includes(search.toLowerCase())">

                    @foreach ($searchField as $label => $field)
                        @php
                            $value = data_get((array) $row, $field) ?? '';
                            if (is_array($value)) {
                                $value = implode(' ', $value);
                            } elseif (!is_string($value)) {
                                $value = (string) json_encode($value);
                            }
                        @endphp

                        @if ($field == 'link')
                            <td>{!! linkIcon($value) !!}</td>
                        @else
                            <td x-html="highlight('{{ addslashes($value) }}')"></td>
                        @endif
                    @endforeach

                    <td width="1%">
                        <div class="table__action">
                            @if('dashboard.monev.update')
                                @livewire('dashboard.monev.update', [
                                    'row' => $row->id,
                                    'slug' => $slug,
                                    'upps' => $upps
                                ], key('dashboard.monev.update' . $row->id))
                            @endif
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
                let count = 0;
                rows.forEach(row => {
                    if (window.getComputedStyle(row).display !== 'none') count++;
                });
                this.visibleRowsCount = count;
            },
            highlight(text) {
                if (!this.search) return text;
                const searchLower = this.search.toLowerCase();
                const textLower = text.toLowerCase();
                let result = '';
                let i = 0;
                while (i < text.length) {
                    const index = textLower.indexOf(searchLower, i);
                    if (index === -1) {
                        result += text.slice(i);
                        break;
                    }
                    result += text.slice(i, index);
                    result += '<mark>' + text.slice(index, index + this.search.length) + '</mark>';
                    i = index + this.search.length;
                }
                return result;
            }
        }
    }
</script>
@endpush