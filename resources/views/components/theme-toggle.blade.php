{{-- @props(['class' => ''])

<div x-data="{
    mode: localStorage.theme || 'system',
    toggleMenu: false,
    init() {
        this.$watch('mode', value => {
            if (value === 'dark') {
                setDarkMode();
            } else if (value === 'light') {
                setLightMode();
            } else {
                setSystemMode();
            }
        })
    }
}" class="{{ $class }} relative">
    <button
        @click="toggleMenu = !toggleMenu"
        class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors hover:bg-muted hover:text-muted-foreground h-9 w-9 text-foreground"
        type="button"
        aria-haspopup="true"
        :aria-expanded="toggleMenu"
    >
        <!-- Sun icon for light mode -->
        <svg x-cloak x-show="mode === 'light'" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>

        <!-- Moon icon for dark mode -->
        <svg x-cloak x-show="mode === 'dark'" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>

        <!-- Monitor icon for system mode -->
        <svg x-cloak x-show="mode === 'system'" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-monitor"><rect width="20" height="14" x="2" y="3" rx="2"/><line x1="8" x2="16" y1="21" y2="21"/><line x1="12" x2="12" y1="17" y2="21"/></svg>

        <span class="sr-only">Toggle theme</span>
    </button>

    <!-- Dropdown menu -->
    <div
        x-cloak
        x-show="toggleMenu"
        @click.away="toggleMenu = false"
        class="absolute right-0 mt-2 w-36 rounded-md border bg-popover text-popover-foreground shadow-md"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
    >
        <div class="p-1">
            <button
                @click="mode = 'light'; toggleMenu = false"
                class="w-full flex items-center gap-2 rounded-sm px-2 py-1.5 text-sm hover:bg-accent hover:text-accent-foreground"
                :class="{ 'bg-accent': mode === 'light' }"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
                Light
            </button>
            <button
                @click="mode = 'dark'; toggleMenu = false"
                class="w-full flex items-center gap-2 rounded-sm px-2 py-1.5 text-sm hover:bg-accent hover:text-accent-foreground"
                :class="{ 'bg-accent': mode === 'dark' }"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                Dark
            </button>
            <button
                @click="mode = 'system'; toggleMenu = false"
                class="w-full flex items-center gap-2 rounded-sm px-2 py-1.5 text-sm hover:bg-accent hover:text-accent-foreground"
                :class="{ 'bg-accent': mode === 'system' }"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-monitor"><rect width="20" height="14" x="2" y="3" rx="2"/><line x1="8" x2="16" y1="21" y2="21"/><line x1="12" x2="12" y1="17" y2="21"/></svg>
                System
            </button>
        </div>
    </div>
</div>

<style>
[x-cloak] { display: none !important; }
</style> a --}}
