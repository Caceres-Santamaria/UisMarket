<x-boton class=" h-9 w-24 " onclick="confirmacionUserAlert({{$producto->id}}, 'habilitar', 'El producto quedará habilitado')">Habilitar</x-boton>
<x-boton active="true" class="focus:border-red-600 hover:bg-red-400 active:bg-red-600  h-9 w-24 bg-red-500" onclick="confirmacionUserAlert({{$producto->id}}, 'inhabilitar', 'El producto será eliminado permanentemente', 'eliminarDef')">Eliminar</x-boton>
