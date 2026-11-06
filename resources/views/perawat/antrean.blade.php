<x-app-layout>
    <div class="max-w-5xl mx-auto w-full">
        
        <div class="mb-8">
            <h1 class="text-2xl font-extrabold text-sigala-dark mb-1">Antrean Konsultasi</h1>
            <p class="text-gray-500 text-sm">Daftar pasien yang menunggu untuk ditangani.</p>
        </div>

        @if($antrean->isEmpty())
            <div class="bg-white border border-gray-100 rounded-3xl p-10 text-center shadow-sm">
                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-sigala-dark mb-1">Belum Ada Antrean</h3>
                <p class="text-sm text-gray-500">Saat ini tidak ada pasien yang menunggu konsultasi.</p>
            </div>
        @else
            <div class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden">
                <div class="divide-y divide-gray-100">
                    @foreach($antrean as $chat)
                    <div class="p-6 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:bg-gray-50/50 transition">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-full flex items-center justify-center font-bold text-lg mr-4">
                                {{ substr($chat->user->name, 0, 1) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-sigala-dark">{{ $chat->user->name }}</h3>
                                <p class="text-sm text-gray-500 line-clamp-1 max-w-md">{{ $chat->keluhan }}</p>
                                <p class="text-xs text-gray-400 mt-1">{{ $chat->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-[10px] font-bold px-3 py-1.5 rounded-lg {{ $chat->status === 'menunggu' ? 'bg-orange-50 text-orange-600' : 'bg-teal-50 text-teal-600' }}">
                                {{ strtoupper($chat->status) }}
                            </span>
                            <a href="{{ route('perawat.chat', $chat->id) }}" class="px-5 py-2.5 bg-sigala-blue hover:bg-blue-700 text-white text-sm font-bold rounded-xl shadow-sm transition-colors">
                                Buka Chat
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-app-layout>