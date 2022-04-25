{{-- @include('components/menuResponsive') --}}
{{-- @include('components/carritoDesplegable') --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="theme-color" content="#67B93E">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('metas')

    <title>{{ config('app.name', 'Uis Market') }} | {{ $title }}</title>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ mix('css/fontawesome.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/general.css') }}">
    <link rel="stylesheet" href="{{ mix('css/sweetalert2.min.css') }}">
    @stack('css')

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/home.js') }}" defer></script>

    @stack('scriptHeader')
</head>

<body class="font-ModernSans antialiased text-black box-border w-full">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100 grid grid-cols-1 grid-rows-3m grid-areas-layout">
        <x-angle-up />

        <x-header />

        <!-- Page Content -->
        {{ $slot }}

        <x-footer />
    </div>
    @stack('modals')
    @livewireScripts
    @stack('scripts')
</body>

</html>
