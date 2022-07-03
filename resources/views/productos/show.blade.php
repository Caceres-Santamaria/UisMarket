<x-app2-layout title="Detalle Producto">
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
    @endpush
    @push('scriptHeader')
        <script src="{{ asset('js/splide.min.js') }}"></script>
        <script src="{{ asset('js/sliderDetalle.js') }}"></script>
    @endpush
    <main
        class="w-full grid-in-contenido grid grid-cols-full grid-rows-detalle
        py-6 place-items-start place-content-start
        md:grid-rows-auto md:grid-cols-5050 md:py-10 lg:grid-rows-auto lg:grid-cols-5050 lg:py-16">
        <section class="w-full">
            <div class="flex content-center justify-center flex-col flex-wrap w-full">
                <div id="primary-slider" class="splide p-splide--primary pt-2.5 lg:pt-0"
                    data-arrows='{{ splide(sizeof($producto->imagenes)) }}'>
                    <div class="splide__track flex justify-center">
                        <ul class="splide__list">
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
                            @foreach ($producto->imagenes as $imagen)
                                <li class="splide__slide p-splide__slide hove:cursor-pointer">
                                    <img class="card-producto__img w-60 md:w-72 lg:w-80"
                                        data-splide-lazy="{{ Storage::url($imagen->url) }}" alt="">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="secondary-slider" class="splide  p-splide--secundary pt-2 lg:pt-1">
                    <div class="splide__track splide__track--secundary ">
                        <ul class="splide__list w-full">
                            @foreach ($producto->imagenes as $imagen)
                                <li
                                    class="splide__slide p-splide__slide opacity-50 hover:cursor-pointer hover:opacity-100">
                                    <img class="card-producto__img w-60 md:w-72 lg:w-80"
                                        data-splide-lazy="{{ Storage::url($imagen->url) }}" alt="">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section
            class=" grid w-full grid-cols-full grid-rows-4auto grid-areas-detalle gap-2.5 px-5 py-6 md:pt-0 md:px-0.5 md:pb-6 lg:pt-0 lg:px-0.5 lg:pb-6">
            <h1 class=" grid-in-titulo text-2xl font-bold m-0 lg:m-0">{{ $producto->nombre }}</h1>
            <div class="grid-in-precio px-3 flex justify-between items-center border-b border-primario-light">
                <div>
                    @if ($producto->descuento > 0)
                        <span
                            class="m-0 p-2 text-lg xl:text-xl opacity-50 line-through">${{ number_format($producto->precio) }}</span>
                        -
                        <span
                            class="m-0 p-2 text-lg xl:text-xl">${{ number_format($producto->precioTotal) }}</span>
                    @else
                        <span class="m-0 p-2 text-lg xl:text-xl">${{ number_format($producto->precio) }}</span>
                    @endif
                </div>
                <span class="Precio-stock-producto__stock text-lg {{ stock($producto->stock) }}"
                    id="producto-stock"></span>
            </div>
            <div class="grid-in-tienda mt-2 px-3">
                <h3 class="text-sm xl:text-base text-gray-900 font-medium">
                    <a href="{{ route('tiendas.show', $producto->tienda->slug) }}" class="cursor-pointer"><i
                            class="fas fa-store text-xs md:text-base lg:text-lg"></i> Tienda:
                        {{ $producto->tienda->nombre }}</a>
                </h3>
                <h3 class="text-sm xl:text-base text-gray-900 font-medium mt-5">
                    <i class="fas fa-cubes text-sm md:text-lg lg:text-xl"></i> Categoría:
                    {{ $producto->categoria->nombre }}
                </h3>
            </div>
            <div class="grid-in-estado mt-2 px-3">
                <h3 class="text-base xl:text-lg text-gray-900 font-medium">
                    <i class="far fa-bookmark text-sm md:text-lg lg:text-xl"></i> Estado: {{ $producto->estado }}
                </h3>
            </div>
            <div class="grid-in-agregar">
                @if ($producto->talla)
                    @livewire('producto-talla', ['producto' => $producto])
                @elseif($producto->color)
                    @livewire('producto-color', ['producto' => $producto])
                @else
                    @livewire('producto', ['producto' => $producto])
                @endif
            </div>
            <div class="grid-in-descripcion text-base xl:text-lg py-2.5 font-medium px-3">
                <h2 class="font-bold text-lg">Descripción</h2>
                <p class=" leading-6 m-0">
                    {!! $producto->descripcion !!}
                </p>
            </div>
        </section>
        @php($otros = $producto->tienda->productos->except([$producto->id]))
        @if ($otros->count() > 0)
            <section class="md:col-span-2 lg:col-span-2 w-full">
                <hr class="my-10 text-black w-full px-6">
                <h3 class="text-bold my-2 px-6">Otros productos de esta tienda</h3>
                <x-slider id="mas_productos" :data="$otros->toQuery()->take(10)->get()" />
            </section>
            @push('scripts')
                <script>
                    let lista = {
                        rewind: true,
                        width: '100%',
                        direction: 'ltr',
                        isNavigation: true,
                        pagination: false,
                        gap: '1rem',
                        cover: true,
                        perMove: 1,
                        perPage: 4,
                        breakpoints: {
                            '2400': {
                                perPage: 4,
                            },
                            '1199': {
                                perPage: 4,
                            },
                            '991': {
                                perPage: 3,
                            },
                            '767': {
                                perPage: 3,
                            },
                            '575': {
                                perPage: 2,
                                width: '100vw',
                            },
                        }
                    }
                    new Splide('#mas_productos', lista).mount();
                </script>
            @endpush
        @endif
    </main>
</x-app2-layout>
