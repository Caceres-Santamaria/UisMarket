<x-errors-layout title="500 error">
    <div class="min-h-screen min-w-screen max-w-screen overflow-hidden flex items-center pt-4 px-8 pb-12">
        <div class="w-full h-full flex flex-col justify-center content-center items-center ">
            <div class="w-72 md:w-96">
                <img class="object-contain max-w-full" src="{{ Storage::url('images/errors/500.png') }}"
                    alt="error 500">
            </div>
            <div class="w-full flex flex-col lg:flex-row gap-2 justify-center mt-5">
                <x-boton-enlace href="{{ route('home') }}">
                    Ir a la página principal
                </x-boton-enlace>
                @auth
                    @if (Auth::user()->rol == '0' || Auth::user()->rol == '1')
                        <x-boton-enlace href="{{ route('admin.dashboard') }}">
                            Ir a la zona admin
                        </x-boton-enlace>
                    @endif
                @endauth
            </div>
        </div>
        <div class="md:h-20 fixed bottom-0 left-0 w-full h-12">
            <img class="object-cover object-top h-full w-full max-w-full"
                src="{{ Storage::url('images/errors/wave.svg') }}" alt="wave">
        </div>
    </div>
</x-errors-layout>
