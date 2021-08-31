@extends('layouts/layout')

@section('title', 'Política de privacidad')
@section('css')

@endsection
@section('scriptHeader')

@endsection
@section('contenido')
<main class="grid-in-contenido my-6 mx-8 text-sm text-justify lg:text-base lg:my-14 lg:mx-28 ">
<h2 class="font-semibold text-lg lg:text-xl flex justify-center text-center mb-2 lg:mb-6 text-gray-600">PROMOCIONES</h2>
<div class="content__body grid grid-cols-cardsm gap-6 p-3.5 place-content-start place-items-stretch md:grid-cols-cardmd md:gap-x-6 md:gap-y-8 md:py-3 md:px-6 lg:grid-cols-cardlg lg:gap-6 lg:py-3 lg:px-6">
    {{-- @isset($productos)
      @forelse($productos as $producto) --}}
    <div class="card-producto border-gray-200 border-2 rounded-md p-1 ">
        <a href="" class="card-producto__link block w-full h-cardsm relative md:h-cardmd lg:h-cardlg">
            {{-- @if ($producto->cantidad > 0 || $producto->descuento <= 0)
              <div class="complements">
                  @if ($producto->cantidad <= 0)
                  <span class="agotado">AGOTADO</span>
                  @endif
                  @if ($producto->descuento > 0)
                  <span class="descuento">{{ intval($producto->descuento*100) }} % OFF</span>
                  @endif
              </div>
              @else
              <div class="complements">
                  <span class="agotado">AGOTADO</span>
                  <span class="descuento">{{ intval($producto->descuento*100) }} % OFF</span>
              </div>
              @endif
              <img loading="lazy" class="card-producto__img" src="{{ Storage::url($producto->imagenProductos[0]->nombre_imagen) }}" alt="{{ $producto->imagenProductos[0]->descripcion }}"> --}}
            
            <div class="complements absolute top-1.5 -left-0.5 w-auto flex justify-start items-start content-start flex-col z-8 ">
                  <span class="descuento w-16 text-xs text-center h-5 leading-5 mb-1 text-white rounded-sm bg-red-600 lg:w-20 lg:pb-6 lg:text-base">20% OFF</span>
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
            
            <div class="complements absolute top-1.5 -left-0.5 w-auto flex justify-start items-start content-start flex-col z-8 ">
                  <span class="descuento w-16 text-xs text-center h-5 leading-5 mb-1 text-white rounded-sm bg-red-600 lg:w-20 lg:pb-6 lg:text-base">20% OFF</span>
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
            <div class="complements absolute top-1.5 -left-0.5 w-auto flex justify-start items-start content-start flex-col z-8 ">
                  <span class="descuento w-16 text-xs text-center h-5 leading-5 mb-1 text-white rounded-sm bg-red-600 lg:w-20 lg:pb-6 lg:text-base">20% OFF</span>
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
            {{-- @if ($producto->cantidad > 0 || $producto->descuento <= 0)
              <div class="complements">
                  @if ($producto->cantidad <= 0)
                  <span class="agotado">AGOTADO</span>
                  @endif
                  @if ($producto->descuento > 0)
                  <span class="descuento">{{ intval($producto->descuento*100) }} % OFF</span>
                  @endif
              </div>
              @else
              <div class="complements">
                  <span class="agotado">AGOTADO</span>
                  <span class="descuento">{{ intval($producto->descuento*100) }} % OFF</span>
              </div>
              @endif
              <img loading="lazy" class="card-producto__img" src="{{ Storage::url($producto->imagenProductos[0]->nombre_imagen) }}" alt="{{ $producto->imagenProductos[0]->descripcion }}"> --}}
            
            <div class="complements absolute top-1.5 -left-0.5 w-auto flex justify-start items-start content-start flex-col z-8 ">
                  <span class="descuento w-16 text-xs text-center h-5 leading-5 mb-1 text-white rounded-sm bg-red-600 lg:w-20 lg:pb-6 lg:text-base">20% OFF</span>
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

    {{-- @empty
      @endforelse
  @endisset --}}

</div>

{{-- @isset($productos)
  @isset($sort_by)
  {{ $productos->appends(['sort_by' => $sort_by])->links() }}
  @else
  {{ $productos->links() }}
  @endisset
@endisset --}}

</main>
@endsection