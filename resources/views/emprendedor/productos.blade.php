<x-app2-layout title="Ver productos">
    <div class="grid-in-contenido w-11/12 mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        <div class="flex items-center mb-10 justify-between">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                Lista de productos
            </h2>
            <div class="flex justify-center flex-col gap-4 md:flex-row">
                @if ($eliminados > 0)
                    <x-boton-enlace class="text-center w-32 sm:w-auto bg-zinc-500 hover:bg-zinc-400 active:bg-zinc-600 focus:border-zinc-600" :active="true" :href="route('tienda.productos.eliminados')">
                        Restaurar Productos
                    </x-boton-enlace>
                @endif
                <x-boton-enlace class="text-center w-32 sm:w-auto" :href="route('tienda.productos.crear')">
                    Agregar producto
                </x-boton-enlace>
            </div>
        </div>

        @livewire('emprendedor.productos')
    </div>
</x-app2-layout>
