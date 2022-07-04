<div class="flex relative justify-center items-center h-8 p-1 cursor-pointer mr-3" id="filtro_estado"
    x-data="{ open: false, text: '{{ $sort }}', filtros: ['todos', 'nuevo', 'usado'] }">
    <p @click="open = true" class="w-full h-full text-base text-gray-400" id="cont-orderBy">
        <i id="listaFiltro" class="fas fa-filter"></i>
    </p>
    <ul x-show="open" @click.outside="open = false"
        {{ $attributes->merge(['class' => 'absolute right-0 bg-gray-100 border border-gray-400 top-100-5 z-8']) }}
        id="list-orderBy">
        <template x-for="filtro in filtros">
            <li class="w-full h-8 leading-8 capitalize border-b border-gray-200 hover:text-white hover:bg-black"
                :class="{'text-white bg-black' : (text === filtro) }"
                @click="open = false; text = filtro">
                <a class="inline-block capitalize w-full h-full px-4 py-0 text-sm" href="javascript:void(0)"
                    @click="$wire.set('estado', filtro)" x-text="filtro">
                </a>
            </li>
        </template>
    </ul>
</div>
