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

    <!-- Tailwind CSS (Vite managed) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Flowbite CSS -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="font-sans antialiased bg-blue-50">

    <!-- Main Container -->
    <div class="min-h-screen bg-white dark:bg-gray-900">

        <!-- Navbar -->
        @include('layouts.student.navStudent')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-blue-600 text-white shadow-lg mb-8">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Content goes here -->
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Flowbite JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.2/dist/flowbite.min.js"></script>
</body>
</html>
