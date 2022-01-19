@if(!$categoria->trashed())
<x-boton class="focus:border-red-600 hover:bg-red-400 active:bg-red-600  h-9 w-24 bg-red-500" onclick="confirmacionUserAlert({{$categoria->id}}, 'inhabilitar', 'La categoria quedará inhabilitada')">Inhabilitar</x-boton>
<x-boton class="focus:border-blue-600 hover:bg-blue-400 active:bg-blue-600  h-9 w-24 bg-blue-500 mx-3" >Editar</x-boton>

@else
<x-boton class="focus:border-red-600 hover:bg-red-400 active:bg-red-600  h-9 w-24" onclick="confirmacionUserAlert({{$categoria->id}}, 'habilitar', 'La categoria quedará habilitada')">Habilitar</x-boton>
<x-boton class="focus:border-blue-600 hover:bg-blue-400 active:bg-blue-600 h-9 w-24 bg-blue-500 mx-3" >Editar</x-boton>

@endif
