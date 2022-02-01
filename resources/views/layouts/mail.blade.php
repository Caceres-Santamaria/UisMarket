@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<div style="display: flex;align-items: center;text-decoration-line: none;outline: 2px solid transparent;outline-offset: 2px;">
<img style="width: 3rem;" src="{{ asset('storage/images/website/logoN.png') }}" alt="logo uis market">
<h1 style="font-family: Delius, sans-serif;font-weight: 900;color: rgb(0 0 0);font-size: 1.5rem;height: 3.5rem;line-height: 3.5;margin-bottom:0;">Market</h1>
</div>
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.') {{-- Todoslosderechosreservados. --}}
@endcomponent
@endslot
@endcomponent
