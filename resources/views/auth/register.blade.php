<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-text-input id="name" class="form-control form-control-lg bg-light fs-6 mb-3" 
            type="text" name="name" :value="old('name')" required autofocus autocomplete="name" 
            placeholder="Masukan Nama Anda"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-text-input id="email" class="form-control form-control-lg bg-light fs-6 mb-3" 
            type="email" name="email" :value="old('email')" required autocomplete="username" 
            placeholder="Masukan Email Anda"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input id="password" class="form-control form-control-lg bg-light fs-6 mb-3"
                            type="password"
                            name="password"
                            required autocomplete="new-password" 
                            placeholder="Masukan Password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">

            <x-text-input id="password_confirmation" class="form-control form-control-lg bg-light fs-6 mb-3"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" 
                            placeholder="Confrim Password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button >
            {{ __('Register') }}
        </x-primary-button>

        <div class="d-flex justify-content-center mt-2">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Sudah Memiliki Akun ?') }}
            </a>

        </div>
    </form>
</x-guest-layout>
