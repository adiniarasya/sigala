<x-app-layout>
    <div class="max-w-xl mx-auto w-full">
        <div class="mb-6 flex items-center">
            <a href="{{ route('lainnya.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Panduan Evakuasi</h1>
        </div>

        <div class="space-y-4">
            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                <h3 class="font-bold text-sigala-dark mb-2 flex items-center">
                    <span class="w-6 h-6 bg-sigala-blue text-white rounded-full flex items-center justify-center text-xs mr-3">1</span>
                    Tetap Tenang
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">Jangan panik. Ikuti arahan petugas atau informasi resmi dari BMKG/BPBD.</p>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                <h3 class="font-bold text-sigala-dark mb-2 flex items-center">
                    <span class="w-6 h-6 bg-sigala-blue text-white rounded-full flex items-center justify-center text-xs mr-3">2</span>
                    Bawa Tas Siaga
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">Bawa tas siaga yang sudah disiapkan. Jangan lupa dokumen penting, obat pribadi, dan air minum.</p>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                <h3 class="font-bold text-sigala-dark mb-2 flex items-center">
                    <span class="w-6 h-6 bg-sigala-blue text-white rounded-full flex items-center justify-center text-xs mr-3">3</span>
                    Menuju Titik Kumpul
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">Segera menuju titik kumpul atau tempat evakuasi terdekat yang sudah ditentukan. Hindari menggunakan lift.</p>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                <h3 class="font-bold text-sigala-dark mb-2 flex items-center">
                    <span class="w-6 h-6 bg-sigala-blue text-white rounded-full flex items-center justify-center text-xs mr-3">4</span>
                    Jauhi Area Berbahaya
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">Jauhi bangunan retak, tiang listrik, pohon besar, dan area yang berpotensi longsor.</p>
            </div>

            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                <h3 class="font-bold text-sigala-dark mb-2 flex items-center">
                    <span class="w-6 h-6 bg-sigala-blue text-white rounded-full flex items-center justify-center text-xs mr-3">5</span>
                    Tetap Terhubung
                </h3>
                <p class="text-sm text-gray-600 leading-relaxed">Gunakan aplikasi SIGALA untuk memantau informasi peringatan dini dan hubungi keluarga.</p>
            </div>
        </div>

        <div class="mt-6 bg-blue-50 border border-blue-100 rounded-2xl p-4 flex items-start">
            <div class="w-6 h-6 bg-sigala-blue text-white rounded-full flex items-center justify-center mr-3 shrink-0 mt-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <p class="text-xs text-sigala-dark leading-relaxed font-semibold">Pastikan Anda selalu mengikuti arahan petugas di lapangan.</p>
        </div>
    </div>
</x-app-layout>