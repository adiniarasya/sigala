<x-app-layout>
    <div class="max-w-6xl mx-auto w-full">
        
        <div class="mb-10 text-center md:text-left">
            <h1 class="text-3xl md:text-4xl font-extrabold text-sigala-dark mb-2 tracking-tight">Pertolongan Pertama</h1>
            <p class="text-gray-500 text-base md:text-lg">Pilih kondisi yang ingin Anda ketahui cara penanganannya.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            @foreach($topics as $topic)
            <a href="{{ route('pertolongan.show', $topic->slug) }}" class="group bg-white border border-gray-100 rounded-3xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center">
                <div class="w-16 h-16 bg-{{ $topic->warna }}-50 text-{{ $topic->warna }}-500 rounded-2xl flex items-center justify-center mr-6 group-hover:scale-110 transition-transform text-3xl">
                    {{ $topic->ikon }}
                </div>
                <div>
                    <h3 class="font-extrabold text-xl text-sigala-dark mb-1">{{ $topic->nama }}</h3>
                    <p class="text-sm text-gray-500">Pelajari langkah-langkah penanganan {{ strtolower($topic->nama) }}.</p>
                </div>
            </a>
            @endforeach

        </div>
    </div>
</x-app-layout>