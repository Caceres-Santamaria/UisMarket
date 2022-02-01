@props(['tienda'])
<div
    class="p-2 place-items-stretch gap-y-6 gap-x-7 place-content-start  md:gap-6 md:px-6 md:py-4 lg:gap-6 lg:px-6 lg:py-4">
    <h2 class="font-bold text-xl lg:text-2xl pb-4">Calificaciones y comentarios</h2>
    @forelse ($tienda->calificaciones as $calificacion)
        <div class="pb-6 pt-4 {{ ($loop->last == true) ? '': 'border-b border-gray-300'}}">
            <div class="flex flex-row gap-4 w-full justify-start md:gap-6">
                <div class="w-8 md:w-12 text-sm text-white bg-blueGray-200 inline-flex items-start justify-center">
                    <img src="https://ui-avatars.com/api/?font-size=0.3&rounded=true&bold=true&format=svg&background=000&color=fff&size=48&name={{ $calificacion->pedido->usuario->name }}"
                        alt="Avatar usuario" class="w-full rounded-full border-none shadow-lg">
                </div>
                <div class="w-reviews md:w-reviewsmd">
                    <div class="flex items-start justify-between mb-2">
                        <h4 class="font-bold line-clamp-1">{{ $calificacion->pedido->usuario->name }}</h4>
                    </div>
                    <div class="inline-flex flex-row items-end">
                        <span>
                            <span class="sr-only">Calificación {{ $calificacion->calificacion }} de 5</span>
                            <x-estrellas estrellas="{{ $calificacion->calificacion }}" sizeestrella="text-xl"
                                comentario="hidden" />
                        </span>
                        <span class="ml-3 font-normal text-xs text-gray-500 mb-2">
                            {{ $calificacion->created_at->diffForHumans() }}
                        </span>
                    </div>
                    @if ($calificacion->contenido)
                        <div class="w-full">
                            <div class="text-gray-800 text-sm lg:text-base">
                                {!! $calificacion->contenido !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <article class="w-full flex flex-col justify-center items-center px-0 py-4">
            <figure>
                <x-svg.vacio />
            </figure>
            <span class="block sm:inline text-base lg:text-lg">No hay calificaciones y comentarios aún</span>
        </article>
    @endforelse
</div>
