<div
    class="relative w-full max-w-full p-4 px-4 mx-auto bg-white border border-gray-400 rounded-md shadow-md sm:px-2 lg:px-8">
    @livewire('admin.solicitudes')
    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            <h1>Carnet de la tienda {{$tienda->nombre}} </h1>
        </x-slot>
        <x-slot name="content">
            <div class="flex items-center justify-center w-full">
                <img class="imagen-carnet" src="{{ Storage::url($tienda->carnet) }}"
                    alt="Carnet {{ $tienda->nombre }}">
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-boton wire:loading.attr="disabled" wire:click="$set('modal', false)">
                Cerrar
            </x-boton>
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
    </script>
</div>
