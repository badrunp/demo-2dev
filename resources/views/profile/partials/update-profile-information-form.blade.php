<section>
    <header>
        <h2 class="text-lg font-medium text-slate-900 dark:text-slate-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
            {{ __("Update your account's profile information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full opacity-50" :value="old('email', $user->email)" required autocomplete="username" readonly />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-slate-800 dark:text-slate-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-slate-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
                <div>
            <x-input-label for="role" :value="__('Akses')" />
            <x-text-input id="role" name="role" type="text" class="mt-1 block w-full opacity-50" :value="old('role', $user->role)" required autocomplete="username" readonly />
            <x-input-error class="mt-2" :messages="$errors->get('role')" />
            </div>
            
                            <div>
            <x-input-label for="jabatan" :value="__('Jabatan')" />
            <x-text-input id="jabatan" name="jabatan" type="text" class="mt-1 block w-full" :value="old('jabatan', $user->jabatan)" required autocomplete="username"  />
            <x-input-error class="mt-2" :messages="$errors->get('jabatan')" />
            </div>
            
                        <div>
            <x-input-label for="phone" :value="__('Nomor HP')" />
            <x-text-input id="phone" name="phone" type="number" class="mt-1 block w-full" :value="old('phone', $user->phone)" />
                                    <p class="mt-2 text-xs text-gray-500 dark:text-slate-400">Contoh: 0881023139497</p>
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>
    
    <div>
            <x-input-label for="github_url" :value="__('Github URL')" />
            <x-text-input id="github_url" name="github_url" type="text" class="mt-1 block w-full" :value="old('github_url', $user->github_url)" />
            <p class="mt-2 text-xs text-gray-500 dark:text-slate-400">Contoh: https://www.github.com/yourgithub</p>
            <x-input-error class="mt-2" :messages="$errors->get('github_url')" />
            </div>
            
            <div>
            <x-input-label for="linkedin_url" :value="__('Linkedin URL')" />
            <x-text-input id="linkedin_url" name="linkedin_url" type="text" class="mt-1 block w-full" :value="old('linkedin_url', $user->linkedin_url)" />
                        <p class="mt-2 text-xs text-gray-500 dark:text-slate-400">Contoh: https://www.linkedin.com/in/yourlinkedin</p>
            <x-input-error class="mt-2" :messages="$errors->get('linkedin_url')" />
            </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-slate-600 dark:text-slate-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
