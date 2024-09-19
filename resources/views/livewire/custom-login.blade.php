@if ($bylal)
    <div class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat text-center bg-fixed" style="background-image: url('{{ url('img/bullAndBear.png') }}');">
@else
    <div class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat text-center bg-fixed">
@endif
    <x-authentication-card>
        <x-slot name="logo">
            @if ($bylal)
                <img src="{{ url('img/login-page-logo.png') }}" alt="tradeed logo" class="px-4 md:px-0">
            @else
                <img src="{{ url('img/NAD_Logo.png') }}" alt="tradeed logo" class="px-4 md:px-0">
            @endif
        </x-slot>

        {{-- <x-validation-errors class="mb-4" /> --}}

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>

                <a href="{{ url('auth/google') }}" class="bg-blue-600 text-white rounded-md px-4 py-2 ml-2">
                    Google Login
                </a> 
            </div>
            <div class="flex items-center justify-start mt-4">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button> --}}
                <button class="btn bg-indigo-700 ms-4" wire:click.prevent="swapLoginPage">
                    Swap to 6ylal Login Page
                </button>
                {{-- <a href="{{ url('6ylal/login') }}" class="border border-blue-600 text-white rounded-md px-4 py-2 ml-2">
                    Swap to 6ylal Login Page
                </a>  --}}
            </div>
        </form>
    </x-authentication-card>
</div>
