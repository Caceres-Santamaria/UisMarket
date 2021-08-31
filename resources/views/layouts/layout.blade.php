<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="theme-color" content="#67B93E">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no">
    <title>Uis Market | @yield('title')</title>
    <!--Css-->
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fuentes.css') }}">

    @yield('css')
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scriptHeader')
</head>
<body class="font-light font-ModernSans text-black">
    <div class="contenedor  grid grid-cols-1 grid-rows-3m grid-areas-layout min-h-screen">
        {{-- @include('components/menuResponsive') --}}
        {{-- @include('components/carritoDesplegable') --}}
        {{-- <div id="busqueda" class="busqueda">
            <livewire:buscar />
        </div> --}}
        {{-- <div class="ir-arriba" id="ir-arriba">
            <i class="fas fa-angle-up"></i>
        </div> --}}
        @include('componentes/header')

        @yield('contenido')

        @include('componentes/footer')
    </div>
    @yield('scriptFooter')
</body>
</html>