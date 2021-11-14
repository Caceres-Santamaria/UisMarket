<div class="w-full h-full">
    <div>
        <div>
            <label for="buscador" class="fas fa-search"></label>
            <input id="buscador" type="search" placeholder="Buscar productos" wire:model="busqueda">
        </div>
        <div>
            <i class="fas fa-times"></i>
        </div>
    </div>
    <div>
        <ul>
            @if ($productos != '')
                @forelse ($productos as $producto)
                    <li class="busqueda__item">
                        <a href="{{-- route('productos.show',$producto) --}}">
                            <div class="busqueda__item__img">
                                <img loading="lazy"
                                    src="{{ Storage::url($producto->imagenProductos[0]->nombre_imagen) }}"
                                    alt="{{ $producto->imagenProductos[0]->descripcion }}">
                            </div>
                            <div class="busqueda__item__detalle">
                                <span class="nombre-producto">{{ $producto->nombre }}</span>
                                @if ($producto->descuento > 0)
                                    <span style="color:#ff0000">SALE</span>
                                    <span style="opacity: .5;text-decoration:line-through;"
                                        class="precio-producto">${{ number_format($producto->costo) }}</span>
                                    <span
                                        class="precio-producto">${{ number_format($producto->costo - $producto->costo * $producto->descuento) }}</span>
                                @else
                                    <span class="precio-producto">${{ number_format($producto->costo) }}</span>
                                @endif
                            </div>
                        </a>
                    </li>
                @empty
                    <li class="busqueda__item sin-resultados">
                        <span>¡No se encontraron resultados!</span>
                    </li>
                @endforelse
            @endif
        </ul>
    </div>
</div>
