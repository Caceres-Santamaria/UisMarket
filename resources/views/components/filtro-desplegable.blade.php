<div {{ $attributes->merge(['class' => "flex relative justify-center items-center h-8 border border-gray-300 p-1 cursor-pointer"]) }}
    id="content__orderBy" x-data="{ open: false, text: '{{ $sort }}', filtros: '{{ implode(",",$filtros) }}'.split(','), keys: '{{ implode(",",$keys) }}'.split(',')  }">
    <p @click="open = true" class="flex flex-row items-center justify-between w-full h-full text-base text-gray-400"
        id="cont-orderBy">
        <span class="hidden sm:flex lg:flex" id="orderBy" x-text='text'></span>
        <i id="listaFiltro" class="fas fa-list"></i>
    </p>
    <ul x-show="open" @click.outside="open = false"
        class="absolute  right-0 w-48 sm:w-52 bg-gray-100 border border-gray-400 top-100-5 z-8" id="list-orderBy">
        <template x-for="(filtro, key) in filtros">
            <li class="w-full h-8 leading-8 border-b border-gray-200 hover:text-white hover:bg-black"
            :class="{'text-white bg-black' : (text === filtro) }"
            @click="open = false; text = filtro">
                <a class="inline-block w-full h-full px-4 py-0 text-sm"
                    @click.prevent="$wire.set('sort_by', keys[key])" x-text="filtro">
                </a>
            </li>
        </template>
    </ul>
</div>
