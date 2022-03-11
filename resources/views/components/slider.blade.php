<div class="w-full md:px-10 lg:px-10">
    <div class="splide__container ">
        <div class="splide" id="{{ $id }}">
            <div class="splide__track">
                <ul class="splide__list">
                    @switch($tipo)
                        @case('productos')
                            @foreach ($productos as $producto)
                                <li class="splide__slide">
                                    <div class="p-1 border-2 border-gray-200 rounded-md card-producto">
                                        <a href="{{ route('productos.show', $producto) }}"
                                            class="relative block w-full h-cardsm md:h-cardmd lg:h-cardlg">
                                            @if ($producto->stock > 0 || $producto->descuento <= 0)
                                                <div class="complements">
                                                    @if ($producto->stock <= 0)
                                                        <span class="bg-producto-agotado complements__span">
                                                            AGOTADO
                                                        </span>
                                                    @endif
                                                    @if ($producto->descuento > 0)
                                                        <span class="bg-producto-descuento complements__span">
                                                            {{ intval($producto->descuento * 100) }} % OFF
                                                        </span>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="complements">
                                                    <span class="bg-producto-agotado complements__span">
                                                        AGOTADO
                                                    </span>
                                                    <span class="bg-producto-descuento complements__span">
                                                        {{ intval($producto->descuento * 100) }} % OFF
                                                    </span>
                                                </div>
                                            @endif
                                            <img class="object-cover object-center w-full h-full card-producto__img"
                                                src="{{ Storage::url($producto->imagenes[0]->url) }}"
                                                data-splide-lazy="{{ Storage::url($producto->imagenes[0]->url) }}" alt="">
                                        </a>
                                        <div class="flex flex-col items-center justify-center">
                                            <h5 class="pt-1 text-sm text-center uppercase line-clamp-1 lg:text-sm">
                                                {{ $producto->nombre }}
                                            </h5>
                                            <p class="text-center card-producto__precio">
                                                <span>{{ $producto->precio }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @break

                        @case('destacadas')
                            @foreach ($destacadas as $tienda)
                                <li class="splide__slide">
                                    <div class="p-1 border-2 border-gray-200 rounded-md card-producto">
                                        <a href="{{ route('tiendas.show', $tienda->slug) }}"
                                            class="relative block w-full h-cardsm md:h-cardmd lg:h-cardlg">
                                            @if ($tienda->logo)
                                                <img class="object-cover object-center w-full h-full card-producto__img"
                                                    src="{{ Storage::url($tienda->logo) }}"
                                                    data-splide-lazy="{{ Storage::url($tienda->logo) }}"
                                                    alt="logo tienda {{ $tienda->nombre }}">
                                            @else
                                                <div class="flex items-center justify-center w-full h-full"
                                                    style="background-color:rgb(186, 189, 194)">
                                                    <svg class="w-20 h-20 bg-white rounded-full"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        style="fill: rgb(97, 105, 116);transform: ;msFilter:;">
                                                        <path
                                                            d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </a>
                                        <div class="flex flex-col items-center justify-center">
                                            <h5 class="pt-1 text-sm text-center uppercase line-clamp-1 lg:text-sm">
                                                {{ $tienda->nombre }}
                                            </h5>
                                            <x-estrellas sizeestrella="text-xl"
                                                estrellas="{{ round(floatval($tienda->calificaciones)) }}"
                                                calificaciones="{{ $tienda->total }}" />
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @break

                        @case('nuevas')
                            @foreach ($nuevas as $tienda)
                                <li class="splide__slide">
                                    <div class="p-1 border-2 border-gray-200 rounded-md card-producto">
                                        <a href="{{ route('tiendas.show', $tienda) }}"
                                            class="relative block w-full h-cardsm md:h-cardmd lg:h-cardlg">
                                            @if ($tienda->logo)
                                                <img class="object-cover object-center w-full h-full card-producto__img"
                                                    src="{{ Storage::url($tienda->logo) }}"
                                                    data-splide-lazy="{{ Storage::url($tienda->logo) }}"
                                                    alt="logo tienda {{ $tienda->nombre }}">
                                            @else
                                                <div class="flex items-center justify-center w-full h-full"
                                                    style="background-color:rgb(186, 189, 194)">
                                                    <svg class="w-20 h-20 bg-white rounded-full"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        style="fill: rgb(97, 105, 116);transform: ;msFilter:;">
                                                        <path
                                                            d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </a>
                                        <div class="flex flex-col items-center justify-center">
                                            <h5 class="pt-1 text-sm text-center uppercase line-clamp-1 lg:text-sm">
                                                {{ $tienda->nombre }}
                                            </h5>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @break

                        @default
                    @endswitch
                </ul>
            </div>
        </div>
    </div>
</div>
