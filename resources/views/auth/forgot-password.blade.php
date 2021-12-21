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
    <x-slot name="PageName">{{ config('app.name') }}: Forget Password</x-slot>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__($NameField)" />

                <x-input id="email" class="block mt-1 w-full" type="{{$type}}" name="{{$validateField}}" :value="old($validateField)" required
                    autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
