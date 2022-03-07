<x-boton class=" h-9 w-24 " onclick="accion('restaurar',{{$producto->id}})">Restaurar</x-boton>
<x-boton active="true" class="focus:border-red-600 hover:bg-red-400 active:bg-red-600  h-9 w-24 bg-red-500" onclick="accion('eliminar',{{$producto->id}})">Eliminar</x-boton>
