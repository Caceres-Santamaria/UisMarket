<x-app2-layout title="Detalle pedido">
    @push('scriptHeader')
        <script src="{{ asset('js/ckeditor.js') }}"></script>
    @endpush
    <main class=" grid-in-contenido max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center">
            <div class="relative">
                @if ($pedido->estado == 5)
                    <div class=" bg-red-400 rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                    <div class="absolute -left-1.5 mt-0.5">
                        <p>Cancelado</p>
                    </div>
                @else
                    <div
                        class="{{ $pedido->estado >= 2 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                        <i class="fas fa-check text-white"></i>
                    </div>
                    <div class="absolute -left-1.5 mt-0.5">
                        <p>Preparando</p>
                    </div>
                @endif
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
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                Pedido-N°{{ $pedido->id }}
            </p>
            @if ($pedido->estado == 4)
                @livewire('calificacion-pedido',['pedido' => $pedido])
            @elseif($pedido->estado == 3)
                <form action="{{ route('pedidos.update', $pedido->id) }}" class="ml-auto" method="post" x-data
                    x-on:click.prevent="confirmacionAlert(event,'Sí, confirmar!','Se confirmará la recepción del pedido','No se ha confirmado la recepción del pedido')">
                    @csrf
                    @method('patch')
                    <x-boton type="submit"
                        class="bg-blue-400 hover:bg-blue-300 active:bg-blue-500 focus:border-blue-500 p-1 md:p-2">
                        Confirmar recepción
                    </x-boton>
                </form>
            @elseif($pedido->estado == 1)
                <form action="{{ route('pedidos.delete', $pedido->id) }}" class="ml-auto" method="post" x-data
                    x-on:click.prevent="confirmacionAlert(event,'Sí, cancelar!','Se cancelará el pedido','No se ha cancelado el pedido')">
                    @csrf
                    @method('delete')
                    <x-boton type="submit"
                        class="bg-red-400 hover:bg-red-300 active:bg-red-500 focus:border-red-500 p-1 md:p-2">
                        Cancelar pedido
                    </x-boton>
                </form>
            @elseif($pedido->estado == 5)
                <p class="text-gray-700 uppercase ml-auto"><span class="font-semibold">Cancelado por:</span>
                    {{ $pedido->cancelado_autor == 1 ? 'Cliente' : 'Tienda' }}
                </p>
            @endif
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">Envío</p>
                    @if ($pedido->tipo_envio == 1)
                        <p class="text-sm">Los productos deben ser recogidos en tienda:</p>
                        <a href="{{ route('tiendas.show', $pedido->tienda) }}"
                            class="text-sm font-semibold">{{ $pedido->tienda->nombre }}</a>
                        <p class="text-sm">{{ $pedido->tienda->direccion }}</p>
                        <p class="text-sm">{{ $pedido->tienda->ciudad->departamento->nombre }} -
                            {{ $pedido->tienda->ciudad->nombre }}</p>
                    @endif
                    @if ($pedido->tipo_envio == 3)
                        <p class="text-sm">Los productos deben ser recogidos en el campus principal de la UIS</p>
                        <x-boton-enlace href="{{ route('tiendas.show', $pedido->tienda) }}"
                            class="w-4/5 h-16 m-6 md:w-60 lg:h-11 bg-yellow-400 hover:bg-yellow-300 active:bg-yellow-500 focus:border-yellow-500">
                            Ponerse en contacto con la tienda </x-boton-enlace>
                    @else
                        <p class="text-sm">Los productos serán enviados a:</p>
                        <p class="text-sm">{{ $envio->direccion }}</p>
                        @if ($envio->referencia)
                            <p class="text-sm">{{ $envio->referencia }}</p>
                        @endif
                        <p class="text-sm">{{ $pedido->ciudad->departamento->nombre }} -
                            {{ $pedido->ciudad->nombre }}</p>
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
            <p class="text-xl font-semibold">Detalle</p>
            <div class="py-4 px-2">
                <p class="py-1">
                    <i class="fas fa-store text-xs md:text-lg lg:text-xl"></i>
                    <span class="font-bold">Vendido por:</span>
                    <a href="{{ route('tiendas.show', $pedido->tienda) }}">{{ $pedido->tienda->nombre }}</a>
                </p>
                <p class="py-1">
                    <i
                        class="fas {{ $pedido->tipo_envio != 2 ? 'fa-people-carry' : 'fa-motorcycle' }} text-xs md:text-lg lg:text-xl"></i>
                    <span class="font-bold">Tipo de envío:</span>
                    @if ($pedido->tipo_envio == 1)
                        Recoge en tienda
                    @endif
                    @if ($pedido->tipo_envio == 3)
                        Recoge en el campus principal de la UIS
                    @else
                        Domicilio
                    @endif
                </p>
                <p class="py-1">
                    <i class="far fa-clock text-xs md:text-lg lg:text-xl"></i>
                    <span class="font-bold">Pedido hecho:</span>
                    {{ $pedido->created_at->diffForHumans() }}
                </p>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table-auto min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Precio</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Cant</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Total</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($detalle as $item)
                                        <tr class="hover:bg-gray-200">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-14 w-14 md:h-15 md:w-15">
                                                        <img class="h-14 w-14 md:h-15 md:w-15 object-cover rounded-sm"
                                                            src="{{ asset($item->options->image) }}" alt="">
                                                    </div>
                                                    <article class="ml-4">
                                                        <h2 class="text-sm font-medium text-gray-900">
                                                            {{ $item->name }}</h2>
                                                        <div class="text-sm text-gray-500">
                                                            @isset($item->options->color)
                                                                Color: {{ __($item->options->color) }}
                                                            @endisset
                                                            @isset($item->options->talla)
                                                                - Talla: {{ $item->options->talla }}
                                                            @endisset
                                                        </div>
                                                    </article>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                $ {{ number_format($item->price) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $item->qty }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                $ {{ number_format($item->subtotal) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="py-4 flex flex-col">
                            <p class="text-right py-2 whitespace-nowrap">
                                <span class="font-bold px-6 text-right">subtotal:</span>
                                <span class="px-6 text-left">$ {{ number_format($pedido->total) }}</span>
                            </p>
                            <p class="text-right py-2 whitespace-nowrap">
                                <span class="font-bold px-6 text-right">Envío:</span>
                                <span
                                    class="px-6 text-left">{{ $pedido->costo_envio == 0 ? 'Gratis' : '$ ' . number_format($pedido->costo_envio) }}</span>
                            </p>
                            <p class="text-right py-2 whitespace-nowrap">
                                <span class="font-bold px-6 text-right">Total:</span>
                                <span class="px-6 text-left">$
                                    {{ number_format($pedido->total + $pedido->costo_envio) }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @if (session()->has('message'))
            <script>
                window.addEventListener('DOMContentLoaded', e => {
                    simpleAlert(
                        'center',
                        'error',
                        '{{ session('message') }}',
                        '',
                        true);
                });
            </script>
        @endif
    </main>

</x-app2-layout>
