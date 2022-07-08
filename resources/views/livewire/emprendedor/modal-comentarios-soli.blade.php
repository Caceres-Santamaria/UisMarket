<div class="w-full">
    @if($tienda->estado == '3')
        <div class="bg-red-600 bg-opacity-25 w-full my-2 p-3 rounded-sm">
            <i class="text-red-600 fas fa-exclamation-triangle"></i>
            Tu solicitud fue rechazada,
            <span class="underline cursor-pointer" wire:click="$set('modal',true)">
                ver más detalles
            </span>
        </div>
        <x-jet-dialog-modal wire:model="modal">
            <x-slot name="title">
                <h1>Comentarios de la solicitud </h1>
            </x-slot>
            <x-slot name="content">
                <div class="w-full rounded-md my-2 border border-gray-500 p-3">
                    <p class="">{{$tienda->comentario}}</p>
                </div>
                <div class="w-full mb-5 md:mb-0">
                    <x-jet-label class="mb-2"
                        value=" Por favor vuelve a subir un documento que valide que perteneces a la comunidad UIS siguiendo las recomendaciones realizadas por el administrador" />
                    <x-select-image wire:model="carnet" :image="$carnet" :existing="$tienda->carnet" />
                    <x-jet-input-error for="carnet" class="mt-2" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-boton wire:loading.attr="disabled" wire:click="uploadCarnet">
                    {{ __('Enviar') }}
                </x-boton>
                <x-jet-button wire:loading.attr="disabled" wire:click="$set('modal', false)">
                    Cerrar
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    @else
        @if($tienda->revision)
            <div class="bg-yellow-500 bg-opacity-30 w-full my-2 p-3 rounded-sm">
                <i class="text-yellow-600 fas fa-exclamation-triangle"></i>
                Tu tienda está siendo validada, si cumples con los <a class="cursor-pointer font-bold" href="{{ route('TyT') }}" target="__blank">términos y condiciones</a>, se habilitará nuevamente
            </div>
        @else
            <div class="bg-yellow-500 bg-opacity-30 w-full my-2 p-3 rounded-sm" x-data>
                <i class="text-yellow-600 fas fa-exclamation-triangle"></i>
                Tu tienda ha sido inhabilitada por incumplir los <a class="cursor-pointer font-bold" href="{{ route('TyT') }}" target="__blank">términos y condiciones</a>,
                <span class="underline cursor-pointer" wire:click='solicitarRevision'>
                    solicitar revisión
                </span>
            </div>
        @endif
    @endif
</div>
