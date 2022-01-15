<div class="w-full h-full">
    <div class="w-full h-16 bg-primario-n flex justify-evenly items-center">
        <div class="w-4/5 h-10 border border-solid border-green-200 px-2 py-1
        flex flex-nowrap justify-between items-center rounded-md bg-green-50
        sm:py-2 sm:px-4 lg:w-2/3 lg:px-5">
            <label for="buscador" class="fas fa-search w-1/12 cursor-pointer m-0 p-0 sm:w-5%"></label>
            <input
                class="w-11/12 h-7 rounded-md px-2 border-none outline-none text-xs
                tracking-normal py-0 cursor-text bg-green-50 sm:px-4 sm:w-95%"
                id="buscador"
                type="search"
                placeholder="Buscar productos"
                wire:model="busqueda">
        </div>
        <div class="m-0 p-0 w-9 h-9 text-center leading-9 clip-path-50 cursor-pointer hover:bg-green-400 hover:rotate-360 transition-all duration-500 ease-ease"
        id="busqueda__close">
            <i class="fas fa-times"></i>
        </div>
    </div>
    <div class="w-full bg-black2-87 h-full-16 overflow-y-auto">
        <ul class="min-h-0 h-auto bg-white w-full p-0 m-0">
            @if ($busqueda != "")
                @forelse ($productos as $producto)
                    <li class="w-full list-none">
                        <a href="{{ route('productos.show',$producto) }}"
                            class="text-black w-full h-full border-b-2 border-primario-n
                            p-2 flex justify-center items-center no-underline
                            hover:bg-gray-200 lg:px-4">
                            <div class="w-28 h-28 sm:w-32 sm:h-32 sm:py-3 sm:px-3">
                                <img class="max-w-full w-full h-full object-cover object-center border-2
                                border-ridge border-primario-n"
                                    loading="lazy" src="{{ Storage::url($producto->imagenes[0]->url) }}"
                                    alt="imagen de {{ $producto->nombre }}">
                            </div>
                            <div
                                class="box-border py-1 px-4 w-full-7 flex content-start items-start
                                justify-start flex-col min-h-90px flex-nowrap text-sm sm:w-full-8">
                                <span class="nombre-producto mb-2 text-sm lg:text-lg">{{ $producto->nombre }}</span>
                                @if ($producto->descuento > 0)
                                    <span class="mb-2 text-sm text-red-600 lg:text-lg">SALE</span>
                                    <span class="precio-producto opacity-50 line-through mb-2  text-sm lg:text-lg">
                                        ${{ number_format($producto->precio) }}
                                    </span>
                                    <span class="precio-producto mb-2  text-sm lg:text-lg">
                                        ${{ number_format($producto->precio - $producto->precio * $producto->descuento) }}
                                    </span>
                                @else
                                    <span class="precio-producto mb-2 text-sm lg:text-lg">
                                        ${{ number_format($producto->precio) }}
                                    </span>
                                @endif
                            </div>
                        </a>
                    </li>
                    @if ($loop->last)
                    <li class="busqueda__item sin-resultados w-full list-none  leading-extra-lg h-20 text-center">
                        <a class="underline cursor-pointer" href="{{ route('productos.index') }}?nombre={{ $busqueda }}">Ver todos los {{ $cantidad }} artículos</a>
                    </li>
                    @endif
                @empty
                    <li class="busqueda__item sin-resultados w-full list-none  leading-extra-lg h-20 text-center">
                        <span class="mb-2 text-sm lg:text-lg">¡No se encontraron resultados!</span>
                    </li>
                @endforelse
            @endif
        </ul>
    </div>
</div>
