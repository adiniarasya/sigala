<x-app-layout>
    <div class="max-w-xl mx-auto w-full">
        
        <div class="mb-6 flex items-center">
            <a href="{{ route('lainnya.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Kartu Darurat Digital</h1>
        </div>

        <div class="bg-gradient-to-br from-sigala-blue to-blue-600 rounded-3xl p-8 shadow-xl text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2"></div>
            
            <div class="flex items-center mb-6 relative z-10">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center text-3xl font-bold mr-4 backdrop-blur-sm border border-white/20">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold">{{ Auth::user()->name }}</h2>
                    <p class="text-blue-100 text-sm">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 relative z-10">
                <div class="bg-white/10 rounded-xl p-3 border border-white/20">
                    <p class="text-[10px] text-blue-100 font-bold uppercase tracking-wider mb-1">Golongan Darah</p>
                    <p class="text-lg font-bold">{{ Auth::user()->golongan_darah ?? '-' }}</p>
                </div>
                <div class="bg-white/10 rounded-xl p-3 border border-white/20">
                    <p class="text-[10px] text-blue-100 font-bold uppercase tracking-wider mb-1">No. WhatsApp</p>
                    <p class="text-lg font-bold">{{ Auth::user()->whatsapp ?? '-' }}</p>
                </div>
                <div class="bg-white/10 rounded-xl p-3 border border-white/20">
                    <p class="text-[10px] text-blue-100 font-bold uppercase tracking-wider mb-1">Alergi</p>
                    <p class="text-sm font-bold">{{ Auth::user()->alergi ?? 'Tidak ada' }}</p>
                </div>
                <div class="bg-white/10 rounded-xl p-3 border border-white/20">
                    <p class="text-[10px] text-blue-100 font-bold uppercase tracking-wider mb-1">Riwayat Penyakit</p>
                    <p class="text-sm font-bold">{{ Auth::user()->riwayat_penyakit ?? 'Tidak ada' }}</p>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-white/20 relative z-10">
                <p class="text-xs text-blue-100 text-center italic">Tunjukkan kartu ini dalam kondisi darurat.</p>
            </div>
        </div>

        <div class="mt-6 bg-white border border-gray-100 rounded-2xl p-4 flex items-start shadow-sm">
            <div class="w-6 h-6 bg-sigala-blue text-white rounded-full flex items-center justify-center mr-3 shrink-0 mt-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <p class="text-xs text-sigala-dark leading-relaxed font-semibold">Lengkapi data alergi dan riwayat penyakit di halaman Profil agar kartu ini lebih informatif.</p>
        </div>

    </div>
</x-app-layout>