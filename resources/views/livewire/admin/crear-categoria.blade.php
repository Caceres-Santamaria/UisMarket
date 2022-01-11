<div
    class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-10/12  relative bg-white rounded-md p-4 border border-gray-400 shadow-md mb-10 text-gray-500">
    <h2 class="font-medium text-xl mt-4 mb-10 text-gray-800">Crear nueva categoría</h2>
    <div class="mb-4">
        <label>Imagen de la categoría</label>
        {{-- <x-jet-input type="file" class="w-11/12" wire:model="image" /> --}}
        <x-select-image wire:model="image" :image="$image" :existing="$categoria->imagen" />
        <x-jet-input-error for="image" class="mt-2" />
    </div>
    <div class="mb-4 ">
        <label>Nombre*</label>
        <x-jet-input type="text" class="w-11/12" wire:model="categoria.nombre"
            placeholder="Ingrese el nombre de la tienda" />
        <x-jet-input-error for="categoria.nombre" class="mt-2" />
    </div>
    <div class="flex justify-center content-center mb-3 mt-8">
        <x-boton wire:click="save" class="h-10 w-36">Agregar</x-boton>
    </div>

</div>
<div
    class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-10/12  relative bg-white rounded-md p-4 border border-gray-400 shadow-md">
    <h2 class="font-medium text-xl mt-4 mb-10 text-gray-800">Lista de categorías</h2>
    @livewire('admin.categorias')
</div>
<script>
    window.addEventListener('successCategoriaAlert', (e) => {
        successUserAlert(e.detail);

    });
</script>
