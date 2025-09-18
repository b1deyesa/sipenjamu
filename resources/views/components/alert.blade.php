<div class="alert">
    <div class="alert__container">
        @if(session()->has('error'))
            <div>
                {{ session('error') }}
            </div>
        @elseif(session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>