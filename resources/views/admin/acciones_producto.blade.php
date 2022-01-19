
@if(!$producto->trashed())
<x-boton class="focus:border-red-600 hover:bg-red-400 active:bg-red-600 h-10 w-28 bg-red-500" onclick="confirmacionUserAlert({{$producto->id}}, 'inhabilitar', 'El producto quedará inhabilitado')">Inhabilitar</x-boton>
@else
<x-boton class="focus:border-red-600 hover:bg-red-400 active:bg-red-600 h-10 w-28" onclick="confirmacionUserAlert({{$producto->id}}, 'habilitar', 'El producto quedará habilitado')">Habilitar</x-boton>
@endif
