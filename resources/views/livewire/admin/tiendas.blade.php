<div
    class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-full  relative bg-white rounded-md p-4 border border-gray-400 shadow-md">

    @livewire('admin.tabla-tiendas')
    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            <h1 class="font-bold text-lg">Comentarios de la tienda: {{ $tienda->nombre }}</h1>
        </x-slot>
        <x-slot name="content">
            <div class="bg-white rounded-lg shadow p-6">
              {{-- @php($calificaciones = $tienda->calificaciones()->where('contenido','<>', null)->paginate(1)) --}}
                @forelse ($tienda->calificaciones()->where('contenido','<>', null)->paginate(1) as $calificacion)
                    <div class="w-full border border-gray-300 mb-8 p-3 flex justify-between items-center">
                        <div class="border-r border-gray-200">
                            <div class="mx-3 mb-1 text-base lg:text-base justify-start p-1">
                                {!! $calificacion->contenido !!}
                            </div>
                            <p class="font-bold flex flex-col text-xs text-gray-700 items-end pr-2">
                                <span>{{ $calificacion->pedido->usuario->name }}</span>
                                <span>{{ $calificacion->pedido->usuario->email }}</span>
                            </p>
                        </div>
                        <div class="p-2">
                            <x-boton wire:click="eliminar({{ $calificacion->id }})"
                                class="focus:border-red-600 hover:bg-red-400 active:bg-red-600  h-9 w-9 bg-red-500" active="true">
                                <i class="fas fa-trash-alt text-white text-lg"></i>
                            </x-boton>
                        </div>
                    </div>
                @empty
                    <article class="w-full flex flex-col justify-center items-center px-0 py-4">
                        <figure>
                            <x-svg.vacio />
                        </figure>
                        <span class="block sm:inline text-base lg:text-lg">Esta tienda no tiene comentarios</span>
                    </article>
                @endforelse
                @empty(!$tienda->calificaciones()->where('contenido','<>', null)->paginate(1))
                    <div class="m-4">
                        {{ $tienda->calificaciones()->where('contenido','<>', null)->paginate(1)->links() }}
                    </div>
                @endempty
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:loading.attr="disabled" wire:click="$set('modal', false)">
                {{ __('Cancel') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    <script>
        window.addEventListener('successTiendaAlert', (e) => {
            successUserAlert(e.detail);
        });
    </script>
</div>
