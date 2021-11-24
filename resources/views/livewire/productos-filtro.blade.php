<div class="w-full">
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">{{ $categoria ? $categoria->nombre : 'Productos' }}</h1>
            <div class="flex justify-center items-center">
                <x-filtro-desplegable />
                <div
                    class="hidden md:block lg:grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500 ml-2">
                    <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-orange-500' : '' }}"
                        wire:click="$set('view', 'grid')"></i>
                    <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-orange-500' : '' }}"
                        wire:click="$set('view', 'list')"></i>
                </div>
            </div>
        </div>
    </div>

    @if ($view == 'grid')
        <section
            class="grid p-2 place-items-stretch gap-y-6 gap-x-7 place-content-center grid-cols-cardsm md:grid-cols-cardmd md:gap-6 md:px-6 md:py-4 lg:grid-cols-cardlg lg:gap-6 lg:px-6 lg:py-4">
            @forelse($productos as $producto)
                <article class="border border-gray-300 rounded-md p-1">
                    <a href="{{ route('productos.show', $producto) }}"
                        class="block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                        @if ($producto->cantidad > 0 || $producto->descuento <= 0)
                            <div class="complements">
                                @if ($producto->cantidad <= 0)
                                    <span class="bg-producto-agotado complements__span">AGOTADO</span>
                                @endif
                                @if ($producto->descuento > 0)
                                    <span class="bg-producto-descuento complements__span">{{ intval($producto->descuento * 100) }} % OFF</span>
                                @endif
                            </div>
                        @else
                            <div class="complements">
                                <span class="bg-producto-agotado complements__span">AGOTADO</span>
                                <span class="bg-producto-descuento complements__span">{{ intval($producto->descuento * 100) }} % OFF</span>
                            </div>
                        @endif
                        <img loading="lazy" class="card-producto__img w-full h-full object-cover object-center"
                            src="{{ Storage::url($producto->imagenes[0]->url) }}"
                            alt="imagen del producto {{ $producto->nombre }}">
                    </a>
                    <div class=" flex flex-col justify-center items-center">
                        <h5 class=" text-center uppercase text-sm pt-1 lg:text-base line-clamp-2">{{ $producto->nombre }}</h5>
                        <p class=" text-center">
                            @if ($producto->descuento > 0)
                                <span class="opacity-50 line-through">${{ number_format($producto->precio) }}</span>
                                |
                                <span>${{ number_format($producto->precio - $producto->precio * $producto->descuento) }}</span>
                            @else
                                <span>${{ number_format($producto->precio) }}</span>
                            @endif
                        </p>
                    </div>
                </article>
            @empty
                <article class="w-full flex flex-col justify-center items-center px-0 py-4">
                    <figure>
                        <x-face-sad />
                    </figure>
                    <span class="block sm:inline lg:text-xl">No existen productos</span>
                </article>
            @endforelse
        </section>
    @else
        <section class="p-2 lg:px-6 lg:py-4">
            @forelse ($productos as $producto)

                <x-lista-productos :producto="$producto" />

            @empty
                <article class="w-full flex flex-col justify-center items-center px-0 py-4">
                    <figure>
                        <x-face-sad />
                    </figure>
                    <span class="block sm:inline lg:text-xl">No existen productos aún</span>
                </article>
            @endforelse
        </section>
    @endif
@empty(!$productos)
    <div class="m-4">
        {{ $productos->links() }}
    </div>
@endempty
</div>