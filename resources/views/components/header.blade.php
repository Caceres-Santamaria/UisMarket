<header x-data="{ menu: false, carrito: false, open: false }"
    class="bg-primario-n sticky top-0 left-0 z-10 grid-in-header grid grid-cols-mm justify-center content-center border-b-2 border-green-primario-light h-14 lg:grid-rows-lg lg:h-36">
    <div class="grid grid-cols-121 content-center justify-between place-items-center gap-1 w-full h-full">
        <div class="justify-self-center self-center h-8 w-8">
            <button class="w-full h-full relative fas-link" @click="menu = true">
                <i class="fas fas-header fa-bars lg:text-2xl"></i>
            </button>
        </div>
        <div class="">
            <x-authentication-card-logo />
        </div>
        <div class="flex items-center mr-4 justify-self-center self-center">
            <div class="h-8 w-8">
                <button id="link-buscar" class="w-full h-full relative fas-link">
                    <i class="fas lg:text-2xl fas-header fa-search"></i>
                </button>
            </div>
            @auth
                <x-dropdown-user />
                @if (auth()->user()->rol == 2)
                    <x-dropdown-emprendedor />
                @endif
            @endauth
            @guest
                <div class="sm:ml-3 h-8 w-8">
                    <a class="w-full h-full relative fas-link" href="{{ route('login') }}">
                        <i class="fas fas-header fa-user-circle text-white lg:text-2xl"></i>
                    </a>
                </div>
            @endguest
            @livewire('carrito')
            @auth
                <div class="-mr-2 flex items-center sm:hidden h-8 w-8" @click="open = ! open">
                    <button class="w-full h-full relative fas-link">
                        <i :class="{'hidden': open, 'inline-flex': ! open }"
                            class="fas fas-header fa-bars lg:text-2xl inline-flex"></i>
                        <i :class="{'hidden': ! open, 'inline-flex': open }"
                            class="fas fas-header fa-times lg:text-2xl hidden"></i>
                    </button>
                    <!-- Responsive Navigation Menu -->
                    <div :class="{'fixed top-14 left-0 right-0': open, 'hidden': ! open}"
                        class="hidden sm:hidden bg-white border-x border-gray-400 shadow-sm transition">
                        <!-- Responsive Settings Options -->
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="flex items-center px-4">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <div class="shrink-0 mr-3">
                                        <img class="h-10 w-10 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                    </div>
                                @endif
                                <div>
                                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <div class="mt-3 text-xs text-gray-400 block pl-3 pr-4 py-2 border-t border-gray-200">
                                    {{ __('Manage Account') }}
                                </div>
                                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                                    :active="request()->routeIs('profile.show')">
                                    Información personal
                                </x-jet-responsive-nav-link>

                                <x-jet-responsive-nav-link href="{{ route('pedidos.index') }}"
                                    :active="request()->routeIs('pedidos.index')">
                                    Mis pedidos
                                </x-jet-responsive-nav-link>
                                @if (auth()->user()->tienda == null and auth()->user()->rol == 3)
                                    <x-jet-responsive-nav-link href="{{ route('tienda.create') }}"
                                        :active="request()->routeIs('tienda.create')">
                                        Crear mi tienda
                                    </x-jet-responsive-nav-link>
                                @endif

                                @if (auth()->user()->rol == 0 or auth()->user()->rol == 1)
                                    <x-jet-responsive-nav-link href="{{ route('admin.dashboard') }}"
                                        :active="request()->routeIs('admin*')">
                                        Administrar
                                    </x-jet-responsive-nav-link>
                                @endif

                                @if (auth()->user()->rol == 2)
                                    <div class="mt-3 text-xs text-gray-400 block pl-3 pr-4 py-2 border-t border-gray-200">
                                        {{ __('Manage Shop') }}
                                    </div>
                                    @if (Auth::user()->tienda)
                                        <x-jet-responsive-nav-link href="{{ route('tienda.show') }}"
                                            :active="request()->routeIs('tienda.show')">
                                            Ver mi tienda
                                        </x-jet-responsive-nav-link>
                                        <x-jet-responsive-nav-link
                                            href="{{ route('tienda.edit', Auth::user()->tienda) }}"
                                            :active="request()->routeIs('tienda.edit')">
                                            Actualizar tienda
                                        </x-jet-responsive-nav-link>
                                        <x-jet-responsive-nav-link href="{{ route('emprendedor.pedidos') }}"
                                            :active="request()->routeIs('emprendedor.pedidos')">
                                            Ver pedidos
                                        </x-jet-responsive-nav-link>
                                        <x-jet-responsive-nav-link href="{{ route('tienda.productos') }}"
                                            :active="request()->routeIs('tienda.productos*')">
                                            Gestionar productos
                                        </x-jet-responsive-nav-link>

                                        <x-jet-responsive-nav-link href="{{ route('informes.rotacion') }}"
                                            :active="request()->routeIs('informes.rotacion')">
                                            Informe de rotación
                                        </x-jet-responsive-nav-link>
                                        <x-jet-responsive-nav-link href="{{ route('informes.ingresos') }}"
                                            :active="request()->routeIs('informes.ingresos')">
                                            Informe de ingresos
                                        </x-jet-responsive-nav-link>
                                    @else
                                        <form method="POST" action="{{ route('tienda.activar') }}">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition">
                                                Activar tienda
                                            </button>
                                        </form>
                                    @endif
                                @endif

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" class="mt-3 border-t border-gray-200">
                                    @csrf
                                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-jet-responsive-nav-link>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth

        </div>
    </div>
    <x-nav />
    <div x-show="carrito" x-transition class="fixed top-0 bg-black2-50 w-full h-full z-100 carrito-fijo"
        style="display: none;">
        @livewire('carrito-desplegable')
    </div>
    <x-menu-responsive />

    <div id="busqueda"
        class="fixed top-0 left-0 h-screen w-screen z-100 duration-500 transition-all
    ease-ease translate-x-100">
        <livewire:buscar />
    </div>
</header>
