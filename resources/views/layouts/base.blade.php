<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('layouts.partials.asset-font-awesome')
    @include('layouts.partials.argon')
    @stack('styles')
    <style type="text/css">
        .card-header {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 12px;
            padding-right: 12px;
        }
        .breadcrumb {
            margin-bottom: 0px;
            padding-top: 6px;
            padding-bottom: 6px;
        }
        .transparent-bg-on-focus:focus {
            background-color: transparent;
        }
    </style>
</head>
<body>
    @yield('navigation')

    @yield('content')
    
    @yield('footer')
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    @include('sweet::alert')
    @routes
    @stack('scripts')
</body>
</html>
