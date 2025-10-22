<x-layout.auth title="Login">
    <div class="auth__form">
        <x-form action="{{ route('auth.login.authenticate') }}" method="POST">
            <x-input type="text" name="email" placeholder="Email" />
            <x-input type="password" name="password" placeholder="Password" />
            <div class="form__navigation">
                <label>
                    <input type="checkbox">Remember Me
                </label>
                <a href="{{ route('auth.register.index') }}">Request Access?</a>
            </div>
            <x-slot:bottom>
                <x-button type="submit">Login</x-button>
            </x-slot:bottom>
        </x-form>
    </div>
</x-layout.auth>