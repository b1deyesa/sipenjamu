<div class="chart-container" style="height: {{ $height }};">
    <canvas id="{{ $id }}"></canvas>
</div>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            window.initChart(
                "{{ $id }}",
                "{{ $type }}",
                {!! json_encode($labels) !!},
                {!! json_encode($datas) !!},
                {!! json_encode($backgrounds) !!}
            );
        });
    </script>
@endpush