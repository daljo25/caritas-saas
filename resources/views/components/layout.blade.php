<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mi Caritas - Gestión para Cáritas Parroquiales</title>
    <meta name="description" content="Sistema de gestión integral para Cáritas parroquiales. Optimiza la ayuda social en tu comunidad.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.svg" type="image/svg+xml">

    <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
    <style>
        /* Fallback styles if Vite isn't working */
        body {
            font-family: 'Instrument Sans', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.6;
        }
    </style>
    @endif
</head>

<body class="bg-gray-50">
    <x-header />
    {{ $slot }}
    <x-footer />
</body>
</html>