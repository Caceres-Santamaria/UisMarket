<x-app2-layout title="Detalle pedido">
    {{-- @push('scriptHeader')
      <script src="{{ asset('js/ckeditor.js') }}"></script>
  @endpush --}}
    <main class="grid-in-contenido w-full max-w-full">
        <div class="w-full md:w-3/4 md:max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
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
                            <p>Pendiente</p>
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
                @if ($pedido->estado == 1)
                    <div class="ml-auto flex flex-col md:flex-row items-center justify-between gap-2">
                        <form action="{{ route('emprendedor.pedidos.updateConfirmacion', $pedido->id) }}"
                            method="post" x-data
                            x-on:click.prevent="confirmacionAlert(event,'Sí, confirmar!','Se confirmará el pedido','No se ha confirmado el pedido')">
                            @csrf
                            @method('patch')
                            <x-boton type="submit"
                                class="bg-blue-400 hover:bg-blue-300 active:bg-blue-500 focus:border-blue-500 p-1 md:p-2">
                                Confirmar pedido
                            </x-boton>
                        </form>

                        <form action="{{ route('emprendedor.pedidos.delete', $pedido->id) }}" method="post" x-data
                            x-on:click.prevent="confirmacionAlert(event,'Sí, cancelar!','Se cancelará el pedido','No se ha cancelado el pedido')">
                            @csrf
                            @method('delete')
                            <x-boton type="submit"
                                class="bg-red-400 hover:bg-red-300 active:bg-red-500 focus:border-red-500 p-1 md:p-2">
                                Cancelar pedido
                            </x-boton>
                        </form>
                    </div>
                @elseif($pedido->estado == 2)
                    <form action="{{ route('emprendedor.pedidos.update', $pedido->id) }}" class="ml-auto"
                        method="post" x-data
                        x-on:click.prevent="confirmacionAlert(event,'Sí, confirmar!','Se confirmará el pedido como enviado','No se ha confirmado el envío del pedido')">
                        @csrf
                        @method('put')
                        <x-boton type="submit"
                            class="bg-blue-400 hover:bg-blue-300 active:bg-blue-500 focus:border-blue-500 p-1 md:p-2">
                            Marcar como enviado
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
                        @else
                            <p class="text-sm">Los productos Serán enviados a:</p>
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
                        <i
                            class="fas {{ $pedido->tipo_envio == 1 ? 'fa-people-carry' : 'fa-motorcycle' }} text-xs md:text-lg lg:text-xl"></i>
                        <span class="font-bold">Tipo de envío:</span>
                        {{ $pedido->tipo_envio == 1 ? 'Recoge en tienda' : 'Domicilio' }}
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
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                <h1 class="font-bold text-lg ">Valoración del pedido</h1>
                <div class=" m-3 ">
                    <x-jet-label value="Calificación" />
                    <x-estrellas sizeestrella="text-xl" comentario="hidden"
                        estrellas="{{ $pedido->calificacion->calificacion }}"
                        calificaciones="{{ $pedido->calificacion[1] }}" />
                </div>
                <div class="w-full m-3">
                    <x-jet-label value="Comentario" />
                    <span>{!! $pedido->calificacion->contenido !!}</span>
                </div>
            </div>
        </div>
    </main>

</x-app2-layout>
