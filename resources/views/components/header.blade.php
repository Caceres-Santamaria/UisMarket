<header x-data="{ menu: false, carrito: false }"
    class="bg-primario-n sticky top-0 left-0 z-10 grid-in-header grid grid-cols-mm justify-center content-center border-b-2 border-green-primario-light h-14 lg:grid-rows-lg lg:h-36">
    <div class="grid grid-cols-121 content-center justify-between place-items-center gap-1 w-full h-full">
        <div class="justify-self-center self-center">
            <a href="javascript:void(0);" class=" relative fas-link" @click="menu = true">
                <i class="fas fas-header fa-bars lg:text-2xl"></i>
            </a>
        </div>
        <div class="">
            <a href="{{ route('home') }}" class="flex items-center no-underline focus:outline-none">
                <img class="w-12 sm:w-12 lg:w-16" src="{{ asset('storage/images/website/logoB.png') }}"
                    alt="logo uis market">
                <h1
                    class="font-Delius ml-1 font-black text-white text-2xl h-14 leading-extra-loose lg:leading-extra-lg lg:text-3xl">
                    Market</h1>
            </a>
        </div>
        <div class="flex justify-self-center self-center items-center mr-4">
            <div class="px-1">
                <a id="link-buscar" class=" relative fas-link" href="#"><i
                        class="fas lg:text-2xl fas-header fa-search"></i></a>
            </div>
            @auth
                <x-dropdown-user class="hidden" />
            @endauth
            @guest
                <div class="icono__user iniciar-sesion ml-3 px-1 hidden lg:block">
                    <a class=" relative fas-link" href="{{ route('login') }}"><i
                            class="fas fas-header fa-user-circle text-white lg:text-2xl cursor-pointer"></i></a>
                </div>
            @endguest
            @livewire('carrito')
        </div>
    </div>
    <x-nav />
    <div x-show="carrito" x-transition class="fixed top-0 bg-black2-50 w-full h-full z-100 carrito-fijo">
        @livewire('carrito-desplegable')
    </div>
    <x-menu-responsive />

    <div id="busqueda"
        class="fixed top-0 left-0 h-screen w-screen z-100 duration-500 transition-all
    ease-ease translate-x-100">
        <livewire:buscar />
    </div>
</header>
