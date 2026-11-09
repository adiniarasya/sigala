<x-app-layout>
    <div class="mb-6 md:mb-8">
        <h1 class="text-xl md:text-2xl font-extrabold text-sigala-dark">Halo, {{ Auth::user()->name }} 👋</h1>
        <p class="text-gray-500 text-xs md:text-sm mt-1">Tetap waspada dan jaga kesehatan Anda dan keluarga.</p>
    </div>

    <div class="bg-gradient-to-r from-sigala-blue to-blue-600 rounded-2xl md:rounded-[2rem] p-5 md:p-10 relative overflow-hidden shadow-lg shadow-blue-200/50 mb-6 md:mb-8">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl transform translate-x-1/3 -translate-y-1/3"></div>
        
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4 md:gap-6">
            <div>
                <div class="inline-flex items-center text-white text-[10px] md:text-xs font-bold bg-white/20 px-3 py-1.5 rounded-full backdrop-blur-md border border-white/20 mb-3 md:mb-4">
                    <svg class="w-3 h-3 md:w-4 md:h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                        {{ Auth::user()->alamat ?? 'Alamat belum diisi' }}
                </div>
                <h2 class="text-white text-lg md:text-3xl font-extrabold mb-1 md:mb-2">Skor Kesiapsiagaan</h2>
                <p class="text-blue-100 text-xs md:text-sm max-w-sm leading-relaxed">Anda sudah cukup siap, tapi masih ada beberapa hal yang perlu dilengkapi.</p>
            </div>
            
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl md:rounded-2xl p-4 md:p-6 flex flex-col justify-center items-center shrink-0 w-full md:w-40">
                <span class="text-white text-3xl md:text-5xl font-black">{{ $skorTerbaru ? $skorTerbaru->score : 0 }}%</span>
                <span class="text-blue-100 text-[10px] md:text-xs font-semibold mt-1">{{ $skorTerbaru ? $skorTerbaru->status : 'Belum Diisi' }}</span>
            </div>
        </div>
    </div>

    <h2 class="text-lg md:text-xl font-bold text-sigala-dark mb-3 md:mb-4">Layanan Utama</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-4 mb-6 md:mb-8">
        <a href="{{ route('cek-kondisi') }}" class="bg-white border border-gray-100 rounded-xl md:rounded-2xl p-4 md:p-5 flex flex-col items-center justify-center hover:shadow-md transition group">
            <div class="w-10 h-10 md:w-14 md:h-14 bg-blue-50 text-sigala-blue rounded-lg md:rounded-2xl flex items-center justify-center mb-2 md:mb-3 group-hover:scale-110 transition-transform">
                <svg class="w-5 h-5 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <span class="text-xs md:text-sm font-bold text-gray-700 text-center">Cek Kondisi</span>
        </a>
        
        <a href="{{ route('edukasi.index') }}" class="bg-white border border-gray-100 rounded-xl md:rounded-2xl p-4 md:p-5 flex flex-col items-center justify-center hover:shadow-md transition group">
            <div class="w-10 h-10 md:w-14 md:h-14 bg-teal-50 text-teal-600 rounded-lg md:rounded-2xl flex items-center justify-center mb-2 md:mb-3 group-hover:scale-110 transition-transform">
                <svg class="w-5 h-5 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <span class="text-xs md:text-sm font-bold text-gray-700 text-center">Edukasi</span>
        </a>

        <a href="{{ route('tas-siaga') }}" class="bg-white border border-gray-100 rounded-xl md:rounded-2xl p-4 md:p-5 flex flex-col items-center justify-center hover:shadow-md transition group">
            <div class="w-10 h-10 md:w-14 md:h-14 bg-orange-50 text-orange-500 rounded-lg md:rounded-2xl flex items-center justify-center mb-2 md:mb-3 group-hover:scale-110 transition-transform">
                <svg class="w-5 h-5 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
            <span class="text-xs md:text-sm font-bold text-gray-700 text-center">Tas Siaga</span>
        </a>

        <a href="{{ route('pertolongan.index') }}" class="bg-white border border-gray-100 rounded-xl md:rounded-2xl p-4 md:p-5 flex flex-col items-center justify-center hover:shadow-md transition group">
            <div class="w-10 h-10 md:w-14 md:h-14 bg-red-50 text-red-500 rounded-lg md:rounded-2xl flex items-center justify-center mb-2 md:mb-3 group-hover:scale-110 transition-transform">
                <svg class="w-5 h-5 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <span class="text-xs md:text-sm font-bold text-gray-700 text-center">Pertolongan</span>
        </a>

        <a href="{{ route('konsultasi.index') }}" class="bg-white border border-gray-100 rounded-xl md:rounded-2xl p-4 md:p-5 flex flex-col items-center justify-center hover:shadow-md transition group">
            <div class="w-10 h-10 md:w-14 md:h-14 bg-purple-50 text-purple-500 rounded-lg md:rounded-2xl flex items-center justify-center mb-2 md:mb-3 group-hover:scale-110 transition-transform">
                <svg class="w-5 h-5 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
            </div>
            <span class="text-xs md:text-sm font-bold text-gray-700 text-center">Konsultasi</span>
        </a>

                <a href="{{ route('lainnya.index') }}" class="bg-white border border-gray-100 rounded-xl md:rounded-2xl p-4 md:p-5 flex flex-col items-center justify-center hover:shadow-md transition group">
            <div class="w-10 h-10 md:w-14 md:h-14 bg-gray-100 text-gray-500 rounded-lg md:rounded-2xl flex items-center justify-center mb-2 md:mb-3 group-hover:scale-110 transition-transform">
                <svg class="w-5 h-5 md:w-7 md:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
            </div>
            <span class="text-xs md:text-sm font-bold text-gray-700 text-center">Lainnya</span>
        </a>
    </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
        @if($gempaBmkg)
        <div class="bg-orange-50/70 border border-orange-100 rounded-2xl p-5 shadow-sm flex items-start">
            <div class="bg-orange-500 text-white p-2.5 rounded-xl mr-4 mt-0.5 shrink-0 shadow-sm shadow-orange-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <div>
                <h3 class="text-orange-900 font-bold text-sm mb-1">Gempa Terkini (BMKG)</h3>
                <p class="text-orange-700 text-xs leading-relaxed mb-1"><strong>M {{ $gempaBmkg['magnitude'] }}</strong> - {{ $gempaBmkg['wilayah'] }}</p>
                <p class="text-orange-600 text-[10px] mb-2">Kedalaman: {{ $gempaBmkg['kedalaman'] }} | {{ $gempaBmkg['waktu'] }}</p>
            </div>
        </div>
        @endif

        <a href="{{ route('kesiapsiagaan') }}" class="block bg-white border border-gray-100 rounded-2xl p-5 shadow-sm hover:shadow-md transition group">
            <div class="flex justify-between items-center mb-2">
                <h3 class="font-bold text-sigala-dark text-sm">Cek Kesiapsiagaan</h3>
                <span class="bg-blue-50 text-sigala-blue text-[10px] font-bold px-2 py-1 rounded-md group-hover:bg-blue-100 transition">
                    {{ $skorTerbaru ? 'Cek Ulang' : 'Mulai' }}
                </span>
            </div>
            <p class="text-xs text-gray-500 leading-relaxed">
                @if($skorTerbaru)
                    Skor Anda saat ini: <strong class="text-sigala-blue">{{ $skorTerbaru->score }}%</strong>. Klik untuk memperbarui.
                @else
                    Jawab 5 pertanyaan singkat untuk mengetahui seberapa siap Anda menghadapi bencana.
                @endif
            </p>
        </a>
    </div>
</x-app-layout>