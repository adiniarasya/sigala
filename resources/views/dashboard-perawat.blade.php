<x-app-layout>
    <div class="mb-8">
        <h1 class="text-2xl font-extrabold text-sigala-dark mb-1">Selamat Datang, Perawat {{ Auth::user()->name }} 👋</h1>
        <p class="text-gray-500 text-sm">Berikut adalah ringkasan antrean pasien Anda hari ini.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-500 mb-1">Total Antrean</p>
            <h3 class="text-3xl font-black text-sigala-dark">2</h3>
        </div>
        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-500 mb-1">Sedang Ditangani</p>
            <h3 class="text-3xl font-black text-teal-600">0</h3>
        </div>
        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
            <p class="text-sm font-semibold text-gray-500 mb-1">Selesai Hari Ini</p>
            <h3 class="text-3xl font-black text-gray-400">5</h3>
        </div>
    </div>

    <div class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-50">
            <h3 class="font-bold text-sigala-dark">Pasien Menunggu</h3>
        </div>
        <div class="divide-y divide-gray-50">
            @foreach($antrean as $pasien)
            <div class="p-6 flex items-center justify-between hover:bg-gray-50/50 transition">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-full flex items-center justify-center font-bold text-lg mr-4">
                        {{ substr($pasien->nama, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-bold text-sigala-dark">{{ $pasien->nama }}</h4>
                        <p class="text-sm text-gray-500">{{ $pasien->keluhan }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm font-semibold text-gray-400">{{ $pasien->waktu }}</span>
                    <button class="px-5 py-2.5 bg-sigala-blue text-white text-sm font-bold rounded-xl shadow-sm hover:bg-blue-700 transition">
                        Tangani
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>