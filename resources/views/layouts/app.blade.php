<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Estilos adicionales -->
        @stack('styles')
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen">
            <!-- Navegación -->
            @include('layouts.navigation')

            <!-- Encabezado de la página -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Contenido principal -->
            <main class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
                @yield('content')
            </main>
        </div>

        <!-- Scripts adicionales -->
        @stack('scripts')
    </body>
</html>