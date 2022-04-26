@props(['tienda', 'sort'])

<article class="bg-white rounded-lg shadow mb-4 flex">
    <div class="border border-gray-300 rounded-md p-1 ">
        <a href="{{ route('tiendas.show', $tienda) }}" style="{{ fondo($tienda->fondo_img) }}"
            class="object-cover bg-center bg-cover bg-no-repeat flex justify-center
            items-center relative h-24 w-24 lg:w-48 lg:h-48">
            @if ($tienda->logo)
                <img class="border-4 border-gray-400 shadow-2xl rounded-full w-20 h-20 lg:w-28 lg:h-28 object-cover bg-center  bg-cover bg-no-repeat"
                    src="{{ Storage::url($tienda->logo) }}" alt="logo de la tienda {{ $tienda->nombre }}">
            @else
                <div
                    class="flex justify-center items-center border-4 border-gray-400 shadow-2xl rounded-full w-20 h-20 lg:w-28 lg:h-28 bg-white">
                    <svg class="h-10 w-10 lg:h-20 lg:w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        style="fill: rgb(97, 105, 116);transform: ;msFilter:;">
                        <path
                            d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
                        </path>
                    </svg>
                </div>
            @endif
        </a>
    </div>

    <div class="flex-1 py-4 px-6 flex flex-col">
        <div class="flex flex-col  w-full justify-center content-center items-center sm:flex-row">
            <div class="w-full sm:w-3/5">
                <h1 class="text-center text-base lg:text-lg text-gray-700 font-black line-clamp-2">
                    {{ $tienda->nombre }}</h1>
                <p class="hidden  lg:line-clamp-3 font-semibold text-gray-700 mt-3 w-full">
                    {{ $tienda->descripcion }}
                </p>
            </div>
            @if ($sort == 'mejor_valoradas' or $sort == 'menor_valoradas')
                <x-estrellas class="w-full sm:w-2/5 justify-center" estrellas="{{ round($tienda->calificaciones) }}"
                    calificaciones="{{ $tienda->total }}" sizeestrella="text-xl" />
            @else
                <x-estrellas class="w-full sm:w-2/5 justify-center" estrellas="{{ round($tienda->calificacion[0]) }}"
                    calificaciones="{{ $tienda->calificacion[1] }}" sizeestrella="text-xl" />
            @endif
        </div>
    </div>
</article>
