<div class="w-full lg:w-5/6 flex justify-center content-center lg:m-auto">
  <div class=" relative m-auto w-full">
      <canvas id="myChartCategoriasPedidos" height="200">Your browser does not support the canvas element.</canvas>
  </div>
</div>
<script>
  let str_categorias_pedido = '{{ $categorias }}';
  let str_cantidades_pedido = '{{ $cantidades }}';
  let arr_categorias_pedido = str_categorias_pedido.split(',');
  let arr_cantidades_pedido = str_cantidades_pedido.split(',');
  var ctx2 = document.getElementById('myChartCategoriasPedidos').getContext('2d');
  var chart1 = new Chart(ctx2, {
      type: 'bar',
      data: {
          labels: arr_categorias_pedido,
          datasets: [{
              // label: 'Cantidad de productos',
              indexAxis: 'y',
              data: arr_cantidades_pedido,
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