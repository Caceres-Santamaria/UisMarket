<header class="bg-primario-n sticky top-0 left-0 z-10 grid-in-header grid grid-cols-mm justify-center content-center border-b-2 border-green-primario-light h-14 lg:grid-rows-lg lg:h-36">
    <div class="grid grid-cols-121 content-center justify-between place-items-center gap-1 w-full h-full">
        <div class="justify-self-center self-center">
            <a href="javascript:void(0);" class=" relative fas-link">
                <i class="fas fas-header fa-bars lg:text-2xl"></i>
            </a>
        </div>
        <div class="">
            <a href="" class="flex items-center no-underline focus:outline-none">
                <img class="w-12 sm:w-20 lg:w-16" src="{{asset('storage/images/website/logoB.png')}}" alt="logo uis market">
                <h1 class="font-Delius ml-1 font-black text-white text-2xl h-14 leading-extra-loose lg:leading-extra-lg lg:text-3xl">Market</h1>
            </a>
        </div>
        <div class="flex justify-self-center self-center mr-4">
            <div class="icono__search px-1">
                <a id="link-buscar" class=" relative fas-link" href="#"><i class="fas lg:text-2xl fas-header fa-search"></i></a>
            </div>
            
            @auth
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-4">
                {{-- <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"> --}}
                            {{-- <div>{{ Auth::user()->name }}</div> --}}
                            {{-- <div>
                                <img src="https://ui-avatars.com/api/?font-size=0.3&rounded=true&bold=true&format=svg&background=000&color=fff&size=35&name={{ Auth::user()->name }}" alt="Avatar usuario">
                            </div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('ingresos')">
                            {{ __('Informe de ingresos') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('rotacion')">
                            {{ __('Informe de rotación') }}
                        </x-dropdown-link> --}}
                        <!-- Authentication -->
                        {{-- <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown> --}}
            </div>
            @endauth
            @guest
            <div class="icono__user iniciar-sesion ml-3 px-1 hidden lg:block">
                <a class=" relative fas-link" href=""><i class="fas fas-header fa-user lg:text-2xl"></i></a>
            </div>
            @endguest
            <div class="icono__car px-1">
                <a id="link-carrito" class=" relative fas-link" href="javascript:void(0)" title="Ver su carrito de compras">
                    <i class="lg:text-2xl fas fas-header fa-shopping-cart"></i>
                    {{-- @if (session()->has('carrito'))
                    <span class="">{{count(session('carrito'))}}</span>
                    @else
                    <span class="">0</span>
                    @endif --}}
                    <span class="w-5 h-5 absolute -top-1 text-xs -right-2 text-black bg-white rounded-full leading-5">0</span>
                </a>
            </div>
        </div>
    </div>
    <nav class=" hidden lg:flex lg:align-center lg:content-center lg:justify-center lg:flex-col lg:w-10/12 lg:bg-primario-dark lg:rounded-3xl lg:place-self-center lg:px-2 lg:border-box  ">
        <ul class=" lg:flex lg:justify-center lg:flex-row lg:list-none lg:self-center lg:relative lg:text-lg ">
            <li class="list-item "><a class="list-item__link" href=""><i class="fas fas-header fa-home lg:text-inherit lg:pr-1.5 lg:relative lg:bg-transparent lg:text-2xl"></i><span>HOME</span></a></li>
            <li class="list-item "><a class="list-item__link" href=""><span>Categorías</span></a>
              <ul class="menu-desktop__list menu-desktop__secondlevel">
                    <li class="lg:hidden list-item list-item-sub cateoria"><a class="list-item__link" href=""><span>Ropa</span></a></li>
                    <li class="lg:hidden list-item list-item-sub cateoria"><a class="list-item__link" href="#"><span>Accesorios</span></a></li>
              </ul>
                    {{-- <li class="list-item list-item-sub cateoria"><a class="list-item__link" href=""><span></span></a></li> --}}
                    {{-- <li class="list-item list-item-sub cateoria"><a class="list-item__link" href="#"><span>No hay categorias</span></a></li> --}}
            </li>
            <li class="list-item "><a class="list-item__link" href=""><span>Tiendas</span></a> </li>
            <li class="list-item "><a class="list-item__link" href=""><span>Promociones</span></a> </li>
            <li class="list-item "><a class="list-item__link" href="{{route('about')}}"><span>¿Quiénes somos?</span></a> </li>
        </ul>
    </nav>
</header>