@extends('layouts/layout')

@section('title', 'Tienda')
@section('css')

@endsection
@section('scriptHeader')

@endsection
@section('contenido')
    <main
        class="grid-in-contenido grid grid-cols-full grid-rows-detalle px-3 py-6 place-items-start place-content-start md:grid-rows-auto md:grid-cols-1 md:p-2 md:py-10 lg:grid-rows-auto lg:grid-cols-1 lg:px-10 lg:py-16">
        <div style="background-image:url('{{ Storage::url('images/website/p1.jpg') }}')"
            class=" object-cover bg-center bg-cover bg-no-repeat flex justify-center items-center card-producto__link block w-full h-20 md:h-32 lg:h-52  ">
        </div>
        <div
            class="relative border border-gray-300 -xl h-60 w-full flex justify-center pt-16 md:pt-24 md:h-80 lg:pt-24 lg:h-72">
            {{-- <img class="absolute -top-logosm border border-gray-300 shadow-2xl rounded-full  w-24 h-24 md:w-40 md:h-40 md:-top-logomd lg:w-40 lg:h-40 lg:-top-logomd object-cover bg-center  bg-cover bg-no-repeat"
                src="{{ Storage::url('images/logos/logo.png') }}" alt=""> --}}
            <div class="flex justify-center items-center bg-white absolute -top-logosm border border-gray-300 shadow-2xl rounded-full  w-24 h-24 md:w-40 md:h-40 md:-top-logomd lg:w-40 lg:h-40 lg:-top-logomd object-cover bg-center  bg-cover bg-no-repeat">
                <svg class="h-16 w-16 md:h-28 md:w-28 lg:h-28 lg:w-28 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(97, 105, 116
                    );transform: ;msFilter:;">
                    <path
                        d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
                    </path>
                </svg>
            </div>
            <div class="w-full flex flex-col items-center px-4 ">
                <h1
                    class="w-full uppercase font-black text-base text-center tracking-wide whitespace-nowrap overflow-ellipsis truncate md:text-lg lg:text-xl">
                    NOMBRE dEL EMPRENDIMIENTO</h1>

                <div class="star-rating">
                    <a class="text-yellow-500 text-3xl" href="#">★</a>
                    <a class="text-yellow-500 text-3xl" href="#">★</a>
                    <a class="text-yellow-500 text-3xl" href="#">★</a>
                    <a class="text-yellow-500 text-3xl" href="#">★</a>
                    <a class="text-yellow-500 text-3xl" href="#">★</a>
                </div>
                <p class=" w-full line-clamp-5 text-xs text-center md:text-base lg:text-lg lg:line-clamp-3 lg:px-20">
                    TLorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium consequatur officiis quaerat
                    dolore l eos quia omnis voluptates incidunt repellat n eos quia omnis voluptates incidunt repellat
                    necessitatibus, quisquam ducimus sunt eos quia omnis voluptates incidunt repellat necessitatibus,
                    quisquam ducimus sunt eos quia omnis voluptates incidunt repellat necessitatibus, quisquam ducimus sunt
                    eos quia omnis voluptates incidunt repellat necessitatibus, quisquam ducimus sunt eos quia omnis
                    voluptates incidunt repellat necessitatibus, quisquam ducimus suntecessitatibus, quisquam ducimus
                    suntabore magnam accusantium enim ipsam numquam sit eos quia omnis voluptates incidunt repellat
                    necessitatibus, quisquam ducimus eos quia omnis voluptates incidunt repellat necessitatibus, quisquam
                    ducimus sunt eos quia omnis voluptates incidunt repellat necessitatibus, quisquam ducimus sunt sunt?
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

        <div class="my-6 place-self-end flex relative justify-center items-center w-52 h-8 border border-gray-300 mr-4 p-2 cursor-pointer"
            id="content__orderBy">
            <p class="flex flex-row justify-between items-start w-full h-full text-base text-gray-400" id="cont-orderBy">
                <span id="orderBy">Alfabéticamente: A-Z</span><i id="listaFiltro" class="fas fa-list"></i>
            </p>
            <ul class="list-orderBy hidden absolute r-0 border border-gray-400 bg-gray-100 z-5 w-52 t-calc1"
                id="list-orderBy">
                <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Alfabéticamente: A-Z"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=title-ascending">Alfabéticamente: A-Z</a></li>
                <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Alfabéticamente: Z-A"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=title-descending">Alfabéticamente: Z-A</a></li>
                <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Precio: Menor a mayor"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=price-ascending">Precio: Menor a mayor</a></li>
                <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Precio: Mayor a menor"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=price-descending">Precio: Mayor a menor</a></li>
                <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Fecha: Mas nuevo"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=created-descending">Fecha: Mas nuevo</a></li>
                <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Fecha: Mas antiguo"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=created-ascending">Fecha: Mas antiguo</a></li>
                <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Más vendidos"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=best-selling">Más vendidos</a></li>
            </ul>
        </div>

        <div id="content-products" class="collection-products w-full">
            @include('tiendaInfo')
        </div>

        {{-- redes --}}
        <div class="fixed right-0 top-1/4 text-2xl flex flex-col items-end z-100  md:text-3xl lg:top-2/4 lg:text-3xl">
            <a class="mb-1 redes-sociales rounded-tl-2xl bg-redes-fb" href="https://www.facebook.com" target="_blank"><i
                    class="fab fa-facebook-f"></i></a>
            <a class="mb-1 redes-sociales bg-redes-ws" href="https://twitter.com" target="_blank"><i
                    class="fab fa-whatsapp"></i></a>
            <a class="redes-sociales rounded-bl-2xl bg-redes-ig" href="https://www.instagram.com" target="_blank"><i
                    class="fab fa-instagram"></i></a>
        </div>
    </main>
@endsection
