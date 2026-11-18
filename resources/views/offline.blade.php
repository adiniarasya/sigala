<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offline - SIGALA</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#f8fafc] h-screen flex flex-col items-center justify-center p-6 text-center">
    <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center shadow-lg mb-6">
        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 010 12.728m0 0l-2.829-2.829m2.829 2.829L21 21M15.536 8.464a5 5 0 010 7.072m0 0l-2.829-2.829m-4.243 2.829a4.978 4.978 0 01-1.414-2.83m-1.414 5.658a9 9 0 01-2.167-9.238m7.824 2.167a1 1 0 111.414 1.414m-1.414-1.414L3 3m8.293 8.293l1.414 1.414"></path></svg>
    </div>
    <h1 class="text-2xl font-extrabold text-sigala-dark mb-2">Anda Sedang Offline</h1>
    <p class="text-gray-500 mb-6">Koneksi internet terputus. Silakan periksa jaringan Anda dan coba lagi.</p>
    <button onclick="window.location.reload()" class="px-6 py-3 bg-sigala-blue text-white font-bold rounded-xl shadow-md">Coba Lagi</button>
</body>
</html>