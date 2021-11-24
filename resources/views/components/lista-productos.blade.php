@props(['producto'])

<article class="bg-white rounded-lg shadow mb-4 flex">
    <div class="border border-gray-300 rounded-md p-1 ">
        <a href="{{ route('productos.show', $producto) }}"
            class="block h-24 w-24 lg:w-48 lg:h-48 relative">
            @if ($producto->cantidad > 0 || $producto->descuento <= 0)
                <div class="complements">
                    @if ($producto->cantidad <= 0)
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
                    <span class="bg-producto-descuento complements__span">{{ intval($producto->descuento * 100) }} %
                        OFF</span>
                </div>
            @endif
            <img loading="lazy" class="card-producto__img w-full h-full object-cover object-center"
                src="{{ Storage::url($producto->imagenes[0]->url) }}"
                alt="imagen del producto {{ $producto->nombre }}">
        </a>
    </div>

    <div class="flex-1 py-4 px-6 flex flex-col">
        <div class="flex flex-col  w-full justify-center content-center items-center sm:flex-row">
            <div class="w-full sm:w-3/5">
                <h1 class=" text-center uppercase text-sm pt-1 lg:text-base line-clamp-2">{{ $producto->nombre }}</h1>
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
        </div>
    </div>
</article>
