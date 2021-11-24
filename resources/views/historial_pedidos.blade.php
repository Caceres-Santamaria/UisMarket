<x-app2-layout title="Historial pedidos">
    <div class=" grid-in-contenido py-12 px-20">

        <section class=" grid grid-cols-5 gap-6 text-white flex justify-center">
            <a href="" class="bg-pink-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{-- {{ $pendiente }} --}}
                </p>
                <p class="uppercase text-center">Pendiente</p>
                <p class="text-center text-2xl mt-2">
                    <i class="far fa-clock"></i>
                </p>
            </a>

            <a href="" class="bg-blue-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{-- {{ $recibido }} --}}
                </p>
                <p class="uppercase text-center">Preparando pedido</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-box"></i>
                </p>
            </a>

            <a href="" class="bg-yellow-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{-- {{ $enviado }} --}}
                </p>
                <p class="uppercase text-center">Enviado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-motorcycle"></i>
                </p>
            </a>

            <a href="" class="bg-green-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{-- {{ $entregado }} --}}
                </p>
                <p class="uppercase text-center">Entregado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-check-circle"></i>
                </p>
            </a>

            <a href="" class="bg-red-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{-- {{ $anulado }} --}}
                </p>
                <p class="uppercase text-center">Cancelado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-times-circle"></i>
                </p>
            </a>
        </section>

        {{-- @if ($orders->count()) --}}


        <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
            <h1 class="text-2xl mb-4">Pedidos recientes</h1>

            <ul>
                {{-- @foreach ($orders as $order) --}}
                <li>
                    <a href="" class="flex items-center py-2 px-4 hover:bg-gray-100">
                        <span class="w-12 text-center">
                            {{-- @switch($order->status)
                                            @case(1)
                                                <i class="fas fa-clock text-red-500 opacity-50"></i>
                                            @break
                                            @case(2)
                                                <i class="fas fa-box text-gray-500 opacity-50"></i>
                                            @break
                                            @case(3)
                                                <i class="fas fa-motorcycle text-yellow-500 opacity-50"></i>
                                            @break
                                            @case(4)
                                                <i class="fas fa-check-circle text-pink-500 opacity-50"></i>
                                            @break
                                            @case(5)
                                                <i class="fas fa-times-circle text-green-500 opacity-50"></i>
                                            @break
                                            @default

                                        @endswitch --}}
                        </span>

                        <span>
                            Orden: 1
                            <br>
                            11/11/11
                            {{-- {{ $order->created_at->format('d/m/Y') }} --}}
                        </span>


                        {{-- <div class="ml-auto">
                                        <span class="font-bold">
                                            @switch($order->status)
                                                @case(1)

                                                    Pendiente

                                                @break
                                                @case(2)

                                                    Recibido

                                                @break
                                                @case(3)

                                                    Enviado

                                                @break
                                                @case(4)

                                                    Entregado

                                                @break
                                                @case(5)

                                                    Anulado

                                                @break
                                                @default

                                            @endswitch
                                        </span>

                                        <br>

                                        {{-- <span class="text-sm">
                                            {{ $order->total }} USD
                                        </span> --}}
                        {{-- </div> --}}
                        <div class="ml-auto">
                            <span class="font-bold">
                                Pendiente
                            </span>

                            <br>

                            <span class="text-sm">
                                150000 USD
                            </span>
                        </div>

                        <span>
                            <i class="fas fa-angle-right ml-6"></i>
                        </span>

                    </a>
                </li>
                {{-- @endforeach --}}
            </ul>
        </section>

        {{-- @else
                <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                    <span class="font-bold text-lg">
                        No existe registros de ordenes
                    </span>
                </div>
            @endif --}}

    </div>

</x-app2-layout>
