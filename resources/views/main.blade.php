<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="{{ config('app.env') === 'local' ? asset('css/app.css') : secure_asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        @yield('styles')
    </head>
    <body class="h-screen">
        @include('components.header')
        <div class="container mt-5 mx-auto w-screen flex justify-center">
            @yield('content')
        </div>
        @yield('scripts')
    </body>
</html>
