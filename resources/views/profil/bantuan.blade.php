<x-app-layout>
    <div class="max-w-xl mx-auto w-full pb-24">
        <div class="mb-6 flex items-center">
            <a href="{{ route('profil') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm hover:bg-gray-50 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Bantuan & FAQ</h1>
        </div>
        
        <div class="space-y-4">
            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                <h4 class="font-bold text-sigala-dark text-sm mb-2">Apa itu SIGALA?</h4>
                <p class="text-xs text-gray-500 leading-relaxed">SIGALA adalah aplikasi Siaga Bencana yang membantu Anda mempersiapkan diri menghadapi bencana dan mendapatkan akses konsultasi kesehatan darurat.</p>
            </div>
            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                <h4 class="font-bold text-sigala-dark text-sm mb-2">Bagaimana cara berkonsultasi dengan perawat?</h4>
                <p class="text-xs text-gray-500 leading-relaxed">Buka menu Konsultasi, pilih jenis keluhan, lalu isi form. Anda akan dihubungkan dengan perawat yang bertugas.</p>
            </div>
            <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                <h4 class="font-bold text-sigala-dark text-sm mb-2">Apakah data saya aman?</h4>
                <p class="text-xs text-gray-500 leading-relaxed">Ya, kami menggunakan enkripsi data dan tidak membagikan informasi pribadi Anda ke pihak yang tidak bertanggung jawab.</p>
            </div>
        </div>
    </div>
</x-app-layout>