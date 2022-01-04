<x-app2-layout title="Crear pedido">

    <main class="grid-in-contenido py-8 grid lg:grid-cols-6040 gap-6 bg-gray-100 justify-items-center">

        <div class="order-2 w-11/12 lg:order-1 lg:col-span-1  ">

            <div class="bg-white rounded-lg shadow p-6">
                <div class="mb-4">
                    <label value="Nombre de contácto">Nombre de contácto
                        <x-jet-input type="text" placeholder="Ingrese el nombre de la persona que recibirá el producto"
                            class="w-full" />
                </div>

                <div>
                    <label value="Teléfono de contacto">Teléfono de contacto
                        <x-jet-input type="text" placeholder="Ingrese un número de telefono de contácto"
                            class="w-full" />
                </div>
            </div>

            <div>
                <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envíos</p>

                <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4 cursor-pointer">
                    <input type="radio" value="1" class="text-gray-600">
                    <span class="ml-2 text-gray-700">
                        Recojo en tienda (Calle Falsa 123)
                    </span>

                    <span class="font-semibold text-gray-700 ml-auto">
                        Gratis
                    </span>
                </label>

                <div class="bg-white rounded-lg shadow">
                    <label class="px-6 py-4 flex items-center cursor-pointer">
                        <input type="radio" value="2" class="text-gray-600">
                        <span class="ml-2 text-gray-700">
                            Envío a domicilio
                        </span>

                    </label>
                    {{-- <div class="px-6 pb-6 grid grid-cols-2 gap-6 hidden" :class="{ 'hidden': envio_type != 2 }"> --}}
                    <div class="px-6 pb-6 grid grid-cols-2 gap-6">


                        {{-- Departamentos --}}
                        <div>
                            <label value="Departamento" >

                            <select class="form-control w-full">

                                <option value="" disabled selected>Seleccione un Departamento</option>

                            </select>

                            {{-- <x-jet-x-jet-input-error for="department_id" /> --}}
                        </div>

                        {{-- Ciudades --}}
                        <div>
                            <label value="Ciudad" />

                            <select class="form-control w-full">

                                <option value="" disabled selected>Seleccione una ciudad</option>


                            </select>

                            {{-- <x-jet-x-jet-input-error for="city_id" /> --}}
                        </div>


                        {{-- Distritos --}}

                        <div class="col-span-2">
                            <label value="Dirección">Dirección
                                <x-jet-input class="w-full" type="text" />
                                {{-- <x-jet-x-jet-input-error for="address" /> --}}
                        </div>

                        <div class="col-span-2">
                            <label value="Referencia">Referencia
                                <x-jet-input class="w-full" type="text" />
                                {{-- <x-jet-x-jet-input-error for="references" /> --}}
                        </div>

                    </div>
                </div>

            </div>

            <div>
                <x-boton class="w-full h-10">
                    Realizar pedido
                </x-boton>

                <hr>

                <p class="text-sm text-gray-700 mt-2">Todos los datos son usados y protegidos conforme es establecido en las  
                  <a href="{{route('politicas')}}" class="font-semibold text-orange-500">Políticas y privacidad</a></p>
            </div>

        </div>

        <div class="order-1 w-11/12 lg:order-2 lg:col-span-1">
            <div class="bg-white rounded-lg shadow p-6">
                <ul>
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ asset('storage/images/website/p1.jpg') }}"
                            alt="">

                        <article class="flex-1">
                            <h1 class="font-bold">nombre producto</h1>

                            <div class="flex">
                                <p>Cant: 3</p>
                                {{-- @isset($item->options['color'])
                                        <p class="mx-2">- Color: {{ __($item->options['color']) }}</p>
                                    @endisset --}}
                                {{-- @isset($item->options['size'])
                                        <p>{{ $item->options['size'] }}</p>
                                    @endisset --}}

                            </div>

                            <p>USD 150.000</p>
                        </article>
                    </li>
                    {{-- @empty
                  <li class="py-6 px-4">
                      <p class="text-center text-gray-700">
                          No tiene agregado ningún item en el carrito
                      </p>
                  </li>
              @endforelse --}}
                </ul>

                <hr class="mt-4 mb-3">

                <div class="text-gray-700">
                    <p class="flex justify-between items-center">
                        Subtotal
                        <span class="font-semibold"> 545657</span>
                    </p>
                    <p class="flex justify-between items-center">
                        Envío
                        <span class="font-semibold">
                        </span>
                    </p>

                    <hr class="mt-4 mb-3">

                    <p class="flex justify-between items-center font-semibold">
                        <span class="text-lg">Total</span>
                    </p>
                </div>
            </div>
        </div>
    </main>
</x-app2-layout>
