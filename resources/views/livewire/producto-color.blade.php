<div>
    <div class="mt-2 px-3">
        <h3 class="text-base xl:text-lg text-gray-900 font-medium">Colores</h3>
        <div class="mt-4" x-data="{ color: '{{ $producto->colores[0]->id }}' }">
            <span class="sr-only">
                Escoge un color
            </span>
            <div class="flex items-center space-x-3 px-2 xl:px-5">
                <!--
                        Active and Checked: "ring ring-offset-1"
                        Not Active and Checked: "ring-2"
                    -->
                @foreach ($producto->colores as $color)
                    <label
                        class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400"
                        :class="{ 'ring-2 ring-indigo-500': (color === '{{ $color->id }}'), 'ring-0': !(color === '{{ $color->id }}') }">
                        <input type="radio" name="color-choice" value="{{ $color->id }}" class="sr-only"
                            aria-labelledby="color-choice-{{ $color->id }}-label" x-model='color'>
                        <p id="color-choice-{{ $color->id }}-label" class="sr-only">
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
    <p class="hidden p-2 border border-red-500 w-60 text-red-500 cursor-not-allowed " id=""><i
            class="fas fa-exclamation-circle mr-1"></i>Prenda No Disponible
    </p>
    <div class="w-full flex items-center justify-center pt-5 pb-2.5 mt-6 text-lg xl:text-xl">
        <div x-data="{ cantidad: 1 }"
            class="cantidad-producto mr-4 relative flex items-center w-24 h-10 border-gray-500 border" id="">
            <div x-on:click="cantidad>1 ? cantidad-- : 1"
                class="w-8 h-full text-center cursor-pointer border-r leading-10 border-gray-500">
                <a class="no-underline w-full h-full text-center text-black fas fa-angle-down" id="cantida-down">
                </a>
            </div>
            <input type="number" id="cantidad" min="1" max="" x-model="cantidad" name="cantidad" value="1"
                class="input-cantidad w-12 h-full m-0 text-center text-black border-none appearance-textfield ">
            <div x-on:click="cantidad++"
                class="w-8 h-full text-center cursor-pointer border-l leading-10 border-gray-500">
                <a class="no-underline w-full h-full text-center text-black fas fa-angle-up" id="cantida-up">
                </a>
            </div>
        </div>
        <x-boton class="h-10 w-full">
            <i class="fas fa-cart-plus"></i> Añadir al carrito
        </x-boton>
    </div>
</div>
