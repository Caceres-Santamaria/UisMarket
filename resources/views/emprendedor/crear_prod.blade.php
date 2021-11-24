<x-app2-layout title="Agregar producto">
  @push('script-header')
  <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
  @endpush
    <div class="grid-in-contenido max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

        <h1 class="text-3xl text-center font-semibold mb-8">Complete esta información para crear un producto</h1>



        {{-- Nombre --}}
        <div class="mb-4">
            <label>Nombre</label>
            <x-jet-input type="text" class="w-full" wire:model="name"
                placeholder="Ingrese el nombre del producto" />
            {{-- <x-jet-input-error for="name" /> --}}
        </div>

        {{-- Descripción --}}

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

        <div class="grid grid-cols-2 gap-6 mb-4">
            {{-- Marca --}}
            <div>
                <label for="">Categorías</label>
                <select class="w-full form-control border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
                    <option value="" selected disabled>Seleccione una categoría</option>
                    {{-- @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach --}}
                </select>
                {{-- <x-jet-input-error for="category_id" /> --}}
            </div>

            {{-- Precio --}}
            <div>
                <label for="">Precio</label>
                <x-jet-input type="number" class="w-full" step=".01" />
                {{-- <x-jet-input-error for="price" /> --}}
            </div>
        </div>

        {{-- @if ($subcategory_id)

            @if (!$this->subcategory->color && !$this->subcategory->size)

                <div>
                    <x-jet-label value="Cantidad" />
                    <x-jet-input wire:model="quantity" type="number" class="w-full" />
                    <x-jet-input-error for="quantity" />
                </div>

            @endif

        @endif --}}


        <div class="flex mt-4">
            <x-boton class="ml-auto">
                Crear producto
            </x-boton>
        </div>

    </div>

</x-app2-layout>
