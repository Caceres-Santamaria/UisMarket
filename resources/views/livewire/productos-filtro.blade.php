<div class="w-full">
    <div class="mb-6 bg-white rounded-lg shadow-lg">
        <div class="flex items-center justify-between px-6 py-2">
            <h1 class="font-semibold text-gray-700 uppercase">{{ $categoria ? $categoria->nombre : 'Productos' }}</h1>
            <div class="flex items-center justify-center">
                <x-Filtro-estado class="w-20" />
                <x-Filtro-desplegable class="w-8 sm:w-48 md:w-52" />
                <x-tipo-vista :view="$view" />
            </div>
        </div>
    </div>

    @if ($view == 'grid')
        <section
            class="grid p-2 place-items-stretch gap-y-6 gap-x-7 place-content-center grid-cols-cardsm md:grid-cols-cardmd md:gap-6 md:px-6 md:py-4 lg:grid-cols-cardlg lg:gap-6 lg:px-6 lg:py-4">
            @forelse($productos as $producto)
                <article class="p-1 border border-gray-300 rounded-md">
                    <a href="{{ route('productos.show', $producto) }}"
                        class="relative block w-full h-cardsm md:h-cardmd lg:h-cardlg ">
                        @if ($producto->stock > 0 || $producto->descuento <= 0)
                            <div class="complements">
                                @if ($producto->stock <= 0)
                                    <span class="bg-producto-agotado complements__span">AGOTADO</span>
                                @endif
                                @if ($producto->descuento > 0)
                                    <span
                                        class="bg-producto-descuento complements__span">{{ intval($producto->descuento * 100) }}
                                        % OFF</span>
                                @endif
                            </div>
                        @else
                            <div class="complements">
                                <span class="bg-producto-agotado complements__span">AGOTADO</span>
                                <span
                                    class="bg-producto-descuento complements__span">{{ intval($producto->descuento * 100) }}
                                    % OFF</span>
                            </div>
                        @endif
                        <img loading="lazy" class="object-cover object-center w-full h-full card-producto__img"
                            src="{{ Storage::url($producto->imagenes[0]->url) }}"
                            alt="imagen del producto {{ $producto->nombre }}">
                    </a>
                    <div class="flex flex-col items-center justify-center ">
                        <h5 class="pt-1 text-sm text-center uppercase lg:text-base line-clamp-2">
                            {{ $producto->nombre }}</h5>
                        <p class="text-center ">
                            @if ($producto->descuento > 0)
                                <span class="line-through opacity-50">${{ number_format($producto->precio) }}</span>
                                |
                                <span>${{ number_format($producto->precio - $producto->precio * $producto->descuento) }}</span>
                            @else
                                <span>${{ number_format($producto->precio) }}</span>
                            @endif
                        </p>
                    </div>
                </article>
            @empty
                <article class="flex flex-col items-center justify-center w-full px-0 py-4">
                    <figure>
                        <x-svg.face-sad />
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
                <article class="flex flex-col items-center justify-center w-full px-0 py-4">
                    <figure>
                        <x-svg.face-sad />
                    </figure>
                    <span class="block sm:inline lg:text-xl">No existen productos</span>
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
