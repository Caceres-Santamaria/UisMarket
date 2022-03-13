<x-boton wire:click="$emitUp('verCarnet','{{$tienda->slug}}')"
    class="focus:border-blue-600 hover:bg-blue-400 active:bg-blue-600 h-10 px-2 bg-blue-500" active="true">Ver
</x-boton>

<x-boton class="px-2 h-10" onclick="aprobar('{{ $tienda->slug }}')">Aprobar</x-boton>
