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

    <title>{{ config('app.name', 'Uis Market Admin') }} | {{ $title }}</title>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ mix('css/fontawesome.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/general.css') }}">
    <link rel="stylesheet" href="{{ mix('css/sweetalert2.min.css') }}">
    @stack('css')

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    @stack('scriptHeader')
</head>

<body class="box-border w-full antialiased text-black font-ModernSans">
    <div id="root" x-data>
        <x-admin-nav />
        <div class="relative md:ml-64 bg-blueGray-50">
            <nav
                class="absolute top-0 left-0 z-10 flex items-center w-full p-4 bg-transparent md:flex-row md:flex-nowrap md:justify-start">
                <div class="flex flex-wrap items-center justify-between w-full px-4 mx-autp md:flex-nowrap md:px-10">
                    <a class="hidden text-sm font-semibold text-white uppercase md:inline-block"
                        href="{{ route('admin.dashboard') }}">Dashboard</a>
                    @auth
                        <x-dropdown-admin class="hidden sm:ml-4" />
                    @endauth
                </div>
            </nav>
            <!-- Header -->
            <div class="relative pt-12 pb-32 bg-primario-n md:pt-32">
                <div class="w-full px-4 mx-auto md:px-10">
                    <div class="flex flex-wrap justify-evenly">
                        @if (isset($cards))
                            {{ $cards }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-full px-4 mx-auto -m-24 md:px-10">
                {{ $slot }}
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("bg-white");
            document.getElementById(collapseID).classList.toggle("m-2");
            document.getElementById(collapseID).classList.toggle("py-3");
            document.getElementById(collapseID).classList.toggle("px-6");
        }
    </script>
    @stack('modals')
    @livewireScripts
    @stack('scripts')
</body>

</html>
