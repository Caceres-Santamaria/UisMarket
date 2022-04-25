<div class="ml-auto">
    <x-boton class="bg-yellow-400 hover:bg-yellow-300 active:bg-yellow-500 focus:border-yellow-500 p-1 md:p-2"
        wire:loading.attr="disabled" wire:click="$set('modal',true)">
        @if ($calificacion->id)
            Ver Calificación
        @else
            Calificar pedido
        @endif
    </x-boton>
    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            <h1>Calificación del pedido</h1>
        </x-slot>
        <x-slot name="content">
            <div class="mb-4 bg-white rounded-lg shadow p-6">
                <x-jet-label value="Calificación" />
                <form class=" m-0 w-full h-10">
                    <p class="clasificacion text-left">
                        <input wire:model="calificacion.calificacion" class="hidden" id="radio1" type="radio"
                            name="calificacion" value="5">
                        <label class="cursor-pointer estrella text-2xl text-gray-400" for="radio1">★</label>
                        <input wire:model="calificacion.calificacion" class="hidden" id="radio2" type="radio"
                            name="calificacion" value="4">
                        <label class="cursor-pointer estrella text-2xl text-gray-400" for="radio2">★</label>
                        <input wire:model="calificacion.calificacion" class="hidden" id="radio3" type="radio"
                            name="calificacion" value="3">
                        <label class="cursor-pointer estrella text-2xl text-gray-400" for="radio3">★</label>
                        <input wire:model="calificacion.calificacion" class="hidden" id="radio4" type="radio"
                            name="calificacion" value="2">
                        <label class="cursor-pointer estrella text-2xl text-gray-400" for="radio4">★</label>
                        <input wire:model="calificacion.calificacion" class="hidden" id="radio5" type="radio"
                            name="calificacion" value="1">
                        <label class="cursor-pointer estrella text-2xl text-gray-400" for="radio5">★</label>
                    </p>
                </form>
                <x-jet-input-error for="calificacion.calificacion" />
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <div wire:ignore>
                    <x-jet-label value="Comentario" />
                    <textarea wire:model='calificacion.contenido' maxlength="191"
                        class=" w-full h-32 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
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
                        @this.set('calificacion.contenido', editor.getData())
                    })
                } )
                .catch( error => {
                    console.error( error );
                } );" x-ref="editor">
                </textarea>
                </div>
                <x-jet-input-error for="calificacion.contenido" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-boton wire:loading.attr="disabled" wire:click="guardar">
                {{ __('Guardar') }}
            </x-boton>
            <x-jet-button wire:loading.attr="disabled" wire:click="cancelar">
                {{ __('Cancel') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
