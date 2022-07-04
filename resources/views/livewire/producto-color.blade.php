<div x-data="{ color: '', qty: 1 }">
    <div class="px-3 mt-2">
        <h3 class="text-base font-medium text-gray-900 xl:text-lg">Colores</h3>
        <div class="mt-4">
            <span class="sr-only">
                Escoge un color
            </span>
            <div class="flex flex-wrap items-center justify-start gap-4 px-2 xl:px-5">
                @foreach ($colores as $color)
                    <label
                        class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none"
                        :class="{ 'ring-2 ring-indigo-500': (color === '{{ $color->id }}'), 'ring-0 ring-gray-400': !(color === '{{ $color->id }}') }">
                        <input type="radio" value="{{ $color->id }}" class="sr-only" x-model='color'
                            wire:model="color_id">
                        <p class="sr-only">
                            {{ $color->nombre }}
                        </p>
                        @if ($color->codigo == 'bg-black')
                            <span aria-hidden="true"
                                class="h-8 w-8 {{ $color->codigo }} border border-gray-400 border-opacity-40 rounded-full">
                            </span>
                        @elseif ($color->codigo == 'mix')
                            <span aria-hidden="true"
                                class="h-8 w-8 bg-amber-100 border border-black border-opacity-40 rounded-full" style="background-image: url('/storage/images/website/mix.png');background-position: center;">
                            </span>
                        @else
                            <span aria-hidden="true"
                                class="h-8 w-8 {{ $color->codigo }} border border-black border-opacity-40 rounded-full">
                            </span>
                        @endif
                    </label>
                @endforeach
            </div>
        </div>
    </div>
    <div class="px-3 mt-2">
        <h3 class="text-base font-medium text-gray-900 xl:text-lg">Stock disponible:
            @if ($quantity != 0 or $color_id != '')
                {{ $quantity }}
            @else
                {{ $producto->stock }}
            @endif
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
                            wire:target="addItem" x-on:click="color=''">
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
                        wire:target="addItem" x-on:click="color=''">
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
                    wire:target="addItem" x-on:click="color=''">
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
