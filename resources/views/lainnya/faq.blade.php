<x-app-layout>
    <div class="max-w-xl mx-auto w-full">
        <div class="mb-6 flex items-center">
            <a href="{{ route('lainnya.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">FAQ (Pertanyaan Umum)</h1>
        </div>

        <div class="space-y-3" x-data="{ open: null }">
            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
                <button @click="open = (open === 1 ? null : 1)" class="w-full flex items-center justify-between p-4 text-left">
                    <span class="font-bold text-sm text-sigala-dark">Apa itu SIGALA?</span>
                    <svg class="w-5 h-5 text-gray-400 transition-transform" :class="open === 1 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open === 1" x-collapse class="px-4 pb-4">
                    <p class="text-sm text-gray-600">SIGALA adalah Sistem Informasi Siaga dan Layanan Kesehatan Bencana. Aplikasi ini membantu Anda mempersiapkan diri menghadapi bencana dan menjaga kesehatan.</p>
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
                <button @click="open = (open === 2 ? null : 2)" class="w-full flex items-center justify-between p-4 text-left">
                    <span class="font-bold text-sm text-sigala-dark">Apakah data saya aman?</span>
                    <svg class="w-5 h-5 text-gray-400 transition-transform" :class="open === 2 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open === 2" x-collapse class="px-4 pb-4">
                    <p class="text-sm text-gray-600">Ya, kami berkomitmen untuk melindungi data pribadi Anda. Informasi kesehatan hanya digunakan untuk keperluan konsultasi dan tidak dibagikan ke pihak ketiga.</p>
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
                <button @click="open = (open === 3 ? null : 3)" class="w-full flex items-center justify-between p-4 text-left">
                    <span class="font-bold text-sm text-sigala-dark">Bagaimana cara menggunakan Tas Siaga?</span>
                    <svg class="w-5 h-5 text-gray-400 transition-transform" :class="open === 3 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open === 3" x-collapse class="px-4 pb-4">
                    <p class="text-sm text-gray-600">Buka menu Tas Siaga, lalu centang barang-barang yang sudah Anda siapkan. Sistem akan menghitung skor kesiapan Anda secara otomatis.</p>
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
                <button @click="open = (open === 4 ? null : 4)" class="w-full flex items-center justify-between p-4 text-left">
                    <span class="font-bold text-sm text-sigala-dark">Apakah konsultasi di SIGALA gratis?</span>
                    <svg class="w-5 h-5 text-gray-400 transition-transform" :class="open === 4 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open === 4" x-collapse class="px-4 pb-4">
                    <p class="text-sm text-gray-600">Ya, fitur konsultasi dengan perawat di SIGALA sepenuhnya gratis untuk masyarakat umum.</p>
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
                <button @click="open = (open === 5 ? null : 5)" class="w-full flex items-center justify-between p-4 text-left">
                    <span class="font-bold text-sm text-sigala-dark">Apakah aplikasi ini bisa digunakan tanpa internet?</span>
                    <svg class="w-5 h-5 text-gray-400 transition-transform" :class="open === 5 ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open === 5" x-collapse class="px-4 pb-4">
                    <p class="text-sm text-gray-600">Ya, beberapa fitur seperti Panduan Pertolongan Pertama dan Edukasi dapat diakses secara offline (tanpa internet) setelah Anda menginstal aplikasi ini.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>