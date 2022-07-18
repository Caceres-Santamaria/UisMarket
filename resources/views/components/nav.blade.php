<nav
    class=" hidden lg:flex lg:align-center lg:content-center lg:justify-center lg:flex-col lg:w-10/12 lg:bg-primario-dark  lg:rounded-3xl lg:place-self-center lg:px-2 lg:border-box lg:font-normal ">
    <ul class=" lg:flex lg:justify-center lg:flex-row lg:list-none lg:self-center lg:relative lg:text-lg ">
        <li
            class="{{ setActive('home') }} list-item border-b-2 hover:border-white lg:outline-none lg:relative lg:p-1.5 lg:m-0 lg:z-1 last:right-0 last:left-auto">
            <a class="list-item__link lg:outline-none lg:no-underline lg:text-white lg:h-6 lg:leading-6 lg:px-4 lg:font-normal"
                href="{{ route('home') }}">
                <i class="fas fas-header fa-home lg:text-inherit lg:pr-1.5 lg:relative lg:bg-transparent lg:text-xl"></i><span>HOME</span>
            </a>
        </li>
        <li
            class="{{ setActiveProductos() }} list-item border-b-2 hover:border-white lg:outline-none lg:relative lg:p-1.5 lg:m-0 lg:z-1 last:right-0 last:left-auto">
            <a class="list-item__link lg:outline-none lg:no-underline lg:text-white lg:h-6 lg:leading-6 lg:px-4 lg:font-normal"
                href="{{ route('productos.index') }}">
                <span>Productos <i class="fas fa-angle-down"></i></span>
            </a>
            @if (session()->has('categorias'))
                <ul
                    class="menu-desktop__list lg:justify-center lg:flex-row lg:list-none active:no-underline active:border-b active:border-white menu-desktop__secondlevel lg:hidden lg:absolute lg:w-max lg:top-calc lg:bg-primario-dark lg:p-0 lg:m-0 lg:left-0">
                    @forelse(session('categorias') as $categoria)
                        <li
                            class=" list-item hover:border-b hover:border-white lg:outline-none lg:relative lg:p-1.5 lg:z-1 last:right-0 last:left-auto list-item-sub lg:w-full lg:h-10 lg:leading-10 lg:m-0 lg:border-b-2 lg:border-white lg:hover:bg-primario-ligth">
                            <a class="list-item__link lg:outline-none lg:no-underline lg:text-white lg:h-6 lg:leading-6 lg:px-4 lg:font-normal lg:flex lg:w-full lg:content-center "
                                href="{{ route('categorias.show',$categoria) }}"><span>{{ $categoria->nombre }}</span></a>
                        </li>
                    @empty
                        <li
                            class=" list-item hover:border-b hover:border-white lg:outline-none lg:relative lg:p-1.5 lg:z-1 last:right-0 last:left-auto list-item-sub lg:w-full lg:h-10 lg:leading-10 lg:m-0 lg:border-b-2 lg:border-white lg:hover:bg-primario-ligth">
                            <a class="list-item__link lg:outline-none lg:no-underline lg:text-white lg:h-6 lg:leading-6 lg:px-4 lg:font-normal lg:flex lg:w-full lg:content-center "
                                href="javascript:void(0)"><span>No hay categorias</span></a>
                        </li>
                    @endforelse
                </ul>
            @endif
        </li>
        <li
            class="{{ setActive('tiendas*') }} list-item border-b-2 hover:border-white lg:outline-none lg:relative lg:p-1.5 lg:m-0 lg:z-1 last:right-0 last:left-auto">
            <a class="list-item__link lg:outline-none lg:no-underline lg:text-white lg:h-6 lg:leading-6 lg:px-4 lg:font-normal"
                href="{{ route('tiendas') }}"><span>Tiendas</span></a>
        </li>
        <li
            class="{{ setActive('promociones') }} list-item border-b-2 hover:border-white lg:outline-none lg:relative lg:p-1.5 lg:m-0 lg:z-1 last:right-0 last:left-auto">
            <a class="list-item__link lg:outline-none lg:no-underline lg:text-white lg:h-6 lg:leading-6 lg:px-4 lg:font-normal"
                href="{{ route('promociones') }}"><span>Promociones</span></a>
        </li>
        <li
            class="{{ setActive('guia') }} list-item border-b-2 hover:border-white lg:outline-none lg:relative lg:p-1.5 lg:m-0 lg:z-1 last:right-0 last:left-auto">
            <a class="list-item__link lg:outline-none lg:no-underline lg:text-white lg:h-6 lg:leading-6 lg:px-4 lg:font-normal"
                href="{{ route('guia') }}"><span>Guía</span></a>
        </li>
        <li
            class="{{ setActive('about') }} list-item border-b-2 hover:border-white lg:outline-none lg:relative lg:p-1.5 lg:m-0 lg:z-1 last:right-0 last:left-auto">
            <a class="list-item__link lg:outline-none lg:no-underline lg:text-white lg:h-6 lg:leading-6 lg:px-4 lg:font-normal"
                href="{{ route('about') }}"><span>¿Quiénes somos?</span></a>
        </li>
    </ul>
</nav>
