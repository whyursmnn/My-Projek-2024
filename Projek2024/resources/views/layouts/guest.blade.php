<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

       <!-- Fonts -->
       <link rel="preconnect" href="https://fonts.bunny.net">
       <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
       <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
       <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

       <!-- Scripts -->
       @vite(['resources/css/app.css', 'resources/js/app.js'])
       @vite('resources/css/app.css')
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gradient-to-r from-blue-100 via-white to-blue-100">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="text-center mb-6">
                <a href="/">
                    <x-application-logo class="w-24 h-24 text-blue-600" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-lg rounded-lg border-2 border-blue-300">
                <!-- Form content goes here -->
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
