<div {{ $attributes->merge(['class' => 'ml-3 relative hidden sm:block']) }}>
    <x-jet-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button id="link-buscar" class="h-8 w-8 relative fas-link">
                <i class="fas lg:text-2xl fas-header fa-store"></i>
            </button>
        </x-slot>
        <x-slot name="content">
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
        </x-slot>
    </x-jet-dropdown>
</div>
