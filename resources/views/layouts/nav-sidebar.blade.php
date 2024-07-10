<div x-data="{ openSidebar: false }" class="flex h-screen bg-gray-200">
    <div :class="{'block': openSidebar, 'hidden': !openSidebar}" class="hidden md:block w-64 bg-white border-r">
        <div class="p-4">
            <button @click="openSidebar = false" class="md:hidden p-2 rounded bg-gray-200 dark:bg-gray-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="mt-1">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
        </div>
        <div class="mt-1">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
        </div>
    </div>

