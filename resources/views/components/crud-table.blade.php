<span x-data="searchableTable()" x-init="updateVisibleRows(); $watch('search', () => {setTimeout(() => updateVisibleRows(), 10);});">
      
    {{-- Features --}}
    <div class="content__feature">
        @if($createComponent)
            @livewire($createComponent)
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
            @foreach ($items as $item)
                @php
                    $searchableText = strtolower(collect($searchField)->map(fn($field) => data_get($item, $field) ?? '')->join(' '));
                @endphp
                <tr class="data-row" x-show="search === '' || '{{ $searchableText }}'.includes(search.toLowerCase())">
                    @foreach ($searchField as $label => $field)
                        @php
                            $value = data_get($item, $field) ?? '';
                        @endphp
                        @if ($field == 'link')
                            <td>{!! linkIcon($value) !!}</td>
                        @else
                            <td x-html="highlight('{{ addslashes($value) }}')"></td>
                        @endif
                    @endforeach
                    <td width="1%">
                        <div class="table__action">
                            @if($updateComponentPrefix)
                                @livewire($updateComponentPrefix, ['item' => $item], key($updateComponentPrefix . $item->id))
                            @endif
                            @if($deleteComponentPrefix)
                                @livewire($deleteComponentPrefix, ['item' => $item], key($deleteComponentPrefix . $item->id))
                            @endif
                            @if($reviewComponentPrefix)
                                @livewire($reviewComponentPrefix, ['item' => $item], key($reviewComponentPrefix . $item->id))
                            @endif
                            {{ $slot }}
                        </div>
                    </td>
                </tr>
            @endforeach
            <tr x-show="visibleRowsCount === 0">
                <td colspan="{{ count($searchField) + 1 }}" align="center"><small class="table__empty">No Data.</small></td>
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