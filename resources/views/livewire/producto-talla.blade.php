<div x-data="{ color: '' , value: '', checked: '', open: false, qty: 1 }" @keydown.window.escape="open = false">
    <div class="mt-5 px-3">
        <div class="flex items-center justify-between">
            <h3 class="text-base xl:text-lg text-gray-900 font-medium">Tallas</h3>
            @if ($producto->guia_img)
                <a href="#" @click.prevent="open=true"
                    class="text-base xl:text-lg font-medium text-indigo-600 hover:text-indigo-500">
                    Guía de tallas
                </a>
                <div x-show="open" class="fixed z-10 inset-0 overflow-y-auto" role="dialog" aria-modal="true">
                    <div class="flex min-h-screen text-center md:block md:px-2 lg:px-4" style="font-size: 0;">
                        <div class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity md:block"
                            aria-hidden="true"></div>
                        <span class="hidden md:inline-block md:align-middle md:h-screen"
                            aria-hidden="true">&#8203;</span>
                        <div @click.outside="open = false"
                            class="flex text-base text-left transform transition w-full md:inline-block md:max-w-2xl md:px-4 md:my-8 md:align-middle lg:max-w-4xl">
                            <div
                                class="w-full relative flex items-center bg-white px-4 pt-14 pb-8 overflow-hidden shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                                <button type="button" @click="open=false"
                                    class="absolute top-4 right-4 sm:top-8 sm:right-6 md:top-6 md:right-6 lg:top-8 lg:right-8 m-0 p-0 w-9 h-9 text-center leading-9 clip-path-50 cursor-pointer hover:bg-green-400 hover:rotate-360 transition-all duration-500 ease-ease">
                                    <span class="sr-only">Cerrar</span>
                                    <!-- Heroicon name: outline/x -->
                                    <span class="fas fa-times text-lg"></span>
                                </button>
                                <div class="w-full flex justify-center items-center">
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
                            class="group relative border rounded-md py-1 px-2 flex items-center text-sm
                                justify-center font-medium uppercase hover:bg-gray-50 cursor-pointer
                                focus:outline-none sm:flex-1 sm:py-2 bg-white shadow-sm text-gray-900">
                            <input type="radio" name="talla" value="{{ $talla->id }}" class="sr-only"
                                x-model="value" wire:model="talla_id"
                                x-on:click="checked='{{ $talla->id }}'; color=''">
                            <p>
                                {{ $talla->nombre }}
                            </p>
                            <div class="absolute -inset-px rounded-md pointer-events-none" aria-hidden="true"
                                :class="{ 'border': (value === '{{ $talla->id }}'), 'border-2': !(value === '{{ $talla->id }}'), 'border-indigo-500': (checked === '{{ $talla->id }}'), 'border-transparent': !(checked === '{{ $talla->id }}') }">
                            </div>
                        </label>
                    @else
                        <label
                            class="group relative border rounded-md py-1 px-2 flex items-center
                            justify-center text-sm font-medium uppercase hover:bg-gray-50
                            focus:outline-none sm:flex-1 sm:py-2 bg-gray-50 text-gray-500
                            cursor-not-allowed"
                            :class="{ 'ring-2 ring-indigo-500': (value === '{{ $talla->id }}'), 'undefined': !(value === '{{ $talla->id }}') }">
                            <input type="radio" name="talla" value="{{ $talla->id }}" disabled
                                class="sr-only" x-on:click="checked='{{ $talla->id }}'; color=''">
                            <p>
                                {{ $talla->nombre }}
                            </p>
                            <div aria-hidden="true"
                                class="absolute -inset-px rounded-md border-2 border-gray-200 pointer-events-none">
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
    <div class="mt-2 px-3">
        <h3 class="text-base xl:text-lg text-gray-900 font-medium">Colores</h3>
        <div class="mt-4">
            <span class="sr-only">
                Escoge un color
            </span>
            <div class="flex items-center space-x-3 px-2 xl:px-5">
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
                                <div aria-hidden="true" class="absolute -inset-px rounded-md pointer-events-none">
                                    <svg class="absolute inset-0 w-full h-full text-gray-200 stroke-2"
                                        viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                                        <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                                    </svg>
                                </div>
                            @elseif($color->codigo == 'bg-white')
                                <span aria-hidden="true"
                                    class="h-8 w-8 {{ $color->codigo }} border border-black border-opacity-40 rounded-full">
                                </span>
                                <div aria-hidden="true" class="absolute -inset-px rounded-md pointer-events-none">
                                    <svg class="absolute inset-0 w-full h-full text-black stroke-2"
                                        viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                                        <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                                    </svg>
                                </div>
                            @else
                                <span aria-hidden="true"
                                    class="h-8 w-8 {{ $color->codigo }} border border-black border-opacity-40 rounded-full">
                                </span>
                                <div aria-hidden="true" class="absolute -inset-px rounded-md pointer-events-none">
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
    <div class="mt-2 px-3">
        <h3 class="text-base xl:text-lg text-gray-900 font-medium">Stock disponible:
            @if ($quantity != 0 or $color_id != '')
                {{ $quantity }}
            @else
                {{ $producto->stock }}
            @endif
        </h3>
    </div>
    @if ($producto->stock <= 0)
        <p class="mt-2 p-2 border border-red-500 w-60 text-red-500 cursor-not-allowed text-center"><i
                class="fas fa-exclamation-circle mr-1"></i>Prenda No Disponible
        </p>
    @endif
    <div class="w-full flex items-center justify-center pt-5 pb-2.5 mt-6 text-lg xl:text-xl">
        <div class="cantidad-producto mr-4 relative flex items-center w-24 h-10 border-gray-500 border">
            <button disabled x-bind:disabled="$wire.qty <= 1" wire:target="decrement" wire:click="decrement"
                x-on:click="qty>1 ? qty-- : 1"
                class="w-8 h-full text-center cursor-pointer border-r leading-10 border-gray-500 disabled:opacity-50 disabled:cursor-not-allowed">
                <i class="no-underline w-full h-full text-center text-black fas fa-angle-down active:scale-90">
                </i>
            </button>
            <span style="line-height: 2.5rem;"
                class="input-cantidad w-12 h-full m-0 text-center text-black border-none appearance-textfield ">
                {{ $qty }}
            </span>
            <div x-bind:disabled="$wire.qty >= $wire.quantity" wire:target="increment" wire:click="increment"
                x-on:click="qty++" class="w-8 h-full text-center cursor-pointer border-l leading-10 border-gray-500">
                <i class="no-underline w-full h-full text-center text-black fas fa-angle-up active:scale-90">
                </i>
            </div>
        </div>
        <x-boton class="h-10 w-full disabled:opacity-50 disabled:cursor-not-allowed" x-bind:disabled="!$wire.quantity"
            wire:click="addItem" wire:loading.attr="disabled" wire:target="addItem" x-on:click="value=''; checked=''">
            <i class="fas fa-cart-plus"></i> Añadir al carrito
        </x-boton>
    </div>
    <script>
        window.addEventListener('successAlert', event => {
            simpleAlert('center','success','Producto agregado exitosamente','',false,1900);
        });
        window.addEventListener('errorAlert', event => {
            simpleAlert('center','error','La cantidad excede el Stock disponible','',false,1900);
        })
    </script>
</div>
