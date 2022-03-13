<div x-data @save.window="simpleAlert('center','success',event.detail,'',true)" @successCategoriaAlert.window="successUserAlert(event.detail)">
    <div
        class="relative w-10/12 max-w-full p-4 px-4 mx-auto mb-10 text-gray-500 bg-white border border-gray-400 rounded-md shadow-md sm:px-2 lg:px-8">
        <h2 class="mt-4 mb-10 text-xl font-medium text-gray-800">Categoría</h2>
        <div class="mb-4">
            <label>Imagen de la categoría</label>
            {{-- <x-jet-input type="file" class="w-11/12" wire:model="image" /> --}}
            <x-select-image wire:model="image" :image="$image" :existing="$categoria->imagen" />
            <x-jet-input-error for="image" class="mt-2" />
        </div>
        <div class="mb-4 ">
            <label>Nombre*</label>
            <x-jet-input type="text" class="w-11/12" wire:model="categoria.nombre"
                placeholder="Ingresa el nombre de la tienda" />
            <x-jet-input-error for="categoria.nombre" class="mt-2" />
        </div>
        <div class="flex content-center justify-center mt-8 mb-3">
            @if($categoria->id)
            <x-boton
                x-on:click.prevent="confirmacionAlert(event,'Sí, actualizar!','Se actualizará la categoría','No se ha actualizado la categoría','save')"
                class="h-10 w-36">Actializar</x-boton>
            @else
            <x-boton
                x-on:click.prevent="confirmacionAlert(event,'Sí, agregar!','Se agregará la nueva categoría','No se ha agregado la categoría','save')"
                class="h-10 w-36">Agregar</x-boton>
            @endif
        </div>

    </div>
    <div
        class="relative w-10/12 max-w-full p-4 px-4 mx-auto bg-white border border-gray-400 rounded-md shadow-md sm:px-2 lg:px-8">
        <h2 class="mt-4 mb-10 text-xl font-medium text-gray-800">Lista de categorías</h2>
        @livewire('admin.categorias')
    </div>
    <script>
        const obtener_pixeles_inicio = () => document.documentElement.scrollTop || document.body.scrollTop;
        const ir_arriba = () => {
            if (obtener_pixeles_inicio() > 0) {
                requestAnimationFrame(ir_arriba);
                scrollTo(0, obtener_pixeles_inicio() - (obtener_pixeles_inicio() / 10));
            }
        }
    </script>
</div>
