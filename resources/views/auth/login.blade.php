<x-layout.auth>
    
    <div class="auth__form">
        <x-form action="{{ route('auth.login.authenticate') }}" method="POST">
            <x-input type="text" name="email" placeholder="Email" />
            <x-input type="password" name="password" placeholder="Password" />
            <x-button type="submit">Login</x-button>
            <x-button type="link" href="{{ route('auth.register.index') }}">Register</x-button>
        </x-form>
    </div>
    
</x-layout.auth>