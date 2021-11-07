@extends('layouts/layout')

@section('title', 'Detalle Producto')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
@endsection
@section('scriptHeader')
    <script src="{{ asset('js/splide.min.js') }}"></script>
    <script src="{{ asset('js/sliderDetalle.js') }}"></script>
@endsection
@section('contenido')
    <main
        class="w-full grid-in-contenido grid grid-cols-full grid-rows-detalle
         py-6 place-items-start place-content-start
         md:grid-rows-auto md:grid-cols-5050 md:py-10 lg:grid-rows-auto lg:grid-cols-5050 lg:py-16">
        <div class="slider-producto w-full">
            <div class="splide__container flex content-center justify-center flex-col flex-wrap w-full ">
                <div id="primary-slider" class="splide p-splide--primary pt-2.5 lg:pt-0">
                    <div class="splide__track splide__track--primary flex justify-center">
                        <ul class="splide__list">
                            <li class="splide__slide p-splide__slide cursor-pointer ">
                                <img class="card-producto__img w-60 md:w-72 lg:w-80"
                                    src="{{ asset('storage/images/website/p1.jpg') }}">
                            </li>
                            <li class="splide__slide p-splide__slide cursor-pointer ">
                              <img class="card-producto__img w-60 md:w-72 lg:w-80"
                                  src="{{ asset('storage/images/website/p2.jpg') }}">
                          </li>
                          <li class="splide__slide p-splide__slide cursor-pointer ">
                            <img class="card-producto__img w-60 md:w-72 lg:w-80"
                                src="{{ asset('storage/images/website/p3.jpg') }}">
                        </li>
                        </ul>
                    </div>
                </div>
                <div id="secondary-slider" class="splide p-splide--secundary pt-2.5 lg:pt-0">
                    <div class="splide__track splide__track--secundary ">
                        <ul class="splide__list splide__list--secundary w-full">
                            <li class="splide__slide p-splide__slide opacity-50">
                              <img class="card-producto__img w-60 md:w-72 lg:w-80"
                              src="{{ asset('storage/images/website/p1.jpg') }}">
                            </li>
                            <li class="splide__slide p-splide__slide opacity-50">
                              <img class="card-producto__img w-60 md:w-72 lg:w-80"
                              src="{{ asset('storage/images/website/p2.jpg') }}">
                            </li>
                            <li class="splide__slide p-splide__slide opacity-50">
                              <img class="card-producto__img w-60 md:w-72 lg:w-80"
                              src="{{ asset('storage/images/website/p3.jpg') }}">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="detalle-producto grid w-full grid-cols-full grid-rows-5auto grid-areas-detalle gap-2.5 px-5 py-6 md:pt-0 md:px-0.5 md:pb-6 lg:pt-0 lg:px-0.5 lg:pb-6 lg:pr-16">
            <h1 class="titulo-producto grid-in-titulo text-2xl font-bold m-0 lg:m-0">producto</h1>
            <div
                class="Precio-stock-producto grid-in-precio flex justify-between items-center border-b border-primario-light">
                <div>
                    <p class="Precio-stock-producto__precio m-0 p-2 text-xl ">$100.000</p>
                </div>
                <div class="Precio-stock-producto__stock text-lg " id="producto-stock"></div>
            </div>
            <div class="descripcion-producto grid-in-descripcion text-base px-0 py-2.5 font-medium">
                <p class=" leading-6 m-0">
                    AGUA MICELAR EN ESPUMA
                    Ha sido diseñada para remover fácilmente el maquillaje, sin irritar la piel de tu rostro. Cuenta con
                    micelas activas que adicionalmente eliminan la grasa e impurezas acumuladas en el día a día.
                    No necesita enjuague, debido a que sus componentes activos son delicados con la piel, y además de
                    cumplir la función de limpiar, también funcionan como humectantes.
                </p>
            </div>
            <div class="guiaTalla-producto">
              <x-boton>
                <i class="fas fa-ruler"></i> Guía De Tallas
            </x-boton>
                {{-- <button id="guiaTallas" class="guiaTallas"><i class="fas fa-ruler"></i> Guía De Tallas</button> --}}
                <div id="modal-guia" class="modal-guia">
                    <i class="fas fa-times" id="close-modal-guia"></i>
                    <div class="modal-content">
                        <img class="imagen-guiaTalla" src="" alt="">
                    </div>
                </div>
            </div>
            <div class="tallas-producto grid-in-tallas">
                <form method="post" action="">

                    <br />

                    <br />
                    <br />
                    <div class="">
                        <p class="no-stock hidden p-2 border border-red-500 w-60 text-red-500 cursor-not-allowed "
                            id="no-stock"><i class="fas fa-exclamation-circle mr-1"></i>Prenda No Disponible</p>
                        <div class="cantidad-agregar flex items-center justify-start pt-5 pb-2.5 ">
                            <div class="cantidad-producto relative flex items-center w-24 h-10 border-gray-500 border-l "
                                id="cantidad-producto">
                                <div
                                    class="arriba-abajo w-8 h-full text-center hover:cursor-pointer menos border-r border-gray-500">
                                    <a class="cantidad-abajo cantidad-botones block no-underline w-full h-full text-center leading-8 text-black fas fa-angle-down"
                                        id="cantida-down">
                                    </a>
                                </div>
                                <input type="number" id="cantidad" name="cantidad" value="1"
                                    class="input-cantidad w-8 h-full m-0 text-center text-black ">
                                <div
                                    class="arriba-abajo w-8 h-full text-center hover:cursor-pointer mas border-l border-gray-500">
                                    <a class="cantidad-arriba cantidad-botones block no-underline w-full h-full text-center leading-8 text-black fas fa-angle-up"
                                        id="cantida-up">
                                    </a>
                                </div>
                            </div>
                            <x-boton>
                              <i class="fas fa-cart-plus"></i> Añadir al carrito
                          </x-boton>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="md:col-span-2 lg:col-span-2 w-full">
            <hr class="my-14 text-black w-full px-6">
            <h3 class="text-bold my-2 px-6">Otros productos de esta tienda</h3>
            <x-slider id="mas_productos"/>
        </div>
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
@endsection
