<x-app2-layout title="Crear tienda">
    @push('script-header')
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    @endpush
    <div class="grid-in-contenido w-11/12 mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

        <h1 class="text-3xl text-center font-semibold mb-8">Complete esta información para crear una tienda</h1>



        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6 md:grid md:grid-cols-2">
            <p class="text-xl font-semibold mb-4 md:col-span-2">Información de la tienda</p>
            <div class="mb-4 ">
                <label>Nombre*</label>
                <x-jet-input type="text" class="w-11/12" wire:model="nombre"
                    placeholder="Ingrese el nombre de la tienda" />
                @error('nombre')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label>Número de contacto</label>
                <x-jet-input type="text" class="w-11/12" wire:model="numero"
                    placeholder="Ingrese el número de contacto" />
                @error('numero')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label>Dirección</label>
                <x-jet-input type="text" class="w-11/12" wire:model="direccion"
                    placeholder="Ingrese la dirección de la tienda" />
                @error('direccion')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label>Correo electrónico</label>
                <x-jet-input type="text" class="w-11/12" wire:model="name"
                    placeholder="Ingrese el correo electrónico de contacto" />
                {{-- <x-jet-input-error for="name" /> --}}
            </div>

            <div class="mb-4">
                <label>Logo de la tienda</label>
                <x-jet-input type="file" class="w-11/12" wire:model="name" />
                {{-- <x-jet-input-error for="name" /> --}}
            </div>

            <div class="mb-4">
                <label>Portada</label>
                <x-jet-input type="file" class="w-11/12" wire:model="name" />
                {{-- <x-jet-input-error for="name" /> --}}
            </div>

            {{-- <div class="mb-4">
            <div>
                <label for="">Descripción</label>

                <textarea class="w-full form-control" rows="4" wire:model="description" x-data
                x-init="ClassicEditor.create($refs.miEditor)
                .then(function(editor){
                    editor.model.document.on('change:data', () => {
                        @this.set('description', editor.getData())
                    })
                })
                .catch( error => {
                    console.error( error );
                } );" x-ref="miEditor">
            </textarea>
            </div>
             <x-jet-input-error for="description">
        </div> --}}


        </div>


        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6 ">
            <p class="text-xl font-semibold mb-4 col-span-2">Envíos</p>

            <div class="mb-8">
                <label>¿Sus productos se pueden recoger en la tienda física?*</label>
                <div class="block">
                    <input class="mx-2" type="radio" name="recoger" value="si">Sí
                    <input class="mx-2" type="radio" name="recoger" value="no">No
                </div>
            </div>
            <div class="mb-4">
                <label>Costo de envío*</label>
                <div class=" my-3">
                    <label for="">Bucaramanga</label>
                    <x-jet-input type="number" class="w-6/12" wire:model="costo"
                        placeholder="Ingrese el costo de envío de sus productos" />
                    {{-- <x-jet-input-error for="name" /> --}}
                </div>
                <div class="my-3">
                  <label for="">Floridablanca</label>
                  <x-jet-input type="number" class="w-6/12" wire:model="costo"
                      placeholder="Ingrese el costo de envío de sus productos" />
                  {{-- <x-jet-input-error for="name" /> --}}
              </div>
              <div class=" my-3">
                <label for="">Girón</label>
                <x-jet-input type="number" class="w-6/12" wire:model="costo"
                    placeholder="Ingrese el costo de envío de sus productos" />
                {{-- <x-jet-input-error for="name" /> --}}
            </div>

            </div>
        </div>



        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6 md:grid md:grid-cols-2">
            <p class="text-xl font-semibold mb-4 col-span-2">Redes sociales</p>

            <div class="mb-4 ">
                <label>Link de Facebook</label>
                <x-jet-input type="text" class="w-11/12" wire:model="name"
                    placeholder="Ingrese el link de facebook" />
                {{-- <x-jet-input-error for="name" /> --}}
            </div>
            <div class="mb-4">
                <label>Número de Whatsapp</label>
                <x-jet-input type="text" class="w-11/12" wire:model="name"
                    placeholder="Ingrese el número de contacto" />
                {{-- <x-jet-input-error for="name" /> --}}
            </div>
            <div class="mb-4">
                <label>Usuario de Instagram</label>
                <x-jet-input type="text" class="w-11/12" wire:model="name"
                    placeholder="Ingrese el usuario @ejemplo" />
                {{-- <x-jet-input-error for="name" /> --}}
            </div>
        </div>


        <div class="flex mt-4">
            <x-boton class=" h-10 w-full">
                Crear tienda
            </x-boton>
        </div>

    </div>

</x-app2-layout>
