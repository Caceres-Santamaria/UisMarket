<div x-data="{ qty: 1 }">
    <div class="px-3 mt-2">
        <h3 class="text-base font-medium text-gray-900 xl:text-lg">Stock disponible:
            {{ $quantity }}
        </h3>
    </div>
    @if ($producto->stock <= 0)
        <p class="p-2 mt-2 text-center text-red-500 border border-red-500 cursor-not-allowed w-60"><i
                class="mr-1 fas fa-exclamation-circle"></i>Prenda No Disponible
        </p>
    @endif
    @if ($producto->publicacion == '2')
        @auth
            @if (auth()->user()->tienda)
                @if (auth()->user()->tienda->id != $producto->tienda_id)
                    <div class="w-full flex items-center justify-center pt-5 pb-2.5 mt-6 text-lg xl:text-xl">
                        <div class="relative flex items-center w-24 h-10 mr-4 border border-gray-500 cantidad-producto">
                            <button disabled x-bind:disabled="$wire.qty <= 1" wire:target="decrement" wire:click="decrement"
                                x-on:click="qty>1 ? qty-- : 1"
                                class="w-8 h-full leading-10 text-center border-r border-gray-500 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
                                <i
                                    class="w-full h-full text-center text-black no-underline fas fa-angle-down active:scale-90">
                                </i>
                            </button>
                            <span style="line-height: 2.5rem;"
                                class="w-12 h-full m-0 text-center text-black border-none input-cantidad appearance-textfield ">
                                {{ $qty }}
                            </span>
                            <div x-bind:disabled="$wire.qty >= $wire.quantity" wire:target="increment"
                                wire:click="increment" x-on:click="qty++"
                                class="w-8 h-full leading-10 text-center border-l border-gray-500 cursor-pointer">
                                <i
                                    class="w-full h-full text-center text-black no-underline fas fa-angle-up active:scale-90">
                                </i>
                            </div>
                        </div>

                        <x-boton class="w-full h-10 disabled:opacity-50 disabled:cursor-not-allowed"
                            x-bind:disabled="!$wire.quantity" wire:click="addItem" wire:loading.attr="disabled"
                            wire:target="addItem">
                            <i class="fas fa-cart-plus"></i> Añadir al carrito
                        </x-boton>
                    </div>
                @endif
            @else
                <div class="w-full flex items-center justify-center pt-5 pb-2.5 mt-6 text-lg xl:text-xl">
                    <div class="relative flex items-center w-24 h-10 mr-4 border border-gray-500 cantidad-producto">
                        <button disabled x-bind:disabled="$wire.qty <= 1" wire:target="decrement" wire:click="decrement"
                            x-on:click="qty>1 ? qty-- : 1"
                            class="w-8 h-full leading-10 text-center border-r border-gray-500 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="w-full h-full text-center text-black no-underline fas fa-angle-down active:scale-90">
                            </i>
                        </button>
                        <span style="line-height: 2.5rem;"
                            class="w-12 h-full m-0 text-center text-black border-none input-cantidad appearance-textfield ">
                            {{ $qty }}
                        </span>
                        <div x-bind:disabled="$wire.qty >= $wire.quantity" wire:target="increment" wire:click="increment"
                            x-on:click="qty++"
                            class="w-8 h-full leading-10 text-center border-l border-gray-500 cursor-pointer">
                            <i class="w-full h-full text-center text-black no-underline fas fa-angle-up active:scale-90">
                            </i>
                        </div>
                    </div>

                    <x-boton class="w-full h-10 disabled:opacity-50 disabled:cursor-not-allowed"
                        x-bind:disabled="!$wire.quantity" wire:click="addItem" wire:loading.attr="disabled"
                        wire:target="addItem">
                        <i class="fas fa-cart-plus"></i> Añadir al carrito
                    </x-boton>
                </div>
            @endif
        @endauth
        @guest
            <div class="w-full flex items-center justify-center pt-5 pb-2.5 mt-6 text-lg xl:text-xl">
                <div class="relative flex items-center w-24 h-10 mr-4 border border-gray-500 cantidad-producto">
                    <button disabled x-bind:disabled="$wire.qty <= 1" wire:target="decrement" wire:click="decrement"
                        x-on:click="qty>1 ? qty-- : 1"
                        class="w-8 h-full leading-10 text-center border-r border-gray-500 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
                        <i class="w-full h-full text-center text-black no-underline fas fa-angle-down active:scale-90">
                        </i>
                    </button>
                    <span style="line-height: 2.5rem;"
                        class="w-12 h-full m-0 text-center text-black border-none input-cantidad appearance-textfield ">
                        {{ $qty }}
                    </span>
                    <div x-bind:disabled="$wire.qty >= $wire.quantity" wire:target="increment" wire:click="increment"
                        x-on:click="qty++"
                        class="w-8 h-full leading-10 text-center border-l border-gray-500 cursor-pointer">
                        <i class="w-full h-full text-center text-black no-underline fas fa-angle-up active:scale-90">
                        </i>
                    </div>
                </div>

                <x-boton class="w-full h-10 disabled:opacity-50 disabled:cursor-not-allowed"
                    x-bind:disabled="!$wire.quantity" wire:click="addItem" wire:loading.attr="disabled"
                    wire:target="addItem">
                    <i class="fas fa-cart-plus"></i> Añadir al carrito
                </x-boton>
            </div>
        @endguest
    @endif
    <script>
        window.addEventListener('successAlert', event => {
            simpleAlert('center', 'success', 'Producto agregado exitosamente', '', false, 1900);
        });
        window.addEventListener('errorAlert', event => {
            simpleAlert('center', 'error', 'La cantidad excede el Stock disponible', '', false, 1900);
        })
    </script>
</div>
