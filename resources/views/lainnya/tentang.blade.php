<x-app-layout>
    <div class="max-w-xl mx-auto w-full">
        <div class="mb-6 flex items-center">
            <a href="{{ route('lainnya.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Tentang Aplikasi</h1>
        </div>

        <div class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm text-center mb-6">
            <div class="w-20 h-20 bg-sigala-blue rounded-2xl flex items-center justify-center text-white text-3xl font-extrabold mx-auto mb-4 shadow-lg shadow-blue-200">
                S
            </div>
            <h2 class="text-2xl font-extrabold text-sigala-dark mb-2">SIGALA</h2>
            <p class="text-sm text-gray-500 mb-4">Sistem Informasi Siaga dan Layanan Kesehatan Bencana</p>
            <p class="text-xs text-sigala-blue font-bold italic">"Bersama, Tanggap, Selamat"</p>
        </div>

        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm mb-6">
            <h3 class="font-bold text-sigala-dark mb-3">Tentang SIGALA</h3>
            <p class="text-sm text-gray-600 leading-relaxed mb-4">
                SIGALA adalah aplikasi kesiapsiagaan bencana dan kesehatan terpadu yang dirancang untuk membantu masyarakat Indonesia menghadapi situasi darurat. Aplikasi ini menggabungkan edukasi bencana, skrining kesehatan, pertolongan pertama, dan konsultasi dengan perawat dalam satu platform.
            </p>
            <p class="text-sm text-gray-600 leading-relaxed">
                Kami percaya bahwa kesiapsiagaan hari ini adalah keselamatan di masa depan. Melalui SIGALA, kami berharap dapat meningkatkan kesadaran dan kesiapan masyarakat dalam menghadapi bencana.
            </p>
        </div>

        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
            <h3 class="font-bold text-sigala-dark mb-3">Sumber Data</h3>
            <div class="space-y-3">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-blue-50 text-sigala-blue rounded-lg flex items-center justify-center mr-3 font-bold text-xs">BMKG</div>
                    <p class="text-sm text-gray-600">Badan Meteorologi, Klimatologi, dan Geofisika</p>
                </div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-blue-50 text-sigala-blue rounded-lg flex items-center justify-center mr-3 font-bold text-xs">BNPB</div>
                    <p class="text-sm text-gray-600">Badan Nasional Penanggulangan Bencana</p>
                </div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-blue-50 text-sigala-blue rounded-lg flex items-center justify-center mr-3 font-bold text-xs">Kemenkes</div>
                    <p class="text-sm text-gray-600">Kementerian Kesehatan Republik Indonesia</p>
                </div>
            </div>
        </div>

        <div class="mt-6 text-center">
            <p class="text-xs text-gray-400">Versi 1.0.0 &copy; {{ date('Y') }} SIGALA</p>
        </div>
    </div>
</x-app-layout>