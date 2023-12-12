<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status  :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" />
            <x-text-input id="email" class="form-control form-control-lg bg-light fs-6" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
            placeholder="Masukan Email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div >
            <x-input-label for="password" />

            <x-text-input id="password" class="form-control form-control-lg bg-light fs-6"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="Masukan Password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="d-flex items-center justify-content-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        </div>

        <x-primary-button class="mt-4">
            {{ __('Log in') }}
        </x-primary-button>

        <div class="d-flex justify-content-center mt-2">
            @if (Route::has('password.request'))
                <a  href="{{ route('register') }}">
                    {{ __('Create new account') }}
                </a>
            @endif

        </div>
    </form>
</x-guest-layout>
