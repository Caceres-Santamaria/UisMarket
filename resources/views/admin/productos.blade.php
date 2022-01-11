<x-admin-layout title="Productos">
  <div
      class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-full  relative bg-white rounded-md p-4 border border-gray-400 shadow-md">

      @livewire('admin.productos')
  </div>
  <script>
      window.addEventListener('successProductoAlert', (e) => {
          successUserAlert(e.detail);

      });
  </script>
</x-admin-layout>
