@props(['tienda'])
<div
    class=" p-2 place-items-stretch gap-y-6 gap-x-7 place-content-start  md:gap-6 md:px-6 md:py-4 lg:gap-6 lg:px-6 lg:py-4">

    <h2 class="font-bold text-2xl pb-4">Información</h2>
    <div class="text-base">
        <p class="pb-4">
            {{ $tienda->descripcion }}
        </p>

        <div class="pb-4"><i class="pr-4 fas fa-phone-alt"></i>{{ $tienda->telefono }}</div>
        <div class="pb-4"><i class="pr-4 fas fa-store"></i>{{ $tienda->direccion }}</div>
        <div class="pb-4"><i class="pr-4 fas fa-envelope"></i> {{ $tienda->email }}</div>
    </div>
</div>
