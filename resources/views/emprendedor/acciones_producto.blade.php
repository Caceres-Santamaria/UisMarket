
@if(!$producto->trashed())
<x-boton class=" h-10 w-28 bg-red-500" onclick="confirmacionUserAlert({{$producto->id}}, 'inhabilitar', 'El producto quedará inhabilitado')">Inhabilitar</x-boton>
<x-boton class="h-9 w-24 bg-blue-500 mx-3" >Editar</x-boton>

@else
<x-boton class=" h-10 w-28" onclick="confirmacionUserAlert({{$producto->id}}, 'habilitar', 'El producto quedará habilitado')">Habilitar</x-boton>
<x-boton class="h-9 w-24 bg-blue-500 mx-3" >Editar</x-boton>

@endif
