<x-app-layout>
    <div class="max-w-xl mx-auto w-full pb-24">
        
        <div class="mb-6 flex items-center">
            <a href="{{ route('edukasi.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Butuh Bantuan Darurat?</h1>
        </div>

        <div class="w-full h-48 sm:h-56 bg-blue-50 rounded-3xl mb-6 flex items-center justify-center relative overflow-hidden border border-blue-100">
            <div class="text-8xl relative z-10">🆘</div>
        </div>

        <h2 class="text-center text-lg font-bold text-sigala-dark mb-8 px-4">Segera hubungi layanan darurat jika terjadi kondisi gawat darurat.</h2>

        <div class="space-y-4 mb-8">
            <a href="tel:112" class="flex items-center p-4 bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-red-600 text-white rounded-xl flex items-center justify-center font-extrabold text-sm mr-4 shrink-0">SOS</div>
                <div class="flex-1">
                    <h3 class="font-extrabold text-2xl text-sigala-blue leading-none mb-1">112</h3>
                    <p class="text-xs text-gray-500 font-semibold">Layanan Darurat Nasional</p>
                </div>
            </a>
            <a href="tel:117" class="flex items-center p-4 bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-white border border-gray-100 rounded-xl flex items-center justify-center text-2xl mr-4 shrink-0">🚑</div>
                <div class="flex-1">
                    <h3 class="font-extrabold text-2xl text-sigala-blue leading-none mb-1">117</h3>
                    <p class="text-xs text-gray-500 font-semibold">Ambulans</p>
                </div>
            </a>

            @php
                $alamat = strtolower(Auth::user()->alamat ?? '');
                $linkBpbd = '#';
                
                if (str_contains($alamat, 'jakarta')) {
                    $linkBpbd = 'https://bpbd.jakarta.go.id/';
                } elseif (str_contains($alamat, 'bandung')) {
                    $linkBpbd = 'https://bpbd.bandung.go.id/';
                } elseif (str_contains($alamat, 'surabaya')) {
                    $linkBpbd = 'https://bpbd.surabaya.go.id/';
                } elseif (str_contains($alamat, 'semarang')) {
                    $linkBpbd = 'https://bpbd.semarangkota.go.id/';
                } elseif (str_contains($alamat, 'yogyakarta')) {
                    $linkBpbd = 'https://bpbd.jogjaprov.go.id/';
                } elseif (str_contains($alamat, 'medan')) {
                    $linkBpbd = 'https://bpbd.medan.go.id/';
                } elseif (str_contains($alamat, 'makassar')) {
                    $linkBpbd = 'https://bpbd.makassar.go.id/';
                } elseif (str_contains($alamat, 'bekasi')) {
                    $linkBpbd = 'https://bpbd.bekasikab.go.id/';
                } elseif (str_contains($alamat, 'depok')) {
                    $linkBpbd = 'https://bpbd.jabarprov.go.id/'; 
                } else {
                    $linkBpbd = 'https://bnpb.go.id/';
                }
            @endphp

            <a href="{{ $linkBpbd }}" target="_blank" class="flex items-center p-4 bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-white border border-gray-100 rounded-xl flex items-center justify-center text-2xl mr-4 shrink-0">🏢</div>
                <div class="flex-1">
                    <h3 class="font-extrabold text-2xl text-sigala-blue leading-none mb-1">BPBD</h3>
                    <p class="text-xs text-gray-500 font-semibold">Badan Penanggulangan Bencana Daerah</p>
                </div>
                <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
        </div>

        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 flex items-start">
            <div class="w-6 h-6 bg-sigala-blue text-white rounded-full flex items-center justify-center mr-3 shrink-0 mt-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <p class="text-xs text-sigala-dark leading-relaxed font-semibold">Simpan nomor ini agar dapat diakses dengan cepat saat dibutuhkan.</p>
        </div>

    </div>
</x-app-layout>