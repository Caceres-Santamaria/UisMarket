<x-app2-layout title="Carrito">
    <main class="grid-in-contenido p-4 cart-content content m-px.5 text-left">
        <h1 class="mb-6 title-inform text-center text-2xl font-black">CARRITO DE COMPRAS</h1>
        <div class=" ">
            <div class="flex justify-center items-center flex-col w-full">
                <h4 class="">
                    {{-- @if (session()->has('carrito'))
                    Productos en el carrito:<span>({{count(session('carrito'))}})</span>
                    @else --}}
                    Productos en el carrito:<span>(0)</span>
                    {{-- @endif --}}
                </h4>
                <div class="bg-white border border-gray-300 rounded-2xl w-11/12 md:w-4/5 pt-2 mt-2 lg:w-9/12">
                    <div class="p-4 ">
                        <div class="flex uppercase font-semibold mb-4 ">
                            <div class="w-3/5 lg:w-2/5 text-center">
                                <h3>Producto</h3>
                            </div>
                            <div class="w-2/5 lg:w-1/5 text-center">
                                <h3>Precio</h3>
                            </div>
                            <div class="hidden lg:block lg:w-1/5 lg:text-center">
                                <h3>Cantidad</h3>
                            </div>
                            <div class="hidden lg:block lg:w-1/5 lg:text-center">
                                <h3>Subtotal</h3>
                            </div>
                        </div>
                        <hr class="mb-6 ">
                        <ul class="">
                            {{-- @php 
                        $subtotal = 0;
                        @endphp
                        @if (session()->has('carrito'))
                        @forelse (session('carrito') as $car) --}}
                            <li class=" flex flex-row justify-between items-center">
                                <div class="w-3/5 lg:w-2/5 flex justify-between items-center">
                                    <div class=" w-2/5 flex justify-center">
                                        <a title="" href="">
                                            <img class="lg:mx-5 items-center w-14 h-14 md:w-20 md:h-20 lg:w-28 lg:h-28" loading="lazy" alt="" title=""
                                                width="100" src="{{ asset('storage/images/website/p1.jpg') }}">
                                        </a>
                                    </div>
                                    <div class="w-3/5 ">
                                        <a href="">
                                            <span class="text-sm uppercase line-clamp-2 lg:text-base ">nombre del producto dgdfgd ebr ergerger rgeg</span>
                                        </a>
                                        <span class="text-sm  lg:text-base block line-clamp-1">Talla: estandar</span>
                                       
                                        <div class="lg:hidden">
                                          {{-- <form action="{{ route('carrito.delete',($loop->index)) }}" method="POST">
                                          @csrf
                                          @method('DELETE') --}}
                                          <button type="submit" class="cel_item__interactions__button ">
                                              <i class="icon-bin text-red-600 text-sm cursor-pointer"><i
                                                      class="far fa-trash-alt"></i>Eliminar</i>
                                          </button>
                                          {{-- </form> --}}
                                      </div>


                                    </div>
                                </div>

                                <div class=" w-2/5 lg:w-1/5 lg:block">
                                    <span class=" block text-center">
                                        $150.000
                                        {{-- {{ number_format($car['producto']->costo*$car['cantidad']) }}
                                        @php
                                            $subtotal += $car['producto']->costo*$car['cantidad']
                                        @endphp --}}
                                    </span>


                                    <div class="lg:hidden block text-center ">
                                      <div class="flex justify-center items-center">
                                          <label for="quantity0" class="text-xs ">
                                              Cantidad:
                                          </label>
                                          {{-- {{ $car['cantidad'] }} --}}
                                          <input type="number" id="quantity0" class="w-10 h-6 border m-0 px-2">
                                      </div>
                                  </div>

                                    
                                </div>

                                <div class="hidden lg:block lg:w-1/5">
                                    <div class="lg:w-full lg:flex lg:justify-center">
                                        <label for="quantity0">
                                            Cantidad:
                                        </label>
                                        {{-- {{ $car['cantidad'] }} --}}
                                        <input type="number" id="quantity0" class="w-14 h-6 border ">
                                    </div>
                                    <div class="lg:flex lg:justify-center">
                                        {{-- <form action="{{ route('carrito.delete',($loop->index)) }}" method="POST">
                                        @csrf
                                        @method('DELETE') --}}
                                        <button type="submit" class="cel_item__interactions__button ">
                                            <i class="icon-bin text-red-600 cursor-pointer"><i
                                                    class="far fa-trash-alt"></i>Eliminar</i>
                                        </button>
                                        {{-- </form> --}}
                                    </div>
                                </div>

                                

                                <div class="hidden lg:block lg:w-1/5">
                                    <span class="lg:w-full lg:text-center lg:block">
                                        $250.000
                                        {{-- {{ number_format($car['producto']->costo*$car['cantidad']) }}
                                    @php
                                        $subtotal += $car['producto']->costo*$car['cantidad']
                                    @endphp --}}
                                    </span>
                                </div>
                            </li>
                            <br>
                            <hr>
                            {{-- @empty
                            <li class="item__list--item lg:flex lg:flex-row lg:justify-center lg:items-center ">Carrito vacío</li>
                        @endforelse
                        @else
                        <li class="item__list--item ">Carrito vacío</li>
                        @endif --}}
                        </ul>
                    </div>
                    <div class="row p-4">
                        <div class="">
                            <div class="text-right font-bold text-lg">
                                <div class="">
                                    Total
                                </div>
                                <div class="">
                                    $150.000
                                    {{-- ${{number_format($subtotal)}} --}}
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="block w-full md:flex md:justify-center lg:flex lg:justify-center">
                                {{-- <div class=" buscar-btn "> --}}
                                <x-boton>
                                    Continuar comprando
                                </x-boton>
                                {{-- <a class=" " href="{{ route('productos.index')}}" >Continuar comprando</a>
                            </div> --}}
                                <x-boton>
                                    Ir a pagar
                                </x-boton>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app2-layout>
