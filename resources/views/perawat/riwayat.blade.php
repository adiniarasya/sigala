<x-app-layout>
    <div class="max-w-5xl mx-auto w-full">
        
        <div class="mb-8">
            <h1 class="text-2xl font-extrabold text-sigala-dark mb-1">Riwayat Pasien</h1>
            <p class="text-gray-500 text-sm">Daftar pasien yang telah selesai Anda tangani.</p>
        </div>

        @if($riwayat->isEmpty())
            <div class="bg-white border border-gray-100 rounded-3xl p-10 text-center shadow-sm">
                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-sigala-dark mb-1">Belum Ada Riwayat</h3>
                <p class="text-sm text-gray-500">Anda belum menyelesaikan konsultasi apa pun.</p>
            </div>
        @else
            <div class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden">
                <div class="divide-y divide-gray-100">
                    @foreach($riwayat as $chat)
                    <div class="p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:bg-gray-50/50 transition">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center font-extrabold text-xl mr-4 shadow-sm border-2 border-white">
                                {{ substr($chat->user->name, 0, 1) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-sigala-dark">{{ $chat->user->name }}</h3>
                                <p class="text-xs font-bold text-sigala-blue mb-1">{{ $chat->jenis }}</p>
                                <p class="text-sm text-gray-500 line-clamp-1 max-w-md">{{ $chat->keluhan }}</p>
                                <p class="text-xs text-gray-400 mt-1">Selesai pada: {{ $chat->updated_at->format('d M Y - H:i') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-[10px] font-bold px-3 py-1.5 rounded-lg bg-teal-50 text-teal-600">
                                SELESAI
                            </span>
                            <a href="{{ route('perawat.chat', $chat->id) }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-bold rounded-xl transition-colors">
                                Lihat Obrolan
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-app-layout>