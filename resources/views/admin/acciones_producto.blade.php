
@if($producto->publicacion == '2')
<x-boton class="focus:border-yellow-600 hover:bg-yellow-400 active:bg-yellow-600 px-2 h-10 bg-yellow-500" active="true" onclick="suspender({{$producto->id}})">Suspender</x-boton>
@elseif ($producto->publicacion == '3')
<x-boton class="px-2 h-10" onclick="aprobar({{$producto->id}})">Aprobar</x-boton>
@endif
<x-boton-enlace href="{{ route('productos.show',$producto) }}" target="_blank" class="focus:border-blue-600 hover:bg-blue-400 active:bg-blue-600 h-10 px-2 bg-blue-500" active="true" >Ver</x-boton-enlace>
