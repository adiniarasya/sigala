<x-app-layout>
    <div class="max-w-xl mx-auto w-full">
        
        <div class="mb-6 flex items-center">
            <a href="{{ route('dashboard') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Lainnya</h1>
        </div>

        <div class="grid grid-cols-1 gap-4">
            <a href="{{ route('lainnya.kartu-darurat') }}" class="flex items-center p-6 bg-white border border-gray-100 rounded-3xl shadow-sm hover:shadow-md transition">
                <div class="w-14 h-14 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center mr-5 text-2xl">
                    🆔
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-lg text-sigala-dark">Kartu Darurat Digital</h3>
                    <p class="text-sm text-gray-500">Data penting untuk pertolongan darurat.</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

            <a href="{{ route('lainnya.kontak-darurat') }}" class="flex items-center p-6 bg-white border border-gray-100 rounded-3xl shadow-sm hover:shadow-md transition">
                <div class="w-14 h-14 bg-blue-50 text-sigala-blue rounded-2xl flex items-center justify-center mr-5 text-2xl">
                    📞
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-lg text-sigala-dark">Kontak Darurat</h3>
                    <p class="text-sm text-gray-500">Daftar nomor penting saat darurat.</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

            <a href="{{ route('lainnya.panduan-evakuasi') }}" class="flex items-center p-6 bg-white border border-gray-100 rounded-3xl shadow-sm hover:shadow-md transition">
                <div class="w-14 h-14 bg-teal-50 text-teal-600 rounded-2xl flex items-center justify-center mr-5 text-2xl">
                    🧭
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-lg text-sigala-dark">Panduan Evakuasi</h3>
                    <p class="text-sm text-gray-500">Langkah aman saat evakuasi bencana.</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

            <a href="{{ route('lainnya.tentang') }}" class="flex items-center p-6 bg-white border border-gray-100 rounded-3xl shadow-sm hover:shadow-md transition">
                <div class="w-14 h-14 bg-purple-50 text-purple-500 rounded-2xl flex items-center justify-center mr-5 text-2xl">
                    ℹ️
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-lg text-sigala-dark">Tentang Aplikasi</h3>
                    <p class="text-sm text-gray-500">Informasi tentang SIGALA dan sumber data.</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

            <a href="{{ route('lainnya.faq') }}" class="flex items-center p-6 bg-white border border-gray-100 rounded-3xl shadow-sm hover:shadow-md transition">
                <div class="w-14 h-14 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center mr-5 text-2xl">
                    ❓
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-lg text-sigala-dark">FAQ</h3>
                    <p class="text-sm text-gray-500">Pertanyaan yang sering diajukan.</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>

    </div>
</x-app-layout>