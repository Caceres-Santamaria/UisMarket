<div>
    <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
        <h2 class="text-xl text-center font-semibold mb-2">Agregar talla</h2>
        <div class="mb-4">
            <x-jet-label value="Talla" class="mb-2" />
            <x-jet-input wire:model="talla" type="text" placeholder="Ingrese una talla" class="w-full" />
            <x-jet-input-error for="talla" />
        </div>
        <div class="flex justify-end items-center mt-4">
            <x-jet-action-message class="mr-3" on="saved">
                Agregada
            </x-jet-action-message>
            <x-boton wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Agregar Talla
            </x-boton>
        </div>
    </section>
    @if (!empty($producto->tallas->all()))
        <section>
            <ul class="mt-12 space-y-4">
                @foreach ($producto->tallas as $talla)
                <li class="bg-gray-100 shadow-xl rounded-lg p-6 mb-4 border border-gray-50" wire:key="talla-producto-{{ $talla->id }}">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xl font-medium">Talla {{ $talla->nombre }}</h3>
                        <div>
                            <x-boton active="true" class="bg-orange-500 hover:bg-orange-400 active:bg-orange-600 focus:border-orange-600" wire:click="edit({{ $talla->id }})" wire:loading.attr="disabled" wire:target="edit({{ $talla->id }})">
                                <i class="fas fa-edit"></i>
                            </x-boton>
                            <x-boton class="bg-red-500 hover:bg-red-400 active:bg-red-600 focus:border-red-600"
                            :active="true" wire:click="$emit('eliminarTalla', {{ $talla->id }})">
                                <i class="fas fa-trash"></i>
                            </x-boton>
                        </div>
                    </div>
                    @livewire('emprendedor.color-producto', ['producto' => $producto, 'talla' => $talla], key('color-talla-' . $talla->id))
                </li>
                @endforeach
            </ul>
            <x-jet-dialog-modal wire:model="open">
                <x-slot name="title">
                    Editar talla
                </x-slot>
                <x-slot name="content">
                    <x-jet-label value="Talla" />
                    <x-jet-input wire:model="editTalla" type="text" class="w-full" />
                    <x-jet-input-error for="editTalla" />
                </x-slot>
                <x-slot name="footer">
                    <x-boton wire:click="update" wire:loading.attr="disabled" wire:target="update">
                        Actualizar
                    </x-boton>
                    <x-jet-button wire:loading.attr="disabled" wire:click="$set('open', false)">
                        Cancelar
                    </x-jet-button>
                </x-slot>
            </x-jet-dialog-modal>
        </section>
    @endif

</div>
