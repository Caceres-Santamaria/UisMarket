@push('scriptHeader')
    <script src="{{ asset('js/ckeditor.js') }}"></script>
@endpush
<div class="grid-in-contenido w-11/12 mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">
        {{ $tienda->id == null? 'Completa esta información para crear tu tienda': 'Completa esta información para modificar tu tienda' }}
    </h1>
    <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6 md:grid md:grid-cols-2 md:gap-x-12 md:gap-y-5">
        <h2 class="text-xl font-semibold mb-4 md:col-span-2">Información de la tienda</h2>
        <div class="w-full mb-5 md:mb-0">
            <x-jet-label value="Nombre*" />
            <x-jet-input type="text" class="w-full" wire:model="tienda.nombre"
                placeholder="Ingresa el nombre de la tienda" />
            <x-jet-input-error for="tienda.nombre" class="mt-2" />
        </div>
        <div class="w-full mb-5 md:mb-0">
            <x-jet-label value="Número de contacto*" />
            <x-jet-input type="number" class="w-full" wire:model="tienda.telefono"
                placeholder="Ingresa el número de contacto" />
            <x-jet-input-error for="tienda.telefono" class="mt-2" />
        </div>
        <div class="w-full mb-5 md:mb-0">
            <x-jet-label value="Departamento*" />
            <select class="form-control w-full" wire:model="departamento_id">
                <option value="" disabled selected>Selecciona un Departamento {{-- $departamento_id==''?'selected':'' --}}
                </option>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}">{{ $departamento->nombre }} {{-- $departamento_id==$departamento->id?'selected':'' --}}
                    </option>
                @endforeach
            </select>
            <x-jet-input-error for="departamento_id" />
        </div>
        <div class="w-full mb-5 md:mb-0">
            <x-jet-label value="Ciudad*" />
            <select class="form-control w-full" wire:model="tienda.ciudad_id">
                <option value="" disabled selected>Selecciona una ciudad {{-- $tienda->ciudad_id==''?'selected':'' --}}
                </option>
                @foreach ($ciudade as $ciudad)
                    <option value="{{ $ciudad->id }}"> {{-- $tienda->ciudad_id==$ciudad->id?'selected':'' --}}
                        {{ $ciudad->nombre }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="tienda.ciudad_id" />
        </div>
        <div class="w-full mb-5 md:mb-0">
            <x-jet-label value="Dirección" />
            <x-jet-input name="direccion" type="text" class="w-full" wire:model="tienda.direccion"
                placeholder="Ingresa la dirección de la tienda" />
            <x-jet-input-error for="tienda.direccion" class="mt-2" />
        </div>
        <div class="w-full mb-5 md:mb-0">
            <x-jet-label value="Correo electrónico*" />
            <x-jet-input type="text" class="w-full" wire:model="tienda.email"
                placeholder="Ingresa el correo electrónico de contacto" />
            <x-jet-input-error for="tienda.email" class="mt-2" />
        </div>
        <div class="w-full mb-5 md:mb-0">
            <x-jet-label value="Logo de la tienda" />
            <x-select-image wire:model="logo" :image="$logo" :existing="$tienda->logo" />
            <x-jet-input-error for="logo" class="mt-2" />
        </div>
        <div class="w-full mb-5 md:mb-0">
            <x-jet-label value="Portada de la tienda" />
            <x-select-image wire:model="portada" :image="$portada" :existing="$tienda->fondo_img" />
            <x-jet-input-error for="portada" class="mt-2" />
        </div>
        <div class="w-full md:col-span-2 mb-5 md:mb-0">
            <div wire:ignore class=" h-48">
                <x-jet-label value="Descripción de la tienda*" />
                <textarea class="w-full form-control " wire:model.defer="tienda.descripcion" x-ref="editor" x-data
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
                        .then(editor => {
                            editor.model.document.on('change:data', () => {
                                @this.set('tienda.descripcion', editor.getData())
                            })
                        })
                        .catch(error => {
                            console.error(error);
                        });">
                </textarea>
            </div>
            <x-jet-input-error for="tienda.descripcion" />
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6 ">
        <h2 class="text-xl font-semibold mb-4 col-span-2">Validación</h2>
        <div class="w-full mb-5 md:mb-0">
            <x-jet-label class="mb-2"
                value="Para verificar que perteneces a la comunidad UIS por favor adjunta un documento que lo valide. Ej: foto del carnet*" />
            <x-select-image wire:model="carnet" :image="$carnet" :existing="$tienda->carnet" />
            <x-jet-input-error for="carnet" class="mt-2" />
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6 ">
        <h2 class="text-xl font-semibold mb-4 col-span-2">Envíos</h2>
        @if ($tienda->direccion == '')
            <div class="mb-8">
                <x-jet-label value="¿Tus productos se pueden recoger en la tienda física?*" />
                <div class="flex gap-2">
                    <x-jet-label>
                        <input class="mx-2 " disabled type="radio" name="recoger_tienda"
                            wire:model="tienda.recoger_tienda" value="1">Sí
                    </x-jet-label>
                    <x-jet-label>
                        <input class="mx-2 " disabled type="radio" name="recoger_tienda"
                            wire:model="tienda.recoger_tienda" value="0">No
                    </x-jet-label>
                </div>
                <x-jet-input-error for="tienda.recoger_tienda" />
                <span class="text-red-500 text-sm">¡Escribe una dirección para habilitar esta opción!</span>
            </div>
        @else
            <div class="mb-8">
                <x-jet-label value="¿Tus productos se pueden recoger en la tienda física?*" />
                <div class="flex gap-2">
                    <x-jet-label>
                        <input class="mx-2" type="radio" name="recoger_tienda"
                            wire:model="tienda.recoger_tienda" value="1">Sí
                    </x-jet-label>
                    <x-jet-label>
                        <input class="mx-2" type="radio" name="recoger_tienda"
                            wire:model="tienda.recoger_tienda" value="0">No
                    </x-jet-label>
                </div>
                <x-jet-input-error for="tienda.recoger_tienda" />
            </div>
        @endif
        <div class="mb-8">
            <x-jet-label value="¿Tus productos se pueden entregar en el campus principal de la UIS?*" />
            <div class="flex gap-2">
                <x-jet-label>
                    <input class="mx-2 " type="radio" name="recoger_uis" wire:model="tienda.recoger_uis"
                        value="1">Sí
                </x-jet-label>
                <x-jet-label>
                    <input class="mx-2 " type="radio" name="recoger_uis" wire:model="tienda.recoger_uis"
                        value="0">No
                </x-jet-label>
            </div>
        </div>
        <div class="mb-4">
            <x-jet-label value="Costo de envío*" class="pb-3 md:pb-0" />
            <x-jet-input-error for="costos" class="mt-2" />
            <div class="md:grid md:grid-cols-2  md:gap-x-12 md:gap-y-5" x-data>
                @foreach ($ciudades as $clave => $valor)
                    <div class="w-full mb-5 md:mb-0">
                        <x-jet-label value="{{ $valor }}*" />
                        <x-jet-input id="costo" type="number" min=0 class="w-full"
                            x-ref="costo{{ $clave }}"
                            x-on:keyup="$wire.modificarCosto({{ $clave }},$refs.costo{{ $clave }}.value,'{{ $valor }}')"
                            placeholder="Ingresa el costo de envío de sus productos" :value="$costos[$clave]" />
                        <x-jet-input-error for="costo-{{ $clave }}" class="mt-2" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6 md:grid md:grid-cols-2  md:gap-x-12 md:gap-y-5">
        <p class="text-xl font-semibold mb-4 col-span-2">Redes sociales</p>
        <div class="w-full mb-5 md:mb-0">
            <x-jet-label value="Link de Facebook" />
            <x-jet-input type="text" class="w-11/12" wire:model="tienda.facebook"
                title="Ingresa el link de facebook" placeholder="Ingresa el link de facebook" />
            <x-jet-input-error for="tienda.facebook" class="mt-2" />
        </div>
        <div class="w-full mb-5 md:mb-0">
            <x-jet-label value="Link de Messenger" />
            <x-jet-input type="text" class="w-11/12" wire:model="tienda.messenger"
                title="m.me/NombreUsuario ó messenger.com/t/NombreUsuario" placeholder="m.me/NombreUsuario" />
            <x-jet-input-error for="tienda.facebook" class="mt-2" />
        </div>
        <div class="w-full mb-5 md:mb-0">
            <x-jet-label value="Número de Whatsapp" />
            <x-jet-input type="text" class="w-11/12" wire:model="tienda.whatsapp" title="Número de whatsapp"
                placeholder="Ingresa el número de contacto" />
            <x-jet-input-error for="tienda.whatsapp" class="mt-2" />
        </div>
        <div class="w-full mb-5 md:mb-0">
            <x-jet-label value="Usuario de Instagram" />
            <x-jet-input type="text" class="w-11/12" wire:model="tienda.instagram"
                title="Usuario de Instagram sin (@)" placeholder="Ingresa el usuario sin arroba (@)" />
            <x-jet-input-error for="tienda.instagram" class="mt-2" />
        </div>
    </div>
    <div class="flex mt-4">
        <x-boton wire:click="save" class=" h-10 w-full" wire:loading.attr="disabled">
            {{ $tienda->id == null ? 'Crear tienda' : 'Actualizar tienda' }}
        </x-boton>
    </div>
    @if ($tienda->id == null)
        <script>
            window.addEventListener('DOMContentLoaded', e => {
                const inputs = document.querySelectorAll('#costo');
                inputs.forEach(elemento => {
                    elemento.value = "";
                })
            });
        </script>
    @endif
</div>
