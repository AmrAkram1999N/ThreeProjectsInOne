<x-guest-layout>
    @php
        $request = request();
        if ($request->is('Chain/Account/*')) {
            $Model = 'Account';
            $validateField = 'username';
            $NameField = 'User Name';
            $Filed = 'username';
            $type = 'text';
            $Page_Name = 'Web_Services: login';
        } else {
            $Model = 'User';
            $validateField = 'email';
            $NameField = 'Email';
            $Filed = 'email';
            $type = 'email';
            $Page_Name = 'Web_Services: login';
        }
    @endphp
    <x-slot name="PageName">{{ config('app.name') }}: Login</x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ route('welcome') }}">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }} ">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__($NameField)" />

                <x-input id="email" class="block mt-1 w-full" type="{{$type}}" name="{{ $Filed }}"
                    :value="old($Filed)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                </a>
            </div>

            @if ($request->is('Chain/User/*'))
                <div class="block ">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="register">
                        {{ __('Register Now') }}

                </div>

            @endif

            @if (Route::has("password.request"))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="forgot-password">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>


        </form>
    </x-auth-card>
</x-guest-layout>
