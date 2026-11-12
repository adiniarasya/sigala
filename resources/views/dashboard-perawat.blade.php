<x-app-layout>
    <div class="mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-sigala-dark mb-1 tracking-tight">Halo, Perawat {{ Auth::user()->name }} 👋</h1>
            <p class="text-sm text-gray-500">Berikut ringkasan antrean pasien Anda hari ini.</p>
        </div>
        <div class="text-xs font-bold text-sigala-blue bg-blue-50 px-4 py-2 rounded-xl border border-blue-100 self-start md:self-auto flex items-center shadow-sm">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 mb-8">
        <div class="bg-white border border-gray-100 rounded-3xl p-5 sm:p-6 shadow-sm flex items-center justify-between border-l-4 border-l-blue-500">
            <div>
                <p class="text-xs sm:text-sm font-bold text-gray-400 mb-1 uppercase tracking-wider">Total Antrean</p>
                <h3 class="text-3xl sm:text-4xl font-black text-sigala-dark">{{ $totalAntrean }}</h3>
            </div>
            <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-blue-500 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
        </div>

        <div class="bg-white border border-gray-100 rounded-3xl p-5 sm:p-6 shadow-sm flex items-center justify-between border-l-4 border-l-teal-500">
            <div>
                <p class="text-xs sm:text-sm font-bold text-gray-400 mb-1 uppercase tracking-wider">Sedang Ditangani</p>
                <h3 class="text-3xl sm:text-4xl font-black text-teal-600">{{ $sedangDitangani }}</h3>
            </div>
            <div class="w-12 h-12 bg-teal-50 rounded-full flex items-center justify-center text-teal-500 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>

        <div class="bg-white border border-gray-100 rounded-3xl p-5 sm:p-6 shadow-sm flex items-center justify-between border-l-4 border-l-gray-400">
            <div>
                <p class="text-xs sm:text-sm font-bold text-gray-400 mb-1 uppercase tracking-wider">Selesai Hari Ini</p>
                <h3 class="text-3xl sm:text-4xl font-black text-gray-500">{{ $selesaiHariIni }}</h3>
            </div>
            <div class="w-12 h-12 bg-gray-50 rounded-full flex items-center justify-center text-gray-400 shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden">
        <div class="p-5 sm:p-6 border-b border-gray-50 flex items-center justify-between">
            <h3 class="font-bold text-sigala-dark">Pasien Menunggu</h3>
            <span class="text-xs font-bold bg-orange-50 text-orange-600 px-3 py-1 rounded-lg">{{ $pasienMenunggu->count() }} Antrean</span>
        </div>
        
        <div class="divide-y divide-gray-50">
            @forelse($pasienMenunggu as $pasien)
            <div class="p-4 sm:p-6 w-full flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 hover:bg-gray-50/50 transition">
                
                <div class="w-full sm:w-auto flex items-center justify-start">
                    <div class="w-12 h-12 bg-blue-50 text-sigala-blue rounded-full flex items-center justify-center font-bold text-lg mr-4 shrink-0 border border-blue-100">
                        {{ substr($pasien->user->name, 0, 1) }}
                    </div>
                    <div class="text-left">
                        <h4 class="font-bold text-sigala-dark text-sm sm:text-base">{{ $pasien->user->name }}</h4>
                        <p class="text-xs sm:text-sm text-gray-500 mt-0.5">{{ $pasien->keluhan }}</p>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-[10px] font-bold text-gray-500">{{ $pasien->created_at->format('H:i') }}</span>
                            <span class="text-[10px] text-gray-400">•</span>
                            <span class="text-[10px] text-orange-500 font-bold">{{ $pasien->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="w-full sm:w-auto shrink-0 mt-2 sm:mt-0">
                    <a href="{{ route('perawat.chat', $pasien->id) }}" class="block w-full sm:w-auto text-center px-6 py-2.5 bg-sigala-blue text-white text-xs sm:text-sm font-bold rounded-xl shadow-sm hover:bg-blue-700 transition">
                        Tangani
                    </a>
                </div>
            </div>
            @empty
            <div class="p-10 text-center flex flex-col items-center justify-center">
                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <h3 class="text-base font-bold text-sigala-dark mb-1">Belum Ada Antrean</h3>
                <p class="text-sm text-gray-500">Saat ini tidak ada pasien yang menunggu konsultasi.</p>
            </div>
            @endforelse
        </div>
    </div>
</x-app-layout>