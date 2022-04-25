@props(['producto'])

<article class="bg-white rounded-lg shadow mb-4 flex items-center">
    <div class="border border-gray-300 rounded-md p-1 ">
        <a href="{{ route('productos.show', $producto) }}" class="block h-25 w-25 lg:w-48 lg:h-48 relative">
            @if ($producto->stock > 0 || $producto->descuento <= 0)
                <div class="complements">
                    @if ($producto->stock <= 0)
                        <span class="bg-producto-agotado complements__span">AGOTADO</span>
                    @endif
                    @if ($producto->descuento > 0)
                        <span class="bg-producto-descuento complements__span">{{ intval($producto->descuento * 100) }}
                            % OFF</span>
                    @endif
                </div>
            @else
                <div class="complements">
                    <span class="bg-producto-agotado complements__span">AGOTADO</span>
                    <span class="bg-producto-descuento complements__span">{{ intval($producto->descuento * 100) }}
                        % OFF</span>
                </div>
            @endif
            <img loading="lazy" class="card-producto__img w-full h-full object-cover object-center"
                src="{{ Storage::url($producto->imagenes[0]->url) }}"
                alt="imagen del producto {{ $producto->nombre }}">
        </a>
    </div>

    <div class="flex-1 py-2 px-2 flex flex-col h-full md:px-5">
        <div class="px-2 flex flex-col w-full justify-center content-center items-center sm:flex-row">
            <div class="w-full lg:ml-3">
                <h1 class="text-left uppercase text-sm pt-1 lg:text-base line-clamp-2 md:py-4">{{ $producto->nombre }}
                </h1>
                <p class="text-left md:py-2">Estado: {{ $producto->estado }}</p>
                <p class=" text-left md:py-4">
                    @if ($producto->descuento > 0)
                        <span class="opacity-50 line-through">${{ number_format($producto->precio) }}</span>
                        |
                        <span>${{ number_format($producto->precio - $producto->precio * $producto->descuento) }}</span>
                    @else
                        <span>${{ number_format($producto->precio) }}</span>
                    @endif
                </p>
            </div>
            <div class="w-full">
                <p class="text-left text-xs md:py-4 md:text-base">
                    <i class="fas fa-cubes text-xs md:text-lg lg:text-xl"></i> Categoria:
                    {{ $producto->categoria->nombre }}
                </p>
                <p class="text-left text-xs md:py-4 md:text-base">
                    <i class="fas fa-store text-xs md:text-lg lg:text-xl"></i> Publicado por:
                    {{ $producto->tienda->nombre }}
                </p>
            </div>
        </div>
    </div>
</article>
