<div x-data="{ color: '' , value: '', checked: '', open: false, qty: 1 }" @keydown.window.escape="open = false">
    <div class="px-3 mt-5">
        <div class="flex items-center justify-between">
            <h3 class="text-base font-medium text-gray-900 xl:text-lg">Tallas</h3>
            @if ($producto->guia_img)
                <a href="#" @click.prevent="open=true"
                    class="text-base font-medium text-indigo-600 xl:text-lg hover:text-indigo-500">
                    Guía de tallas
                </a>
                <div x-show="open" class="fixed inset-0 z-10 overflow-y-auto" role="dialog" aria-modal="true">
                    <div class="flex min-h-screen text-center md:block md:px-2 lg:px-4" style="font-size: 0;">
                        <div class="fixed inset-0 hidden transition-opacity bg-gray-500 bg-opacity-75 md:block"
                            aria-hidden="true"></div>
                        <span class="hidden md:inline-block md:align-middle md:h-screen"
                            aria-hidden="true">&#8203;</span>
                        <div @click.outside="open = false"
                            class="flex w-full text-base text-left transition transform md:inline-block md:max-w-2xl md:px-4 md:my-8 md:align-middle lg:max-w-4xl">
                            <div
                                class="relative flex items-center w-full px-4 pb-8 overflow-hidden bg-white shadow-2xl pt-14 sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                                <button type="button" @click="open=false"
                                    class="absolute p-0 m-0 leading-9 text-center transition-all duration-500 cursor-pointer top-4 right-4 sm:top-8 sm:right-6 md:top-6 md:right-6 lg:top-8 lg:right-8 w-9 h-9 clip-path-50 hover:bg-green-400 hover:rotate-360 ease-ease">
                                    <span class="sr-only">Cerrar</span>
                                    <!-- Heroicon name: outline/x -->
                                    <span class="text-lg fas fa-times"></span>
                                </button>
                                <div class="flex items-center justify-center w-full">
                                    <img class="imagen-guiaTalla" src="{{ Storage::url($producto->guia_img) }}"
                                        alt="Guía de tallas del producto {{ $producto->nombre }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="mt-4">
            <span class="sr-only">
                Escoge una talla
            </span>
            <div class="grid grid-cols-4 gap-4 px-2 md:grid-cols-5 md:gap-3 xl:grid-cols-6 xl:px-5 xl:gap-5"
                x-on:click.outside="checked=''">
                @foreach ($tallas as $talla)
                    @if ($talla->stock > 0)
                        <label
                            :class="{ 'ring-2 ring-indigo-500': (value === '{{ $talla->id }}'), 'undefined': !(value === '{{ $talla->id }}') }"
                            class="relative flex items-center justify-center px-2 py-1 text-sm font-medium text-gray-900 uppercase bg-white border rounded-md shadow-sm cursor-pointer group hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-2">
                            <input type="radio" name="talla" value="{{ $talla->id }}" class="sr-only"
                                x-model="value" wire:model="talla_id"
                                x-on:click="checked='{{ $talla->id }}'; color=''">
                            <p>
                                {{ $talla->nombre }}
                            </p>
                            <div class="absolute rounded-md pointer-events-none -inset-px" aria-hidden="true"
                                :class="{ 'border': (value === '{{ $talla->id }}'), 'border-2': !(value === '{{ $talla->id }}'), 'border-indigo-500': (checked === '{{ $talla->id }}'), 'border-transparent': !(checked === '{{ $talla->id }}') }">
                            </div>
                        </label>
                    @else
                        <label
                            class="relative flex items-center justify-center px-2 py-1 text-sm font-medium text-gray-500 uppercase border rounded-md cursor-not-allowed group hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-2 bg-gray-50"
                            :class="{ 'ring-2 ring-indigo-500': (value === '{{ $talla->id }}'), 'undefined': !(value === '{{ $talla->id }}') }">
                            <input type="radio" name="talla" value="{{ $talla->id }}" disabled
                                class="sr-only" x-on:click="checked='{{ $talla->id }}'; color=''">
                            <p>
                                {{ $talla->nombre }}
                            </p>
                            <div aria-hidden="true"
                                class="absolute border-2 border-gray-200 rounded-md pointer-events-none -inset-px">
                                <svg class="absolute inset-0 w-full h-full text-black stroke-2" viewBox="0 0 100 100"
                                    preserveAspectRatio="none" stroke="currentColor">
                                    <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </label>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="px-3 mt-2">
        <h3 class="text-base font-medium text-gray-900 xl:text-lg">Colores</h3>
        <div class="mt-4">
            <span class="sr-only">
                Escoge un color
            </span>
            <div class="flex items-center px-2 space-x-3 xl:px-5">
                @foreach ($colores as $color)
                    {{-- @if ($color->pivot->cantidad > 0) --}}
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
                    {{-- @else
                        <label
                            class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center focus:outline-none cursor-not-allowed"
                            :class="{ 'ring-2 ring-indigo-500': (color === '{{ $color->id }}'), 'ring-0 ring-gray-400': !(color === '{{ $color->id }}') }">
                            <input type="radio" value="{{ $color->id }}" class="sr-only" disabled>
                            <p class="sr-only">
                                {{ $color->nombre }}
                            </p>
                            @if ($color->codigo == 'bg-black')
                                <span aria-hidden="true"
                                    class="h-8 w-8 {{ $color->codigo }} border border-gray-400 border-opacity-40 rounded-full">
                                </span>
                                <div aria-hidden="true" class="absolute rounded-md pointer-events-none -inset-px">
                                    <svg class="absolute inset-0 w-full h-full text-gray-200 stroke-2"
                                        viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                                        <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                                    </svg>
                                </div>
                            @elseif($color->codigo == 'bg-white')
                                <span aria-hidden="true"
                                    class="h-8 w-8 {{ $color->codigo }} border border-black border-opacity-40 rounded-full">
                                </span>
                                <div aria-hidden="true" class="absolute rounded-md pointer-events-none -inset-px">
                                    <svg class="absolute inset-0 w-full h-full text-black stroke-2"
                                        viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                                        <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                                    </svg>
                                </div>
                            @else
                                <span aria-hidden="true"
                                    class="h-8 w-8 {{ $color->codigo }} border border-black border-opacity-40 rounded-full">
                                </span>
                                <div aria-hidden="true" class="absolute rounded-md pointer-events-none -inset-px">
                                    <svg class="absolute inset-0 w-full h-full text-gray-200 stroke-2"
                                        viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                                        <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                                    </svg>
                                </div>
                            @endif
                        </label>
                    @endif --}}
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
    @if ($producto->publicacion == '2' && $producto->categoria->nombre !== 'Servicios')
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
                            wire:target="addItem" x-on:click="value=''; checked=''">
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
                        wire:target="addItem" x-on:click="value=''; checked=''">
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
                    wire:target="addItem" x-on:click="value=''; checked=''">
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
