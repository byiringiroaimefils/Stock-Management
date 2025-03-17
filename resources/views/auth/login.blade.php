<x-guest-layout>
    <div class="flex flex-col space-y-2 min-h-screen items-center justify-center p-4">
        <div class="w-full max-w-md space-y-6 bg-white dark:bg-gray-800 p-8 rounded-lg ">
            <!-- Header -->
            <div class="space-y-2 text-center">
                <h1 class="text-2xl font-semibold tracking-tight">
                    {{ __('Welcome back') }}
                </h1>
                <p class="text-sm text-muted-foreground dark:text-gray-400">
                    {{ __('Enter your credentials to access your account') }}
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email Address -->
                <div class="space-y-2">
                    <x-input-label for="email" :value="__('Email')" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" />
                    <x-text-input 
                        id="email" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="username"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" 
                    />
                    <x-input-error :messages="$errors->get('email')" class="text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <x-input-label for="password" :value="__('Password')" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70" />
                    <x-text-input 
                        id="password" 
                        type="password"
                        name="password"
                        required 
                        autocomplete="current-password"
                        class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    />
                    <x-input-error :messages="$errors->get('password')" class="text-sm text-red-500" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center space-x-2">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        name="remember"
                        class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                    >
                    <label for="remember_me" class="text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Remember me') }}
                    </label>
                </div>

                <div class="flex flex-col space-y-4">
                    <x-primary-button class="w-full inline-flex  items-center justify-center rounded-md text-sm font-medium ring-offset-background  focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring  h-10 px-4 py-2">
                        {{ __('Log in') }}
                    </x-primary-button>

                    <div class="flex items-center justify-center">
                        <a 
                            href="{{ route('register') }}"
                            class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 underline-offset-4 hover:underline"
                        >
                            {{ __('Need an account?') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
