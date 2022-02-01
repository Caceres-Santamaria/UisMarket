@push('scriptHeader')
    <script src="{{ asset('js/Chart.min.js') }}"></script>
@endpush
<main class="grid-in-contenido">
    <h1 class="text-black text-center text-2xl lg:text-3xl m-8 font-semibold">Informe de ingresos</h1>
    <div class="relative m-auto w-72 bg-white border border-gray-700 mb-8 pt-4 rounded-2xl sm:w-80 lg:w-96">
        <h3 class="text-center mb-4">Filtrar Por:</h3>
        <div class="flex flex-row justify-center items-center mb-3 text-sm">
            <x-jet-label value="{{ $order_by == 'Diariamente' ? 'Mes' : 'Año' }}" class="mr-3" />
            @if ($order_by == 'Diariamente')
                <div class="flex flex-row justify-center items-center" x-data>
                    <div class="w-full flex flex-col items-center justify-start">
                        <x-jet-input type="month" id="mes" title="mes" class="w-40 sm:w-52 lg:w-64"
                            wire:model.defer="monthYear" placeholder="yyyy-mm" wire:keydown.enter="busqueda" wire:loading.attr="disabled" wire:target="busqueda" />
                        <x-jet-input-error for="monthYear" />
                    </div>
                </div>
            @elseif($order_by == 'Mensualmente')
                <div class="relative w-40 sm:w-52 lg:w-64 flex flex-col items-center justify-start">
                    <x-jet-input type="number" min="2020" max="2099" step="1" value="2021" class="w-full"
                        title="año" wire:model.defer="year" placeholder="yyyy" wire:keydown.enter="busqueda" wire:loading.attr="disabled" wire:target="busqueda"/>
                    <i class="far fa-calendar absolute right-7 top-2 text-lg"></i>
                    <x-jet-input-error for="year" />
                </div>
            @endif
        </div>
        <div class="flex m-auto w-full justify-center my-3">
            <x-boton wire:click="busqueda" wire:loading.attr="disabled" wire:target="busqueda">Generar</x-boton>
        </div>
    </div>
    <div class="flex justify-end items-center px-4">
        <div class="flex relative justify-center items-center h-8 border border-gray-300 p-1 cursor-pointer w-40 rounded-md"
            x-data="{ open: false, text: '{{ $order_by }}' }">
            <p @click="open = true"
                class="flex flex-row justify-between items-center w-full h-full text-base text-gray-400"
                id="cont-orderBy">
                <span id="orderBy" x-text='text'></span>
                <i id="listaFiltro" class="fas fa-filter"></i>
            </p>
            <ul x-show="open" x-transition @click.outside="open = false"
                class="absolute top-100-5 right-0 left-0 z-8 border border-gray-400 bg-gray-100">
                <li class="h-8 w-full leading-8 hover:text-white hover:bg-black border-b border-gray-200"
                    @click="open = false; text = 'Diariamente'">
                    <a class="w-full h-full py-0 px-4 text-sm inline-block" href="javascript:void(0)"
                        wire:click="$set('order_by', 'Diariamente')">
                        Diariamente
                    </a>
                </li>
                <li class="h-8 w-full  leading-8 hover:text-white hover:bg-black border-b border-gray-200"
                    @click="open = false; text = 'Mensualmente'">
                    <a class="w-full h-full py-0 px-4 text-sm inline-block"
                        wire:click="$set('order_by', 'Mensualmente')">
                        Mensualmente
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="w-full flex justify-center content-center mb-7">
        <div class="w-full md:w-7/12 relative">
            <canvas id="myChart" height="200">Your browser does not support the canvas element.</canvas>
        </div>
    </div>
    <script>
        var ctx1 = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx1, {
            data: {
                labels: [],
                datasets: [{
                    type: 'line',
                    label: 'Ingresos',
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    tension: 0.2,
                    borderCapStyle: 'round',
                    borderJoinStyle: 'round',
                    fill: 'origin',
                    // stepped: true,
                    data: []
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            tickColor: 'gray'
                        },
                        title: {
                            color: 'black',
                            display: true,
                            text: ''
                        }
                    },
                    y: {
                        title: {
                            color: 'black',
                            display: true,
                            text: 'Ingresos'
                        }
                    }
                },
                elements: {
                    point: {
                        hoverRadius: 6,
                        hoverBorderWidth: 2
                    }
                },
                animation: false,
                spanGaps: true,
                plugins: {
                    title: {
                        display: true,
                        text: ''
                    }
                }
            }
        });

        function removeData(chart) {
            chart.data.labels = [];
            chart.data.datasets.forEach((dataset) => {
                dataset.data = [];
            });
            chart.update();
        }

        function updateData(chart, label, data) {
            chart.data.labels = label;
            chart.data.datasets.forEach((dataset) => {
                dataset.data = data;
            });
            chart.update();
        }

        window.addEventListener('updateChart', (e) => {
            updateData(chart, e.detail.label, e.detail.data);
            if (e.detail.tipo == 'dia') {
                chart.options.plugins.title.text = 'Gráfica de ingresos por día';
                chart.options.scales.x.title.text = 'Días';
                chart.update();
            } else {
                chart.options.plugins.title.text = 'Gráfica de ingresos por mes';
                chart.options.scales.x.title.text = 'Meses';
                chart.update();
            }
        });

        window.addEventListener('resetChart', (e) => {
            removeData(chart);
            if (e.detail.tipo == 'Diariamente') {
                chart.options.plugins.title.text = 'Gráfica de ingresos por día';
                chart.options.scales.x.title.text = 'Días';
                chart.update();
            } else {
                chart.options.plugins.title.text = 'Gráfica de ingresos por mes';
                chart.options.scales.x.title.text = 'Meses';
                chart.update();
            }
        });
    </script>
</main>
