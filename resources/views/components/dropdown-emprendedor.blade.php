<div {{ $attributes->merge(['class' => 'ml-3 relative hidden sm:block']) }}>
    <x-jet-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button id="link-buscar" class="h-8 w-8 relative fas-link">
                <i class="fas lg:text-2xl fas-header fa-store"></i>
            </button>
        </x-slot>
        <x-slot name="content">
            @if (Auth::user()->tienda)
                <div
                    class="line-clamp-1 block px-4 py-2 text-sm leading-5 text-gray-70 focus:outline-none uppercase font-bold">
                    <span class="line-clamp-1">{{ Auth::user()->tienda->nombre }}</span>
                </div>
                <x-dropdown-link :href="route('tienda.show')">
                    {{ __('Ver mi tienda') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('tienda.edit',Auth::user()->tienda)">
                    {{ __('Actualizar tienda') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('emprendedor.pedidos')">
                    {{ __('Ver pedidos') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('tienda.productos')">
                    {{ __('Gestionar productos') }}
                </x-dropdown-link>

                <div class="border-t border-gray-100"></div>

                <x-dropdown-link :href="route('informes.rotacion')">
                    {{ __('Informe de rotación') }}
                </x-dropdown-link>
                <x-dropdown-link :href="route('informes.ingresos')">
                    {{ __('Informe de ingresos') }}
                </x-dropdown-link>
            @else
                <form method="POST" action="{{ route('tienda.activar') }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="text-left w-full block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                        Activar tienda
                    </button>
                </form>
            @endif
        </x-slot>
    </x-jet-dropdown>
</div>
