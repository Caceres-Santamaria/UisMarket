<div class="w-full md:px-10 lg:px-10">
    <div class="splide__container  ">
        <div class="splide" id="{{ $id }}">
            <div class="splide__track">
                <ul class="splide__list">
                    @switch($tipo)
                        @case('productos')
                            @foreach ($productos as $producto)
                                <li class="splide__slide">
                                    <div class=" card-producto border-gray-200 border-2 rounded-md p-1">
                                        <a href="{{ route('productos.show',$producto) }}" class=" block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                                            <img class="card-producto__img w-full h-full object-cover object-center"
                                                src="{{ Storage::url($producto->imagenes[0]->url) }}"
                                                data-splide-lazy="{{ Storage::url($producto->imagenes[0]->url) }}" alt="">
                                        </a>
                                        <div class="flex flex-col justify-center items-center">
                                            <h5
                                                class="card-producto__title line-clamp-1 text-center uppercase text-sm pt-1 lg:text-sm">
                                                {{ $producto->nombre }}
                                            </h5>
                                            <p class="card-producto__precio text-center">
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
                                    <div class=" card-producto border-gray-200 border-2 rounded-md p-1">
                                        <a href="{{ route('tiendas.show',$tienda->slug) }}" class=" block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                                            <img class="card-producto__img w-full h-full object-cover object-center"
                                                src="{{ Storage::url($tienda->logo) }}"
                                                data-splide-lazy="{{ Storage::url($tienda->logo) }}"
                                                alt="logo tienda {{ $tienda->nombre }}">
                                        </a>
                                        <div class="flex flex-col justify-center items-center">
                                            <h5
                                                class="card-producto__title line-clamp-1 text-center uppercase text-sm pt-1 lg:text-sm">
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
                                    <div class=" card-producto border-gray-200 border-2 rounded-md p-1">
                                        <a href="{{ route('tiendas.show',$tienda) }}" class=" block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                                            <img class="card-producto__img w-full h-full object-cover object-center"
                                                src="{{ Storage::url($tienda->logo) }}"
                                                data-splide-lazy="{{ Storage::url($tienda->logo) }}"
                                                alt="logo tienda {{ $tienda->nombre }}">
                                        </a>
                                        <div class="flex flex-col justify-center items-center">
                                            <h5
                                                class="card-producto__title line-clamp-1 text-center uppercase text-sm pt-1 lg:text-sm">
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
