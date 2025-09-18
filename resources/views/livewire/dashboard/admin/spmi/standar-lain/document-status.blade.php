<td width="1%">
    <div class="table__action">
        {!! linkIcon($item->link) !!}
        @if (!$item->document_status)
            <x-button wire="update({{ true }})"><i class="fa-solid fa-check"></i></x-button>
        @endif
    </div>
</td>