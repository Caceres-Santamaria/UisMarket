<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center">

        <div class="relative">
            <div
                class="{{ $pedido->estado >= 2 && $pedido->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }}  rounded-full h-12 w-12 flex items-center justify-center">
                <i class="fas fa-check text-white"></i>
            </div>

            <div class="absolute -left-1.5 mt-0.5">
                <p>Pendiente</p>
            </div>
        </div>

        <div
            class="{{ $pedido->estado >= 3 && $pedido->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2">
        </div>

        <div class="relative">
            <div
                class="{{ $pedido->estado >= 3 && $pedido->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                <i class="fas fa-truck text-white"></i>
            </div>

            <div class="absolute -left-1 mt-0.5">
                <p>Enviado</p>
            </div>
        </div>

        <div
            class="{{ $pedido->estado >= 4 && $pedido->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2">
        </div>

        <div class="relative">
            <div
                class="{{ $pedido->estado >= 4 && $pedido->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                <i class="fas fa-check text-white"></i>
            </div>

            <div class="absolute -left-2 mt-0.5">
                <p>Entregado</p>
            </div>
        </div>

    </div>




    <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
        <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
            Orden-{{ $pedido->id }}</p>

        <form wire:submit.prevent="update">
            <div class="flex space-x-3 mt-2">
                <x-jet-label>
                    <input wire:model="estado" type="radio" name="estado" value="2" class="mr-2">
                    PENDIENTE
                </x-jet-label>

                <x-jet-label>
                    <input wire:model="estado" type="radio" name="estado" value="3" class="mr-2">
                    ENVIADO
                </x-jet-label>

                <x-jet-label>
                    <input wire:model="estado" type="radio" name="estado" value="4" class="mr-2">
                    ENTREGADO
                </x-jet-label>

                <x-jet-label>
                    <input wire:model="estado" type="radio" name="estado" value="5" class="mr-2">
                    CANCELADO
                </x-jet-label>
            </div>

            <div class="flex mt-2">
                <x-boton class="ml-auto h-10 w-50">
                    Actualizar
                </x-boton>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <div class="grid grid-cols-2 gap-6 text-gray-700">
            <div>
                <p class="text-lg font-semibold uppercase">Envío</p>

                @if ($pedido->tipo_envio == 1)
                    <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                    <p class="text-sm">dirección de la tienda</p>
                @else
                    <p class="text-sm">Los productos serán enviados a:</p>
                    <p class="text-sm">{{ $envio->direccion }} - {{ $envio->especificacion }}</p>
                    <p> {{ $pedido->ciudad->nombre }}
                    </p>
                @endif


            </div>

            <div>
                <p class="text-lg font-semibold uppercase">Datos de contacto</p>

                <p class="text-sm">Persona que recibirá el producto: {{ $envio->contacto }}</p>
                <p class="text-sm">Teléfono de contacto: {{ $envio->telefono }}</p>
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
                @foreach ($productos as $producto)
                    <tr>
                        <td>
                            <div class="flex">
                                <img class="h-15 w-20 object-cover mr-4" src="{{ $producto->options->image }}"
                                    alt="">
                                <article>
                                    <h1 class="font-bold">{{ $producto->nombre }}</h1>
                                    <div class="flex text-xs">

                                        @isset($producto->options->color)
                                            Color: {{ __($producto->options->color) }}
                                        @endisset

                                        @isset($producto->options->size)
                                            - {{ $producto->options->size }}
                                        @endisset
                                    </div>
                                </article>
                            </div>
                        </td>

                        <td class="text-center">
                            {{ $producto->precio }}
                        </td>

                        <td class="text-center">
                            {{ $producto->cantidad }}
                        </td>

                        <td class="text-center">
                            {{ $producto->precio * $producto->cantidad }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
