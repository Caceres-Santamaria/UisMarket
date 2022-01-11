
@if(!$tienda->trashed())
<x-boton class=" h-10 w-28 bg-red-500" onclick="confirmacionUserAlert({{$tienda->id}}, 'inhabilitar', 'La tienda quedará inhabilitada')">Inhabilitar</x-boton>
@else
<x-boton class=" h-10 w-28" onclick="confirmacionUserAlert({{$tienda->id}}, 'habilitar', 'La tienda quedará habilitada')">Habilitar</x-boton>
@endif
