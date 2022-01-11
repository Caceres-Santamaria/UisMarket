<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Productos
                </h1>

            </div>
        </div>
    </header>

    <div class="grid-in-contenido max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

        <h1 class="text-xl md:text-2xl lg:text-3xl text-center font-semibold mb-8">Complete esta información para crear
            un producto</h1>

        <div class="mb-4" wire:ignore>
            <form action="" method="POST" class="dropzone" id="my-awesome-dropzone"></form>
        </div>

        {{-- @if ($product->images->count()) --}}

        <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
            <h1 class="text-2xl text-center font-semibold mb-2">Imagenes del producto</h1>

            <ul class="flex flex-wrap">

                <li class="relative">
                    <img class="w-32 h-20 object-cover" src="" alt="">
                    {{-- <x-jet-danger-button class="absolute right-2 top-2"
                    wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled"
                    wire:target="deleteImage({{ $image->id }})">
                    x
                </x-jet-danger-button> --}}
                </li>


            </ul>
        </section>

        {{-- @endif --}}


        {{-- @livewire('estado-publicación', ['producto' => $producto], key('estado-publicación-' . $producto->id)) --}}


    </div>

    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-2 gap-6 mb-4">

            <div class="mb-4">
                <label>Nombre</label>
                <x-jet-input type="text" class="w-full" wire:model="nombre"
                    placeholder="Ingrese el nombre del producto" />
                @error('nombre')
                    <div class="text-xs text-red-600">{{ $message }}</div>
                @enderror
            </div>
            {{-- Condición --}}
            <div class="mb-4">
                <label>Condición o estado</label>
                <div class="block">
                    <input class="mx-2" type="radio" name="estado" value="nuevo">Nuevo
                    <input class="mx-2" type="radio" name="estado" value="usado">Usado
                </div>
            </div>

            {{-- Descripción --}}

            <div class="mb-4">
                <div>
                    <label for="">Descripción</label>

                    {{-- <textarea class="w-full form-control" rows="4" wire:model="description" x-data
          x-init="ClassicEditor.create($refs.miEditor)
          .then(function(editor){
              editor.model.document.on('change:data', () => {
                  @this.set('description', editor.getData())
              })
          })
          .catch( error => {
              console.error( error );
          } );" x-ref="miEditor">
      </textarea> --}}
                </div>
                {{-- <x-jet-input-error for="description"> --}}
            </div>

            <div class="grid grid-cols-2 gap-6 mb-4">

                <div>
                    <label for="">Categorías</label>
                    <select
                        class="w-full form-control border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
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
                    <x-jet-input type="number" class="w-full" step=".01" wire:model="precio" />
                    @error('precio')
                        <div class="text-xs text-red-600">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            @if ($this->producto)


                @if (!$this->producto->color && !$this->producto->talla)

                    <div>
                        <x-jet-label value="Cantidad" />
                        <x-jet-input wire:model="cantidad" type="number" class="w-full" />
                        @error('cantidad')
                            <div class="text-xs text-red-600">{{ $message }}</div>
                        @enderror
                    </div>

                @endif

            @endif

            <div class="flex justify-end items-center mt-4">

                <x-jet-action-message class="mr-3" on="saved">
                    Actualizado
                </x-jet-action-message>

                <x-boton class="m-4 h-10 w-full" wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Actualizar producto
                </x-boton>
            </div>
        </div>


        @if ($this->producto)

            @if ($this->producto->talla)

                @livewire('talla', ['producto' => $producto], key('talla-' . $producto->id))

            @elseif($this->producto->color)

                @livewire('color', ['producto' => $producto], key('color-' . $producto->id))

            @endif

        @endif


    </div>


    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Seleccione una imagen",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                complete: function(file) {
                    this.removeFile(file);
                },
                queuecomplete: function() {
                    Livewire.emit('refreshProduct');
                }
            };


            Livewire.on('deleteProduct', () => {

                Swal.fire({
                    title: 'Estás seguro?',
                    text: "No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.edit-product', 'delete');

                        Swal.fire(
                            'Eliminado!',
                            'Su archivo ha sido eliminado.',
                            'Exitosamente'
                        )
                    }
                })

            })

            Livewire.on('deleteSize', sizeId => {

                Swal.fire({
                    title: 'Está seguro?',
                    text: "No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar!
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.talla', 'delete', sizeId);

                        Swal.fire(
                            'Eliminado!',
                            'Su archivo ha sido eliminado.',
                            'Exitosamente'
                        )
                    }
                })

            })

            Livewire.on('deletePivot', pivot => {
                Swal.fire({
                    title: 'Está seguro?',
                    text: "No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.color', 'delete', pivot);

                        Swal.fire(
                            'Eliminado!',
                            'Su archivo ha sido eliminado.',
                            'Exitosamente'
                        )
                    }
                })
            })

            Livewire.on('deleteColorSize', pivot => {
                Swal.fire({
                    title: 'Está seguro?',
                    text: "No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('admin.color-size', 'delete', pivot);

                        Swal.fire(
                            'Eliminado!',
                            'Su archivo ha sido eliminado.',
                            'Exitosamente'
                        )
                    }
                })
            })
        </script>
    @endpush

</div>
