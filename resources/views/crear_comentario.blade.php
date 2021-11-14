<x-app2-layout title="Calificar pedido">
    <main class="grid-in-contenido py-8 grid lg:grid-cols-6040 gap-6 bg-gray-100 justify-items-center">

        <div class="order-2 w-11/12 lg:order-1 lg:col-span-1  ">
            <h1 class="text-2xl font-bold p-6 text-center">Calificar pedido #67</h1>

            <div class="bg-white rounded-lg shadow p-6">


                <div class="mb-4">
                    <label>Calificación

                        <form class=" m-0 w-full h-10">
                            <p class="clasificacion text-left">
                                <input id="radio1" type="radio" name="estrellas" value="5">
                                <!--
                      --><label class="estrella text-2xl text-gray-400" for="radio1">★</label>
                                <!--
                      --><input id="radio2" type="radio" name="estrellas" value="4">
                                <!--
                      --><label class="estrella text-2xl text-gray-400" for="radio2">★</label>
                                <!--
                      --><input id="radio3" type="radio" name="estrellas" value="3">
                                <!--
                      --><label class="estrella text-2xl text-gray-400" for="radio3">★</label>
                                <!--
                      --><input id="radio4" type="radio" name="estrellas" value="2">
                                <!--
                      --><label class="estrella text-2xl text-gray-400" for="radio4">★</label>
                                <!--
                      --><input id="radio5" type="radio" name="estrellas" value="1">
                                <!--
                      --><label class="estrella text-2xl text-gray-400" for="radio5">★</label>
                            </p>
                        </form>


                        {{-- <div class="star-rating">
                            <a class="text-yellow-500 text-3xl" href="#">★</a>
                            <a class="text-yellow-500 text-3xl" href="#">★</a>
                            <a class="text-yellow-500 text-3xl" href="#">★</a>
                            <a class="text-yellow-500 text-3xl" href="#">★</a>
                            <a class="text-yellow-500 text-3xl" href="#">★</a>
                        </div> --}}
                </div>

                <div>
                    <label value="">Comentario
                        <textarea placeholder="Ingrese su comentario (máximo 190 caracteres)" maxlength="191"
                            class=" w-full h-32 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                </div>
            </div>
            <div>
                <x-boton class="w-full">
                    Enviar
                </x-boton>

                <x-boton class="w-full">
                    Cancelar
                </x-boton>

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
