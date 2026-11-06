<x-app-layout>
    <div class="max-w-xl mx-auto w-full">
        
        <div class="mb-6 flex items-center">
            <a href="{{ route('dashboard') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Konsultasi</h1>
        </div>

        @if($activeChat)
            <div class="bg-blue-50 border border-blue-100 rounded-3xl p-6 mb-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <div>
                    <h3 class="font-bold text-sigala-dark text-lg">Anda memiliki konsultasi aktif</h3>
                    <p class="text-sm text-gray-600">Lanjutkan obrolan Anda dengan perawat.</p>
                </div>
                <a href="{{ route('konsultasi.chat', $activeChat->id) }}" class="px-6 py-3 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition">
                    Lanjutkan Chat
                </a>
            </div>
        @else
            <div class="text-center mb-8">
                <div class="w-full max-w-xs mx-auto mb-6">
                    <img src="https://img.freepik.com/free-vector/doctor-concept-illustration_114360-1176.jpg" alt="Perawat" class="w-full h-auto object-cover rounded-3xl mix-blend-multiply">
                </div>
                <h2 class="text-2xl font-extrabold text-sigala-dark mb-2">Konsultasi dengan Perawat</h2>
                <p class="text-sm text-gray-500 px-4 leading-relaxed">Dapatkan bantuan dan saran dari perawat profesional mengenai kondisi kesehatan Anda, terutama saat terjadi bencana atau kondisi darurat.</p>
            </div>

            <div class="bg-blue-50/50 border border-blue-100 rounded-2xl p-6 mb-8 space-y-4">
                <div class="flex items-start">
                    <div class="w-8 h-8 bg-blue-100 text-sigala-blue rounded-full flex items-center justify-center mr-3 shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-xs text-gray-600 font-medium pt-1">Konsultasi langsung melalui chat atau video call.</p>
                </div>
                <div class="flex items-start">
                    <div class="w-8 h-8 bg-blue-100 text-sigala-blue rounded-full flex items-center justify-center mr-3 shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <p class="text-xs text-gray-600 font-medium pt-1">Kerahasiaan data dan informasi Anda terjamin.</p>
                </div>
                <div class="flex items-start">
                    <div class="w-8 h-8 bg-blue-100 text-sigala-blue rounded-full flex items-center justify-center mr-3 shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    </div>
                    <p class="text-xs text-gray-600 font-medium pt-1">Bisa menerima resep atau rekomendasi pertolongan pertama.</p>
                </div>
            </div>

            <a href="{{ route('konsultasi.jenis') }}" class="block w-full py-4 bg-sigala-blue text-white text-center font-bold rounded-xl shadow-md hover:bg-blue-700 transition mb-4">
                Mulai Konsultasi &rarr;
            </a>
        @endif

        <a href="{{ route('konsultasi.riwayat') }}" class="block w-full py-4 bg-white border border-gray-200 text-sigala-dark text-center font-bold rounded-xl shadow-sm hover:bg-gray-50 transition">
            Lihat Riwayat Konsultasi
        </a>

    </div>
</x-app-layout>