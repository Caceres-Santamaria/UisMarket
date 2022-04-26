@if(empty($producto->imagenes->all()))
<span class="h-8 w-8 md:h-10 md:w-10 lg:h-14 lg:w-14 flex items-center justify-center rounded-full border border-gray-300">
    <i class="fas fa-tshirt"></i>
</span>
@else
<img class="h-8 w-8 md:h-10 md:w-10 lg:h-14 lg:w-14 object-cover rounded-lg" src="{{ Storage::url($producto->imagenes[0]->url) }}" alt="">
@endif

