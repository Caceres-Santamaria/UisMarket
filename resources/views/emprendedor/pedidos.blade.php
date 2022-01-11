<x-app2-layout title="Pedidos">
  <div class=" grid-in-contenido px-4 py-4 md:py-12 md:px-20">

        <section class="grid grid-cols-2 gap-3 md:grid-cols-3 md:gap-6 lg:grid-cols-4 text-white justify-center">

            <a href="{{ route('emprendedor.pedidos') . '?estado=2' }}"
                class="bg-blue-500 bg-opacity-75 rounded-lg px-2 pt-4 pb-2 md:px-12 md:pt-8 md:pb-4">
                <p class="text-center text-2xl">
                    {{ $pendiente }}
                </p>
                <p class="uppercase text-center text-sm md:text-base">Pendiente</p>
                <p class="text-center text-2xl mt-2">
                  <i class="far fa-clock"></i>
              </p>
            </a>

            <a href="{{ route('emprendedor.pedidos') . '?estado=3' }}"
                class="bg-yellow-500 bg-opacity-75 rounded-lg px-2 pt-4 pb-2 md:px-12 md:pt-8 md:pb-4">
                <p class="text-center text-2xl">
                    {{ $enviado }}
                </p>
                <p class="uppercase text-center text-sm md:text-base">Enviado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-motorcycle"></i>
                </p>
            </a>

            <a href="{{ route('emprendedor.pedidos') . '?estado=4' }}"
                class="bg-green-500 bg-opacity-75 rounded-lg px-2 pt-4 pb-2 md:px-12 md:pt-8 md:pb-4">
                <p class="text-center text-2xl">
                    {{ $entregado }}
                </p>
                <p class="uppercase text-center text-sm md:text-base">Entregado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-check-circle"></i>
                </p>
            </a>

            <a href="{{ route('emprendedor.pedidos') . '?estado=5' }}"
                class="bg-red-500 bg-opacity-75 rounded-lg px-2 pt-4 pb-2 md:px-12 md:pt-8 md:pb-4">
                <p class="text-center text-2xl">
                    {{ $cancelado }}
                </p>
                <p class="uppercase text-center text-sm md:text-base">Cancelado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-times-circle"></i>
                </p>
            </a>
        </section>

        @if ($pedidos->count())

            <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                <h1 class="text-2xl mb-4">Pedidos recientes</h1>

                <ul>
                    @foreach ($pedidos as $pedido)
                        <li>
                            <a href="{{ route('emprendedor.ver_pedidos', $pedido) }}"
                                class="flex items-center py-2 px-4 hover:bg-gray-100">
                                <span class="w-12 text-center">
                                    @switch($pedido->estado)
                                        @case(1)
                                            <i class="fas fa-business-time text-pink-500 opacity-50"></i>
                                        @break
                                        @case(2)
                                            <i class="fas fa-credit-card text-blue-500 opacity-50"></i>
                                        @break
                                        @case(3)
                                            <i class="fas fa-truck text-yellow-500 opacity-50"></i>
                                        @break
                                        @case(4)
                                            <i class="fas fa-check-circle text-green-500 opacity-50"></i>
                                        @break
                                        @case(5)
                                            <i class="fas fa-times-circle text-red-500 opacity-50"></i>
                                        @break
                                        @default

                                    @endswitch
                                </span>

                                <span>
                                    Pedido: {{ $pedido->id }}
                                    <br>
                                    {{ $pedido->created_at->format('d/m/Y') }}
                                </span>


                                <div class="ml-auto">
                                    <span class="font-bold">
                                        @switch($pedido->estado)
                                            @case(1)

                                                Pendiente

                                            @break
                                            @case(2)

                                                Pendiente

                                            @break
                                            @case(3)

                                                Enviado

                                            @break
                                            @case(4)

                                                Entregado

                                            @break
                                            @case(5)

                                                Cancelado

                                            @break
                                            @default

                                        @endswitch
                                    </span>

                                    <br>

                                    <span class="text-sm">
                                        {{ $pedido->total }} pesos
                                    </span>
                                </div>

                                <span>
                                    <i class="fas fa-angle-right ml-6"></i>
                                </span>

                            </a>
                        </li>
                    @endforeach
                </ul>
            </section>

        @else
            <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                <span class="font-bold text-lg">
                    No existen registros de pedidos
                </span>
            </div>
        @endif

    </div>

</x-app2-layout>
