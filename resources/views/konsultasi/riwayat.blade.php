<x-app-layout>
    <div class="max-w-xl mx-auto w-full" x-data="{ filter: 'semua' }">
        
        <div class="mb-6 flex items-center">
            <a href="{{ route('konsultasi.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Riwayat Konsultasi</h1>
        </div>

        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm mb-6 flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-14 h-14 bg-blue-100 text-sigala-blue rounded-full flex items-center justify-center mr-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div>
                    <h3 class="font-bold text-sigala-blue text-sm">Total Konsultasi</h3>
                    <div class="flex items-end gap-1 mt-1">
                        <span class="text-2xl font-black text-sigala-dark">{{ $riwayat->count() }}</span>
                        <span class="text-xs text-gray-500 mb-1">kali</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex space-x-2 mb-4 overflow-x-auto pb-2">
            <button @click="filter = 'semua'" :class="filter === 'semua' ? 'bg-sigala-blue text-white' : 'bg-white border border-gray-200 text-gray-500 hover:bg-gray-50'" class="px-4 py-2 text-xs font-bold rounded-full whitespace-nowrap transition">Semua</button>
            <button @click="filter = 'keluhan'" :class="filter === 'keluhan' ? 'bg-sigala-blue text-white' : 'bg-white border border-gray-200 text-gray-500 hover:bg-gray-50'" class="px-4 py-2 text-xs font-bold rounded-full whitespace-nowrap transition">Keluhan</button>
            <button @click="filter = 'skrining'" :class="filter === 'skrining' ? 'bg-sigala-blue text-white' : 'bg-white border border-gray-200 text-gray-500 hover:bg-gray-50'" class="px-4 py-2 text-xs font-bold rounded-full whitespace-nowrap transition">Skrining</button>
            <button @click="filter = 'bencana'" :class="filter === 'bencana' ? 'bg-sigala-blue text-white' : 'bg-white border border-gray-200 text-gray-500 hover:bg-gray-50'" class="px-4 py-2 text-xs font-bold rounded-full whitespace-nowrap transition">Bencana</button>
        </div>

        <div class="space-y-3">
            @forelse($riwayat as $chat)
                @php
                    $jenis = $chat->jenis ?? 'Konsultasi Keluhan Kesehatan';
                    
                    if (str_contains($jenis, 'Bencana')) {
                        $tipe = 'bencana';
                        $bgIcon = 'bg-red-50 text-red-500';
                        $iconSvg = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>';
                    } elseif (str_contains($jenis, 'Skrining')) {
                        $tipe = 'skrining';
                        $bgIcon = 'bg-teal-50 text-teal-500';
                        $iconSvg = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>';
                    } else {
                        $tipe = 'keluhan';
                        $bgIcon = 'bg-purple-50 text-purple-500';
                        $iconSvg = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>';
                    }
                @endphp
                
                <a x-show="filter === 'semua' || filter === '{{ $tipe }}'" href="{{ route('konsultasi.chat', $chat->id) }}" class="block bg-white border border-gray-100 rounded-2xl p-4 shadow-sm hover:shadow-md transition">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start">
                            <div class="w-12 h-12 {{ $bgIcon }} rounded-full flex items-center justify-center mr-4 shrink-0 mt-0.5">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $iconSvg !!}</svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-sigala-dark">{{ $jenis }}</h3>
                                <p class="text-xs text-gray-500 mt-1">{{ $chat->created_at->format('d M Y - H:i') }}</p>
                                <span class="inline-block mt-2 text-[10px] font-bold px-2.5 py-1 bg-teal-50 text-teal-600 rounded-md">Selesai</span>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-sigala-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </div>
                </a>
            @empty
                <div class="text-center py-10">
                    <p class="text-sm text-gray-500">Belum ada riwayat konsultasi.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>