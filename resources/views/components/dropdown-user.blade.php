<div {{ $attributes->merge(['class' => 'ml-3 relative hidden sm:block']) }}>
    <x-jet-dropdown align="right" width="48">
        <x-slot name="trigger">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <button
                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </button>
            @else
                <span class="inline-flex rounded-md">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                        {{ Auth::user()->name }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </span>
            @endif
        </x-slot>
        <x-slot name="content">
            <div
                class="line-clamp-1 block px-4 py-2 text-sm leading-5 text-gray-70 focus:outline-none">
                {{ Auth::user()->name }}
            </div>

            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Account') }}
            </div>
            <x-dropdown-link :href="route('profile.show')">
                {{ __('Información personal') }}
            </x-dropdown-link>

            <x-dropdown-link :href="route('pedidos.index')">
                {{ __('Mis pedidos') }}
            </x-dropdown-link>

            <div class="border-t border-gray-100"></div>

            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Shop') }}
            </div>

            @if (auth()->user()->tienda)
            <x-dropdown-link :href="route('pedidos.index')">
                {{ __('Ver mi tienda') }}
            </x-dropdown-link>
            @else
            <x-dropdown-link :href="route('tienda.create')">
                {{ __('Crear mi tienda') }}
            </x-dropdown-link>
            @endif

            <div class="border-t border-gray-100"></div>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-jet-dropdown-link>
            </form>
        </x-slot>
    </x-jet-dropdown>
</div>
{{-- <button
    class="transform hover:scale-110 hover:bg-green-600 hover:shadow rounded-full cursor-pointer bg-transparent border-none w-9 h-9 flex items-center justify-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
    <div>{{ Auth::user()->name }}</div>
    <div
        class="w-8 h-8 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full">
        <img src="https://ui-avatars.com/api/?font-size=0.3&rounded=true&bold=true&format=svg&background=000&color=fff&size=35&name={{ Auth::user()->name }}"
            alt="Avatar usuario" class="w-full rounded-full align-middle border-none shadow-lg">
    </div>
</button> --}}
