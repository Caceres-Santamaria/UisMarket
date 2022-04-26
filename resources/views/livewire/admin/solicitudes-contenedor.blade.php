<div
    class="relative w-full max-w-full p-4 px-4 mx-auto bg-white border border-gray-400 rounded-md shadow-md sm:px-2 lg:px-8">
    @livewire('admin.solicitudes')
    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            <h1>Carnet de la tienda {{ $tienda->nombre }} </h1>
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
    <x-jet-dialog-modal wire:model="modalComentario">
        <x-slot name="title">
            <h1>Comentarios de la solicitud </h1>
        </x-slot>
        <x-slot name="content">
            <div class="bg-white rounded-lg shadow p-6">
                <div wire:ignore>
                    <x-jet-label value="Por favor escribe los motivos por los cuales se rechaza la solicitud" />
                    <textarea wire:model='tienda.comentario'
                        class=" w-full h-32 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                </textarea>
                </div>
                <x-jet-input-error for="tienda.comentario" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-boton @click="rechazar('{{ $tienda->slug }}')">
                Enviar
            </x-boton>
            <x-jet-button wire:loading.attr="disabled" wire:click="$set('modalComentario', false)">
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
                    Livewire.emit('rechazar', id);
                    setTimeout(() => {
                        simpleAlert(
                            'center',
                            'success',
                            'Solicitud rechazada exitosamente',
                            '',
                            false, 1900);
                    }, 1500);
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
