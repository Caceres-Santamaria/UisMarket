@props(['estrellas' => 5,'calificaciones' => 24,'sizeestrella' => 'text-2xl','sizecomentario' => 'text-sm','comentario' => ''])

<div {{ $attributes->merge(['class' => "flex items-center mb-2"]) }}>
    <ul class="flex text-sm">
        @for($i = 0; $i < 5; $i++)
            @if($i < $estrellas)
            <li>
                <i class="fas fa-star text-yellow-500 mr-1 {{ $sizeestrella }}"></i>
            </li>
            @else
            <li>
                <i class="fas fa-star mr-1 {{ $sizeestrella }} text-gray-400"></i>
            </li>
            @endif
        @endfor
    </ul>

    <span class="{{ $comentario }} text-gray-700 {{ $sizecomentario }}">({{ $calificaciones }})</span>
</div>
