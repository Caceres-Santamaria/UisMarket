@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:ring focus:ring-gray-300 disabled:opacity-25 transition'
            : 'inline-flex items-center justify-center px-4 py-2 bg-primario-n border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primario-ligth active:bg-primario-dark focus:outline-none focus:border-primario-dark focus:ring focus:ring-gray-300 disabled:opacity-25 transition';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
