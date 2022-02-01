@component('layouts.mail')
{{-- @component('mail::message') --}}
Su pedido N°{{ $pedido->id }} ha sido enviado por la tienda {{ $tienda->nombre }}

Para mayor información mira el detalle de su pedido

@component('mail::button', ['url' => route('register'),'color' => 'green'])
Ver Detalle de pedido
@endcomponent

{{ __('If you already have an account, you may accept this invitation by clicking the button below:') }}

@component('mail::button', ['url' => route('register'),'color' => 'green'])
{{ __('Accept Invitation') }}
@endcomponent

{{ __('If you did not expect to receive an invitation to this team, you may discard this email.') }}
@endcomponent
