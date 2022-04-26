@props(['tienda'])
<div
    class=" p-2 place-items-stretch gap-y-6 gap-x-7 place-content-start  md:gap-6 md:px-6 md:py-4 lg:gap-6 lg:px-6 lg:py-4">

    <h2 class="font-bold text-2xl pb-4">Información</h2>
    <div class="text-base m-3">
        <div class="mb-4 w-full flex justify-start items-center">
            <i class="pr-3 fas fa-phone-alt"></i>{{ $tienda->telefono }}
        </div>
        @if ($tienda->direccion)
            <div class="mb-4 w-full flex justify-start items-center">
                <i class="pr-3 fas fa-store"></i>{{ $tienda->direccion }}
            </div>
        @endif
        <div class="mb-4 w-full flex justify-start items-center">
            <i class="pr-3 fas fa-envelope"></i>{{ $tienda->email }}
        </div>
        <div class="mb-4 w-full flex justify-start items-start">
            <i class="pr-3 fas fa-book-open"></i>
            <p class="mb-4">
                {!! $tienda->descripcion !!}
            </p>
        </div>
    </div>
</div>
