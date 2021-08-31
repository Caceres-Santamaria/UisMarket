@extends('layouts/layout')

@section('title','Detalle Producto')
@section('css')

@endsection
@section('scriptHeader')

@endsection
@section('contenido')
    <main class="grid-in-contenido grid-cols-full grid-rows-full px-10 py-4 place-items-start place-content-start">
        <div class="slider-producto w-full">
            <div class="splide__container flex content-center justify-center flex-col flex-wrap w-full">
                <div id="primary-slider" class="splide p-splide--primary pt-2.5" >
                    <div class="splide__track splide__track--primary flex justify-center">
                        <ul class="splide__list">
                                <li class="splide__slide p-splide__slide cursor-pointer ">
                                    <img class="card-producto__img w-60" src="{{asset('storage/images/website/p1.jpg')}}">
                                </li>
                        </ul>
                    </div>
                </div>
                <div id="secondary-slider" class="splide p-splide--secundary pt-2.5" >
                    <div class="splide__track splide__track--secundary">
                        <ul class="splide__list splide__list--secundary">
                                <li class="splide__slide p-splide__slide opacity-50">
                                    <img class="card-producto__img">
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="detalle-producto">
            <h1 class="titulo-producto">producto</h1>
            <div class="Precio-stock-producto">
                <div>
                    <p class="Precio-stock-producto__precio">$100.000</p>
                </div>
                <div class="Precio-stock-producto__stock" id="producto-stock"></div>
            </div>
            <div class="descripcion-producto">
                <p>
                  AGUA MICELAR EN ESPUMA
                  Ha sido diseñada para remover fácilmente el maquillaje, sin irritar la piel de tu rostro. Cuenta con micelas activas que adicionalmente eliminan la grasa e impurezas acumuladas en el día a día. 
                  No necesita enjuague, debido a que sus componentes activos son delicados con la piel, y además de cumplir la función de limpiar, también funcionan como humectantes. 
                </p>
            </div>
            <div class="guiaTalla-producto">
                <button id="guiaTallas" class="guiaTallas"><i class="fas fa-ruler"></i> Guía De Tallas</button>
                <div id="modal-guia" class="modal-guia">
                    <i class="fas fa-times" id="close-modal-guia"></i>
                    <div class="modal-content">
                        <img  class="imagen-guiaTalla" src="" alt="">
                    </div>
                </div>
            </div>
            <div class="tallas-producto">
                <form method="post" action="" >
                   
                    <br/>
                    
                    <br/>
                    <br/>
                    <div class="">
                        <p class="no-stock " id="no-stock"><i class="fas fa-exclamation-circle"></i>Prenda No Disponible</p>
                        <div class="cantidad-agregar flex items-center justify-start pt-5 pb-2.5 ">
                            <div class="cantidad-producto relative flex items-center w-24 h-10 border-gray-500 border-l " id="cantidad-producto">
                                <div class="arriba-abajo w-8 h-full text-center hover:cursor-pointer menos border-r border-gray-500">
                                    <a class="cantidad-abajo cantidad-botones block no-underline w-full h-full text-center leading-8 text-black fas fa-angle-down" id="cantida-down">
                                    </a>
                                </div>
                                <input type="number" id="cantidad" name="cantidad" value="1" class="input-cantidad w-8 h-full m-0 text-center text-black ">
                                <div class="arriba-abajo w-8 h-full text-center hover:cursor-pointer mas border-l border-gray-500">
                                    <a class="cantidad-arriba cantidad-botones block no-underline w-full h-full text-center leading-8 text-black fas fa-angle-up" id="cantida-up">
                                    </a>
                                </div>
                            </div>
                            <button type="submit" id="shopify_add_to_cart" class="agregar-carrito bg-primario-n text-white h-10 rounded-lg text-center leading-10 border-0 cursor-pointer py-4 hover:bg-primario-ligth">
                                <i class="fas fa-cart-plus"></i> Añadir al carrito
                            </button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
