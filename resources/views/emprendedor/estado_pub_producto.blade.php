@if ($producto->publicacion == 1)
<span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
  Borrador
</span>
@else
    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
  Publicado
</span>
@endif