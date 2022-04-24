<div
    class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-full  relative bg-white rounded-md p-4 border border-gray-400 shadow-md">
    @livewire('admin.solicitudes')
    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            <h1>Carnet de la tienda {{ $tienda->nombre }} </h1>
        </x-slot>
        <x-slot name="content">
            <div class="w-full flex justify-center items-center">
                <img class="imagen-carnet" src="{{ Storage::url($tienda->carnet) }}"
                    alt="Carnet {{ $tienda->nombre }}">
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:loading.attr="disabled" wire:click="$set('modal', false)">
                Cerrar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
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
                    Livewire.emitTo('admin.solicitudes', 'aprobar', id);
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
        const rechazar = function(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })
            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: 'La solicitud será rechazada',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, Rechazar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('admin.solicitudes', 'rechazar', id);
                    simpleAlert(
                        'center',
                        'success',
                        'Solicitud rechazada exitosamente',
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
