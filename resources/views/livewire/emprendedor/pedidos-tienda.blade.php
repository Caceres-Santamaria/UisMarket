<section class="bg-white shadow-lg rounded-lg px-3 sm:px-6 md:px-12 py-5 md:py-8 mt-12 text-gray-700">
    @if ($pedidos->count())
        <h1 class="text-xl md:text-2xl mb-4">Pedidos</h1>
        <ul>
            @foreach ($pedidos as $pedido)
                <li>
                    <a href="{{ route('emprendedor.ver_pedidos', $pedido) }}"
                        class="flex items-center justify-between py-2 px-1 sm:px-2 md:px-4 hover:bg-gray-100">
                        <div class="flex items-center gap-1 sm:gap-2 md:gap-3">
                            <span class="text-center text-xl">
                                @switch($pedido->estado)
                                    @case(1)
                                        <i class="far fa-clock text-pink-500 opacity-50"></i>
                                    @break

                                    @case(2)
                                        <i class="fas fa-box text-blue-500 opacity-50"></i>
                                    @break

                                    @case(3)
                                        <i class="fas fa-motorcycle text-yellow-500 opacity-50"></i>
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
                            <p class="flex flex-col justify-center items-center text-sm md:text-base">
                                <span>Pedido: N°{{ $pedido->id }}</span>
                                <span>{{ $pedido->created_at->diffForHumans() }}</span>
                            </p>
                        </div>
                        <div class="flex flex-col justify-center items-center text-sm md:text-base">
                            <p>
                                <span class="font-bold">Envío:</span>
                                @if ($pedido->tipo_envio == 1)
                                    Recoge en tienda
                                @endif
                                @if ($pedido->tipo_envio == 2)
                                    Domicilio
                                @endif
                                @if ($pedido->tipo_envio == 3)
                                    Recoge en el campus principal de la UIS
                                @endif
                            </p>
                            <p>
                                <span class="font-bold">Costo:</span>
                                {{ $pedido->costo_envio == 0 ? 'Gratis' : '$ ' . number_format($pedido->costo_envio) }}
                            </p>

                        </div>
                        <div class="flex items-center text-sm md:text-base gap-1 sm:gap-2 md:gap-3">
                            <div class="flex flex-col justify-center items-center">
                                <span class="font-bold">
                                    @switch($pedido->estado)
                                        @case(1)
                                            Pendiente
                                        @break

                                        @case(2)
                                            No enviado
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
                                <span>
                                    $ {{ number_format($pedido->total + $pedido->costo_envio) }}
                                </span>
                            </div>
                            <span>
                                <i class="fas fa-angle-right"></i>
                            </span>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <span class="font-bold text-lg">
            No existe registros de pedidos
        </span>
    @endif
</section>
