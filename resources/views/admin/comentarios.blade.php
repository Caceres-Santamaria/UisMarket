<x-admin-layout title="Comentarios">
    <div
        class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-full  relative bg-white rounded-md p-4 border border-gray-400 shadow-md">
        {{-- {{var_dump($tienda->calificacion)}} --}}
        @empty(!$tienda->calificaciones->all())
            @livewire('admin.comentarios',["tienda" => $tienda])
        @else
            <article class="w-full flex flex-col justify-center items-center px-0 py-4">
                <figure>
                    <x-vacio-svg />
                </figure>
                <span class="block sm:inline text-base lg:text-lg">Esta tienda no tiene comentarios</span>
            </article>
        @endempty
    </div>

</x-admin-layout>
