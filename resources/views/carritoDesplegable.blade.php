<div class="menu-responsive fixed top-0 bg-black w-full h-full z-100 carrito-fijo " id="contenedor-carrito">
  <div class="menu-container relative top-0 bottom-0 bg-gray-50 text-black w-80 h-full m-0 left-c-des">
      <div class="menu-header flex justify-between content-center items-center bg-gray-300 border border-primario-dark h-12 p-2">
          <h3 id="close-carrito" class="close-menu w-9 h-9 text-center leading-9  "><i class="fas fa-times"></i></h3>
          <h3 class="menu-header__title m-0 p-0  menu-header__item pl-2">Carrito</h3>
      </div>
      <div class="menu-content h-cont-car overflow-y-auto">
          <div class="menu-content__scroll min-h-full">
              <ul class="carrito-contenido__lista m-0 p-4 flex flex-col justify-start content-start items-start">
                  {{-- @if(session()->has('carrito'))
                  @forelse (session('carrito') as $car) --}}
                  <li class="carrito-contenido__item w-full border-2 border-primario-dark py-2 px-0 flex justify-center content-center items-center">
                      <div class="carrito-contenido__item__img w-4/12">
                          <img class="max-w-full object-cover object-center border-2 border-ridge border-primario-dark" loading="lazy" src="{{ asset('storage/images/website/p1.jpg') }}">
                      </div>
                      <div class="carrito-contenido__item__detalle pl-2 w-4/6 flex content-center justify-center flex-col min-h-90px flex-nowrap">
                          <a href="" class="nombre-producto no-underline font-bold">nombre producto</a>
                          <span class="pt-1">Talla: ESTANDAR</span>
                          <span class="pt-1">Cantidad: 5</span>
                          <span class="pt-1">50.000</span>
                      </div>
                  </li>
                  {{-- @php 
                  $subtotal += $car['producto']->costo*$car['cantidad'];
                  @endphp
                  @empty
                  <li class="carrito-contenido__item carrito-contenido__vacio"><i class="addCarrito"></i> <span>No tienes productos en el carrito.</span></li> 
                  @endforelse   
                  @else
                  <li class="carrito-contenido__item carrito-contenido__vacio"><i class="addCarrito"></i> <span>No tienes productos en el carrito.</span></li>
                  @endif --}}
              </ul>
          </div>
          <div class="menu-content__footer h-32 border-t-2 border-primario-dark">
              <p class="menu-content__footer__subtotal w-full flex justify-around my-3 mx-0"><span class="subtotal">Subtotal:</span><span class="subtotal-valor">${{ (isset($subtotal)) ? number_format($subtotal):"0" }}</span></p>
              <x-boton>Ver mi carrito</x-boton>
              <x-boton>Ir a pagar</x-boton>
          </div>
      </div>
  </div>
</div>
