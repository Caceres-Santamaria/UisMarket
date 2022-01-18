<div x-data="{ color: '', qty: 1 }">
    <div class="mt-2 px-3">
        <h3 class="text-base xl:text-lg text-gray-900 font-medium">Colores</h3>
        <div class="mt-4">
            <span class="sr-only">
                Escoge un color
            </span>
            <div class="flex items-center gap-4 justify-start px-2 xl:px-5 flex-wrap">
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
            wire:click="addItem" wire:loading.attr="disabled" wire:target="addItem" x-on:click="color=''">
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
