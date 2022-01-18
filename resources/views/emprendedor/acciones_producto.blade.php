
@if(!$producto->trashed())
<x-boton class="bg-red-500 hover:bg-red-400 active:bg-red-600 focus:border-red-600" :active="true" onclick="confirmacionUserAlert({{$producto->id}}, 'inhabilitar', 'El producto quedará inhabilitado')">Inhabilitar</x-boton>
@else
<x-boton onclick="confirmacionUserAlert({{$producto->id}}, 'habilitar', 'El producto quedará habilitado')">Habilitar</x-boton>
@endif
<x-boton-enlace class="bg-blue-500 hover:bg-blue-400 active:bg-blue-600 focus:border-blue-600 mx-3" :active="true" :href="route('tienda.productos.editar',$producto)">Editar</x-boton>
