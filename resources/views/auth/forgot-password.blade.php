<x-guest-layout>
    <h2 class="text-center mb-5 text-3xl dark:text-white"><a href="/">{{ __('layouts.header.appname') }}</a></h2>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('layouts.auth.forgotmessage') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('layouts.auth.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('layouts.auth.resetpassword') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
