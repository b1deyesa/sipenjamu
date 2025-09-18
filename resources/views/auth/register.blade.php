<x-layout.auth>
    
    {{-- Auth Form --}}
    <div class="auth__form">
        <x-form action="{{ route('auth.register.request') }}" method="POST">
            <x-input type="text" name="name" placeholder="Full Name" />
            <x-input type="text" name="email" placeholder="Email" />
            <x-input type="password" name="password" placeholder="Password" />
            <x-input type="password" name="password_confirmation" placeholder="Confirm Password" />
            <x-button type="submit">Request Access</x-button>
            <x-button type="link" href="{{ route('auth.login.index') }}">Login</x-button>
        </x-form>
    </div>
    
</x-layout.auth>