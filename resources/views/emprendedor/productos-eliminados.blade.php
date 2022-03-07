<x-app2-layout title="Productos eliminados">
    <div class="grid-in-contenido w-11/12 mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        <div class="flex items-center mb-10 justify-between">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight text-center md:text-left">
                Lista de productos eliminados temporalmente
            </h2>
        </div>

        @livewire('emprendedor.productos-eliminados')
    </div>
    <script>
        const accion = (type,id) => {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: (type == 'restaurar') ? 'El producto se restaurará' : 'El producto será eliminado permanentemente',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: (type == 'restaurar') ? 'Sí, restaurar!' : 'Sí, eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    if (type == 'restaurar') {
                        Livewire.emitTo('emprendedor.productos-eliminados', 'restore', id);
                    } else if(type == 'eliminar') {
                        Livewire.emitTo('emprendedor.productos-eliminados', 'delete', id);
                    }
                    simpleAlert(
                        'center',
                        'success',
                        (type == 'restaurar') ? 'Producto restaurado exitosamente':'Producto eliminado definitivamente',
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
</x-app2-layout>
