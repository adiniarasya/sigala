<x-app-layout>
    <div class="mb-8">
        <h1 class="text-2xl font-extrabold text-sigala-dark mb-1">Selamat Datang, Perawat {{ Auth::user()->name }} 👋</h1>
        <p class="text-gray-500 text-sm">Berikut adalah ringkasan antrean pasien Anda hari ini.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-500 mb-1">Total Antrean</p>
            <h3 class="text-3xl font-black text-sigala-dark">{{ $totalAntrean }}</h3>
        </div>
        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-500 mb-1">Sedang Ditangani</p>
            <h3 class="text-3xl font-black text-teal-600">{{ $sedangDitangani }}</h3>
        </div>
        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-500 mb-1">Selesai Hari Ini</p>
            <h3 class="text-3xl font-black text-gray-400">{{ $selesaiHariIni }}</h3>
        </div>
    </div>

    <div class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-50">
            <h3 class="font-bold text-sigala-dark">Pasien Menunggu</h3>
        </div>
        <div class="divide-y divide-gray-50">
            @forelse($pasienMenunggu as $pasien)
            <div class="p-6 flex items-center justify-between hover:bg-gray-50/50 transition">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-full flex items-center justify-center font-bold text-lg mr-4">
                        {{ substr($pasien->user->name, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-bold text-sigala-dark">{{ $pasien->user->name }}</h4>
                        <p class="text-sm text-gray-500">{{ $pasien->keluhan }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm font-semibold text-gray-400">{{ $pasien->created_at->format('H:i') }}</span>
                    <a href="{{ route('perawat.chat', $pasien->id) }}" class="px-5 py-2.5 bg-sigala-blue text-white text-sm font-bold rounded-xl shadow-sm hover:bg-blue-700 transition">
                        Tangani
                    </a>
                </div>
            </div>
            @empty
            <div class="p-10 text-center flex flex-col items-center justify-center">
                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-sigala-dark mb-1">Belum Ada Antrean</h3>
                <p class="text-sm text-gray-500">Saat ini tidak ada pasien yang menunggu konsultasi.</p>
            </div>
            @endforelse
        </div>
    </div>
</x-app-layout>