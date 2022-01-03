<div @click.outside="carrito = false" class="relative top-0 bottom-0 bg-gray-50 text-black w-80 h-full m-0 left-c-des">
    <div
        class="flex justify-between content-center items-center bg-primario-ligth border-b border-primario-dark2 h-12 px-3">
        <h3 @click="carrito = false" id="close-carrito"
            class="m-0 p-0 w-9 h-9 text-center leading-9 clip-path-50 cursor-pointer hover:bg-green-400 hover:rotate-360 transition-all duration-500 ease-ease">
            <i class="fas fa-times"></i>
        </h3>
        <h3 class="m-0 p-0  pl-2">Carrito</h3>
    </div>
    <div class="h-cont-car">
        <div class="h-car-items overflow-y-auto">
            <ul class="m-0 p-4 flex flex-col justify-start content-start items-start">
                @forelse (Cart::content() as $item)
                    @if ($loop->last)
                        <li class="w-full  py-2 px-0 flex justify-center content-center items-center">
                            <div class=" w-4/12">
                                <img class="max-w-full object-cover object-center border-2  border-primario-n"
                                    loading="lazy" src="{{ $item->options->image }}">
                            </div>
                            <div class="pl-2 w-4/6 flex content-center justify-center flex-col min-h-90px flex-nowrap">
                                <a href="" class="no-underline font-bold uppercase text-sm line-clamp-2">
                                    {{ $item->name }}
                                </a>
                                @if ($item->options->talla)
                                    <span class="text-xs">Talla: {{ $item->options->talla }}</span>
                                @endif
                                @if ($item->options->color)
                                    <span class="text-xs">Color: {{ $item->options->color }}</span>
                                @endif
                                <span class="text-xs">Cantidad: {{ $item->qty }}</span>
                                <span class="text-xs">${{ number_format($item->price) }}</span>
                            </div>
                        </li>
                    @else
                        <li
                            class="w-full  py-2 px-0 flex justify-center content-center items-center border-b-2 border-primario-n">
                            <div class=" w-4/12">
                                <img class="max-w-full object-cover object-center border-2  border-primario-n"
                                    loading="lazy" src="{{ $item->options->image }}">
                            </div>
                            <div class="pl-2 w-4/6 flex content-center justify-center flex-col min-h-90px flex-nowrap">
                                <a href="" class="no-underline font-bold uppercase text-sm line-clamp-2">
                                    {{ $item->name }}
                                </a>
                                @if ($item->options->talla)
                                    <span class="text-xs">Talla: {{ $item->options->talla }}</span>
                                @endif
                                @if ($item->options->color)
                                    <span class="text-xs">Color: {{ $item->options->color }}</span>
                                @endif
                                <span class="text-xs">Cantidad: {{ $item->qty }}</span>
                                <span class="text-xs">${{ number_format($item->price) }}</span>
                            </div>
                        </li>
                    @endif

                @empty
                    <li class="w-full px-0 py-2 list-none flex justify-center content-center items-center text-sm"><i
                            class="addCarrito"></i>
                        <span>No tienes productos en el carrito.</span>
                    </li>
                @endforelse
            </ul>
        </div>
        @if (Cart::count())
            <div class="h-36 border-t-2 border-primario-dark">
                <p class=" w-full flex justify-around my-3 mx-0">
                    <span class="font-bold">Subtotal:</span>
                    <span class="subtotal-valor">${{ Cart::subtotal() }}</span>
                </p>
                <div class="flex w-full justify-center items-center content-center flex-col">
                    <x-boton class=" w-2/4 h-9 mb-2">
                        <a href="{{ route('carrito') }}" class="w-full h-full">Ver mi carrito</a>
                    </x-boton>
                    <x-boton class=" w-2/4 h-9 mb-2">Realizar pedido</x-boton>
                </div>
            </div>
        @endif
    </div>
</div>
