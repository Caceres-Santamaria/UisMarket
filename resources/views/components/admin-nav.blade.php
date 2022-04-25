<nav
    class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div
        class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button
            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
            type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
            href="{{ route('admin.dashboard') }}">
            Uis Market
        </a>
        @auth
            <x-dropdown-admin class="md:hidden" />
        @endauth
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
            id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                            href="{{ route('admin.dashboard') }}">
                            Uis Market
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button"
                            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                            onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                DASHBOARD
            </h6>
            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="items-center">
                    <a href="{{ route('admin.dashboard') }}"
                        class="text-xs uppercase py-3 font-bold block {{ setActiveAdmin('admin.dashboard') }}">
                        <i class="fas fa-home text-blueGray-300 mr-2 text-base"></i>
                        INICIO
                    </a>
                </li>


            </ul>
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                USUARIOS
            </h6>
            <!-- Navigation -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route('admin.clientes') }}"
                        class="text-xs uppercase py-3 font-bold block {{ setActiveAdmin('admin.clientes') }}">
                        <i class="fas fa-user mr-2 text-base opacity-75"></i>
                        Gestionar
                    </a>
                </li>

            </ul>

            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                Tiendas
            </h6>
            <!-- Navigation -->
            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="items-center">
                    <a href="{{ route('admin.solicitudes') }}"
                        class="text-xs uppercase py-3 font-bold block {{ setActiveAdmin('admin.solicitudes') }}">
                        <i class="fas fa-bell mr-2 text-base text-blueGray-300"></i>
                        Solicitudes
                    </a>
                </li>
                <li class="items-center">
                    <a href="{{ route('admin.tiendas') }}"
                        class="text-xs uppercase py-3 font-bold block {{ setActiveAdmin('admin.tiendas') }}">
                        <i class="fas fa-store mr-2 text-base text-blueGray-300"></i>
                        Gestionar
                    </a>
                </li>
                <li class="items-center">
                    <a href="{{ route('admin.tiendas.suspendidas') }}"
                        class="text-xs uppercase py-3 font-bold block {{ setActiveAdmin('admin.tiendas.suspendidas') }}">
                        <i class="fas fa-eye-slash text-blueGray-300 mr-2 text-base"></i>
                        Suspendidas
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                Productos
            </h6>
            <!-- Navigation -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="items-center">
                    <a href="{{ route('admin.productos') }}"
                        class="text-xs uppercase py-3 font-bold block {{ setActiveAdmin('admin.productos') }}">
                        <i class="fas fa-tshirt text-blueGray-300 mr-2 text-base"></i>
                        Gestionar
                    </a>
                </li>
                <li class="items-center">
                    <a href="{{ route('admin.productos.suspendidos') }}"
                        class="text-xs uppercase py-3 font-bold block {{ setActiveAdmin('admin.productos.suspendidos') }}">
                        <i class="fas fa-eye-slash text-blueGray-300 mr-2 text-base"></i>
                        Suspendidos
                    </a>
                </li>
            </ul>


            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                Categorias
            </h6>
            <!-- Navigation -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                <li class="items-center">
                    <a href="{{ route('admin.categorias') }}"
                        class="text-xs uppercase py-3 font-bold block {{ setActiveAdmin('admin.categorias') }}">
                        <i class="fas fa-th-large text-blueGray-300 mr-2 text-base"></i>
                        gestionar categorias
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            @if (auth()->user()->rol == '0')
                <hr class="my-4 md:min-w-full" />
                <!-- Heading -->
                <h6 class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline">
                    cuentas administradoras
                </h6>
                <!-- Navigation -->
                <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                    <li class="inline-flex">
                        <a href="{{ route('admin.administradores') }}"
                            class="text-xs uppercase py-3 font-bold block {{ setActiveAdmin('admin.administradores') }}">
                            <i class="fas fa-users-cog mr-2 text-blueGray-300 text-base"></i>
                            gestionar cuentas
                        </a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
