<x-admin-layout title="Productos suspendidos">
    <div
        class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-full  relative bg-white rounded-md p-4 border border-gray-400 shadow-md">
        @livewire('admin.productos-suspendidos')
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
                text: 'El producto quedará publicado',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, Aprobar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('admin.productos-suspendidos', 'aprobar', id);
                    simpleAlert(
                        'center',
                        'success',
                        'Publicación aprobada exitosamente',
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
