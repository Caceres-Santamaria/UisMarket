<x-app2-layout title="Informacion tienda">
    <main
        class="grid-in-contenido grid grid-cols-full grid-rows-detalle px-3 py-6 place-items-start place-content-start md:grid-rows-auto md:grid-cols-1 md:p-2 md:py-10 lg:grid-rows-auto lg:grid-cols-1 lg:px-10 lg:py-16">
        <div style="{{ fondo($tienda->fondo_img) }}"
            class=" object-cover bg-center bg-cover bg-no-repeat flex justify-center items-center card-producto__link block w-full h-20 md:h-32 lg:h-52  ">
        </div>
        <div
            class="relative border border-gray-300 -xl h-60 w-full flex justify-center pt-16 md:pt-24 md:h-80 lg:pt-24 lg:h-72">
            @if ($tienda->logo)
                <img class="absolute -top-logosm border border-gray-300 shadow-2xl rounded-full  w-24 h-24 md:w-40 md:h-40 md:-top-logomd lg:w-40 lg:h-40 lg:-top-logomd object-cover bg-center  bg-cover bg-no-repeat"
                    src="{{ Storage::url($tienda->logo) }}" alt="logo de la tienda {{ $tienda->nombre }}">
            @else
                <div
                    class="flex justify-center items-center bg-white absolute -top-logosm border border-gray-300 shadow-2xl rounded-full  w-24 h-24 md:w-40 md:h-40 md:-top-logomd lg:w-40 lg:h-40 lg:-top-logomd object-cover bg-center  bg-cover bg-no-repeat">
                    <svg class="h-16 w-16 md:h-28 md:w-28 lg:h-28 lg:w-28 " xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" style="fill: rgb(97, 105, 116
                    );transform: ;msFilter:;">
                        <path
                            d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
                        </path>
                    </svg>
                </div>
            @endif
            <div class="w-full flex flex-col items-center px-4 ">
                <h1
                    class="w-full uppercase font-black text-base text-center tracking-wide whitespace-nowrap overflow-ellipsis truncate md:text-lg lg:text-xl">
                    {{ $tienda->nombre }}
                </h1>
                <x-estrellas sizeestrella="text-xl"
                estrellas="{{ round($tienda->calificacion[0]) }}"
                calificaciones="{{ $tienda->calificacion[1] }}" />
                <p class=" w-full line-clamp-5 text-sm text-center md:text-base lg:text-base lg:line-clamp-3 lg:px-20">
                    {{ $tienda->descripcion }}
                </p>
            </div>
        </div>
        <div class=" border border-gray-300 w-full flex  flex-col place-self-center border-box">
            <ul class=" flex  flex-row list-none  relative text-sm md:text-lg lg:text-lg ">
                <li
                    class=" item border-r-2 relative md:p-1.5 lg:p-1.5 z-5 hover:bg-gray-100 hover:no-underline outline-none m-0  last:right-0 last:left-auto">
                    <a class="no-underline leading-6 hover:cursor-pointer outline-none text-gray-600 block h-full md:h-full lg:h-full p-1 md:px-4 md:py-1 lg:py-1 lg:px-4font-normal"
                        href=""><span>Productos</span></a>
                    <ul
                        class="text-base  border border-gray-300 menu-desktop__secondlevel justify-center flex-row list-none active:no-underline active:border-b active:border-white hidden absolute w-full top-calc bg-white p-0 m-0 right-0 left-auto">
                        <li
                            class=" item hover:no-underline hover:border-b hover:border-white outline-none relative p-1 z-5 last:right-0 last:left-auto list-item-sub w-full h-8 leading-10 m-0 border-b-2 border-gray-300 hover:bg-gray-200">
                            <a class="no-underline leading-6 px-1 hover:cursor-pointer outline-none text-gray-600  md:px-2 lg:px-2 font-normal flex w-full content-center "
                                href=""><span>Categoria 1</span></a>
                        </li>
                        <li
                            class=" item hover:no-underline hover:border-b hover:border-white outline-none relative p-1 z-5 last:right-0 last:left-auto list-item-sub w-full h-8 leading-10 m-0 border-b-2 border-gray-300 hover:bg-gray-200">
                            <a class="no-underline leading-6 px-1 hover:cursor-pointer outline-none text-gray-600  md:px-2 lg:px-2 font-normal flex w-full content-center "
                                href=""><span>Categoria 2</span></a>
                        </li>
                        <li
                            class=" item hover:no-underline hover:border-b hover:border-white outline-none relative p-1 z-5 last:right-0 last:left-auto list-item-sub w-full h-8 leading-10 m-0 border-b-2 border-gray-300 hover:bg-gray-200">
                            <a class="no-underline leading-6 px-1 hover:cursor-pointer outline-none text-gray-600  md:px-2 lg:px-2 font-normal flex w-full content-center "
                                href=""><span>Categoria 3</span></a>
                        </li>
                    </ul>
                </li>
                <li
                    class=" item border-r-2 relative md:p-1.5 lg:p-1.5 z-5 hover:bg-gray-100 hover:no-underline outline-none m-0  last:right-0 last:left-auto">
                    <a class="no-underline leading-6 hover:cursor-pointer outline-none text-gray-600 block h-full md:h-full lg:h-full p-1 md:px-4 md:py-1 lg:py-1 lg:px-4font-normal"
                        href=""><span>Calificaciones</span></a>
                </li>
                <li
                    class=" item border-r-2 relative md:p-1.5 lg:p-1.5 z-5 hover:bg-gray-100 hover:no-underline outline-none m-0  last:right-0 last:left-auto">
                    <a class="no-underline leading-6 hover:cursor-pointer outline-none text-gray-600 block h-full md:h-full lg:h-full p-1 md:px-4 md:py-1 lg:py-1 lg:px-4font-normal"
                        href=""><span>Información de la tienda</span></a>
                </li>
            </ul>
        </div>

        <div class=" w-full">
            <x-calificaciones-tienda :tienda="$tienda" />
            <x-informacion-tienda :tienda='$tienda' />
        </div>

        <!-- redes -->
        @if ($tienda->facebook or $tienda->whatsapp or $tienda->instagram)
            <div
                class="fixed right-0 top-1/4 text-2xl flex flex-col items-end z-100  md:text-3xl lg:top-2/4 lg:text-3xl">
                @if ($tienda->facebook)
                    <a class="mb-1 redes-sociales rounded-tl-2xl bg-redes-fb" href="{{ $tienda->facebook }}"
                        target="_blank"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if ($tienda->whatsapp)
                    <a class="mb-1 redes-sociales bg-redes-ws" href="{{ $tienda->whatsapp }}" target="_blank"><i
                            class="fab fa-whatsapp"></i></a>
                @endif
                @if ($tienda->instagram)
                    <a class="redes-sociales rounded-bl-2xl bg-redes-ig" href="{{ $tienda->instagram }}"
                        target="_blank"><i class="fab fa-instagram"></i></a>
                @endif
            </div>
        @endif
    </main>
</x-app2-layout>
