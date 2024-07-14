<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <!--<a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>-->
                    <!-- Botón para cambiar de modo -->
                    <button
                        @click="isDarkMode = !isDarkMode; localStorage.setItem('theme', isDarkMode ? 'dark' : 'light')"
                        class="p-2 rounded bg-gray-200 dark:bg-gray-800">
                        <i :class="isDarkMode ? 'fas fa-sun' : 'fas fa-moon'"></i>
                    </button>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>


                <!-- Settings Dropdown-Productos -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ __('Productos') }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('productos.index')"
                                :active="request()->routeIs('productos.index')">
                                {{ __('Productos') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('categorias.index')"
                                :active="request()->routeIs('categorias.index')">
                                {{ __('Categorias') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('ingresos.index')"
                                :active="request()->routeIs('ingresos.index')">
                                {{ __('Ingresos') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('salidas.index')"
                                :active="request()->routeIs('salidas.index')">
                                {{ __('Salidas') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('inventarios.index')"
                                :active="request()->routeIs('inventarios.index')">
                                {{ __('Inventario') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!----------------------------------------------------------------->

                <!-- Settings Dropdown-Clientes -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ __('Clientes') }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('clientes.index')"
                                :active="request()->routeIs('clientes.index')">
                                {{ __('Clientes') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('proveedors.index')"
                                :active="request()->routeIs('proveedors.index')">
                                {{ __('Proveedores') }}
                            </x-dropdown-link>

                        </x-slot>
                    </x-dropdown>
                </div>

                <!----------------------------------------------------------------->
                <!-- Settings Dropdown-Ordenes -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ __('Mis pedidos') }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('producto.catalogo')"
                                :active="request()->routeIs('producto.catalogo')">
                                {{ __('Mi Catalogo') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('ordens.indexOrdens')" :active="request()->routeIs('ordens.indexOrdens')">
                                {{ __('Ordenes') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('ordens.indexEntregas')"
                                :active="request()->routeIs('ordens.indexEntregas')">
                                {{ __('Entregas') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('ordens.indexVentas')"
                                :active="request()->routeIs('ordens.indexVentas')">
                                {{ __('Ventas') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('estados.index')"
                                :active="request()->routeIs('estados.index')">
                                {{ __('Estados') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('pagos.index')"
                                :active="request()->routeIs('pagos.index')">
                                {{ __('Pagos') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!----------------------------------------------------------------->


            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:">
                <button onclick="window.location='{{ route('detalle-ordens.index') }}'" class="inline-flex items-center justify-center p-2 rounded-md bg-black hover:bg-grey-800 text-white font-bold py-2 px-4 rounded">
                    <x-car></x-car>
                </button>

            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>