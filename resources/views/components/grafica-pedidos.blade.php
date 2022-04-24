<div class="w-full lg:h-95 flex justify-center content-center ">
    <div class="relative m-auto w-48 md:w-80">
        <canvas id="myChartPedidos">Your browser does not support the canvas element.</canvas>
    </div>
</div>
<script>
    var ctx1 = document.getElementById('myChartPedidos').getContext('2d');
    var chart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Entregados', 'Cancelados'],
            datasets: [{
                // labels: ['entregados', 'cancelados'],
                data: [parseInt({{ $entregados }}), parseInt({{ $cancelados }})],
                backgroundColor: [
                    '#85AF5C',
                    '#E13E2D',
                ],
                hoverOffset: 6
            }]
        },
    });
</script>