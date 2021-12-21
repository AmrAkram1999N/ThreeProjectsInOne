<x-guest-layout >

    @php
        $request = request();
        if($request->is('Chain/Account/*'))
        {
            $Model = 'Account';
            $validateField = 'username';
            $NameField = 'User Name';
            $type = 'text';
            $Page_Name =  'Web_Services: Register';
        }else {
            $Model = 'User';
            $validateField = 'email';
            $NameField = 'Email';
            $type = 'email';
            $Page_Name =  'Web_Services: Register';
        }
    @endphp
    <x-slot name="PageName">{{config('app.name')}}: Register</x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{ route('welcome') }}">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="register">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__($NameField)" />

                <x-input id="email" class="block mt-1 w-full" type={{$type}} name={{$validateField}} :value="old($validateField)" required />
            </div>

            @if ($request->is('Chain/User/*'))

            <div class="mt-4">
                <x-label for="email" :value="__('Username')" />

                <x-input id="email" class="block mt-1 w-full" type="text" name='username' :value="old('username')" required />
            </div>

            @endif

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                    href="login">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
