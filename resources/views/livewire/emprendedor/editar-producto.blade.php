@push('css')
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}" type="text/css" />
@endpush
@push('scriptHeader')
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    {{-- <script src="{{ asset('js/producto.js') }}"></script> --}}
    <script src="{{ asset('js/dropzone-min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
@endpush
<main class="grid-in-contenido">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
        <h1 class="text-xl md:text-2xl lg:text-3xl text-center font-semibold mb-8">
            Complete esta información para actualizar el producto
        </h1>
        @livewire('emprendedor.estado-producto',['producto' => $producto], key('estado-producto-' . $producto->id))
        <section class="bg-white rounded-lg shadow p-6 mb-4">
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="producto.nombre"
                    placeholder="Ingrese el nombre del producto" />
                <x-jet-input-error for="producto.nombre" />
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
                        <input class="mx-2" type="radio" name="estado" value="nuevo"
                            wire:model="producto.estado">Nuevo
                    </x-jet-label>
                    <x-jet-label>
                        <input class="mx-2" type="radio" name="estado" value="usado"
                            wire:model="producto.estado">Usado
                    </x-jet-label>
                </div>
                <x-jet-input-error for="producto.estado" />
            </div>
            <div class="mb-4">
                <div wire:ignore>
                    <x-jet-label value="Descripción" />
                    <textarea maxlength="65534" wire:model="producto.descripcion"
                        class="w-full h-32 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        x-data x-init="ClassicEditor.create($refs.editor, {
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
                                @this.set('producto.descripcion', editor.getData())
                            })
                        } )
                        .catch( error => {
                            console.error( error );
                        } );" x-ref="editor">
                    </textarea>
                </div>
                <x-jet-input-error for="producto.descripcion" />
            </div>
            <div class="grid grid-cols-2 gap-6 mb-4">
                <div>
                    <x-jet-label value="Categoría" />
                    <select wire:model="producto.categoria_id"
                        class="w-full form-control border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="" selected disabled>Seleccione una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="producto.categoria_id" />
                </div>
                <div>
                    <x-jet-label value="Precio" />
                    <x-jet-input type="number" class="w-full" step="50" wire:model="producto.precio" />
                    <x-jet-input-error for="producto.precio" />
                </div>
            </div>
            @if ($producto->color == 0 && $producto->talla == 0)
                <div>
                    <x-jet-label value="Cantidad" />
                    <x-jet-input wire:model="producto.cantidad" type="number" class="w-full" />
                    <x-jet-input-error for="producto.cantidad" />
                </div>
            @endif
            <div class="flex justify-end items-center mt-4">
                <x-jet-action-message class="mr-3" on="saved">
                    Actualizado
                </x-jet-action-message>
                <x-boton wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Actualizar producto
                </x-boton>
            </div>
        </section>
        <section class="bg-white shadow-xl rounded-lg p-6 mb-4" wire:ignore>
            <h2 class="text-xl text-center font-semibold mb-2">Subir imágenes</h2>
            <div class="mb-4 mt-1 flex justify-center px-3 pt-3 pb-3 border-2 border-gray-300 border-dashed rounded-md">
                <form action="{{ route('tienda.productos.imagenes', $producto) }}" method="POST"
                    class="dropzone w-full border-1 border-gray-100 rounded-md" id="my-dropzone"></form>
            </div>
            <x-jet-input-error for="file" />
            <span class="text-xs text-yellow-600 font-semibold"><i class="fas fa-exclamation-triangle"></i> Sólo puedes adjuntar máximo 10 imágenes de este producto</span>
        </section>
        @if ($producto->imagenes->count() > 0)
            <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
                <h2 class="text-xl text-center font-semibold mb-2">Imagenes del producto</h2>
                <ul class="flex flex-wrap gap-2 justify-center">
                    @foreach ($producto->imagenes as $imagen)
                        <li class="relative" wire:key="image-{{ $imagen->id }}">
                            <img class="w-32 h-32 object-cover object-top" src="{{ Storage::url($imagen->url) }}"
                                alt="">
                            <x-boton
                                class="absolute right-2 top-2 bg-red-500 hover:bg-red-400 active:bg-red-600 focus:border-red-600 rounded-full"
                                :active="true" wire:click="deleteImagen({{ $imagen->id }})"
                                wire:loading.attr="disabled" wire:target="deleteImagen({{ $imagen->id }})">
                                <i class="fas fa-times"></i>
                            </x-boton>
                        </li>
                    @endforeach
                </ul>
            </section>
        @endif
        @if ($producto->talla)
            @livewire('emprendedor.talla-producto', ['producto' => $producto], key('talla-' . $producto->id))
        @elseif($producto->color)
            @livewire('emprendedor.color-producto', ['producto' => $producto, 'talla' => null], key('color-' . $producto->id))
        @endif
    </div>
    @push('scripts')
        <script>
            Dropzone.options.myDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una imagen al recuadro",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                maxFiles: 10,
                complete: function(file) {
                    this.removeFile(file);
                },
                queuecomplete: function() {
                    Livewire.emit('refrescarProducto');
                }
            };

            // Livewire.on('deleteSize', sizeId => {

            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {

            //             Livewire.emitTo('admin.size-product', 'delete', sizeId);

            //             Swal.fire(
            //                 'Deleted!',
            //                 'Your file has been deleted.',
            //                 'success'
            //             )
            //         }
            //     })

            // })

            Livewire.on('deletePivot', pivot => {
                confirmacionAlert(event, '¡Sí, eliminar!','Esta acción no se podrá revertir','No se ha eliminado el color',null,'emprendedor.color-producto',pivot);
            })

            // Livewire.on('deleteColorSize', pivot => {
            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //         if (result.isConfirmed) {

            //             Livewire.emitTo('admin.color-size', 'delete', pivot);

            //             Swal.fire(
            //                 'Deleted!',
            //                 'Your file has been deleted.',
            //                 'success'
            //             )
            //         }
            //     })
            // })
        </script>
    @endpush
</main>
