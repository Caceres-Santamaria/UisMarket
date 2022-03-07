<x-admin-layout title="Tiendas">
    <div
        class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-full  relative bg-white rounded-md p-4 border border-gray-400 shadow-md">
        @livewire('admin.tabla-tiendas')
        <script>
            window.addEventListener('successTiendaAlert', (e) => {
                successUserAlert(e.detail);
            });
        </script>
    </div>
</x-admin-layout>
