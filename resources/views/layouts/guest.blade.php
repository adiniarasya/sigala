<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SIGALA - Sistem Informasi Siaga dan Layanan Kesehatan Bencana</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <meta name="theme-color" content="#1E66D0">
    <link rel="apple-touch-icon" href="/icon-192x192.png">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-sigala-light relative overflow-hidden">
            
            <div class="absolute top-[-10%] left-[-10%] w-96 h-96 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-green-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden sm:rounded-3xl relative z-10 border border-gray-100">
                {{ $slot }}
            </div>

            <div class="mt-8 text-xs text-gray-400 relative z-10">
                &copy; {{ date('Y') }} SIGALA. Bersama, Tanggap, Selamat.
            </div>
        </div>
    </body>
</html>