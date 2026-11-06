<x-app-layout>
    <div class="mb-8">
        <h1 class="text-2xl font-extrabold text-sigala-dark mb-1">Dashboard Admin SIGALA</h1>
        <p class="text-gray-500 text-sm">Ringkasan statistik aplikasi dan pengguna.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-br from-sigala-blue to-blue-600 rounded-3xl p-6 shadow-lg shadow-blue-200/50 text-white">
            <p class="text-sm font-semibold text-blue-100 mb-1">Total Pengguna</p>
            <h3 class="text-4xl font-black">{{ $totalUser }}</h3>
        </div>
        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-500 mb-1">Masyarakat (Pengguna)</p>
            <h3 class="text-3xl font-black text-sigala-dark">{{ $totalPengguna }}</h3>
        </div>
        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-500 mb-1">Tenaga Kesehatan (Perawat)</p>
            <h3 class="text-3xl font-black text-teal-600">{{ $totalPerawat }}</h3>
        </div>
    </div>

    <div class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm text-center">
        <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-10 h-10 text-sigala-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        </div>
        <h3 class="text-lg font-bold text-sigala-dark mb-2">Kelola Aplikasi</h3>
        <p class="text-sm text-gray-500 mb-6 max-w-md mx-auto">Gunakan menu di sidebar untuk mengelola pengguna, konten edukasi, dan data peringatan dini.</p>
        <a href="{{ route('admin.pengguna') }}" class="inline-flex px-6 py-3 bg-sigala-blue text-white text-sm font-bold rounded-xl shadow-md hover:bg-blue-700 transition">
            Buka Kelola Pengguna
        </a>
    </div>
</x-app-layout>