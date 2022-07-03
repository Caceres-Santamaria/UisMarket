<div class="w-full">
    <div class="bg-red-600 bg-opacity-25 w-full my-6 p-3"><i class="text-red-600 fas fa-exclamation-triangle"></i> Tu
        solicitud fue rechazada, <span class="underline cursor-pointer" wire:click="$set('modal',true)">ver
            más detalles </span>
    </div>
    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            <h1>Comentarios de la solicitud </h1>
        </x-slot>
        <x-slot name="content">
            <div class="w-full rounded-md my-5 border border-gray-500 p-3">
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
</div>
