<div class="w-full h-full">
    <div class="flex items-center w-full h-16 bg-primario-n justify-evenly">
        <div class="flex items-center justify-between w-4/5 h-10 px-2 py-1 border border-green-200 border-solid rounded-md flex-nowrap bg-green-50 sm:py-2 sm:px-4 lg:w-2/3 lg:px-5">
            <label for="buscador" class="fas fa-search w-1/12 cursor-pointer m-0 p-0 sm:w-5%"></label>
            <input
                class="w-11/12 h-7 rounded-md px-2 border-none outline-none text-xs
                tracking-normal py-0 cursor-text bg-green-50 sm:px-4 sm:w-95%"
                id="buscador"
                type="search"
                placeholder="Buscar productos"
                wire:model="busqueda">
        </div>
        <div class="p-0 m-0 leading-9 text-center transition-all duration-500 cursor-pointer w-9 h-9 clip-path-50 hover:bg-green-400 hover:rotate-360 ease-ease"
        id="busqueda__close">
            <i class="fas fa-times"></i>
        </div>
    </div>
    <div class="w-full overflow-y-auto bg-black2-87 h-full-16">
        <ul class="w-full h-auto min-h-0 p-0 m-0 bg-white">
            @if ($busqueda != "")
                @forelse ($productos as $producto)
                    <li class="w-full list-none">
                        <a href="{{ route('productos.show',$producto) }}"
                            class="flex items-center justify-center w-full h-full p-2 text-black no-underline border-b-2 border-primario-n hover:bg-gray-200 lg:px-4">
                            <div class="w-28 h-28 sm:w-32 sm:h-32 sm:py-3 sm:px-3">
                                <img class="object-cover object-center w-full h-full max-w-full border-2 border-ridge border-primario-n"
                                    loading="lazy" src="{{ Storage::url($producto->imagenes[0]->url) }}"
                                    alt="imagen de {{ $producto->nombre }}">
                            </div>
                            <div
                                class="box-border flex flex-col items-start content-start justify-start px-4 py-1 text-sm w-full-7 min-h-90px flex-nowrap sm:w-full-8">
                                <span class="mb-2 text-sm nombre-producto lg:text-lg">{{ $producto->nombre }}</span>
                                @if ($producto->descuento > 0)
                                    <span class="mb-2 text-sm text-red-600 lg:text-lg">SALE</span>
                                    <span class="mb-2 text-sm line-through opacity-50 precio-producto lg:text-lg">
                                        ${{ number_format($producto->precio) }}
                                    </span>
                                    <span class="mb-2 text-sm precio-producto lg:text-lg">
                                        ${{ number_format($producto->precioTotal) }}
                                    </span>
                                @else
                                    <span class="mb-2 text-sm precio-producto lg:text-lg">
                                        ${{ number_format($producto->precio) }}
                                    </span>
                                @endif
                            </div>
                        </a>
                    </li>
                    @if ($loop->last)
                    <li class="w-full h-20 text-center list-none busqueda__item sin-resultados leading-extra-lg">
                        <a class="underline cursor-pointer" href="{{ route('productos.index') }}?nombre={{ $busqueda }}">Ver todos los {{ $cantidad }} artículos</a>
                    </li>
                    @endif
                @empty
                    <li class="w-full h-20 text-center list-none busqueda__item sin-resultados leading-extra-lg">
                        <span class="mb-2 text-sm lg:text-lg">¡No se encontraron resultados!</span>
                    </li>
                @endforelse
            @endif
        </ul>
    </div>
</div>
