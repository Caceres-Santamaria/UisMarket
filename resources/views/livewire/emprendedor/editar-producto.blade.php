@push('css')
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}" type="text/css" />
@endpush
@push('scriptHeader')
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script src="{{ asset('js/dropzone-min.js') }}"></script>
@endpush
<main class="grid-in-contenido">
    <header class="bg-white shadow">
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between" x-data>
                <h1 class="text-xl font-semibold leading-tight text-gray-800">
                    Actualizar producto
                </h1>

                <x-boton class="bg-red-500 hover:bg-red-400 active:bg-red-600 focus:border-red-600" :active="true"
                    @click="eliminarProducto">
                    <i class="mr-1 fas fa-trash"></i> Eliminar
                </x-boton>
            </div>
        </div>
    </header>
    <div class="w-full px-4 py-12 mx-auto text-gray-700 md:w-3/4 md:max-w-4xl sm:px-6 lg:px-8">
        {{-- <h1 class="mb-8 text-xl font-semibold text-center md:text-2xl lg:text-3xl">
            Complete esta información para actualizar el producto
        </h1> --}}
        @livewire('emprendedor.estado-producto',['producto' => $producto], key('estado-producto-' . $producto->id))
        <section class="p-6 mb-4 bg-white rounded-lg shadow">
            <div class="mb-4">
                <x-jet-label value="Nombre" />
                <x-jet-input type="text" class="w-full" wire:model="producto.nombre"
                    placeholder="Ingresa el nombre del producto" />
                <x-jet-input-error for="producto.nombre" />
            </div>
            {{-- <div class="mb-4">
                <x-jet-label value="Slug" />
                <x-jet-input type="text" disabled wire:model="slug" class="w-full bg-gray-200"
                    placeholder="Ingresa el slug del producto" />
                <x-jet-input-error for="slug" />
            </div> --}}
            <div class="mb-4">
                <x-jet-label value="Descuento (0-1)" />
                <x-jet-input type="number" wire:model="producto.descuento" class="w-full"
                    placeholder="Ingresa el porcentaje de descuento del producto" min="0" max="1" step="0.01" />
                <x-jet-input-error for="producto.descuento" />
            </div>
            <div class="mb-4">
                <x-jet-label value="Descuento Real" />
                <div class="flex flex-col items-start content-start justify-start w-auto">
                    <span class="flex items-center justify-center w-20 h-8 text-sm font-bold text-white rounded-md lg:text-base bg-producto-descuento lg:w-28">{{ intval(($producto->descuento == '' ? 0 : $producto->descuento) * 100) }}
                        % OFF</span>
                </div>
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
                        class="w-full h-32 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
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
            <div class="grid grid-cols-1 gap-6 mb-4 sm:grid-cols-2">
                <div>
                    <x-jet-label value="Categoría" />
                    <select wire:model="producto.categoria_id"
                        class="w-full border-gray-300 rounded-md shadow-sm form-control focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="" selected disabled>Selecciona una categoría</option>
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
            <div class="flex items-center justify-end mt-4">
                <x-jet-action-message class="mr-3" on="saved">
                    Actualizado
                </x-jet-action-message>
                <x-boton wire:loading.attr="disabled" wire:target="save" wire:click="save">
                    Actualizar producto
                </x-boton>
            </div>
        </section>
        <section class="p-6 mb-4 bg-white rounded-lg shadow-xl" wire:ignore>
            <h2 class="mb-2 text-xl font-semibold text-center">Subir imágenes</h2>
            <div class="flex justify-center px-3 pt-3 pb-3 mt-1 mb-4 border-2 border-gray-300 border-dashed rounded-md">
                <form action="{{ route('tienda.productos.imagenes', $producto) }}" method="POST"
                    class="w-full border-gray-100 rounded-md dropzone border-1" id="my-dropzone"></form>
            </div>
            <x-jet-input-error for="file" />
            <span class="text-xs font-semibold text-yellow-600"><i class="fas fa-exclamation-triangle"></i> Sólo puedes
                adjuntar máximo 10 imágenes de este producto</span>
        </section>
        @if ($producto->imagenes->count() > 0)
            <section class="p-6 mb-4 bg-white rounded-lg shadow-xl">
                <h2 class="mb-2 text-xl font-semibold text-center">Imagenes del producto</h2>
                <ul class="flex flex-wrap justify-center gap-2">
                    @foreach ($producto->imagenes as $imagen)
                        <li class="relative" wire:key="image-{{ $imagen->id }}">
                            <img class="object-cover object-top w-32 h-32" src="{{ Storage::url($imagen->url) }}"
                                alt="">
                            <x-boton :active="true" wire:click="deleteImagen({{ $imagen->id }})"
                                class="absolute bg-red-500 rounded-full right-2 top-2 hover:bg-red-400 active:bg-red-600 focus:border-red-600"
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
</main>
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
        Livewire.on('eliminarPivot', pivot => {
            confirmacionAlert(event, '¡Sí, eliminar!', 'Esta acción no se podrá revertir',
                'No se ha eliminado el color', null, 'emprendedor.color-producto', pivot);
        });

        Livewire.on('eliminarTalla', pivot => {
            confirmacionAlert(event, '¡Sí, eliminar!', 'Esta acción no se podrá revertir',
                'No se ha eliminado la talla', null, 'emprendedor.talla-producto', pivot);
        });

        const eliminarProducto = () => {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            });

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: 'El producto quedará eliminado temporalmente hasta que lo elimine definitivamente o lo restaure',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('tienda.productos.delete',['producto' => $producto]) }}";
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        'Cancelado',
                        'No se ha eliminado el producto',
                        'error'
                    );
                }
            });
        };
    </script>
@endpush
