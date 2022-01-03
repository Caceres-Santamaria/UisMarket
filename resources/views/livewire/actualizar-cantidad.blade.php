<div class="flex items-center" x-data>
    <x-jet-secondary-button disabled x-bind:disabled="$wire.qty <= 1"
        wire:loading.attr="disabled" wire:target="decrementar"
        wire:click="decrementar">
        <i class="fas fa-minus text-xxs"></i>
    </x-jet-secondary-button>
    <span class="mx-2 text-gray-800">{{ $qty }}</span>
    <x-jet-secondary-button x-bind:disabled="$wire.qty >= $wire.cantidad"
        wire:loading.attr="disabled" wire:target="incrementar"
        wire:click="incrementar">
        <i class="fas fa-plus text-xxs"></i>
    </x-jet-secondary-button>
</div>
