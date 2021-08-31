@extends('layouts/layout')

@section('title', 'HOME')

@section('css')
<link rel="stylesheet" href="{{asset('css/splide.min.css')}}">
<link rel="stylesheet" href="{{asset('css/general.css')}}">

@endsection

@section('scriptHeader')
<script src="{{asset('js/splide.min.js')}}"></script>
@endsection

@section('contenido')
<main class="grid-in-contenido">
<div class="m-4 lg:mx-32 md:mx-20 sm:mx-20">
  <div class="splide" id="splide">
    <div class="splide__track">
      <ul class="splide__list">
        <li class="splide__slide"><img src="{{Storage::url('images/website/hogar.jpg')}}" alt=""></li>
        <li class="splide__slide"><img src="{{Storage::url('images/website/empaque.jpg')}}" alt=""></li>
        <li class="splide__slide"><img src="{{Storage::url('images/website/entrega.jpg')}}" alt=""></li>
        <li class="splide__slide"><img src="{{Storage::url('images/website/informes.jpg')}}" alt=""></li>
      </ul>
    </div>
  </div>
  <h1 class="text-primario-n font-semibold text-2xl  lg:text-4xl flex justify-center my-4 lg:my-8"> UIS Market </h1>
  <h1 class=" font-medium text-xl lg:text-3xl flex justify-center text-center mb-10 text-gray-600">Apoyamos las marcas y emprendimientos UIS con el fin de activar la economía local.</h1>
  <h2 class=" font-normal text-lg lg:text-2xl my-2 text-gray-600"> Tiendas destacadas </h2>
  <div id="content-products" class="w-full">
    @include('destacadas')
  </div>
  <h2 class=" font-normal text-lg lg:text-2xl my-2 text-gray-600"> Nuevas tiendas </h2>
  <div id="content-products" class="w-full">
    @include('nuevastiendas')
  </div>

</div>
</main>
@endsection

@section('scriptFooter')
<script>
  new Splide('#splide',{
    type:'fade',
    rewind: true,
    lazyload:'nearby',
    cover:'true',
    height:'27rem',
    breakpoints:{
      '2400':{
        height:'24rem'
            },
      '1199':{
        height:'19rem'
            },
      '991':{
        height:'15rem'
      },
      '767':{
        height:'14rem'
      },
      '575':{
        height:'8rem'
      }
    }
  }).mount();
</script>
@endsection