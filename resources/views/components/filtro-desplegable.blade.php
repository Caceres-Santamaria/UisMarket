<div {{ $attributes->merge(['class' => "flex relative justify-center items-center h-8 border border-gray-300 p-1 cursor-pointer"]) }}
    id="content__orderBy" x-data="{ open: false, text: '{{ $sort }}' }">
    <p @click="open = true" class="flex flex-row justify-between items-center w-full h-full text-base text-gray-400"
        id="cont-orderBy">
        <span id="orderBy" x-text='text'></span>
        <i id="listaFiltro" class="fas fa-list"></i>
    </p>
    <ul x-show="open" @click.outside="open = false"
        class="absolute top-100-5 right-0 left-0 z-8 border border-gray-400 bg-gray-100" id="list-orderBy">
        @foreach ($filtros as $filtro => $url)
            <li class="h-8 w-full text-black  leading-8 hover:text-white hover:bg-black border-b border-gray-200"
            @click="open = false; text = '{{ $filtro }}'">
                <a class="w-full h-full py-0 px-4 text-sm inline-block"
                    href="javascript:void(0)" wire:click="$set('sort_by', '{{$url}}')">
                    {{ $filtro }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
