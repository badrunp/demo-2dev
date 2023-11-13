<x-guest-layout>
<div class="py-16 px-4 min-h-screen max-w-4xl mx-auto flex items-center justify-center">
<div class="max-w-sm w-full">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div class="mb-8">
         <h1 class="text-2xl font-medium">Login</h1>
         <p class="text-sm text-slate-700 dark:text-slate-400">Selamat datang kembali, masukkan kredensial Anda untuk melanjutkan.</p>
    </div>


    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full bg-slate-50" type="email" name="email" :value="old('email')" autofocus autocomplete="username" placeholder="name@domain.com"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full bg-slate-50"
                            type="password"
                            name="password"
                             autocomplete="current-password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-slate-900 border-slate-300 dark:border-slate-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-slate-800" name="remember">
                <span class="ml-2 text-sm text-slate-600 dark:text-slate-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-4">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">Log in</button>
        </div>
    </form>
    </div>
    </div>
</x-guest-layout>
