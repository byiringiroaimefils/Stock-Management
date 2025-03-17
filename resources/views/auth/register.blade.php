<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md">
            <div class="mx-auto space-y-6">
                <div class="space-y-2 text-center">
                    <h1 class="text-3xl font-bold">Create an account</h1>
                    <p class="text-gray-500 dark:text-gray-400">
                        Enter your information to create your account
                    </p>
                </div>

                <div class=" rounded-lg  p-6 bg-white dark:bg-gray-800">
                    <form method="POST" action="{{ route('register') }}" class="space-y-4">
                        @csrf

                        <!-- Name -->
                        <div class="space-y-2">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input 
                                id="name" 
                                type="text" 
                                name="name" 
                                :value="old('name')" 
                                required 
                                autofocus 
                                autocomplete="name"
                                class="flex h-10 w-full rounded-md  border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="space-y-2">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input 
                                id="email" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                required 
                                autocomplete="username"
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="space-y-2">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input 
                                id="password" 
                                type="password"
                                name="password"
                                required 
                                autocomplete="new-password"
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-2">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input 
                                id="password_confirmation" 
                                type="password"
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password"
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-between pt-4">
                            <a 
                                class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                href="{{ route('login') }}"
                            >
                                {{ __('Already registered?') }}
                            </a>

                            <button type="submit" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background   focus-visible:ring-2 focus-visible:ring-ring  h-10 px-4 py-2">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
