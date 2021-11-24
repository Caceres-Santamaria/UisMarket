<x-app2-layout title="pedido">

    <div class=" grid-in-contenido max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center">

            <div class="relative">
                {{-- <div class="{{ ($order->status >= 2 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }}  rounded-full h-12 w-12 flex items-center justify-center"> --}}
                <div class=" bg-blue-400 rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>

                <div class="absolute -left-1.5 mt-0.5">
                    <p>Recibido</p>
                </div>
            </div>
            {{-- <div class="{{ ($order->status >= 3 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2"></div> --}}
            <div class="bg-gray-400 h-1 flex-1 mx-2"></div>
            <div class="relative">
                {{-- <div class="{{ ($order->status >= 3 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center"> --}}
                <div class="bg-gray-400 rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>
                <div class="absolute -left-1 mt-0.5">
                    <p>Enviado</p>
                </div>
            </div>
            {{-- <div class="{{ ($order->status >= 4 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2"></div> --}}
            <div class="bg-gray-400 h-1 flex-1 mx-2"></div>
            <div class="relative">
                {{-- <div class="{{ ($order->status >= 4 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center"> --}}
                <div class="bg-gray-400 rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <div class="absolute -left-2 mt-0.5">
                    <p>Entregado</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            {{-- <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
              Orden-{{ $order->id }}</p> --}}
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span></p>
            {{-- @if ($order->status == 1)

                    <x-button-enlace class="ml-auto" href="{{ route('orders.payment', $order) }}">
                        Ir a pagar
                    </x-button-enlace>

                @endif --}}
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">Envío</p>
                    {{-- @if ($order->envio_type == 1) --}}
                    <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                    <p class="text-sm">Calle falsa 123</p>
                    {{-- @else
                            <p class="text-sm">Los productos Serán enviados a:</p>
                            <p class="text-sm">{{ $envio->address }}</p>
                            <p>{{ $envio->department }} - {{ $envio->city }} - {{ $envio->district }}
                            </p>
                        @endif --}}
                </div>
                <div>
                    <p class="text-lg font-semibold uppercase">Datos de contacto</p>
                    <p class="text-sm">Persona que recibirá el producto: nombre persona</p>
                    <p class="text-sm">Teléfono de contacto: 3204877763</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Resumen</p>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    {{-- @foreach ($items as $item) --}}
                    <tr>
                        <td>
                            <div class="flex">
                                <img class="h-15 w-20 object-cover mr-4" src="
                                        {{ asset('storage/images/website/p1.jpg') }}" alt="">
                                <article>
                                    <h1 class="font-bold">nombre producto</h1>
                                    <div class="flex text-xs">

                                        {{-- @isset($item->options->color)
                                                    Color: {{ __($item->options->color) }}
                                                @endisset

                                                @isset($item->options->size)
                                                    - {{ $item->options->size }}
                                                @endisset --}}
                                    </div>
                                </article>
                            </div>
                        </td>

                        <td class="text-center">
                            150.000
                        </td>

                        <td class="text-center">
                            3
                        </td>

                        <td class="text-center">
                            450.000
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>

    </div>

</x-app2-layout>
