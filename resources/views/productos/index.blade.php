<x-app2-layout title="Productos">
    <main class="content grid-in-contenido">
        <div class="flex items-center justify-center w-full px-0 py-4">
            <figure class="flex items-center justify-center w-24 h-24 border border-gray-500 rounded-full shadow lg:w-32 lg:h-32">
                <x-svg.producto />
            </figure>
        </div>
        @livewire('productos-filtro',['sort_by' => $sort_by, 'nombre' => $nombre])
    </main>
</x-app2-layout>
