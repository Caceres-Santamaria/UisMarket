<x-boton wire:click="$emitUp('verCarnet','{{ $tienda->slug }}')"
    class="focus:border-blue-600 hover:bg-blue-400 active:bg-blue-600 h-10 px-2 bg-blue-500" active="true"><i class="fas fa-eye"></i>
</x-boton>

<x-boton class="px-2 h-10" onclick="aprobar('{{ $tienda->slug }}')"><i class="fas fa-check"></i></x-boton>

<x-boton class="focus:border-red-600 hover:bg-red-400 active:bg-red-600 px-2 h-10 bg-red-500" active="true"
    onclick="rechazar('{{ $tienda->slug }}')"><i class="fas fa-times"></i></x-boton>
