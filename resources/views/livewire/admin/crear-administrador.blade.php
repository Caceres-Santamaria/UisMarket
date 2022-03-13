<div x-data @saved.window="simpleAlert('center', 'success', 'Administrador Creado', event.detail, false, 1900)">
    <div
        class="relative w-10/12 max-w-full p-4 px-4 mx-auto mb-10 text-gray-500 bg-white border border-gray-400 rounded-md shadow-md sm:px-2 lg:px-8">
        <h2 class="mt-4 mb-10 text-xl font-medium text-gray-800">Crear nueva cuenta administradora</h2>
        <div class="mb-4 ">
            <x-jet-label value="Nombre*" />
            <x-jet-input type="text" class="w-11/12" wire:model="users.name"
                placeholder="Ingresa el nombre del nuevo administrador" />
            <x-jet-input-error for="users.name" class="mt-2" />
        </div>
        <div class="mb-4 ">
            <x-jet-label value="Correo electrónico*" />
            <x-jet-input type="text" class="w-11/12" wire:model="users.email"
                placeholder="Ingresa el correo electrónico" />
            <x-jet-input-error for="users.email" class="mt-2" />
        </div>
        <div class="mb-4 ">
            <x-jet-label value="Contraseña*" />
            <x-jet-input type="password" class="w-11/12" wire:model="password"
                placeholder="Ingresa la contraseña" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>
        <div class="mb-4 ">
            <x-jet-label value="Confirmar contraseña*" />
            <x-jet-input type="password" class="w-11/12" wire:model="password_confirmation"
                placeholder="Ingresa la contraseña" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>

        <div class="flex content-center justify-center mt-8 mb-3">
            <x-boton
                x-on:click="confirmacionAlert(event,'Sí, crear','Se creará un nuevo adminstrador','No se ha creado un nuevo administrador','save')"
                class="h-10 w-36">Crear</x-boton>
        </div>
    </div>
    <div
        class="relative w-full max-w-full p-4 px-4 mx-auto bg-white border border-gray-400 rounded-md shadow-md sm:px-2 lg:px-8">
        <h2 class="mt-4 mb-10 text-xl font-medium text-gray-800">Lista de Administradores</h2>
        @livewire('admin.administradores')
    </div>
    <script>
        window.addEventListener('successUserAlert', (e) => {
            successUserAlert(e.detail);

        });
    </script>
</div>
