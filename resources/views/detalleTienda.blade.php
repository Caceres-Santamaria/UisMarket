@extends('layouts/layout')

@section('title', 'Detalle Producto')
@section('css')

@endsection
@section('scriptHeader')

@endsection
@section('contenido')
    <main
        class="grid-in-contenido grid grid-cols-full grid-rows-detalle px-3 py-6 place-items-start place-content-start md:grid-rows-auto md:grid-cols-1 md:p-2 md:py-10 lg:grid-rows-auto lg:grid-cols-1 lg:px-10 lg:py-16">
        <div style="background-image:url('{{ Storage::url('images/website/p1.jpg') }}')"
            class="object-cover bg-center bg-cover bg-no-repeat flex justify-center items-center card-producto__link block w-full h-20 md:h-32 lg:h-52  ">
            <div>
                <div>
                    <div class="border border-8 border-gray-400 shadow-2xl rounded-full m-8 w-24 h-24 md:w-40 md:h-40 lg:w-40 lg:h-40 object-cover bg-center  bg-cover bg-no-repeat "
                        style="background-image:url('{{ Storage::url('images/logos/logo.png') }}')">
                    </div>
                    <div class="uppercase font-black text-xl">NOMBRE dEL EMPRENDIMIENTO</div>
                    <div class="redes">
                        <button class="w-10 h-10"><i class="text-3xl text-pink-700 fab fa-instagram"></i></button>
                        <button class="w-10 h-10"><i class="text-3xl text-blue-700 fab fa-facebook"></i></button>
                        <button class="w-10 h-10"><i class="text-3xl text-green-500 fab fa-whatsapp"></i></button>
                    </div>
                    <div class="star-rating">
                        <a class="text-yellow-500 text-3xl" href="#">★</a>
                        <a class="text-yellow-500 text-3xl" href="#">★</a>
                        <a class="text-yellow-500 text-3xl" href="#">★</a>
                        <a class="text-yellow-500 text-3xl" href="#">★</a>
                        <a class="text-yellow-500 text-3xl" href="#">★</a>
                        <div>
                        </div>
    </main>
@endsection
