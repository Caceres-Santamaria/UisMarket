<x-app2-layout title="Home">
    <main class="grid-in-contenido">
        {{-- {{ dd($nuevas->count()) }} --}}
        <div class="m-4 lg:mx-32 md:mx-20 sm:mx-20">
            <div class="splide" id="splide_prin">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide"><img src="{{ Storage::url('images/website/hogar.jpg') }}" alt="">
                        </li>
                        <li class="splide__slide"><img src="{{ Storage::url('images/website/empaque.jpg') }}" alt="">
                        </li>
                        <li class="splide__slide"><img src="{{ Storage::url('images/website/entrega.jpg') }}" alt="">
                        </li>
                        <li class="splide__slide"><img src="{{ Storage::url('images/website/informes.jpg') }}" alt="">
                        </li>
                    </ul>
                </div>
            </div>
            <h1 class="text-primario-n font-semibold text-2xl  lg:text-4xl flex justify-center my-4 lg:my-8"> UIS Market
            </h1>
            <h1 class=" font-medium text-xl lg:text-3xl flex justify-center text-center mb-10 text-gray-600">Apoyamos
                las
                marcas y emprendimientos UIS con el fin de activar la economía local.</h1>
            <h2 class=" font-normal text-lg lg:text-2xl my-2 text-gray-600"> Tiendas destacadas </h2>
            <div id="content-products" class="w-full">
                @if ($destacadas->count() > 0)
                    <x-slider id="destacadas" tipo="destacadas" :data="$destacadas" />
                    <div class="flex justify-center w-full mt-2">
                        <x-boton-enlace href="{{ route('tiendas') }}?sort_by=mejor_valoradas"
                            class="m-6 w-4/5 h-8 md:w-48 lg:w-48 lg:h-9">
                            Ver más tiendas
                        </x-boton-enlace>
                    </div>
                @else
                    <div class="w-full flex flex-col justify-start items-center">
                        <x-svg.shopping />
                        <h5 class="line-clamp-1 text-center uppercase text-sm pt-1 lg:text-sm text-gray-600">
                            Aún no hay tiendas destacadas
                        </h5>
                    </div>
                @endif
            </div>
            <h2 class=" font-normal text-lg lg:text-2xl my-2 text-gray-600"> Nuevas tiendas </h2>
            <div id="content-products" class="w-full">
                @if($nuevas->count() > 0)
                    <x-slider id="nuevas_tiendas" tipo="nuevas" :data="$nuevas" />
                    <div class="flex justify-center w-full mt-2">
                        <x-boton-enlace href="{{ route('tiendas') }}?sort_by=mas_reciente"
                            class="m-6 w-4/5 h-8 md:w-48 lg:w-48 lg:h-9">
                            Ver más tiendas
                        </x-boton-enlace>
                    </div>
                @else
                    <div class="w-full flex flex-col justify-start items-center">
                        <x-svg.new-shopping />
                        <h5 class="line-clamp-1 text-center uppercase text-sm pt-1 lg:text-sm text-gray-600">
                            Aún no hay tiendas nuevas aún
                        </h5>
                    </div>
                @endif
            </div>
        </div>
        @if (session()->has('message'))
            <script>
                window.addEventListener('DOMContentLoaded', e => {
                    simpleAlert(
                        'center',
                        'warning',
                        '{{ session('message') }}',
                        '',
                        true);
                });
            </script>
        @endif
    </main>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    @endpush

    @push('scriptHeader')
        <script src="{{ asset('js/splide.min.js') }}"></script>
    @endpush

    @push('scripts')
        <script>
            let lista = {
                type: 'fade',
                rewind: true,
                lazyload: 'nearby',
                cover: 'true',
                height: '27rem',
                breakpoints: {
                    '2400': {
                        height: '24rem'
                    },
                    '1199': {
                        height: '19rem'
                    },
                    '991': {
                        height: '15rem'
                    },
                    '767': {
                        height: '14rem'
                    },
                    '575': {
                        height: '8rem'
                    }
                }
            };
            let lista2 = {
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
            new Splide('#splide_prin', lista).mount();
            @if ($destacadas->count() > 0)
                new Splide('#destacadas', lista2).mount();
            @endif
            @if ($nuevas->count() > 0)
                new Splide('#nuevas_tiendas', lista2).mount();
            @endif
        </script>
    @endpush
</x-app2-layout>
