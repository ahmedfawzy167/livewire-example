<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link rel="icon" href="{{ asset('assets/icon.png') }}">
        @livewireStyles
        @include('components.layouts.head-assets')

    </head>
    <body>
        
    @yield('content')


    @livewireScripts
 
    @include('components.layouts.scripts')
   
    </body>
</html>
