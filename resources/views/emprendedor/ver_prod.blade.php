<x-app2-layout title="Productos">
    <div class="grid-in-contenido py-12 max-w-full mx-auto px-4 sm:px-2 lg:px-8 w-full md:w-11/12 lg:w-11/12">
        <div>
            <div class="flex items-center">
                <h2 class="font-semibold text-xl text-gray-600 leading-tight">
                    Lista de productos
                </h2>

                <x-boton class="ml-auto bg-red-600 justify-end" href="">
                    Agregar producto
                </x-boton>
            </div>

        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-scroll sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        {{-- <x-table-responsive> --}}

                        <div class="px-6 py-4">

                            <x-jet-input type="text" wire:model="search" class="w-full"
                                placeholder="Ingrese el nombre del procucto que quiere buscar" />

                        </div>

                        {{-- @if ($products->count()) --}}

                        <table class="min-w-full max-x-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-sm lg:text-base font-semibold text-gray-500 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th scope="col"
                                        class="hidden md:table-cell lg:table-cell px-6 py-3 text-left text-sm lg:text-base font-semibold text-gray-500 uppercase tracking-wider">
                                        Categoría
                                    </th>
                                    <th scope="col"
                                        class="hidden md:table-cell lg:table-cell px-6 py-3 text-left text-sm lg:text-base font-semibold text-gray-500 uppercase tracking-wider">
                                        Estado
                                    </th>
                                    <th scope="col"
                                        class="hidden md:table-cell lg:table-cell px-6 py-3 text-left text-sm lg:text-base font-semibold text-gray-500 uppercase tracking-wider">
                                        Precio
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Editar</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                                {{-- @foreach ($products as $product) --}}

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-12 w-12">
                                                {{-- @if ($product->images->count()) --}}
                                                <img class="h-12 w-12 rounded-full object-cover"
                                                    src="{{ Storage::url('images/website/p1.jpg') }}" alt="">
                                                {{-- @else
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                                    alt="">
                                            @endif --}}
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm lg:text-base font-medium text-gray-900 ">
                                                    Nombre del producto
                                                </div>
                                                <div
                                                    class="lg:hidden md:hidden text-sm lg:text-base font-medium text-gray-900 ">
                                                    30.000
                                                    <span
                                                        class="lg:hidden md:hidden px-2 inline-flex text-sm lg:text-base leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        Borrador
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap hidden md:table-cell lg:table-cell">

                                        <div class=" text-sm lg:text-base text-gray-900 ">
                                            Categoria
                                        </div>

                                    </td>
                                    <td class="hidden md:table-cell lg:table-cell px-6 py-4 whitespace-nowrap">
                                        {{-- @switch($product->status)
                                        @case(1) --}}
                                        <span
                                            class="px-2 inline-flex text-sm lg:text-base leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Borrador
                                        </span>
                                        {{-- @break
                                        @case(2)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Publicado
                                            </span>
                                        @break
                                        @default

                                    @endswitch --}}
                                    </td>
                                    <td
                                        class="hidden md:table-cell lg:table-cell px-6 py-4 whitespace-nowrap text-sm lg:text-base text-gray-500">
                                        30.000
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm lg:text-base font-medium">
                                        <a href="" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                    </td>
                                </tr>

                                {{-- @endforeach --}}
                                <!-- More people... -->
                            </tbody>
                        </table>

                        {{-- @else
                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>
            @endif

            @if ($products->hasPages())

                <div class="px-6 py-4">
                    {{ $products->links() }}
                </div>

            @endif --}}

                    </div>
                </div>
            </div>
        </div>
        {{-- </x-table-responsive> --}}
    </div>


    </div>
</x-app2-layout>
