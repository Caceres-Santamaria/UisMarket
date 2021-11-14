<div class="my-6 place-self-end flex relative justify-center items-center w-52 h-8 border border-gray-300 mr-4 p-2 cursor-pointer"
            id="content__orderBy">
            <p class="flex flex-row justify-between items-start w-full h-full text-base text-gray-400"
                id="cont-orderBy">
                <span id="orderBy">Alfabéticamente: A-Z</span><i id="listaFiltro" class="fas fa-list"></i>
            </p>
            <ul class="list-orderBy hidden absolute r-0 border border-gray-400 bg-gray-100 z-5 w-52 t-calc1"
                id="list-orderBy">
                <li class="h-8 w-full text-black  leading-8 " data-filtro="Alfabéticamente: A-Z"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=title-ascending">Alfabéticamente: A-Z</a></li>
                <li class="h-8 w-full text-black  leading-8 " data-filtro="Alfabéticamente: Z-A"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=title-descending">Alfabéticamente: Z-A</a></li>
                <li class="h-8 w-full text-black  leading-8 " data-filtro="Precio: Menor a mayor"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=price-ascending">Precio: Menor a mayor</a></li>
                <li class="h-8 w-full text-black  leading-8 " data-filtro="Precio: Mayor a menor"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=price-descending">Precio: Mayor a menor</a></li>
                <li class="h-8 w-full text-black  leading-8 " data-filtro="Fecha: Mas nuevo"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=created-descending">Fecha: Mas nuevo</a></li>
                <li class="h-8 w-full text-black  leading-8 " data-filtro="Fecha: Mas antiguo"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=created-ascending">Fecha: Mas antiguo</a></li>
                <li class="h-8 w-full text-black  leading-8 " data-filtro="Más vendidos"><a
                        class="w-full h-full py-0 px-4 text-sm inline-block "
                        href="{{ request()->url() }}?sort_by=best-selling">Más vendidos</a></li>
            </ul>
        </div>