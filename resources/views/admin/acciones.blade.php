
@if(!$user->trashed())
  <x-boton class=" h-10 w-28 bg-red-500" onclick="confirmacionUserAlert({{$user->id}}, 'inhabilitar', 'El usuario quedará inhabilitado')">Inhabilitar</x-boton>
@else
  <x-boton class=" h-10 w-28" onclick="confirmacionUserAlert({{$user->id}}, 'habilitar', 'El usuario quedará habilitado')">Habilitar</x-boton>
@endif

{{-- wire:click="eliminar({{$user->id}})" --}}