<div class="h-8 w-8 sm:ml-3" @click="carrito = true">
    <button id="link-carrito" class="w-full h-full relative fas-link"
        title="Ver su carrito de compras">
        <i class="lg:text-2xl fas fas-header fa-shopping-cart"></i>
        @if (Cart::count())
        <span
            class="w-5 h-5 absolute -top-1 text-xs -right-2 text-black bg-white rounded-full leading-5">
            {{ Cart::count() }}
        </span>
        {{-- @else
        <span
            class="w-5 h-5 absolute -top-1 text-xs -right-2 text-black bg-white rounded-full leading-5"></span> --}}
        @endif
    </button>
</div>
