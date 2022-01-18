<div>
    <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
        <h2 class="text-xl text-center font-semibold mb-2">Agregar color</h2>
        {{-- Color --}}
        <div class="mb-4">
            <x-jet-label value="Color" class="mb-2" />
            <div class="flex items-center gap-4 justify-start px-2 xl:px-5 flex-wrap" x-data="{ color: ''}">
                @foreach ($colores as $color)
                    <label
                        class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none"
                        :class="{ 'ring-2 ring-indigo-500': (color === '{{ $color->id }}'), 'ring-0 ring-gray-400': !(color === '{{ $color->id }}') }">
                        <input type="radio" value="{{ $color->id }}" wire:model.defer="color_id"
                            class="sr-only" x-model='color' name="color">
                        @if ($color->codigo == 'bg-black')
                            <span aria-hidden="true"
                                class="h-8 w-8 {{ $color->codigo }} border border-gray-400 border-opacity-40 rounded-full">
                            </span>
                        @else
                            <span aria-hidden="true"
                                class="h-8 w-8 {{ $color->codigo }} border border-black border-opacity-40 rounded-full">
                            </span>
                        @endif
                        <span class="mx-2 text-gray-700 capitalize">
                            {{ $color->nombre }}
                        </span>
                    </label>
                @endforeach
            </div>
            <x-jet-input-error for="color_id" />
        </div>
        <div class="mb-4">
            <x-jet-label value="Cantidad" />
            <x-jet-input type="number" wire:model.defer="cantidad" placeholder="Ingrese la cantidad"
                class="w-full" />
            <x-jet-input-error for="cantidad" />
        </div>
        <div class="flex justify-end items-center mt-4">
            <x-jet-action-message class="mr-3" on="saved">
                Agregado
            </x-jet-action-message>
            <x-boton wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Agregar Color
            </x-boton>
        </div>
    </section>
    @if ($producto->colores->count() > 0 or $talla->colores->count() > 0)
        <section class="bg-white shadow-lg rounded-lg p-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="table-auto min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-auto">
                                        Color
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-auto">
                                        Nombre
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-auto">
                                        Cantidad</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-auto">
                                        Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                {{-- {{ dd($talla) }} --}}
                                @php
                                    $producto_colores = $talla->id == null ? $producto->colores : $talla->colores;
                                @endphp
                                @foreach ($producto_colores as $producto_color)
                                    <tr class="hover:bg-gray-200"
                                        wire:key="producto_color-{{ $producto_color->pivot->id }}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <label
                                                class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none">
                                                @if ($producto_color->pivot->color->codigo == 'bg-black')
                                                    <span aria-hidden="true"
                                                        class="h-8 w-8 {{ $producto_color->pivot->color->codigo }} border border-gray-400 border-opacity-40 rounded-full">
                                                    </span>
                                                @else
                                                    <span aria-hidden="true"
                                                        class="h-8 w-8 {{ $producto_color->pivot->color->codigo }} border border-black border-opacity-40 rounded-full">
                                                    </span>
                                                @endif
                                            </label>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap capitalize text-center">
                                            {{ $producto_color->pivot->color->nombre }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            {{ $producto_color->pivot->cantidad }} Unidades
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <x-boton
                                                class="bg-blue-500 hover:bg-blue-400 active:bg-blue-600 focus:border-blue-600"
                                                :active="true" wire:click="edit({{ $producto_color->pivot->id }})"
                                                wire:loading.attr="disabled"
                                                wire:target="edit({{ $producto_color->pivot->id }})">
                                                Actualizar
                                            </x-boton>
                                            <x-boton
                                                class="bg-red-500 hover:bg-red-400 active:bg-red-600 focus:border-red-600"
                                                :active="true"
                                                wire:click="$emit('deletePivot', {{ $producto_color->pivot->id }})">
                                                Eliminar
                                            </x-boton>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            <h1>Editar color</h1>
        </x-slot>
        <x-slot name="content">
            <div class="mb-4 bg-white rounded-lg shadow p-6">
                <div class="mb-4 flex justify-between gap-3">
                    <div>
                        <x-jet-label class="block text-sm font-medium text-gray-700" value="Color" />
                        @if ($colorProducto != null)
                            <label
                                class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center focus:outline-none">
                                @if ($colorProducto->color->codigo == 'bg-black')
                                    <span aria-hidden="true"
                                        class="h-8 w-8 {{ $colorProducto->color->codigo }} border border-gray-400 border-opacity-40 rounded-full">
                                    </span>
                                @else
                                    <span aria-hidden="true"
                                        class="h-8 w-8 {{ $colorProducto->color->codigo }} border border-black border-opacity-40 rounded-full">
                                    </span>
                                @endif
                                <span class="mx-2 text-gray-700 capitalize">
                                    {{ $colorProducto->color->nombre }}
                                </span>
                            </label>
                        @endif
                    </div>
                    <div class="w-3/4">
                        <x-jet-label value="cantidad" />
                        <x-jet-input class="w-full" wire:model="colorProducto_cantidad" type="number"
                            placeholder="Ingrese una cantidad" />
                        <x-jet-input-error for="colorProducto_cantidad" />
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-boton wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-boton>
            <x-jet-button wire:loading.attr="disabled" wire:click="$set('modal', false)">
                Cancelar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
@push('scripts')
    <script>
        Livewire.on('eliminado', color => {
            simpleAlert('center', 'success', 'Color eliminado',
                `Se ha eliminado el color ${color} de este producto`, 1900);
        });
    </script>
@endpush
