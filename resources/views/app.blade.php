<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="moja osobná stránka">
        <meta name="keywords" content="všeličo">
        <meta name="author" content="Martin Púchly">
        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @routes
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="font-sans antialiased ">
        @inertia
        <div class="container text-center mt-2" style="color:white">
            mWeb.sk, © {{ Date('Y') }}
        </div>
    </body>
</html>
