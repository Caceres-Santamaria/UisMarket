@extends('layouts/layout')

@section('title', '¿Quiénes somos?')
@section('css')

@endsection
@section('scriptHeader')

@endsection
@section('contenido')
<main class="grid-in-contenido my-14 mx-28 text-base text-justify">

  <h1 class="flex justify-center font-semibold text-3xl mb-4">¿Quiénes somos?</h1>

  <p> <img class="w-96 float-right ml-6" src="{{asset('storage/images/website/about.jpg')}}" alt=""> UIS market es una iniciativa de estudiantes UIS para promover la compra de productos locales y así incentivar 
  la reactivación económica. Se trata de una plataforma en donde el usuario podrá acceder a la oferta de cientos 
  de emprendimientos de la comunidad UIS que residen en el área metropolitana de Bucaramanga. Nuestro objetivo es
  ofrecer una plataforma en donde los emprendedores locales puedan exhibir su marca y darla a conocer.
  Todas las tiendas participantes en la plataforma pertenecen a la comunidad UIS.  </p>
  
  <h2 class="flex justify-left font-semibold text-2xl mb-4 mt-6">¿Quieres ser parte de UIS market?</h2>

  <p class="mb-3">Requisitos:</p>

  <ul class="list-disc ml-4">
    <li>Pertenecer a la comunidad UIS.</li>
    <li>Capacidad de envío y entrega de tus productos.</li>
    <li>Residir en el área metropolitana de Bucaramanga.</li>
  </ul>

</main>
@endsection