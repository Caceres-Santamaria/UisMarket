</x-app2-layout>

<x-slot name="title">
    Crear nueva categoría
</x-slot>

<x-slot name="description">
    Completa la información necesaria para poder crear una nueva categoría
</x-slot>

<x-slot name="form">
    <div class="col-span-6 sm:col-span-4">
        <label>
            Nombre
        </label>

        <x-jet-input wire:model="createForm.name" type="text" class="w-full mt-1" />

        <x-jet-input-error for="createForm.name" />
    </div>


    <div class="col-span-6 sm:col-span-4">
        <x-jet-label>
            Imagen
        </x-jet-label>

        <input wire:model="createForm.image" accept="image/*" type="file" class="mt-1" name=""
            id="{{ $rand }}">
        <x-jet-input-error for="createForm.image" />
    </div>
</x-slot>


<x-slot name="actions">

    <x-jet-action-message class="mr-3" on="saved">
        Categoría creada
    </x-jet-action-message>

    <x-boton>
        Agregar
    </x-boton>
</x-slot>
</x-jet-form-section>

<x-jet-action-section>
    <x-slot name="title">
        Lista de categorías
    </x-slot>

    <x-slot name="description">
        Aquí encontrarás todas las categorías agregadas
    </x-slot>

    <x-slot name="content">

        <table class="text-gray-600">
            <thead class="border-b border-gray-300">
                <tr class="text-left">
                    <th class="py-2 w-full">Nombre</th>
                    <th class="py-2">Acción</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-300">
                @foreach ($categories as $category)
                    <tr>
                        <td class="py-2">
                            <span class="inline-block w-8 text-center mr-2">
                                {!! $category->icon !!}
                            </span>

                            <a href="{{ route('admin.categories.show', $category) }}"
                                class="uppercase underline hover:text-blue-600">
                                {{ $category->name }}
                            </a>
                        </td>
                        <td class="py-2">
                            <div class="flex divide-x divide-gray-300 font-semibold">
                                <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                    wire:click="edit('{{ $category->slug }}')">Editar</a>
                                <a class="pl-2 hover:text-red-600 cursor-pointer"
                                    wire:click="$emit('deleteCategory', '{{ $category->slug }}')">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </x-slot>
</x-jet-action-section>

<x-jet-dialog-modal wire:model="editForm.open">

    <x-slot name="title">
        Editar categoría
    </x-slot>

    <x-slot name="content">

        <div class="space-y-3">

            <div>
                @if ($editImage)
                    <img class="w-full h-64 object-cover object-center" src="{{ $editImage->temporaryUrl() }}" alt="">
                @else
                    <img class="w-64 h-64 object-cover object-center" src="{{ Storage::url($editForm['image']) }}"
                        alt="">
                @endif
            </div>

            <div>
                <x-jet-label>
                    Nombre
                </x-jet-label>

                <x-jet-input wire:model="editForm.name" type="text" class="w-full mt-1" />

                <x-jet-input-error for="editForm.name" />
            </div>

            <div>
                <x-jet-label>
                    Imagen
                </x-jet-label>

                <input wire:model="editImage" accept="image/*" type="file" class="mt-1" name=""
                    id="{{ $rand }}">
                <x-jet-input-error for="editImage" />
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-boton wire:click="update" wire:loading.attr="disabled" wire:target="editImage, update">
            Actualizar
        </x-boton>
    </x-slot>

</x-jet-dialog-modal>
</x-app2-layout>
