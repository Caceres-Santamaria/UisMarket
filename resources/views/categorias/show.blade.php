<x-app2-layout title="{{ $categoria->nombre }}">
    <main class="content grid-in-contenido">
        <div class="w-full flex justify-center items-center px-0 py-4">
            <figure class=" flex justify-center items-center rounded-full shadow border border-gray-500 w-24 h-24 lg:w-32 lg:h-32">
                <x-svg.producto />
            </figure>
        </div>
        @livewire('productos-filtro',['categoria' => $categoria])
    </main>
</x-app2-layout>
