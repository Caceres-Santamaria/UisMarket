@if (!$user->trashed())
    <x-boton class="h-10 bg-red-500 focus:border-red-600 hover:bg-red-400 active:bg-red-600 w-28" active="true"
        onclick="confirmacionUserAlert({{ $user->id }}, 'inhabilitar', 'El usuario quedará inhabilitado')">
        Inhabilitar</x-boton>
@else
    <x-boton class="h-10  w-28"
        onclick="confirmacionUserAlert({{ $user->id }}, 'habilitar', 'El usuario quedará habilitado')">Habilitar
    </x-boton>
@endif
