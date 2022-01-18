<x-app2-layout title="Ver productos">
    <div class="grid-in-contenido w-11/12 mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        <div>
            <div class="flex items-center mb-10">
                <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                    Lista de productos
                </h2>
                <x-boton-enlace class="ml-auto justify-end" :href="route('tienda.productos.crear')">
                    Agregar producto
                </x-boton-enlace>
            </div>
        </div>

        @livewire('emprendedor.productos')
    </div>
    <script>
        window.addEventListener('successProductoAlert', (e) => {
            successUserAlert(e.detail);
        });
    </script>
</x-app2-layout>
