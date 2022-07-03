@props(['view' => 'grid'])
<div class="hidden md:block lg:grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500 ml-2">
    <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-primario-dark2' : '' }}"
        wire:click="$set('view', 'grid')"></i>
    <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-primario-dark2' : '' }}"
        wire:click="$set('view', 'list')"></i>
</div>
