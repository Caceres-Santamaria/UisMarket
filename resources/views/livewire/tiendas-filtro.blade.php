<div class="w-full">
    <div class="mb-6 bg-white rounded-lg shadow-lg">
        <div class="flex flex-wrap items-center justify-between px-6 py-2">
            <h1 class="order-1 font-semibold text-gray-700 uppercase">Tiendas</h1>
            <div class="flex items-center justify-center order-2">
                <x-Filtro-desplegable filtro="tiendas" :sort="$sort_by" class="w-52"/>
                <x-tipo-vista :view="$view" />
            </div>
            <div
                class="flex items-center self-end justify-between order-3 w-full h-8 px-2 py-1 mt-3 border border-gray-300 border-solid rounded-md flex-nowrap md:justify-center">
                <label for="buscadorTienda" class="w-1/12 p-0 m-0 cursor-pointer fas fa-search md:w-5 md:mr-1"></label>
                <input
                    class="w-11/12 h-6 px-2 py-0 text-xs tracking-normal border-none rounded-md outline-none cursor-text sm:px-4 md:text-base"
                    id="buscadorTienda" type="search" placeholder="Buscar tiendas" wire:model="busqueda">
            </div>
        </div>
    </div>

    @if ($view == 'grid')
        <section
            class="grid p-2 place-items-stretch gap-y-6 gap-x-7 place-content-center grid-cols-cardsm md:grid-cols-cardmd md:gap-6 md:px-6 md:py-4 lg:grid-cols-cardlg lg:gap-6 lg:px-6 lg:py-4">
            @forelse ($tiendas as $tienda)
                <article class="p-1 border border-gray-300 rounded-md ">
                    <a href="{{ route('tiendas.show', $tienda) }}" style="{{ fondo($tienda->fondo_img) }}"
                        class="relative flex items-center justify-center object-cover w-full bg-center bg-no-repeat bg-cover h-cardsmt md:h-cardmdt lg:h-cardlgt ">
                        @if ($tienda->logo)
                            <img class="object-cover bg-center bg-no-repeat bg-cover border-4 border-gray-400 rounded-full shadow-2xl w-28 h-28"
                                src="{{ Storage::url($tienda->logo) }}"
                                alt="logo de la tienda {{ $tienda->nombre }}">
                        @else
                            <div
                                class="flex items-center justify-center bg-white border-4 border-gray-400 rounded-full shadow-2xl w-28 h-28">
                                <svg class="w-20 h-20 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    style="fill: rgb(97, 105, 116);transform: ;msFilter:;">
                                    <path
                                        d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
                                    </path>
                                </svg>
                            </div>
                        @endif
                    </a>
                    <div class="flex flex-col items-center justify-center ">
                        <h5 class="pt-4 pb-2 text-sm text-center uppercase lg:text-base">
                            {{ $tienda->nombre }}
                        </h5>
                    </div>
                    @if ($sort_by == 'mejor_valoradas' or $sort_by == 'menor_valoradas')
                        <x-estrellas class="justify-center" estrellas="{{ round($tienda->calificaciones) }}"
                            calificaciones="{{ $tienda->total }}" sizeestrella="text-base" />
                    @else
                        <x-estrellas class="justify-center" estrellas="{{ round($tienda->calificacion[0]) }}"
                            calificaciones="{{ $tienda->calificacion[1] }}" sizeestrella="text-base" />
                    @endif
                </article>
            @empty
                <article class="flex flex-col items-center justify-center w-full px-0 py-4">
                    <figure>
                        <x-svg.face-sad />
                    </figure>
                    <span class="block sm:inline lg:text-xl">No existen tiendas aún</span>
                </article>
            @endforelse
        </section>
    @else
        <section class="p-2 lg:px-6 lg:py-4">
            @forelse ($tiendas as $tienda)
                <x-lista-tiendas :tienda="$tienda" :sort="$sort_by" />
            @empty
                <article class="flex flex-col items-center justify-center w-full px-0 py-4">
                    <figure>
                        <x-svg.face-sad />
                    </figure>
                    <span class="block sm:inline lg:text-xl">No existen tiendas aún</span>
                </article>
            @endforelse
        </section>
    @endif
@empty(!$tiendas)
    <div class="m-4">
        {{ $tiendas->links() }}
    </div>
@endempty
</div>
