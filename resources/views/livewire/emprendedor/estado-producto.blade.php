<section class="bg-white shadow-xl rounded-lg p-6 mb-4">
    <h2 class="text-xl text-center font-semibold mb-2">Estado de la publicación</h2>
    @if ($producto->publicacion != '3')
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
                    <span
                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
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
    @else
        <div class="flex justify-between items-center">
            <div class="flex gap-4">
                <x-jet-label>
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        Suspendido
                    </span>
                </x-jet-label>
            </div>
            <div class="flex flex-col sm:flex-row justify-end items-center">
                <x-jet-action-message class="mr-3 hidden md:block order-2 sm:order-1" on="revisado">
                    Se ha solicitado revisión
                </x-jet-action-message>
                @if (!$producto->revision)
                    <x-boton class="order-1 sm:order-2" wire:loading.attr="disabled" wire:target="revision"
                        wire:click="revision">
                        Solicitar Revisión
                    </x-boton>
                @else
                    <x-boton class="order-1 sm:order-2 cursor-auto opacity-50" disable="true">
                        Se Está Revisando
                    </x-boton>
                @endif
            </div>

        </div>
        <div class="flex justify-end w-full md:hidden">
            <x-jet-action-message on="revisado">
                Se ha solicitado revisión
            </x-jet-action-message>
        </div>
        <p class="text-xs text-yellow-600 font-semibold pt-3">
            <i class="fas fa-exclamation-triangle"></i>
            Esta publicación ha sido suspendida por incumplir los <a href="{{ route('TyT') }}"
                target="_blank"><u>Términos y condiciones</u></a> de Uis Market. Por favor, revísela y solicite revisión
            nuevamente
        </p>
    @endif
</section>
