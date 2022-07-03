<x-admin-layout title="Tiendas">
    <div
        class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-full  relative bg-white rounded-md p-4 border border-gray-400 shadow-md">
        @livewire('admin.tabla-tiendas')
        <script>
            const suspender = function(id) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: true
                })
                swalWithBootstrapButtons.fire({
                    title: '¿Estás seguro?',
                    text: 'La tienda quedará suspendida',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, Suspender!',
                    cancelButtonText: 'No, cancelar!',
                    reverseButtons: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('admin.tabla-tiendas', 'suspender', id);
                        simpleAlert(
                            'center',
                            'success',
                            'Tienda suspendida exitosamente',
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
    </div>
</x-admin-layout>
