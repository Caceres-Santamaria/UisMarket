<x-app2-layout title="Tiendas">

    <main class="">
        <div
            class="content grid-in-contenido grid grid-cols-full grid-rows-catalogo place-items-center place-content-center px-0 py-4">
            <div class="content__title self-center  ">
                <h2 class=""></h2>
                <h2 class="font-semibold text-lg lg:text-xl flex justify-center text-center mb-2 lg:mb-6 text-gray-600">
                    TIENDAS</h2>
            </div>
            <x-filtro-desplegable />
        </div>
        <div id="content-products" class="collection-products w-full">
            @include('tiendasData')
        </div>
    </main>
</x-app2-layout>
