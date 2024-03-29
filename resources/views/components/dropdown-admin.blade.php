<div {{ $attributes->merge(['class' => 'md:flex sm:items-center flex-wrap']) }}>
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button
                class="flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                {{-- <div>{{ Auth::user()->name }}</div> --}}
                <div
                    class="inline-flex items-center justify-center w-10 h-10 text-sm text-white rounded-full bg-blueGray-200">
                    <img src="https://ui-avatars.com/api/?font-size=0.3&rounded=true&bold=true&format=svg&background=000&color=fff&size=35&name={{ Auth::user()->name }}"
                        alt="Avatar usuario" class="w-full align-middle border-none rounded-full shadow-lg">
                </div>
                <div class="ml-1">
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>
        <x-slot name="content">
            <span
                class="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out border-b border-gray-400 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                <div>{{ Auth::user()->name }}</div>
            </span>
            <x-dropdown-link :href="route('home')">
                Página principal
            </x-dropdown-link>
            <x-dropdown-link :href="route('admin.profile')">
                Información personal
            </x-dropdown-link>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    Finalizar Sesión
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</div>
