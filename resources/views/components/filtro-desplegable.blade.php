<div {{ $attributes->merge(['class' => "flex relative justify-center items-center h-8 border border-gray-300 p-1 cursor-pointer"]) }}
    id="content__orderBy" x-data="{ open: false, text: '{{ $sort }}' }">
    <p @click="open = true" class="flex flex-row items-center justify-between w-full h-full text-base text-gray-400"
        id="cont-orderBy">
        <span id="orderBy" x-text='text'></span>
        <i id="listaFiltro" class="fas fa-list"></i>
    </p>
    <ul x-show="open" @click.outside="open = false"
        class="absolute left-0 right-0 bg-gray-100 border border-gray-400 top-100-5 z-8" id="list-orderBy">
        @foreach ($filtros as $filtro => $url)
            <li class="w-full h-8 leading-8 text-black border-b border-gray-200 hover:text-white hover:bg-black"
            @click="open = false; text = '{{ $filtro }}'">
                <a class="inline-block w-full h-full px-4 py-0 text-sm"
                    href="javascript:void(0)" wire:click="$set('sort_by', '{{$url}}')">
                    {{ $filtro }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
