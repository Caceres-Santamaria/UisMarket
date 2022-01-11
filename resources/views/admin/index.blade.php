<x-admin-layout title="dasboard">
  <div class="flex flex-wrap ">
    <div class="w-full  mb-12 xl:mb-0 px-4 ">
      <div class="relative flex flex-col min-w-0 bg-white break-words w-full mb-6 shadow-lg rounded bg-blueGray-700">
        <div class="rounded-t mb-0 px-4 py-3 ">
          <div class="flex flex-wrap items-center">
            <div class="relative w-full max-w-full flex-grow flex-1">
              <h6 class="uppercase text-blueGray-100 mb-1 text-xs font-semibold">
              Descripción general
              </h6>
              <h2 class="text-black text-xl font-semibold">
                Emprendimientos por categorias
              </h2>
            </div>
          </div>
        </div>
        <div class="p-4 flex-auto">
          <!-- Chart -->
          <div class="relative h-350-px">
            <canvas id="line-chart"></canvas>
          </div>
        </div>
      </div>
    </div>
   
  </div>
  
</x-admin-layout>