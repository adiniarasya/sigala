<x-app-layout>
    <div class="max-w-xl mx-auto w-full">
        
        <div class="mb-6 flex items-center">
            <a href="{{ route('konsultasi.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Pilih Jenis Konsultasi</h1>
        </div>

        <p class="text-sm font-semibold text-sigala-dark mb-6">Pilih jenis konsultasi yang Anda butuhkan.</p>

        <div class="space-y-4">
            <a href="{{ route('konsultasi.mulai', ['jenis' => 'Konsultasi Keluhan Kesehatan']) }}" class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm hover:shadow-md transition flex items-center group">
                <div class="w-14 h-14 bg-purple-50 text-purple-500 rounded-full flex items-center justify-center mr-5 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-base text-sigala-dark">Konsultasi Keluhan Kesehatan</h3>
                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">Jika Anda merasa kurang sehat, atau mengalami keluhan tertentu.</p>
                </div>
                <svg class="w-5 h-5 text-sigala-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

            <a href="{{ route('konsultasi.mulai', ['jenis' => 'Konsultasi Hasil Skrining']) }}" class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm hover:shadow-md transition flex items-center group">
                <div class="w-14 h-14 bg-teal-50 text-teal-600 rounded-full flex items-center justify-center mr-5 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-base text-sigala-dark">Konsultasi Hasil Skrining</h3>
                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">Jika Anda ingin menanyakan hasil skrining kesehatan.</p>
                </div>
                <svg class="w-5 h-5 text-sigala-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

            <a href="{{ route('konsultasi.mulai', ['jenis' => 'Konsultasi Terkait Bencana']) }}" class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm hover:shadow-md transition flex items-center group">
                <div class="w-14 h-14 bg-red-50 text-red-500 rounded-full flex items-center justify-center mr-5 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-base text-sigala-dark">Konsultasi Terkait Bencana</h3>
                    <p class="text-xs text-gray-500 mt-1 leading-relaxed">Jika Anda membutuhkan saran kesehatan saat atau setelah bencana.</p>
                </div>
                <svg class="w-5 h-5 text-sigala-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
    </div>
</x-app-layout>