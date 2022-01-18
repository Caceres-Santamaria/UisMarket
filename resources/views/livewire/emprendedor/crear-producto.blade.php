@push('scriptHeader')
    <script src="{{ asset('js/ckeditor.js') }}"></script>
@endpush
<main class="grid-in-contenido max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

    <h1 class="text-xl md:text-2xl lg:text-3xl text-center font-semibold mb-8">Complete esta información para crear un
        producto</h1>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="mb-4">
            <x-jet-label value="Nombre" />
            <x-jet-input type="text" class="w-full" wire:model="nombre"
                placeholder="Ingrese el nombre del producto" />
            <x-jet-input-error for="nombre" />
        </div>
        <div class="mb-4">
            <x-jet-label value="Slug" />
            <x-jet-input type="text" disabled wire:model="slug" class="w-full bg-gray-200"
                placeholder="Ingrese el slug del producto" />
            <x-jet-input-error for="slug" />
        </div>
        <div class="mb-4">
            <x-jet-label value="Condición o estado" />
            <div class="flex gap-2">
                <x-jet-label>
                    <input class="mx-2" type="radio" name="estado" value="nuevo" wire:model="estado">Nuevo
                </x-jet-label>
                <x-jet-label>
                    <input class="mx-2" type="radio" name="estado" value="usado" wire:model="estado">Usado
                </x-jet-label>
            </div>
            <x-jet-input-error for="estado" />
        </div>
        <div class="mb-4">
            <div wire:ignore>
                <x-jet-label value="Descripción" />
                <textarea maxlength="65534" wire:model="descripcion"
                    class="w-full h-32 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    x-data x-init="ClassicEditor
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
                @this.set('descripcion', editor.getData())
            })
        } )
        .catch( error => {
            console.error( error );
        } );" x-ref="editor">
        </textarea>
            </div>
            <x-jet-input-error for="descripcion" />
        </div>

        <div class="grid grid-cols-2 gap-6 mb-4">
            <div>
                <x-jet-label value="Categoría" />
                <select wire:model="categoria_id"
                    class="w-full form-control border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="" selected disabled>Seleccione una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="categoria_id" />
            </div>
            <div>
                <x-jet-label value="Precio" />
                <x-jet-input type="number" class="w-full" step="50" wire:model="precio" />
                <x-jet-input-error for="precio" />
            </div>
        </div>
        <div class="mb-4">
            <x-jet-label value="¿Su producto tiene color?" />
            <div class="flex gap-2">
                <x-jet-label>
                    <input class="mx-2" type="radio" name="color" value="1" wire:model="color">Sí
                </x-jet-label>
                <x-jet-label>
                    <input class="mx-2" type="radio" name="color" value="0" wire:model="color">No
                </x-jet-label>
            </div>
            <x-jet-input-error for="color" />
        </div>
        <div class="mb-4">
            <x-jet-label value="¿Su producto tiene talla?" />
            <div class="flex gap-2">
                <x-jet-label>
                    <input class="mx-2" type="radio" name="talla" value="1" wire:model="talla">Sí
                </x-jet-label>
                <x-jet-label>
                    <input class="mx-2" type="radio" name="talla" value="0" wire:model="talla">No
                </x-jet-label>
            </div>
            <x-jet-input-error for="talla" />
        </div>
        @if ($color == 0 && $talla == 0)
            <div>
                <x-jet-label value="Cantidad" />
                <x-jet-input wire:model="cantidad" type="number" class="w-full" />
                <x-jet-input-error for="cantidad" />
                {{-- <pre>{{ dump($errors->first('cantidad')) }}</pre> --}}
            </div>
        @endif

    </div>
    <div class="flex mt-4">
        <x-boton class="m-4 h-10 w-full" wire:loading.attr="disabled" wire:target="save" wire:click="save">
            Crear producto
        </x-boton>
    </div>
</main>
