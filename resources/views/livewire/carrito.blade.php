<div class="icono__car px-1" @click="carrito = true">
    <a id="link-carrito" class=" relative fas-link" href="javascript:void(0)"
        title="Ver su carrito de compras">
        <i class="lg:text-2xl fas fas-header fa-shopping-cart"></i>
        @if (Cart::count())
        <span
            class="w-5 h-5 absolute -top-1 text-xs -right-2 text-black bg-white rounded-full leading-5">
            {{ Cart::count() }}
        </span>
        @else
        <span
            class="w-5 h-5 absolute -top-1 text-xs -right-2 text-black bg-white rounded-full leading-5"></span>
        @endif
    </a>
</div>
