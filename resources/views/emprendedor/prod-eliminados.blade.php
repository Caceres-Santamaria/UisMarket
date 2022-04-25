<x-app2-layout title="Productos eliminados">
  <div
      class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-full  relative bg-white rounded-md p-4 border border-gray-400 shadow-md">

      @livewire('emprendedor.prod-eliminados')
  </div>
  <script>
      window.addEventListener('successProductoAlert', (e) => {
        if(e.detail == 'habilitar'){
          let title = 'Habilitado!'
          let text = 'El producto ha sido habilitado'
        }
        else{
          let title = 'Eliminado!' 
          let text = 'El producto ha sido eliminado permanentemente'
        }
        simpleAlert('center', 'success', title, text, true);
      });
  </script>
</x-app2-layout>
