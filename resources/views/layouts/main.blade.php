<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }} | @yield('title')</title>

        @include('layouts.includes.header-scripts')
    </head>
    <body>
        @include('layouts.includes.header')
        @yield('content')
        @include('layouts.includes.footer')
        @include('layouts.includes.footer-scripts')
    </body>
</html>
