<x-guest-layout>
<div class="py-16 px-4 min-h-screen max-w-4xl mx-auto flex items-center justify-center">
<div class="max-w-sm w-full">
   <h1 class="text-2xl font-semibold mb-8">Forgot Password</h1>
    <div class="mb-4 text-sm text-slate-600 dark:text-slate-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
    </div>
    </div>
</x-guest-layout>
