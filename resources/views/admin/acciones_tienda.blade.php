@if (!$tienda->trashed())
    <x-boton class="focus:border-red-600 hover:bg-red-400 active:bg-red-600  h-10 w-28 bg-red-500" active="true"
        onclick="confirmacionUserAlert({{ $tienda->id }}, 'inhabilitar', 'La tienda quedará inhabilitada')">
        Inhabilitar</x-boton>


@else
    <x-boton class="h-10 w-28"
        onclick="confirmacionUserAlert({{ $tienda->id }}, 'habilitar', 'La tienda quedará habilitada')">Habilitar
    </x-boton>
@endif
<x-boton-enlace wire:loading.attr="disabled" href="{{route('admin.comentarios', $tienda)}}"
    class="focus:border-yellow-600
        hover:bg-yellow-400 active:bg-yellow-600 h-9 w-28 bg-yellow-500 mx-3" active="true">
    Comentarios
</x-boton-enlace>
