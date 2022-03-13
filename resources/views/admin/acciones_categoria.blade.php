@if(!$categoria->trashed())
<x-boton active="true" class="w-24 bg-red-500 focus:border-red-600 hover:bg-red-400 active:bg-red-600 h-9" onclick="confirmacionUserAlert({{$categoria->id}}, 'inhabilitar', 'La categoria quedará inhabilitada')">Inhabilitar</x-boton>
@else
<x-boton class="w-24 h-9" onclick="confirmacionUserAlert({{$categoria->id}}, 'habilitar', 'La categoria quedará habilitada')">Habilitar</x-boton>
@endif
<x-boton active="true" class="w-24 mx-3 bg-blue-500 focus:border-blue-600 hover:bg-blue-400 active:bg-blue-600 h-9" x-on:click="$wire.emitUp('recibirCategoria','{{ $categoria->slug }}'); setTimeout(()=>{if (obtener_pixeles_inicio() > 0) {requestAnimationFrame(ir_arriba);scrollTo(0, obtener_pixeles_inicio() - (obtener_pixeles_inicio() / 10));}},500);">Editar</x-boton>
