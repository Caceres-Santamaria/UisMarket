@extends('layouts/layout')

@section('title', 'Política de privacidad')
@section('css')

@endsection
@section('scriptHeader')

@endsection
@section('contenido')
    <main>
        <div class="content grid-in-contenido grid grid-cols-full grid-rows-catalogo place-items-center place-content-center px-0 py-4">
            <h2 class="font-semibold text-lg lg:text-xl flex justify-center text-center mb-2 lg:mb-6 text-gray-600">
                PROMOCIONES</h2>
                <div class="content__orderBy place-self-end flex relative justify-center items-center w-52 h-8 border border-gray-300 mr-4 p-2 cursor-pointer" id="content__orderBy">
                    <p class="flex flex-row justify-between items-start w-full h-full text-base text-gray-400" id="cont-orderBy"><span id="orderBy">Alfabéticamente: A-Z</span><i id="listaFiltro" class="fas fa-list"></i></p>
                    <ul class="list-orderBy hidden absolute r-0 border border-gray-400 bg-gray-100 z-5 w-52 t-calc1" id="list-orderBy">
                        <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Alfabéticamente: A-Z"><a class="w-full h-full py-0 px-4 text-sm inline-block " href="{{ request()->url() }}?sort_by=title-ascending">Alfabéticamente: A-Z</a></li>
                        <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Alfabéticamente: Z-A"><a class="w-full h-full py-0 px-4 text-sm inline-block " href="{{ request()->url() }}?sort_by=title-descending">Alfabéticamente: Z-A</a></li>
                        <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Precio: Menor a mayor"><a class="w-full h-full py-0 px-4 text-sm inline-block " href="{{ request()->url() }}?sort_by=price-ascending">Precio: Menor a mayor</a></li>
                        <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Precio: Mayor a menor"><a class="w-full h-full py-0 px-4 text-sm inline-block " href="{{ request()->url() }}?sort_by=price-descending">Precio: Mayor a menor</a></li>
                        <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Fecha: Mas nuevo"><a class="w-full h-full py-0 px-4 text-sm inline-block " href="{{ request()->url() }}?sort_by=created-descending">Fecha: Mas nuevo</a></li>
                        <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Fecha: Mas antiguo"><a class="w-full h-full py-0 px-4 text-sm inline-block " href="{{ request()->url() }}?sort_by=created-ascending">Fecha: Mas antiguo</a></li>
                        <li class="list-orderBy__item h-8 w-full text-black  leading-8 " data-filtro="Más vendidos"><a class="w-full h-full py-0 px-4 text-sm inline-block " href="{{ request()->url() }}?sort_by=best-selling">Más vendidos</a></li>
                    </ul>
                </div>
        </div>

        <div id="content-products" class="collection-products w-full">
            <div
                class="content__body grid p-2 place-items-stretch gap-y-6 gap-x-7 place-content-start grid-cols-cardsm md:grid-cols-cardmd md:gap-6 md:px-6 md:py-4 lg:grid-cols-cardlg lg:gap-6 lg:px-6 lg:py-4">
                <div class="card-producto border-gray-200 border-2 rounded-md p-1 ">
                    <a href="" class="card-producto__link block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                        <div
                            class="complements absolute top-1.5 -left-0.5 w-auto flex justify-start items-start content-start flex-col z-8 ">
                            <span
                                class="descuento w-16 text-xs text-center h-5 leading-5 mb-1 text-white rounded-sm bg-red-600 lg:w-20 lg:pb-6 lg:text-base">20%
                                OFF</span>
                        </div>
                        <img class="card-producto__img w-full h-full object-cover object-center "
                            src="{{ Storage::url('images/website/p1.jpg') }}" alt="">
                    </a>
                    <div class="card-producto__body flex flex-col justify-center items-center">
                        <h5 class="card-producto__title pt-1.5 text-sm text-center uppercase lg:text-base">Tenda</h5>
                        <p class="card-producto__precio text-center lg:text-lg">
                            <span style="opacity: .5;text-decoration:line-through;">$100.000</span> |
                            <span>$80.000</span>
                        </p>
                    </div>
                </div>
                <div class="card-producto border-gray-200 border-2 rounded-md p-1 ">
                    <a href="" class="card-producto__link block w-full h-cardsm relative md:h-cardmd lg:h-cardlg">
                        <div
                            class="complements absolute top-1.5 -left-0.5 w-auto flex justify-start items-start content-start flex-col z-8 ">
                            <span
                                class="descuento w-16 text-xs text-center h-5 leading-5 mb-1 text-white rounded-sm bg-red-600 lg:w-20 lg:pb-6 lg:text-base">20%
                                OFF</span>
                        </div>
                        <img class="card-producto__img w-full h-full object-cover object-center "
                            src="{{ Storage::url('images/website/p2.jpg') }}" alt="">
                    </a>
                    <div class="card-producto__body flex flex-col justify-center items-center">
                        <h5 class="card-producto__title pt-1.5 text-sm text-center uppercase lg:text-base">Tenda</h5>
                        <p class="card-producto__precio text-center lg:text-lg">
                            <span style="opacity: .5;text-decoration:line-through;">$100.000</span> |
                            <span>$80.000</span>
                        </p>
                    </div>
                </div>
                <div class="card-producto border-gray-200 border-2 rounded-md p-1 ">
                    <a href="" class="card-producto__link block w-full h-cardsm relative md:h-cardmd lg:h-cardlg">
                        <div
                            class="complements absolute top-1.5 -left-0.5 w-auto flex justify-start items-start content-start flex-col z-8 ">
                            <span
                                class="descuento w-16 text-xs text-center h-5 leading-5 mb-1 text-white rounded-sm bg-red-600 lg:w-20 lg:pb-6 lg:text-base">20%
                                OFF</span>
                        </div>
                        <img class="card-producto__img w-full h-full object-cover object-center "
                            src="{{ Storage::url('images/website/p4.jpg') }}" alt="">
                    </a>
                    <div class="card-producto__body flex flex-col justify-center items-center">
                        <h5 class="card-producto__title pt-1.5 text-sm text-center uppercase lg:text-base">Tenda</h5>
                        <p class="card-producto__precio text-center lg:text-lg">
                            <span style="opacity: .5;text-decoration:line-through;">$100.000</span> |
                            <span>$80.000</span>
                        </p>
                    </div>
                </div>
                <div class="card-producto border-gray-200 border-2 rounded-md p-1 ">
                    <a href="" class="card-producto__link block w-full h-cardsm relative md:h-cardmd lg:h-cardlg">
                        <div
                            class="complements absolute top-1.5 -left-0.5 w-auto flex justify-start items-start content-start flex-col z-8 ">
                            <span
                                class="descuento w-16 text-xs text-center h-5 leading-5 mb-1 text-white rounded-sm bg-red-600 lg:w-20 lg:pb-6 lg:text-base">20%
                                OFF</span>
                        </div>
                        <img class="card-producto__img w-full h-full object-cover object-center "
                            src="{{ Storage::url('images/website/p3.jpg') }}" alt="">
                    </a>
                    <div class="card-producto__body flex flex-col justify-center items-center">
                        <h5 class="card-producto__title pt-1.5 text-sm text-center uppercase lg:text-base">Tenda</h5>
                        <p class="card-producto__precio text-center lg:text-lg">
                            <span style="opacity: .5;text-decoration:line-through;">$100.000</span> |
                            <span>$80.000</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
