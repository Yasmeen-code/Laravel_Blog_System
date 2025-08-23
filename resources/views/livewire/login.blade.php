<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit.prevent="login">
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input 
                id="email" 
                class="block mt-1 w-full" 
                type="email" 
                wire:model="email" 
                required 
                autofocus 
                autocomplete="username" 
            />
            @error('email') <span class="text-red-500 text-sm mt-2">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input 
                id="password" 
                class="block mt-1 w-full"
                type="password"
                wire:model="password"
                required 
                autocomplete="current-password" 
            />
            @error('password') <span class="text-red-500 text-sm mt-2">{{ $message }}</span> @enderror
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" 
                    wire:model="remember"
                >
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3" wire:loading.attr="disabled">
                <span wire:loading.remove>{{ __('Log in') }}</span>
                <span wire:loading>{{ __('Logging in...') }}</span>
            </x-primary-button>
        </div>

        @if (session()->has('error'))
            <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif
    </form>
</div>
