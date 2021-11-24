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
                            @if ($producto->cantidad > 0 || $producto->descuento <= 0)
                                <div class="complements">
                                    @if ($producto->cantidad <= 0)
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
                    <p class=" m-0 p-2 text-xl ">${{ number_format($producto->precio) }}</p>
                </div>
                <span class="Precio-stock-producto__stock text-lg {{ stock($producto->cantidad) }}"
                    id="producto-stock"></span>
            </div>
            <div class="grid-in-descripcion text-base py-2.5 font-medium px-3">
                <p class=" leading-6 m-0">
                    {!! $producto->descripcion !!}
                </p>
            </div>
            <div class="grid-in-tallas">
                <!-- Colors -->
                @php
                    $tallas = ['XS', 'S', 'M', 'L', 'XL', '2XL', '3XL'];
                    $colores = ['Blanco' => 'bg-white', 'Gris' => 'bg-gray-200', 'Rojo' => 'bg-red-600', 'Negro' => 'bg-black'];
                @endphp
                <div class="mt-2 px-3">
                    <h3 class="text-sm text-gray-900 font-medium">Colores</h3>
                    <div class="mt-4" x-data="{ color: 'Blanco' }">
                        <span class="sr-only">
                            Escoge un color
                        </span>
                        <div class="flex items-center space-x-3 px-2 xl:px-5">
                            <!--
                                    Active and Checked: "ring ring-offset-1"
                                    Not Active and Checked: "ring-2"
                                -->
                            @foreach ($colores as $clave => $valor)
                                <label
                                    class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400"
                                    :class="{ 'ring-2 ring-indigo-500': (color === '{{ $clave }}'), 'ring-0': !(color === '{{ $clave }}') }">
                                    <input type="radio" name="color-choice" value="{{ $clave }}"
                                        class="sr-only"
                                        aria-labelledby="color-choice-{{ $loop->index }}-label" x-model='color'>
                                    <p id="color-choice-{{ $loop->index }}-label" class="sr-only">
                                        {{ $clave }}
                                    </p>
                                    @if ($clave == 'Black')
                                        <span aria-hidden="true"
                                            class="h-8 w-8 {{ $valor }} border border-gray-400 border-opacity-40 rounded-full">
                                        </span>
                                    @else
                                        <span aria-hidden="true"
                                            class="h-8 w-8 {{ $valor }} border border-black border-opacity-40 rounded-full">
                                        </span>
                                    @endif
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Tallas -->
                <div class="mt-5 px-3" x-data="{ value: 'XS', checked: '', open: false }"
                    @keydown.window.escape="open = false">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm text-gray-900 font-medium">Tallas</h3>
                        <a href="#" @click.prevent="open=true"
                            class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                            Guía de tallas
                        </a>
                        <div x-show="open" class="fixed z-10 inset-0 overflow-y-auto" role="dialog" aria-modal="true">
                            <div class="flex min-h-screen text-center md:block md:px-2 lg:px-4" style="font-size: 0;">
                                <div class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity md:block"
                                    aria-hidden="true"></div>
                                <!-- Este elemento es engañar al navegador para que centre los contenidos modales. -->
                                <span class="hidden md:inline-block md:align-middle md:h-screen"
                                    aria-hidden="true">&#8203;</span>
                                <div @click.away="open = false"
                                    class="flex text-base text-left transform transition w-full md:inline-block md:max-w-2xl md:px-4 md:my-8 md:align-middle lg:max-w-4xl">
                                    <div
                                        class="w-full relative flex items-center bg-white px-4 pt-14 pb-8 overflow-hidden shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                                        <button type="button" @click="open=false"
                                            class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 sm:top-8 sm:right-6 md:top-6 md:right-6 lg:top-8 lg:right-8">
                                            <span class="sr-only">Cerrar</span>
                                            <!-- Heroicon name: outline/x -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                        <div class="w-full flex justify-center items-center">
                                            <img class="imagen-guiaTalla"
                                                src="{{ Storage::url('images/guias/guiaTalla.png') }}"
                                                alt="Gúia de tallas del producto {{ $producto->nombre }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="sr-only">
                            Escoge una talla
                        </span>
                        <div
                            class="grid grid-cols-4 gap-4 px-2 md:grid-cols-5 md:gap-3 xl:grid-cols-6 xl:px-5 xl:gap-5">
                            <label
                                class="group relative border rounded-md py-1 px-2 flex items-center
                                        justify-center text-sm font-medium uppercase hover:bg-gray-50
                                        focus:outline-none sm:flex-1 sm:py-2 bg-gray-50 text-gray-200
                                        cursor-not-allowed"
                                :class="{ 'ring-2 ring-indigo-500': (value === 'XXS'), 'undefined': !(value === 'XXS') }">
                                <input type="radio" name="talla" value="XXS" disabled class="sr-only"
                                    aria-labelledby="size-choice-0-label" x-model="value" @click="checked = 'XXS'">
                                <p id="size-choice-0-label">
                                    XXS
                                </p>
                                <div aria-hidden="true"
                                    class="absolute -inset-px rounded-md border-2 border-gray-200 pointer-events-none">
                                    <svg class="absolute inset-0 w-full h-full text-gray-200 stroke-2"
                                        viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                                        <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                                    </svg>
                                </div>
                            </label>
                            @foreach ($tallas as $talla)
                                <label
                                    :class="{ 'ring-2 ring-indigo-500': (value === '{{ $talla }}'), 'undefined': !(value === '{{ $talla }}') }"
                                    class="group relative border rounded-md py-1 px-2 flex items-center text-sm
                                            justify-center font-medium uppercase hover:bg-gray-50 cursor-pointer
                                            focus:outline-none sm:flex-1 sm:py-2 bg-white shadow-sm text-gray-900">
                                    <input type="radio" name="talla" value="{{ $talla }}" class="sr-only"
                                        aria-labelledby="size-choice-{{ $loop->index }}-label" x-model="value"
                                        @click="checked = '{{ $talla }}'">
                                    <p id="size-choice-{{ $loop->index + 1 }}-label">
                                        {{ $talla }}
                                    </p>
                                    <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true"
                                        :class="{ 'border': (value === '{{ $talla }}'), 'border-2': !(value === '{{ $talla }}'), 'border-indigo-500': (checked === '{{ $talla }}'), 'border-transparent': !(checked === '{{ $talla }}') }">
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <p class="hidden p-2 border border-red-500 w-60 text-red-500 cursor-not-allowed " id=""><i
                        class="fas fa-exclamation-circle mr-1"></i>Prenda No Disponible
                </p>
                <div class="w-full flex items-center justify-center pt-5 pb-2.5 mt-6">
                    <div x-data="{ cantidad: 1 }"
                        class="cantidad-producto mr-4 relative flex items-center w-24 h-10 border-gray-500 border"
                        id="">
                        <div x-on:click="cantidad>1 ? cantidad-- : 1"
                            class="w-8 h-full text-center cursor-pointer border-r leading-10 border-gray-500">
                            <a class="no-underline w-full h-full text-center text-black fas fa-angle-down"
                                id="cantida-down">
                            </a>
                        </div>
                        <input type="number" id="cantidad" min="1" max="" x-model="cantidad" name="cantidad" value="1"
                            class="input-cantidad w-12 h-full m-0 text-center text-black border-none appearance-textfield ">
                        <div x-on:click="cantidad++"
                            class="w-8 h-full text-center cursor-pointer border-l leading-10 border-gray-500">
                            <a class="no-underline w-full h-full text-center text-black fas fa-angle-up"
                                id="cantida-up">
                            </a>
                        </div>
                    </div>
                    <x-boton class="h-10 w-full">
                        <i class="fas fa-cart-plus"></i> Añadir al carrito
                    </x-boton>
                </div>
            </div>
        </section>
        <section class="md:col-span-2 lg:col-span-2 w-full">
            <hr class="my-10 text-black w-full px-6">
            <h3 class="text-bold my-2 px-6">Otros productos de esta tienda</h3>
            <x-slider id="mas_productos" tienda="{{ $producto->tienda->id }}"/>
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
    </main>
</x-app2-layout>
