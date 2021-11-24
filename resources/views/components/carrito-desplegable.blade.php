<div x-show="carrito" x-transition class="fixed top-0 bg-black2-50 w-full h-full z-100 carrito-fijo "
    id="contenedor-carrito">
    <div @click.outside="carrito = false"
        class="relative top-0 bottom-0 bg-gray-50 text-black w-80 h-full m-0 left-c-des">
        <div
            class="flex justify-between content-center items-center bg-primario-ligth border-b border-primario-dark2 h-12 px-3">
            <h3 @click="carrito = false" id="close-carrito"
                class="m-0 p-0 w-9 h-9 text-center leading-9 clip-path-50 cursor-pointer hover:bg-green-400 hover:rotate-360 transition-all duration-500 ease-ease">
                <i class="fas fa-times"></i>
            </h3>
            <h3 class=" m-0 p-0  pl-2">Carrito</h3>
        </div>
        <div class=" h-cont-car overflow-y-auto">
            <div class=" min-h-full">
                <ul class=" m-0 p-4 flex flex-col justify-start content-start items-start">
                    {{-- @if (session()->has('carrito'))
                  @forelse (session('carrito') as $car) --}}
                    <li
                        class="w-full  py-2 px-0 flex justify-center content-center items-center border-b-2 border-primario-n">
                        <div class=" w-4/12">
                            <img class="max-w-full object-cover object-center border-2  border-primario-n"
                                loading="lazy" src="{{ asset('storage/images/website/p1.jpg') }}">
                        </div>
                        <div class=" pl-2 w-4/6 flex content-center justify-center flex-col min-h-90px flex-nowrap">
                            <a href="" class=" no-underline font-bold uppercase text-sm line-clamp-2">nombre
                                producto</a>
                            <span class=" text-xs">Talla: ESTANDAR</span>
                            <span class=" text-xs">Cantidad: 5</span>
                            <span class=" text-xs">50.000</span>
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
            <div class="h-32 border-t-2 border-primario-dark">
                <p class=" w-full flex justify-around my-3 mx-0"><span class="font-bold">Subtotal:</span><span
                        class="subtotal-valor">${{ isset($subtotal) ? number_format($subtotal) : '0' }}</span></p>
                        <div class="flex w-full justify-center items-center content-center flex-col">
                          <x-boton class=" w-2/4 h-9 mb-3">Ver mi carrito</x-boton>
                          <x-boton class=" w-2/4 h-9 mb-10">Realizar pedido</x-boton>
                      </div>
                      </div>
            
        </div>

    </div>
</div>
