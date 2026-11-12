<x-app-layout>
    <div class="max-w-xl mx-auto w-full pb-24">
        <div class="mb-6 flex items-center">
            <a href="{{ route('profil') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm hover:bg-gray-50 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Kebijakan Privasi</h1>
        </div>
        
        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
            <p class="text-sm text-gray-600 leading-relaxed mb-4">
                Kami di SIGALA berkomitmen untuk melindungi informasi pribadi Anda. Data lokasi, riwayat kesehatan, dan informasi pribadi yang Anda berikan hanya akan digunakan untuk keperluan konsultasi medis, peringatan dini bencana, dan keperluan darurat.
            </p>
            <p class="text-sm text-gray-600 leading-relaxed mb-4">
                Kami tidak akan pernah menjual atau membagikan data Anda kepada pihak ketiga tanpa izin Anda, kecuali diwajibkan oleh hukum atau dalam situasi darurat yang mengancam nyawa.
            </p>
            <p class="text-sm text-gray-600 leading-relaxed">
                Anda memiliki hak penuh untuk mengubah atau menghapus data Anda kapan saja melalui menu pengaturan profil.
            </p>
        </div>
    </div>
</x-app-layout>