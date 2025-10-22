<span 
    x-data="searchableTable()" 
    x-init="updateVisibleRows(); 
            $watch('search', () => { setTimeout(() => updateVisibleRows(), 10); });">

    {{-- Features --}}
    <div class="content__feature">
        @if($createComponent)
            @livewire($createComponent, ['periode' => request()->route('periode') ?? null])
        @endif
        <div class="feature__right">
            <x-input type="search" placeholder="Search here.." x-model="search" />
            @if (request()->route('periode') && $periode)
                <div class="input" style="width: 150px">
                    <div class="select">
                        <select onchange="location.href = '{{ route(Route::currentRouteName(), ['periode' => '__PERIODE__']) }}'.replace('__PERIODE__', this.value);">
                            @foreach ($periodes as $periode)
                                <option value="{{ $periode->id }}" @selected($periode->id == request()?->route('periode')?->id)>{{ $periode->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- Table --}}
    <x-table class="content__table">
        <x-slot:head>
            @foreach ($searchField as $field)
                <th 
                    @if(isset($field['align'])) 
                        style="text-align: {{ $field['align'] }};" 
                    @endif
                >
                    {{ $field['label'] }}
                </th>
            @endforeach
            <th></th>
        </x-slot:head>

        <x-slot:body>
            @foreach ($items as $item)
                @php
                    $searchableText = strtolower(
                        collect($searchField)->map(fn($f) => data_get($item, $f['name']) ?? '')->join(' ')
                    );
                @endphp

                <tr class="data-row" 
                    x-show="search === '' || '{{ $searchableText }}'.toLowerCase().includes(search.toLowerCase())">

                    @foreach ($searchField as $field)
                        @php
                            $value = data_get($item, $field['name']) ?? '';
                            $type = $field['type'] ?? 'text';
                            $align = $field['align'] ?? 'left';
                            $width = $field['width'] ?? 'auto';
                        @endphp

                        @if ($type === 'email')
                            <td style="text-align: {{ $align }}; width: {{ $width }};">{!! email($value) !!}</td>
                        @elseif ($type === 'linkIcon')
                            <td style="width: {{ $width }};">
                                <div style="display: flex; justify-content: {{ $align }}; width: 100%;">
                                    {!! linkIcon($value) !!}
                                </div>
                            </td>
                        @elseif ($type === 'color')
                            <td style="width: {{ $width }};">
                                <div style="display: flex; justify-content: {{ $align }}; width: 100%;">
                                    {!! color($value) !!}
                                </div>
                            </td>
                        @elseif ($type === 'slug')
                            <td style="text-align: {{ $align }}; width: {{ $width }};">{!! slug($value) !!}</td>
                        @elseif ($type === 'date')
                            <td style="text-align: {{ $align }}; width: {{ $width }};">{!! \Carbon\Carbon::parse($value)->format('d M Y') !!}</td>
                        @else
                            <td style="text-align: {{ $align }}; width: {{ $width }};" x-html="highlight('{{ addslashes($value) }}')"></td>
                        @endif
                    @endforeach

                    <td width="1%">
                        <div class="table__action">
                            @if($updateComponentPrefix)
                                @livewire($updateComponentPrefix, ['item' => $item, 'periode' => request()?->route('periode')], key($updateComponentPrefix . $item->id))
                            @endif
                            @if($reviewComponentPrefix)
                                @livewire($reviewComponentPrefix, ['item' => $item, 'periode' => request()?->route('periode')], key($reviewComponentPrefix . $item->id))
                            @endif
                            @if($deleteComponentPrefix)
                                @livewire($deleteComponentPrefix, ['item' => $item, 'periode' => request()?->route('periode')], key($deleteComponentPrefix . $item->id))
                            @endif
                            {{ $slot }}
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