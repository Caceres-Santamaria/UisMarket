@push('scriptHeader')
    <script src="{{ asset('js/ckeditor.js') }}"></script>
@endpush
<div class="grid-in-contenido w-11/12 mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">Complete esta información para crear una tienda</h1>
    <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6 md:grid md:grid-cols-2">
        <h2 class="text-xl font-semibold mb-4 md:col-span-2">Información de la tienda</h2>
        <div class="mb-4 ">
            <label>Nombre*</label>
            <x-jet-input type="text" class="w-11/12" wire:model="tienda.nombre"
                placeholder="Ingrese el nombre de la tienda" />
            <x-jet-input-error for="tienda.nombre" class="mt-2" />
        </div>
        <div class="mb-4">
            <label>Número de contacto</label>
            <x-jet-input type="number" class="w-11/12" wire:model="tienda.telefono"
                placeholder="Ingrese el número de contacto" />
            <x-jet-input-error for="tienda.telefono" class="mt-2" />
        </div>
        <div class="mb-4">
            <label>Dirección</label>
            <x-jet-input type="text" class="w-11/12" wire:model="tienda.direccion"
                placeholder="Ingrese la dirección de la tienda" />
            <x-jet-input-error for="tienda.direccion" class="mt-2" />
        </div>
        <div class="mb-4">
            <label>Correo electrónico</label>
            <x-jet-input type="text" class="w-11/12" wire:model="tienda.email"
                placeholder="Ingrese el correo electrónico de contacto" />
            <x-jet-input-error for="tienda.email" class="mt-2" />
        </div>
        <div class="mb-4">
            <label>Logo de la tienda</label>
            <x-select-image wire:model="logo" :image="$logo" :existing="$tienda->logo" />
            <x-jet-input-error for="logo" class="mt-2" />
        </div>
        <div class="mb-4">
            <label>Portada</label>
            <x-select-image wire:model="portada" :image="$portada" :existing="$tienda->fondo_img" />
            <x-jet-input-error for="portada" class="mt-2" />
        </div>
        <div class="mb-4">
            <div wire:ignore>
                <label for="">Descripción de la tienda</label>
                <textarea class="w-full form-control" rows="4" wire:model="tienda.descripcion" x-ref="editor" x-data
                    x-init="ClassicEditor
                .create($refs.editor, {
                    toolbar: {
                        items: [
                            'heading', '|',
                            'bold', 'italic', '|',
                            'outdent', 'indent', '|',
                            'bulletedList', 'numberedList', '|',
                            'insertTable', '|',
                            'blockQuote', '|',
                            'undo', 'redo'
                        ],
                        shouldNotGroupWhenFull: false
                    },
                    heading: {
                        options: [
                            { model: 'paragraph', title: 'Párrafo', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Título 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Título 2', class: 'ck-heading_heading2' },
                            { model: 'heading3', view: 'h3', title: 'Título 3', class: 'ck-heading_heading3' }
                        ]
                    },
                })
                .then( editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set('tienda.descripcion', editor.getData())
                    })
                } )
                .catch( error => {
                    console.error( error );
                } );">
                </textarea>
            </div>
            <x-jet-input-error for="tienda.descripcion" />
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6 ">
        <h2 class="text-xl font-semibold mb-4 col-span-2">Envíos</h2>
        <div class="mb-8">
            <label>¿Sus productos se pueden recoger en la tienda física?*</label>
            <div class="block">
                <input class="mx-2" type="radio" name="recoger_tienda" wire:model="tienda.recoger_tienda"
                    value="1">Sí
                <input class="mx-2" type="radio" name="recoger_tienda" wire:model="tienda.recoger_tienda"
                    value="0">No
            </div>
        </div>
        {{-- {{var_dump($errors)}}
        {{var_dump($costos)}} --}}
        <div class="mb-4">
            <label>Costo de envío*</label>
            @foreach ($ciudades as $clave => $valor)
                <div class=" my-3">
                    <label for="">{{ $valor }}</label>
                    <x-jet-input type="number" min=0 class="w-6/12"
                        wire:change="modificarCosto({{ $clave }},$event.target.value)"
                        placeholder="Ingrese el costo de envío de sus productos" />
                    <x-jet-input-error for="costo.{{ $clave }}" class="mt-2" />
                </div>
            @endforeach
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6 md:grid md:grid-cols-2">
        <p class="text-xl font-semibold mb-4 col-span-2">Redes sociales</p>
        <div class="mb-4 ">
            <label>Link de Facebook</label>
            <x-jet-input type="text" class="w-11/12" wire:model="tienda.facebook"
                placeholder="Ingrese el link de facebook" />
            <x-jet-input-error for="tienda.facebook" class="mt-2" />
        </div>
        <div class="mb-4">
            <label>Número de Whatsapp</label>
            <x-jet-input type="text" class="w-11/12" wire:model="tienda.whatsapp"
                placeholder="Ingrese el número de contacto" />
            <x-jet-input-error for="tienda.whatsapp" class="mt-2" />
        </div>
        <div class="mb-4">
            <label>Usuario de Instagram</label>
            <x-jet-input type="text" class="w-11/12" wire:model="tienda.instagram"
                placeholder="Ingrese el usuario @ejemplo" />
            <x-jet-input-error for="tienda.instagram" class="mt-2" />
        </div>
    </div>
    <div class="flex mt-4">
        <x-boton wire:click="save" class=" h-10 w-full">
            Crear tienda
        </x-boton>
    </div>
</div>
@push('scripts')
    <script>

    </script>
@endpush
