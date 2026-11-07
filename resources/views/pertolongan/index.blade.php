<x-app-layout>
    <div class="max-w-5xl mx-auto w-full">
        
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-sigala-dark mb-2 tracking-tight">Pertolongan Pertama</h1>
            <p class="text-gray-500 text-base">Pilih kondisi yang ingin Anda ketahui cara penanganannya.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($topics as $topic)
            <a href="{{ route('pertolongan.show', $topic->slug) }}" class="group bg-white border border-gray-100 rounded-3xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center">
                <div class="w-16 h-16 bg-{{ $topic->warna }}-50 text-{{ $topic->warna }}-500 rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform text-3xl">
                    {{ $topic->ikon }}
                </div>
                <div class="flex-1">
                    <h3 class="font-extrabold text-xl text-sigala-dark mb-1">{{ $topic->nama }}</h3>
                    <p class="text-sm text-gray-500">Pelajari langkah-langkah penanganan {{ strtolower($topic->nama) }}.</p>
                </div>
                <svg class="w-5 h-5 text-gray-300 group-hover:text-sigala-blue transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>