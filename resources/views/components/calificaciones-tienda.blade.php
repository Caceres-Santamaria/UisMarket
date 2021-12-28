@props(['tienda'])
<div
    class="p-2 place-items-stretch gap-y-6 gap-x-7 place-content-start  md:gap-6 md:px-6 md:py-4 lg:gap-6 lg:px-6 lg:py-4">
    <h2 class="font-bold text-xl lg:text-2xl pb-4">Calificaciones y comentarios</h2>
    @forelse ($tienda->calificaciones as $calificacion)
        <div class="w-full  border border-gray-300 mb-10">
            <div class="star-rating m-3">
                <x-estrellas estrellas="{{ $calificacion->calificacion }}"
                sizeestrella="text-xl"
                    comentario="hidden" />
            </div>
            @if ($calificacion->contenido)
                <p class="mx-3 mb-3 text-sm lg:text-base">
                    {{ $calificacion->contenido }}
                </p>
            @endif
        </div>
    @empty
    <article class="w-full flex flex-col justify-center items-center px-0 py-4">
        <figure>
            <x-vacio-svg />
        </figure>
        <span class="block sm:inline text-base lg:text-lg">No hay calificaciones y comentarios aún</span>
    </article>
    @endforelse
</div>
