<main class="grid-in-contenido p-4 cart-content content m-px.5 text-left">
    <h1 class="mb-6 title-inform text-center text-2xl font-black">CARRITO DE COMPRAS</h1>
    <div class=" ">
        <div class="flex justify-center items-center flex-col w-full">
            <h4 class="">
                Productos en el carrito:<span>({{ Cart::count() }})</span>
            </h4>
            <div class="bg-white border border-gray-300 rounded-2xl w-11/12 md:w-4/5 pt-2 mt-2 lg:w-9/12">
                <div class="p-4 ">
                    <div class="flex uppercase font-semibold mb-4 ">
                        <div class="w-3/5 lg:w-2/5 text-center">
                            <h3>Producto</h3>
                        </div>
                        <div class="w-2/5 lg:w-1/5 text-center">
                            <h3>Precio</h3>
                        </div>
                        <div class="hidden lg:block lg:w-1/5 lg:text-center">
                            <h3>Cantidad</h3>
                        </div>
                        <div class="hidden lg:block lg:w-1/5 lg:text-center">
                            <h3>Subtotal</h3>
                        </div>
                    </div>
                    <hr class="mb-6 ">
                    <ul class="">
                        @forelse (Cart::content() as $item)
                            <li class=" flex flex-row justify-between items-center">
                                <div class="w-3/5 lg:w-2/5 flex justify-between items-center">
                                    <div class=" w-2/5 flex justify-center">
                                        <a title="" href="{{ route('productos.show', $item->options->slug) }}">
                                            <img class="lg:mx-5 items-center w-12 h-12 md:w-18 md:h-18 lg:w-27 lg:h-27"
                                                loading="lazy" alt="" title="" width="100"
                                                src="{{ $item->options->image }}">
                                        </a>
                                    </div>
                                    <div class="w-3/5 ">
                                        <a href="{{ route('productos.show', $item->options->slug) }}">
                                            <span class="text-xs uppercase line-clamp-1 lg:text-base">
                                                {{ $item->name }}
                                            </span>
                                        </a>
                                        @if ($item->options->talla)
                                            <span class="text-sm  lg:text-base block line-clamp-1">Talla:
                                                {{ $item->options->talla }}</span>
                                        @endif
                                        @if ($item->options->color)
                                            <span class="text-sm  lg:text-base block line-clamp-1">Color:
                                                {{ $item->options->color }}</span>
                                        @endif
                                        <div class="lg:hidden">
                                            <button type="submit" class="text-sm lg:text-base"
                                                wire:click="delete('{{ $item->rowId }}')"
                                                wire:loading.class="text-red-600 opacity-25"
                                                wire:target="delete('{{ $item->rowId }}')">
                                                <i class="far fa-trash-alt text-red-600 cursor-pointer"> Eliminar</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class=" w-2/5 lg:w-1/5 lg:block">
                                    <span class=" block text-center text-sm lg:text-base">
                                        ${{ number_format($item->price) }}
                                    </span>
                                    <div class="lg:hidden flex justify-center items-center">
                                        @livewire('actualizar-cantidad',['rowId' => $item->rowId], key($item->rowId))
                                    </div>
                                </div>
                                <div class="hidden lg:block lg:w-1/5">
                                    <div class="lg:w-full lg:flex lg:justify-center">
                                        @livewire('actualizar-cantidad',['rowId' => $item->rowId],
                                        key($item->rowId.'1000'))
                                    </div>
                                    <div class="lg:flex lg:justify-center">
                                        <button type="submit" class="text-sm lg:text-base"
                                            wire:click="delete('{{ $item->rowId }}')"
                                            wire:loading.class="text-red-600 opacity-25"
                                            wire:target="delete('{{ $item->rowId }}')">
                                            <i class="far fa-trash-alt text-red-600 cursor-pointer"> Eliminar</i>
                                        </button>
                                    </div>
                                </div>
                                <div class="hidden lg:block lg:w-1/5">
                                    <span class="lg:w-full lg:text-center lg:block">
                                        ${{ number_format($item->qty * $item->price) }}
                                    </span>
                                </div>
                            </li>
                            <hr class="my-2">
                        @empty
                            <li class="flex flex-col justify-center items-center content-center">
                                <x-shopping-cart-svg />
                                <p class="text-base lg:text-lg text-gray-700 mt-4">TU CARRO DE COMPRAS ESTÁ VACÍO</p>
                            </li>
                        @endforelse
                    </ul>
                </div>
                @if (Cart::count() > 0)
                    <div class="px-6">
                        <a class="text-sm cursor-pointer hover:underline mt-3 inline-block lg:text-base"
                            wire:click="destroy">
                            <i class="fas fa-trash"></i>
                            Borrar carrito de compras
                        </a>
                    </div>
                @endif
                <div class="row p-4">
                    <p class="text-right font-bold text-base lg:text-lg">
                        Total: ${{ Cart::subtotal() }}
                    </p>
                    <div
                        class="mt-3 w-full flex flex-col justify-center items-center content-center md:flex-row md:gap-x-1 lg:gap-x-2">
                        <x-boton class="mb-3 md:mb-0 w-4/5 h-8 md:w-48 lg:h-9">
                            <a href="{{ route('productos.index') }}">Continuar comprando</a>
                        </x-boton>
                        <x-boton class="w-4/5 h-8 md:w-48 lg:h-9">
                            <a href="{{ route('pedidos.create') }}">Realizar pedido</a>
                        </x-boton>
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
                'warning',
                '{{ session("message") }}',
                'Agrega un producto al carrito de compras para realizar tu pedido',
                true);
            });
        </script>
    @endif
</main>
