<x-admin-layout title="dasboard">
    @push('scriptHeader')
        <script src="{{ asset('js/Chart.min.js') }}"></script>
    @endpush
    @slot('cards')
        <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                <a href="{{ route('admin.clientes') }}"
                                    class="text-xs uppercase font-bold block hover:underline">
                                    Número de clientes
                                </a>
                            </h5>
                            <span class="font-semibold text-xl text-blueGray-700">
                                {{ $clientes }}
                            </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                <a href="{{ route('admin.tiendas') }}"
                                    class="text-xs uppercase font-bold block hover:underline">
                                    Número de emprendedores
                                </a>
                            </h5>
                            <span class="font-semibold text-xl text-blueGray-700">
                                {{ $emprendedores }}
                            </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500">
                                <i class="fas fa-store"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                            <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                <a href="{{ route('admin.solicitudes') }}"
                                    class="text-xs uppercase font-bold block hover:underline">
                                    Solicitudes pendientes
                                </a>
                            </h5>
                            <span class="font-semibold text-xl text-blueGray-700">
                                {{ $solicitudes }}
                            </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                                <i class="fas fa-bell"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endslot
    <div class="flex flex-wrap ">
        <div class="w-full mb-12 xl:mb-0 px-4 lg:grid lg:gap-8 lg:grid-cols-2  lg:grid-areas-graficas ">
            <div
                class=" lg:grid-in-categorias relative flex flex-col min-w-0 bg-white break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
                <div class="rounded-t mb-0 px-4 py-3 ">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full max-w-full flex-grow flex-1">
                            <h6 class="uppercase text-blueGray-100 mb-1 text-xs font-semibold">
                                Productos por categorias
                            </h6>
                        </div>
                    </div>
                    <x-grafica-categorias />
                </div>
            </div>
            <div
                class=" lg:grid-in-pedidos relative flex flex-col min-w-0 bg-white break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
                <div class="rounded-t mb-0 px-4 py-3 h-full">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full max-w-full flex-grow flex-1">
                            <h6 class="uppercase text-blueGray-100 mb-1 text-xs font-semibold">
                                Pedidos
                            </h6>
                        </div>
                    </div>
                    <x-grafica-pedidos />
                </div>
            </div>
            <div
                class=" lg:grid-in-categoriasvendidas lg:col-span-2 relative flex flex-col min-w-0 bg-white break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
                <div class="rounded-t mb-0 px-4 py-3 ">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full max-w-full flex-grow flex-1">
                            <h6 class="uppercase text-blueGray-100 mb-1 text-xs font-semibold">
                                Productos vendidos por categorias </h6>
                        </div>
                    </div>
                    <x-grafica-categoria-pedidos />
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <script>
            window.addEventListener('DOMContentLoaded', e => {
                simpleAlert(
                    'center',
                    'warning',
                    '{{ session('message') }}',
                    '',
                    true);
            });
        </script>
    @endif
</x-admin-layout>
