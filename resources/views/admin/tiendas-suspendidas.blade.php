<x-admin-layout title="Tiendas suspendidas">
  <div
      class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-full  relative bg-white rounded-md p-4 border border-gray-400 shadow-md">
      @livewire('admin.tiendas-suspendidas')
  </div>
  <script>
      const aprobar = function(id) {
          const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger'
              },
              buttonsStyling: true
          })
          swalWithBootstrapButtons.fire({
              title: '¿Estás seguro?',
              text: 'La tienda quedará publicada',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Sí, Aprobar!',
              cancelButtonText: 'No, cancelar!',
              reverseButtons: false
          }).then((result) => {
              if (result.isConfirmed) {
                  Livewire.emitTo('admin.tiendas-suspendidas', 'aprobar', id);
                  simpleAlert(
                      'center',
                      'success',
                      'Tienda aprobada exitosamente',
                      '',
                      false, 1900);
              } else if (
                  result.dismiss === Swal.DismissReason.cancel
              ) {
                  swalWithBootstrapButtons.fire(
                      'Cancelado',
                      'No se ha realizado la acción',
                      'error'
                  )
              }
          })
      }
  </script>
</x-admin-layout>
