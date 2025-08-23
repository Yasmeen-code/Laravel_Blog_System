<div>
    <form wire:submit.prevent="register">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input 
                id="name" 
                class="block mt-1 w-full" 
                type="text" 
                wire:model="name" 
                required 
                autofocus 
                autocomplete="name" 
            />
            @error('name') <span class="text-red-500 text-sm mt-2">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input 
                id="email" 
                class="block mt-1 w-full" 
                type="email" 
                wire:model="email" 
                required 
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
                autocomplete="new-password" 
            />
            @error('password') <span class="text-red-500 text-sm mt-2">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input 
                id="password_confirmation" 
                class="block mt-1 w-full"
                type="password"
                wire:model="password_confirmation" 
                required 
                autocomplete="new-password" 
            />
            @error('password_confirmation') <span class="text-red-500 text-sm mt-2">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4" wire:loading.attr="disabled">
                <span wire:loading.remove>{{ __('Register') }}</span>
                <span wire:loading>{{ __('Registering...') }}</span>
            </x-primary-button>
        </div>

        @if (session()->has('status'))
            <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('status') }}
            </div>
        @endif
    </form>
</div>
