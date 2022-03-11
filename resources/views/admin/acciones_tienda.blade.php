{{-- @if (!$tienda->trashed())
    <x-boton class="focus:border-red-600 hover:bg-red-400 active:bg-red-600  h-10 w-28 bg-red-500" active="true"
        onclick="confirmacionUserAlert({{ $tienda->id }}, 'inhabilitar', 'La tienda quedará inhabilitada')">
        Inhabilitar
    </x-boton>
@else
    <x-boton class="h-10 w-28"
        onclick="confirmacionUserAlert({{ $tienda->id }}, 'habilitar', 'La tienda quedará habilitada')">Habilitar
    </x-boton>
@endif
--}}

<x-boton-enlace href="{{ route('tiendas.show', $tienda) }}" target="_blank"
    class="focus:border-blue-600 hover:bg-blue-400 active:bg-blue-600 h-10 px-2 bg-blue-500" active="true">Ver
</x-boton-enlace>

@if ($tienda->estado == '1')
    <x-boton-enlace wire:loading.attr="disabled" href="{{ route('admin.comentarios', $tienda) }}"
        class="focus:border-yellow-600
        hover:bg-yellow-400 active:bg-yellow-600 h-9 w-28 bg-yellow-500 mx-3"
        active="true">
        Comentarios
    </x-boton-enlace>
    <x-boton class="focus:border-red-600 hover:bg-red-400 active:bg-red-600 px-2 h-10 bg-red-500" active="true"
        onclick="suspender({{ $tienda->id }})">Suspender</x-boton>

@elseif ($tienda->estado == '2')
    <x-boton class="px-2 h-10" onclick="aprobar({{ $tienda->id }})">Aprobar</x-boton>
@endif
