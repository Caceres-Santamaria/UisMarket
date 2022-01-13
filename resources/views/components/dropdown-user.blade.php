<div {{ $attributes->merge(['class' => 'sm:flex sm:items-center sm:justify-center flex-wrap']) }}>
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button
                class="transform hover:scale-110 hover:bg-green-600 hover:shadow rounded-full cursor-pointer bg-transparent border-none w-9 h-9 flex items-center justify-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                {{-- <div>{{ Auth::user()->name }}</div> --}}
                <div
                    class="w-8 h-8 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full">
                    <img src="https://ui-avatars.com/api/?font-size=0.3&rounded=true&bold=true&format=svg&background=000&color=fff&size=35&name={{ Auth::user()->name }}"
                        alt="Avatar usuario" class="w-full rounded-full align-middle border-none shadow-lg">
                </div>
            </button>
        </x-slot>
        <x-slot name="content">
            <span
                class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out border-b border-gray-400">
                <div>{{ Auth::user()->name }}</div>
            </span>
            <x-dropdown-link :href="route('profile.show')">
                {{ __('Información personal') }}
            </x-dropdown-link>

            <x-dropdown-link :href="route('pedidos.index')">
                {{ __('Mis pedidos') }}
            </x-dropdown-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Logout') }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</div>
