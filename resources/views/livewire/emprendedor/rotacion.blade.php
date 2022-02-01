<main class="grid-in-contenido px-4 py-4 md:px-6 md:py-6">
    <div
        class="max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-full  relative bg-white rounded-md p-4 border border-gray-400 shadow-md">
        <div>
            <div wire:offline.class.remove="hidden" class="hidden">
                <div class="rounded-md bg-red-100 p-4 mb-4 dark:border-red-800 dark:bg-red-500">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800 dark:text-white">
                                No está conectado a Internet. </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-col">
                <div>
                    @if ($cantidad != null)
                        <div class="md:mb-4 px-6 py-2 md:p-0">
                            <small class="text-gray-700 dark:text-white">Ordenamineto Aplicado:</small>
                            <span wire:key="sorting-pill-cantidad"
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-indigo-100 text-indigo-800 capitalize dark:bg-indigo-200 dark:text-indigo-900">
                                @if ($cantidad == 'asc')
                                    Cantidad: Menor-Mayor
                                @endif
                                @if ($cantidad == 'desc')
                                    Cantidad: Mayor-Menor
                                @endif
                                <button wire:click="resetCantidad" type="button"
                                    class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-indigo-400 hover:bg-indigo-200 hover:text-indigo-500 focus:outline-none focus:bg-indigo-500 focus:text-white">
                                    <span class="sr-only">Remover opción de ordenamineto</span>
                                    <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                        <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"></path>
                                    </svg>
                                </button>
                            </span>
                            <button wire:click.prevent="resetCantidad" class="focus:outline-none active:outline-none">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-200 dark:text-gray-900">
                                    Borrar
                                </span>
                            </button>
                        </div>
                    @endif
                </div>
                <div>
                    @if ($fecha_desde != null or $fecha_hasta != null)
                        <div class="md:mb-4 px-6 py-2 md:p-0">
                            <small class="text-gray-700 dark:text-white">Filtros aplicados:</small>
                            @if ($fecha_desde)
                                <span wire:key="filter-pill-verified_from"
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-indigo-100 text-indigo-800 capitalize dark:bg-indigo-200 dark:text-indigo-900">
                                    Fecha Desde:
                                    {{ $fecha_desde }}
                                    <button wire:click="removeFilter('desde')" type="button"
                                        class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-indigo-400 hover:bg-indigo-200 hover:text-indigo-500 focus:outline-none focus:bg-indigo-500 focus:text-white">
                                        <span class="sr-only">Remove filter option</span>
                                        <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                            <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"></path>
                                        </svg>
                                    </button>
                                </span>
                            @endif
                            @if ($fecha_hasta)
                                <span wire:key="filter-pill-verified_to"
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-indigo-100 text-indigo-800 capitalize dark:bg-indigo-200 dark:text-indigo-900">
                                    Fecha Hasta:
                                    {{ $fecha_hasta }}
                                    <button wire:click="removeFilter('hasta')" type="button"
                                        class="flex-shrink-0 ml-0.5 h-4 w-4 rounded-full inline-flex items-center justify-center text-indigo-400 hover:bg-indigo-200 hover:text-indigo-500 focus:outline-none focus:bg-indigo-500 focus:text-white">
                                        <span class="sr-only">Remove filter option</span>
                                        <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                                            <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7"></path>
                                        </svg>
                                    </button>
                                </span>
                            @endif
                            <button class="focus:outline-none active:outline-none" wire:click.prevent="resetFilters">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-200 dark:text-gray-900">
                                    Borrar
                                </span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="space-y-4">
                    <div class="md:flex md:justify-between px-6 py-2 md:p-0">
                        <div class="w-full mb-4 md:mb-0 md:w-2/4 md:flex space-y-4 md:space-y-0 md:space-x-2">
                            <div class="flex rounded-md shadow-sm">
                                <input wire:model="search" placeholder="Buscar" type="text"
                                    class="block w-full border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 dark:bg-gray-700 dark:text-white dark:border-gray-600 {{ $search != null ? 'rounded-none rounded-l-md focus:ring-0 focus:border-gray-300' : 'focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md' }}">
                                @if ($search != null)
                                    <span wire:click="$set('search', null)"
                                        class="inline-flex items-center px-3 text-gray-500 bg-gray-50 rounded-r-md border border-l-0 border-gray-300 cursor-pointer sm:text-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </span>
                                @endif
                            </div>
                            <div wire:ignore class="relative block md:inline-block text-left">
                                <div x-data="{ fechas: false }" x-on:keydown.escape.stop="fechas = false"
                                    x-on:mousedown.away="fechas = false">
                                    <div>
                                        <button type="button"
                                            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600"
                                            id="filters-menu" x-on:click="fechas = !fechas" aria-haspopup="true"
                                            x-bind:aria-expanded="fechas">
                                            Filtro
                                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div x-show="fechas" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="origin-top-right absolute right-0 mt-2 w-full md:w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none z-8 dark:bg-gray-700 dark:text-white dark:divide-gray-600"
                                        role="menu" aria-orientation="vertical" aria-labelledby="filters-menu"
                                        style="display: none;">
                                        <div class="py-1" role="none">
                                            <div class="block px-4 py-2 text-sm text-gray-700" role="menuitem">
                                                <label for="filter-verified_from"
                                                    class="block text-sm font-medium leading-5 text-gray-700 dark:text-white">
                                                    Fecha de inicio
                                                </label>
                                                <div class="flex rounded-md shadow-sm mt-1">
                                                    <input wire:model.stop="fecha_desde" wire:key="filter-verified_from"
                                                        id="filter-verified_from" type="date"
                                                        class="block w-full border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white dark:border-gray-600">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-1" role="none">
                                            <div class="block px-4 py-2 text-sm text-gray-700" role="menuitem">
                                                <label for="filter-verified_to"
                                                    class="block text-sm font-medium leading-5 text-gray-700 dark:text-white">
                                                    Fecha fin
                                                </label>
                                                <div class="flex rounded-md shadow-sm mt-1">
                                                    <input wire:model.stop="fecha_hasta" wire:key="filter-verified_to"
                                                        id="filter-verified_to" type="date"
                                                        class="block w-full border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white dark:border-gray-600">
                                                </div>
                                            </div>
                                        </div>
                                        @if ($fecha_desde != null or $fecha_hasta != null)
                                            <div class="py-1" role="none">
                                                <div class="block px-4 py-2 text-sm text-gray-700 dark:text-white"
                                                    role="menuitem">
                                                    <button wire:click.prevent="resetFilters"
                                                        x-on:click="fechas = false" type="button"
                                                        class="w-full inline-flex items-center justify-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:hover:border-gray-500">
                                                        Limpiar
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <x-jet-input-error for="fecha_desde" />
                            <x-jet-input-error for="fecha_hasta" />
                        </div>
                    </div>
                    <div
                        class="align-middle min-w-full overflow-x-auto shadow overflow-hidden rounded-none md:rounded-lg">
                        <table class='min-w-full divide-y divide-gray-200 dark:divide-none'>
                            <thead>
                                <tr>
                                    <th class="px-3 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800">
                                        <span
                                            class="block text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                            Imágen
                                        </span>
                                    </th>
                                    <th class="px-3 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800">
                                        <span
                                            class="block text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                            Nombre
                                        </span>
                                    </th>
                                    <th class="px-3 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800">
                                        <span
                                            class="block text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                            Talla
                                        </span>
                                    </th>
                                    <th class="px-3 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800">
                                        <span
                                            class="block text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                            Color
                                        </span>
                                    </th>
                                    <th class="px-3 py-2 md:px-6 md:py-3 bg-gray-50 dark:bg-gray-800">
                                        <button wire:click="sortBy()"
                                            class="flex items-center space-x-1 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider group focus:outline-none focus:underline dark:text-gray-400">
                                            <span>Cantidad</span>
                                            @if ($cantidad == null)
                                                <span class="relative flex items-center">
                                                    <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                    </svg>
                                                </span>
                                            @elseif ($cantidad == 'asc')
                                                <span class="relative flex items-center">
                                                    <svg class="w-3 h-3 group-hover:opacity-0" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                    </svg>
                                                    <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 absolute"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                </span>
                                            @else
                                                <span class="relative flex items-center">
                                                    <div class="opacity-0 group-hover:opacity-100 absolute">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                        </svg>
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                        </svg>
                                                    </div>
                                                    <svg class="w-3 h-3 group-hover:opacity-0" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                </span>
                                            @endif
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-none">
                                @forelse ($detalle as $item)
                                    <tr class="bg-white dark:bg-gray-700 dark:text-white"
                                        wire:loading.class.delay="opacity-50 dark:bg-gray-900 dark:opacity-60" id="">
                                        <td class="whitespace-nowrap px-3 py-2 md:px-6 md:py-4 text-sm leading-5 text-gray-900 dark:text-white"
                                            id="">
                                            <img class="h-10 w-10 md:h-12 md:w-12 lg:h-14 lg:w-14 object-cover rounded-lg"
                                                src="{{ asset($item?->imagen) }}" alt="">
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-2 md:px-6 md:py-4 text-sm leading-5 text-gray-900 dark:text-white"
                                            id="">
                                            {{ $item?->nombre }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-2 md:px-6 md:py-4 text-sm leading-5 text-gray-900 dark:text-white"
                                            id="">
                                            {{ $item?->talla == null ? '-' : $item?->talla }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-2 md:px-6 md:py-4 text-sm leading-5 text-gray-900 dark:text-white"
                                            id="">
                                            {{ $item?->color == null ? '-' : $item?->color }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-2 md:px-6 md:py-4 text-sm leading-5 text-gray-900 dark:text-white"
                                            id="">
                                            {{ $item?->cantidad }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="">
                                        <td class="whitespace-nowrap px-3 py-2 md:px-6 md:py-4 text-sm leading-5 text-gray-900 dark:text-white dark:bg-gray-800"
                                            colspan="6">
                                            <div class="flex justify-center items-center space-x-2 dark:bg-gray-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                                    </path>
                                                </svg>
                                                <span class="font-medium py-8 text-gray-400 text-xl dark:text-white">No
                                                    se encontraron elementos. Intente ampliar la búsqueda.</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
