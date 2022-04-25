<x-errors-layout title="403 acceso denegado">
    <div class="min-h-screen min-w-screen max-w-screen overflow-hidden flex items-center pt-4 px-8 pb-12">
        <div class="w-full h-full flex flex-col justify-center content-center items-center ">
            <div class="w-72 md:w-96">
                <img class="object-contain max-w-full" src="{{ Storage::url('images/errors/401.jpg') }}"
                    alt="error 403">
            </div>
            <p class=" font-semibold text-xl text-center m-4 text-black">¡Acceso denegado!</p>

            <div class=" w-full flex justify-center mt-5">
                <x-boton-enlace href="{{ route('home') }}">
                    Ir a la página principal
                </x-boton-enlace>
            </div>
        </div>
        <div class="md:h-20 fixed bottom-0 left-0 w-full h-12">
            <img class="object-cover object-top h-full w-full max-w-full"
                src="{{ Storage::url('images/errors/wave.svg') }}" alt="wave">
        </div>
    </div>
</x-errors-layout>