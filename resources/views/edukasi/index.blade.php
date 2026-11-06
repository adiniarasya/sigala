<x-app-layout>
    <div class="max-w-6xl mx-auto w-full">
        
        <div class="mb-10 text-center md:text-left">
            <h1 class="text-3xl md:text-4xl font-extrabold text-sigala-dark mb-2 tracking-tight">Siaga Edukasi</h1>
            <p class="text-gray-500 text-base md:text-lg">Tingkatkan pengetahuan Anda tentang bencana dan kesehatan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            @foreach($disasters as $disaster)
            <a href="{{ route('edukasi.show', $disaster->slug) }}" class="group relative bg-white border border-gray-100 rounded-3xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                
                <div class="absolute top-0 right-0 w-32 h-32 bg-{{ $disaster->warna }}-50 rounded-bl-full -z-10 group-hover:scale-110 transition-transform"></div>
                
                <div class="w-16 h-16 bg-gradient-to-br from-{{ $disaster->warna }}-100 to-{{ $disaster->warna }}-50 text-{{ $disaster->warna }}-500 rounded-2xl flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform text-3xl">
                    {{ $disaster->ikon }}
                </div>
                
                <h3 class="font-extrabold text-2xl text-sigala-dark mb-2">{{ $disaster->nama }}</h3>
                <p class="text-sm text-gray-500 mb-6 leading-relaxed">Pelajari cara melindungi diri dan langkah evakuasi yang aman saat terjadi {{ strtolower($disaster->nama) }}.</p>
                
                <div class="flex items-center text-sigala-blue font-bold text-sm group-hover:translate-x-2 transition-transform">
                    Pelajari Selengkapnya 
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </div>
            </a>
            @endforeach

        </div>
    </div>
</x-app-layout>