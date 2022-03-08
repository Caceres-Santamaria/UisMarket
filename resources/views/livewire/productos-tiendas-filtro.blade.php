<div class="w-full">
    <div class="w-full border border-gray-300 border-box">
        <ul x-data="{categorias: false}"
            class="relative flex flex-row w-full text-sm list-none justify-evenly md:text-lg lg:text-lg">
            <li @click="productos=true; calificaciones=false; informacion=false"
                class="relative md:p-1.5 lg:p-1.5 z-5 hover:no-underline outline-none m-0 border-b hover:border-gray-900"
                :class="{ 'border-gray-900': (productos == true) }">
                <a class="flex items-center justify-center h-full p-1 font-normal leading-6 text-gray-800 no-underline outline-none hover:cursor-pointer md:h-full lg:h-full md:px-4 md:py-1 lg:py-1 lg:px-4"
                    href="javascript::void(0);">
                    <span class="pr-1 mr-1 text-center">Productos</span>
                    <i class="text-gray-600 fas fa-list" @click="categorias=true"></i>
                </a>
                <ul x-show="categorias" @click.outside="categorias = false"
                    class="absolute left-0 right-0 bg-gray-100 border border-gray-400 min-w-max w-max top-calc z-8">
                    <li @click="categorias=false"
                        class="w-full h-8 leading-8 text-black border-b border-gray-200 hover:text-white hover:bg-black">
                        <a class="inline-block w-full h-full px-4 py-0 text-sm" href="javascript:void(0)"
                            wire:click="$set('categoria', '')">
                            Productos
                        </a>
                    </li>
                    @forelse ($categorias as $category)
                        <li @click="categorias=false;"
                            class="w-full h-8 leading-8 text-black border-b border-gray-200 hover:text-white hover:bg-black">
                            <a class="inline-block w-full h-full px-4 py-0 text-sm" href="javascript:void(0)"
                                wire:click="$set('categoria', '{{ $category->slug }}')">
                                {{ $category->nombre }}
                            </a>
                        </li>
                    @empty
                        <li @click="categorias=false"
                            class="w-full h-8 leading-8 text-black border-b border-gray-200 hover:text-white hover:bg-black">
                            <a class="inline-block w-full h-full px-4 py-0 text-sm" href="javascript:void(0)">No hay
                                categorias disponibles
                            </a>
                        </li>
                    @endforelse
                </ul>
            </li>
            <li @click="productos=false; calificaciones=true; informacion=false"
                class="relative md:p-1.5 lg:p-1.5 z-5 hover:no-underline outline-none m-0 border-b hover:border-gray-900"
                :class="{ 'border-gray-900': (calificaciones == true) }">
                <a class="flex items-center justify-center h-full p-1 font-normal leading-6 text-gray-800 no-underline outline-none hover:cursor-pointer md:h-full lg:h-full md:px-4 md:py-1 lg:py-1 lg:px-4"
                    href="javascript::void(0);">
                    <span class="text-center">Calificaciones</span>
                </a>
            </li>
            <li @click="productos=false; calificaciones=false; informacion=true"
                class="relative md:p-1.5 lg:p-1.5 z-5 hover:no-underline outline-none m-0 border-b hover:border-gray-900"
                :class="{ 'border-gray-900': (informacion == true) }">
                <a class="flex items-center justify-center h-full p-1 font-normal leading-6 text-gray-800 no-underline outline-none hover:cursor-pointer md:h-full lg:h-full md:px-4 md:py-1 lg:py-1 lg:px-4"
                    href="javascript::void(0);">
                    <span class="text-center">Información de la tienda</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="w-full mt-2 border border-gray-300 rounded-t-lg">
        <section x-show="productos" x-transition class="w-full">
            <div class="w-full">
                <div class="mb-6 bg-white rounded-lg shadow-lg">
                    <div class="flex items-center justify-between px-6 py-2">
                        <h1 class="font-semibold text-gray-700 uppercase">
                            {{ $categoria == '' ? 'Productos' : slugToName($categoria) }}
                        </h1>
                        <div class="flex items-center justify-center">
                            <x-Filtro-estado class="w-20" />
                            <x-Filtro-desplegable class="w-4/5 md:w-52" />
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
                                    class="relative block w-full h-cardsm md:h-cardmd lg:h-cardlg">
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
                                    <img loading="lazy"
                                        class="object-cover object-center w-full h-full card-producto__img"
                                        src="{{ Storage::url($producto->imagenes[0]->url) }}"
                                        alt="imagen del producto {{ $producto->nombre }}" />
                                </a>
                                <div class="flex flex-col items-center justify-center ">
                                    <h5 class="pt-1 text-sm text-center uppercase lg:text-base line-clamp-2">
                                        {{ $producto->nombre }}
                                    </h5>
                                    <p class="text-center ">
                                        @if ($producto->descuento > 0)
                                            <span class="line-through opacity-50">
                                                ${{ number_format($producto->precio) }}
                                            </span>
                                            |
                                            <span>
                                                ${{ number_format($producto->precio - $producto->precio * $producto->descuento) }}
                                            </span>
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
                                <span class="block sm:inline lg:text-xl">No existen productos aún</span>
                            </article>
                        @endforelse
                    </section>
                @endif
                @if (!empty($productos) and count($productos) == 20)
                    <div class="m-4">
                        {{ $productos->links() }}
                    </div>
                @endif
            </div>
        </section>
        <section x-show="calificaciones" x-transition class="w-full" wire:ignore>
            <x-calificaciones-tienda :tienda="$tienda" />
        </section>
        <section x-show="informacion" x-transition class="w-full" wire:ignore>
            <x-informacion-tienda :tienda="$tienda" />
        </section>
    </div>
</div>
