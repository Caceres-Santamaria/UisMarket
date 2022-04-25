<div class="w-full flex justify-center content-center mb-7">
    <div class="relative w-full lg:w-96 m-auto">
        <canvas id="myChartCategory">Your browser does not support the canvas element.</canvas>
    </div>
</div>
<script>
    let str_categorias = '{{ $categorias }}';
    let str_cantidades = '{{ $cantidades }}';
    let arr_categorias = str_categorias.split(',');
    let arr_cantidades = str_cantidades.split(',');
    var ctx1 = document.getElementById('myChartCategory').getContext('2d');
    var chart = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: arr_categorias,
            datasets: [{
                // label: 'Cantidad de productos',
                data: arr_cantidades,
                backgroundColor: [
                    '#604C87',
                    '#85AF5C',
                    '#F9C9C9',
                    '#91A9CD',
                    '#994D4D',
                    '#AF5F94',
                    '#009476',
                    '#E13E2D',
                    '#DE4E6F',
                    '#F2BE6A',
                    '#37B5AA',
                    '#5B5D9A',
                    '#9E1831',
                    '#49B0AD',
                    '#CC4273',
                    '#76C4C4',
                ],
                hoverOffset: 6
            }]
        },
    });
</script>
