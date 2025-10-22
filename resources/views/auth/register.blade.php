<x-layout.auth title="Register">
    <div class="auth__form">
        <x-form action="{{ route('auth.register.request') }}" method="POST">
            <x-input type="text" name="name" placeholder="Full Name" />
            <x-input type="text" name="email" placeholder="Email" />
            <x-input type="password" name="password" placeholder="Password" />
            <x-input type="password" name="password_confirmation" placeholder="Confirm Password" />
            <div class="form__navigation">
                <div></div>
                <a href="{{ route('auth.login.index') }}">Have an Access?</a>
            </div>
            <x-slot:bottom>
                <x-button type="submit">Request Access</x-button>
            </x-slot:bottom>
        </x-form>
    </div>
</x-layout.auth>