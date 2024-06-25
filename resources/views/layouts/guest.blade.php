<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>NAD App Guest</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="relative overflow-hidden rounded-lg bg-cover bg-no-repeat p-12 text-center bg-fixed" style="background-image: url('{{ url('img/bullAndBear.png') }}');">
            {{-- <div class="font-sans text-gray-900 dark:text-gray-100 antialiased"> --}}

            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
