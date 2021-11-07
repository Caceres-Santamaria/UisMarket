@extends('layouts/layout')

@section('title', 'HOME')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">

@endsection

@section('scriptHeader')
    <script src="{{ asset('js/splide.min.js') }}"></script>
@endsection

@section('contenido')
    <main class="grid-in-contenido">
        <div class="m-4 lg:mx-32 md:mx-20 sm:mx-20">
            <div class="splide" id="splide_prin">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide"><img src="{{ Storage::url('images/website/hogar.jpg') }}" alt=""></li>
                        <li class="splide__slide"><img src="{{ Storage::url('images/website/empaque.jpg') }}" alt=""></li>
                        <li class="splide__slide"><img src="{{ Storage::url('images/website/entrega.jpg') }}" alt=""></li>
                        <li class="splide__slide"><img src="{{ Storage::url('images/website/informes.jpg') }}" alt="">
                        </li>
                    </ul>
                </div>
            </div>
            <h1 class="text-primario-n font-semibold text-2xl  lg:text-4xl flex justify-center my-4 lg:my-8"> UIS Market
            </h1>
            <h1 class=" font-medium text-xl lg:text-3xl flex justify-center text-center mb-10 text-gray-600">Apoyamos las
                marcas y emprendimientos UIS con el fin de activar la economía local.</h1>
            <h2 class=" font-normal text-lg lg:text-2xl my-2 text-gray-600"> Tiendas destacadas </h2>
            <div id="content-products" class="w-full">
                <x-slider id="destacadas"/>
                <div class="flex justify-center w-full">
                  <x-boton>
                    Ver más tiendas
                  </x-boton>
                </div>
            </div>
            <h2 class=" font-normal text-lg lg:text-2xl my-2 text-gray-600"> Nuevas tiendas </h2>
            <div id="content-products" class="w-full">
                <x-slider id="nuevas_tiendas" />
                <div class="flex justify-center w-full">
                    <x-boton>
                      Ver más tiendas
                  </x-boton>
                </div>
            </div>

        </div>
    </main>
@endsection

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
        new Splide('#destacadas', lista2).mount();
        new Splide('#nuevas_tiendas', lista2).mount();
    </script>
@endpush
