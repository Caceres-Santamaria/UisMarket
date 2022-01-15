
<button {{ $attributes->merge(['class' => "inline-flex items-center justify-center px-4 py-2 bg-primario-n border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primario-ligth active:bg-primario-dark focus:outline-none focus:border-primario-dark focus:ring focus:ring-gray-300 disabled:opacity-25 transition"]) }}>
{{$slot}}
</button>
