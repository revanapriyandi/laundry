<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />

    <title>{{ config('app.name') }} {{ $setting->name }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Main Styling -->
    <link href="{{ asset('assets/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/choice.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/datatables.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tooltips.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/soft-ui-dashboard-tailwind.min.css?v=1.0.1') }}" rel="stylesheet" />

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


</head>

<body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500 dark:text-white">
    @include('layouts.aside')

    <!-- Page Content -->
    <main
        class="ease-soft-in-out xl:ml-68 relative h-full max-h-screen rounded-xl transition-all duration-200 ps ps--active-y ps--active-x">

        @include('layouts.navigation', ['header' => $header ?? ''])

        <div class="w-full px-6 py-6 mx-auto">
            {{ $slot }}
            @include('layouts.toast')

        </div>
        @include('layouts.footer')

    </main>


    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/choice.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables.min.js') }}"></script>

    <script src="{{ asset('assets/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/tooltips.js') }}"></script>
    <script src="{{ asset('assets/js/nav-pills.js') }}"></script>
    <script src="{{ asset('assets/js/dropdown.js') }}"></script>
    <script src="{{ asset('assets/js/fixed-plugin.js') }}"></script>
    <script src="{{ asset('assets/js/sidenav-burger.js') }}"></script>
    <script src="{{ asset('assets/js/navbar-sticky.js') }}"></script>
    <script src="{{ asset('assets/js/choice.js') }}"></script>

    <script defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('assets/js/sidenav.js') }}"></script>
    <script src="{{ asset('assets/js/datatables.js') }}"></script>


    <!-- main script file  -->

    @stack('scripts')

</body>

</html>
