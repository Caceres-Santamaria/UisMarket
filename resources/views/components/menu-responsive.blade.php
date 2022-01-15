<div x-show="menu" x-transition x-data="{ categoria : false}"
class="fixed left-0 top-0 bg-black2-50 h-screen w-screen z-100">
    <div @click.outside="menu = false; categoria = false" class="left-0 relative top-0 bottom-0 text-black bg-white w-80 h-full m-0">
        <div
            class="flex justify-between content-center items-center bg-primario-ligth border-b border-primario-dark2 h-12 px-3">
            <h3 id="close-menu-main" @click="menu = false"
                class="m-0 p-0 w-9 h-9 text-center leading-9 clip-path-50 cursor-pointer hover:bg-green-400 hover:rotate-360 transition-all duration-500 ease-ease">
                <span class="fas fa-times text-lg"></span>
            </h3>
            <h3 class="m-0 p-0 text-base">Menú</h3>
        </div>
        <div class="h-full-3 overflow-y-auto">
            <ul id="menu-main" class="m-0 p-0">
                <li class="active list-none text-black hover:bg-gray-300">
                    <a class="py-3 px-6 text-inherit no-underline text-sm block w-full h-full"
                        href="{{ route('home') }}">
                        <span>Home</span>
                    </a>
                </li>
                <li class="active list-none text-black hover:bg-gray-300">
                    <a class="py-3 px-6 text-inherit no-underline text-sm block w-full h-full"
                        href="{{ route('tiendas') }}">
                        <span>Tiendas</span>
                    </a>
                </li>
                <li class="list-none text-black hover:bg-gray-300">
                    <a class="py-3 px-6 text-inherit no-underline text-sm block w-full h-full"
                        href="{{ route('productos.index') }}"
                        class="menu-main__link flex justify-between items-center">
                        <span>Productos</span>
                    </a>
                </li>
                @if (session()->has('categorias'))
                    <li class="list-none text-black hover:bg-gray-300" @click="categoria = true">
                        <a class="py-3 px-6 text-inherit no-underline text-sm block w-full h-full"
                            href="javascript:void(0);" class="menu-main__link flex justify-between items-center"
                            id="item-coleccion">
                            <span>Categorias </span><i class="fas fa-angle-double-right"></i>
                        </a>
                    </li>
                @endif
                <li class="list-none text-black hover:bg-gray-300">
                    <a class="py-3 px-6 text-inherit no-underline text-sm block w-full h-full"
                        href="{{ route('promociones') }}"
                        class="menu-main__link flex justify-between items-center">
                        <span>Promociones</span>
                    </a>
                </li>
                @auth
                    {{-- <li class=""><a href="{{ route('rotacion') }}" class="menu-main__link flex justify-between items-center"><span>Informe de
                                Rotación</span></a></li>
                    <li class=""><a href="{{ route('ingresos') }}" class="menu-main__link flex justify-between items-center"><span>Informe de
                                Ingresos</span></a></li> --}}
                    <li class="list-none text-black hover:bg-gray-300">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                class="menu-main__link flex justify-between items-center" onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="list-none text-black hover:bg-gray-300">
                        <a class="py-3 px-6 text-inherit no-underline text-sm block w-full h-full"
                            href="{{ route('login') }}"><span>Iniciar Sesión /
                                Registro</span>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
        <div x-show="categoria" x-transition
        class="absolute top-0 left-0 right-0 h-full text-sm" id="menu-coleccion">
            <div class="menu-header bg-primario-ligth2 h-12 flex items-center px-2">
                <h3 class="cursor-pointer" @click="categoria = false">
                    <i class="fas fa-angle-double-left"></i><span> Volver</span>
                </h3>
            </div>
            <div class="w-full h-full-3 overflow-y-auto bg-white">
                <div class="p-4 flex flex-col justify-center content-start">
                    @if (session()->has('categorias'))
                        @forelse(session('categorias') as $categoria)
                            <a href="{{ route('categorias.show', $categoria) }}" class="w-full h-56 m-0 p-0 bg-center bg-no-repeat bg-cover bg-black mb-4 text-white no-underline border-2 border-gray-600"
                                style="background-image: url('/storage/{{ $categoria->imagen }}');">
                                <div class="w-full h-full flex items-center justify-center bg-black2-50 hover:bg-black2-30">
                                    <h3 class="text-white text-sm">{{ strtoupper($categoria->nombre) }}</h3>
                                </div>
                            </a>
                        @empty
                            No hay categorias
                        @endforelse
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
