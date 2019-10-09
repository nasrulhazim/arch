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
</head>
<body>
    <div id="app">
        @yield('navigation')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <div class="row">
        <div class="col text-center">
            <p class="text-muted">Copyright &copy; {{ date('Y') }} {{ config('app.name') }}</p>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    @include('sweet::alert')
    @routes
    @stack('scripts')
</body>
</html>
