<x-layout.app class="auth">
    <img src="{{ asset('assets/img/gedung-unpatti.jpg') }}">
    <div class="auth__container">
        <x-alert />
        <div class="auth__logo">
            <img src="{{ asset('assets/img/logo-unpatti.png') }}" alt="">
        </div>
        @if($title)<h1 class="auth__title">{{ $title }}</h1>@endif
        {{ $slot }}
    </div>
</x-layout.app>