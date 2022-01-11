<x-admin-layout title="Administradores">

    <div
        class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-10/12  relative bg-white rounded-md p-4 border border-gray-400 shadow-md mb-10 text-gray-500">
        <h2 class="font-medium text-xl mt-4 mb-10 text-gray-800">Crear nueva cuenta administradora</h2>
        <div class="mb-4 ">
            <label>Nombre*</label>
            <x-jet-input type="text" class="w-11/12" wire:model="nombre"
                placeholder="Ingrese el nombre del nuevo administrador" />
            {{-- @error('nombre')
          <div class="text-xs text-red-600">{{ $message }}</div>
      @enderror --}}
        </div>
        <div class="mb-4 ">
            <label>Correo electrónico*</label>
            <x-jet-input type="text" class="w-11/12" wire:model="nombre"
                placeholder="Ingrese el correo electrónico" />
            {{-- @error('nombre')
        <div class="text-xs text-red-600">{{ $message }}</div>
    @enderror --}}
        </div>
        <div class="mb-4 ">
            <label>Contraseña*</label>
            <x-jet-input type="password" class="w-11/12" wire:model="nombre"
                placeholder="Ingrese la contraseña" />
            {{-- @error('nombre')
      <div class="text-xs text-red-600">{{ $message }}</div>
  @enderror --}}
        </div>
        <div class="mb-4 ">
          <label>Confirmar contraseña*</label>
          <x-jet-input type="password" class="w-11/12" wire:model="nombre"
              placeholder="Ingrese la contraseña" />
          {{-- @error('nombre')
    <div class="text-xs text-red-600">{{ $message }}</div>
@enderror --}}
      </div>


        <div class="flex justify-center content-center mb-3 mt-8">
            <x-boton class="h-10 w-36">Crear</x-boton>
        </div>

    </div>

    <div
        class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-full  relative bg-white rounded-md p-4 border border-gray-400 shadow-md">

        @livewire('admin.administradores')
    </div>
    <script>
        window.addEventListener('successUserAlert', (e) => {
            successUserAlert(e.detail);

        });
    </script>
</x-admin-layout>
