<section class="bg-white shadow-xl rounded-lg p-6 mb-4">
    <h2 class="text-xl text-center font-semibold mb-2">Estado de la publicación</h2>
    <div class="flex justify-between items-center">
        <div class="flex gap-4">
            <x-jet-label>
                <input wire:model.defer="publicacion" type="radio" name="publicacion" value="1">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    Borrador
                </span>
            </x-jet-label>
            <x-jet-label>
                <input wire:model.defer="publicacion" type="radio" name="publicacion" value="2">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Publicado
                </span>
            </x-jet-label>
        </div>
        <div class="flex flex-col sm:flex-row justify-end items-center">
            <x-jet-action-message class="mr-3  hidden md:block order-2 sm:order-1" on="saved">
                Actualizado
            </x-jet-action-message>
            <x-jet-action-message class="mr-3 hidden md:block order-2 sm:order-1" on="Nosaved">
                Sin imágenes no se puede publicar
            </x-jet-action-message>
            <x-boton class="order-1 sm:order-2" wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Actualizar
            </x-boton>
        </div>
    </div>
    <div class="flex justify-end w-full md:hidden">
        <x-jet-action-message on="saved">
            Actualizado
        </x-jet-action-message>
        <x-jet-action-message on="Nosaved">
            Sin imágenes no se puede publicar
        </x-jet-action-message>
    </div>
</section>
