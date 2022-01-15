<x-app2-layout title="pedidos">
  <main class=" grid-in-contenido px-4 py-4 md:py-12 md:px-20">
      <section x-data
          class="grid grid-cols-2 gap-3 md:grid-cols-3 md:gap-6 lg:grid-cols-5 lg:gap-6 text-white justify-center">
          <a href="" x-on:click.prevent="Livewire.emit('setiar',1)"
              class=" bg-pink-500 bg-opacity-75 rounded-lg px-2 pt-4 pb-2 md:px-12 md:pt-8 md:pb-4">
              <p class="text-center text-2xl">
                  {{ $pendiente }}
              </p>
              <p class="uppercase text-center text-sm md:text-base">Pendiente</p>
              <p class="text-center text-2xl mt-2">
                  <i class="far fa-clock"></i>
              </p>
          </a>
          <a href="" x-on:click.prevent="Livewire.emit('setiar',2)"
              class=" bg-blue-500 bg-opacity-75 rounded-lg px-2 pt-4 pb-2 md:px-12 md:pt-8 md:pb-4">
              <p class="text-center text-2xl">
                  {{ $preparando }}
              </p>
              <p class=" uppercase text-center text-sm md:hidden ">No enviado</p>
              <p class="hidden uppercase text-center md:block md:text-base">No enviado</p>
              <p class="text-center text-2xl mt-2">
                  <i class="fas fa-box"></i>
              </p>
          </a>
          <a href="" x-on:click.prevent="Livewire.emit('setiar',3)"
              class=" bg-yellow-500 bg-opacity-75 rounded-lg px-2 pt-4 pb-2 md:px-12 md:pt-8 md:pb-4">
              <p class="text-center text-2xl">
                  {{ $enviado }}
              </p>
              <p class="uppercase text-center text-sm md:text-base">Enviado</p>
              <p class="text-center text-2xl mt-2">
                  <i class="fas fa-motorcycle"></i>
              </p>
          </a>
          <a href="" x-on:click.prevent="Livewire.emit('setiar',4)"
              class=" bg-green-500 bg-opacity-75 rounded-lg px-2 pt-4 pb-2 md:px-12 md:pt-8 md:pb-4">
              <p class="text-center text-2xl">
                  {{ $entregado }}
              </p>
              <p class="uppercase text-center text-sm md:text-base">Entregado</p>
              <p class="text-center text-2xl mt-2">
                  <i class="fas fa-check-circle"></i>
              </p>
          </a>
          <a href="" x-on:click.prevent="Livewire.emit('setiar',5)"
              class=" bg-red-500 bg-opacity-75 rounded-lg px-2 pt-4 pb-2 md:px-12 md:pt-8 md:pb-4">
              <p class="text-center text-2xl">
                  {{ $cancelado }}
              </p>
              <p class="uppercase text-center text-sm md:text-base">Cancelado</p>
              <p class="text-center text-2xl mt-2">
                  <i class="fas fa-times-circle"></i>
              </p>
          </a>
      </section>
      @livewire('emprendedor.pedidos-tienda')
  </main>
</x-app2-layout>
