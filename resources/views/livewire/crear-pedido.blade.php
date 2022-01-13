<main class="grid-in-contenido py-8 grid lg:grid-cols-6040 gap-6 bg-gray-100 justify-items-center">
    <div class="order-2 w-11/12 lg:order-1 lg:col-span-1 ">
        <div>
            <p class="mb-3 text-lg text-gray-700 font-semibold">Contacto</p>
            <div class="bg-white rounded-lg shadow p-6 ">
                <div class="mb-4">
                    <x-jet-label value="Nombre de contácto" />
                    <x-jet-input type="text" placeholder="Ingrese el nombre de la persona que recibirá el producto"
                        class="w-full" wire:model="contacto" />
                    <x-jet-input-error for="contacto" />
                </div>
                <div>
                    <x-jet-label value="Teléfono de contacto" />
                    <x-jet-input type="text" placeholder="Ingrese un número de telefono de contácto"
                        class="w-full" wire:model="telefono" />
                    <x-jet-input-error for="telefono" />
                </div>
            </div>
            <div class="mt-6 grid grid-cols-2 gap-6 bg-white rounded-lg shadow p-6">
                {{-- Departamentos --}}
                <div>
                    <x-jet-label value="Departamento" />
                    <select class="form-control w-full" wire:model="departamento_id">
                        <option value="" disabled selected>Seleccione un Departamento</option>
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="departamento_id" />
                </div>
                {{-- Ciudades --}}
                <div>
                    <x-jet-label value="Ciudad" />
                    <select class="form-control w-full" wire:model="ciudad_id">
                        <option value="" disabled selected>Seleccione una ciudad</option>
                        @foreach ($ciudades as $ciudad)
                            <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="ciudad_id" />
                </div>
                {{-- Dirección --}}
                <div class="col-span-2">
                    <x-jet-label value="Dirección" />
                    <x-jet-input class="w-full" type="text" wire:model="direccion" />
                    <x-jet-input-error for="direccion" />
                </div>
                <div class="col-span-2">
                    <x-jet-label value="Referencia" />
                    <x-jet-input class="w-full" type="text" wire:model="referencia" />
                    <x-jet-input-error for="referencia" />
                </div>
            </div>
        </div>
        @foreach ($productos as $tienda => $products)
            <div class="mt-6 mb-3" x-data x-init="">
                <p class="mb-3 text-base text-gray-700 font-semibold">Paquete {{ $loop->index + 1 }}</p>
                <div class="bg-white rounded-lg shadow p-6">
                    <p class="block font-semibold text-base text-black mb-4">
                        Tienda: {{ $tiendas[$tienda]->nombre }}
                    </p>
                    @if ($tiendas[$tienda]->recoger_tienda)
                        <label class="rounded-lg shadow px-6 py-4 flex items-center mb-4 cursor-pointer">
                            <input id="envio" type="radio" value="1" name="envio_type_{{ $tiendas[$tienda]->id }}"
                                class="text-gray-600" wire:click="updateCosto({{ $tienda }},0,1)">
                            <p class="ml-2 text-gray-700">
                                Recojo en tienda (<span
                                    class="text-xs">{{ $tiendas[$tienda]->direccion }}</span>)
                            </p>
                            <span class="font-semibold text-gray-700 ml-auto">
                                Gratis
                            </span>
                        </label>
                    @endif
                    @if ($ciudad_id != '')
                        @php
                            $costo_ciudad = $tiendas[$tienda]->envios->find($ciudad_id)->envios->costo;
                        @endphp
                        <label class="rounded-lg shadow px-6 py-4 flex items-center mb-4 cursor-pointer">
                            <input id="envio" type="radio" value="2" name="envio_type_{{ $tiendas[$tienda]->id }}"
                                class="text-gray-600"
                                x-on:click="$wire.updateCosto({{ $tienda }},{{ $costo_ciudad }},2)">
                            <span class="ml-2 text-gray-700">
                                Envío a domicilio
                            </span>
                            <span class="font-semibold text-gray-700 ml-auto">
                                $ {{ number_format($costo_ciudad) }}
                            </span>
                        </label>
                    @else
                        <label class="rounded-lg shadow px-6 py-4 flex items-center mb-4 cursor-pointer">
                            <input id="envio" type="radio" value="3" name="envio_type_{{ $tiendas[$tienda]->id }}"
                                class="text-gray-600"
                                x-on:click="event.target.checked=false;simpleAlert('center','error','Error...','Primero debe seccionar una ciudad destino',true);">
                            <span class="ml-2 text-gray-700">
                                Envío a domicilio
                            </span>
                            <span class="font-semibold text-red-600 ml-auto">
                                Debe seleccionar una ciudad
                            </span>
                        </label>
                    @endif
                    <hr>
                    @foreach ($products as $item)
                        <article class="flex p-2">
                            <img class="h-16 w-16 object-cover mr-4 rounded-full" src="{{ $item->options->image }}"
                                alt="">
                            <div class="flex-1">
                                <h1 class="font-bold text-sm text-gray-600">{{ $item->name }}</h1>
                                <div class="flex text-sm text-gray-500">
                                    <p>Cant: {{ $item->qty }}</p>
                                    @isset($item->options['color'])
                                        <p class="mx-2">- Color: {{ __($item->options['color']) }}</p>
                                    @endisset
                                    @isset($item->options['talla'])
                                        <p>- Talla: {{ $item->options['talla'] }}</p>
                                    @endisset
                                </div>
                                <p class="text-sm text-gray-500">$ {{ number_format($item->price) }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endforeach
        <div>
            <x-boton class="w-full h-10" wire:click="save">
                Realizar pedido
            </x-boton>
            <hr>
            <p class="text-sm text-gray-700 mt-2">Todos los datos son usados y protegidos conforme es establecido en
                las
                <a href="{{ route('politicas') }}" class="font-semibold text-orange-500">Políticas y privacidad</a>
            </p>
        </div>
    </div>
    <div class="order-1 w-11/12 lg:order-2 lg:col-span-1">
        <div class="bg-white rounded-lg shadow p-6 sticky top-44 left-0">
            <p class="font-semibold">Resumen de compra</p>
            <hr class="mt-4 mb-3">
            <div class="text-gray-700">
                <p class="flex justify-between items-center">
                    Productos ({{ Cart::count() }})
                    <span class="font-semibold">$ {{ Cart::subtotal() }}</span>
                </p>
                <p class="flex justify-between items-center">
                    Envío
                    @if ($costo > 0)
                        <span class="font-semibold">$ {{ number_format($costo) }}</span>
                    @else
                        <span class="font-semibold">Gratis</span>
                    @endif
                </p>
                <hr class="mt-4 mb-3">
                <p class="flex justify-between items-center font-semibold">
                    <span class="text-lg">Total</span>
                    <span class="font-semibold">$
                        {{ number_format((float) Cart::subtotal(0, ',', '.') * 1000 + $costo) }}</span>
                </p>
            </div>
        </div>
    </div>
    <script>
        const input = document.querySelectorAll('.domicilio_error');
        const inputs = document.querySelectorAll('#envio');
        const obtener_pixeles_inicio = () => document.documentElement.scrollTop || document.body.scrollTop;
        const ir_arriba = () => {
            if (obtener_pixeles_inicio() > 0) {
                requestAnimationFrame(ir_arriba);
                scrollTo(0, obtener_pixeles_inicio() - (obtener_pixeles_inicio() / 10));
            }
        }
        inputs.forEach(elemento => {
            document.addEventListener('DOMContentLoaded', e => {
                elemento.checked = false;
            })
        });
        window.addEventListener('limpiar', e => {
            const inputs = document.querySelectorAll('#envio');
            inputs.forEach(elemento => {
                elemento.checked = false;
            })
        });
        window.addEventListener('ir_arriba', ir_arriba);
        window.addEventListener('agregar_envio', e => {
            console.log(e.detail);
            simpleAlert(
                'center',
                'warning',
                'Necesita definir el tipo de envío',
                `Defina el tipo de envío de la tienda: ${e.detail}`,
                true);
        });
    </script>
</main>