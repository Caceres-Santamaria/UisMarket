<x-app2-layout title="Ver productos">
    <div class="grid-in-contenido w-11/12 mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        <div>
            <div class="flex items-center mb-10">
                <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                    Lista de productos
                </h2>

                <x-boton class="ml-auto h-10 w-52 justify-end" href="">
                    Agregar producto
                </x-boton>
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
