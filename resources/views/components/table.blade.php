<table class="table{{ $class }}">
    @if ($head)
        <thead>
            <tr>
                {{ $head }}
            </tr>
        </thead>
    @endif
    @if ($body)
    <tbody>
        {{ $body }}
    </tbody>
    @endif
</table>