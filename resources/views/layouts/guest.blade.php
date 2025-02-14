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

    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans text-gray-900 antialiased">
    <img src="{{ asset('images/sksu_bg.jpg') }}" class="fixed w-full top-0 opacity-30" alt="">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-green-800">


        <div class="w-full sm:max-w-lg mt-6 px-6 relative py-6 bg-white shadow-md overflow-hidden rounded-2xl">
            <div class="flex justify-center">
                <a href="/">
                    <x-application-logo class="w-24 h-24 fill-current text-gray-500" />
                </a>
            </div>
            <div class="mt-5">

                <div class="mt-5">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
