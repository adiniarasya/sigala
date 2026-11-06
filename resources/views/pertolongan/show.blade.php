<x-app-layout>
    <div class="max-w-4xl mx-auto w-full">
        
        <div class="mb-6 flex items-center">
            <a href="{{ route('pertolongan.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Pertolongan Pertama</h1>
        </div>

        <div class="bg-white border border-gray-200 rounded-[2rem] p-8 md:p-12 shadow-sm relative overflow-hidden">
            
            <div class="w-full h-48 md:h-64 bg-{{ $topic->warna }}-50 rounded-2xl mb-8 flex items-center justify-center relative overflow-hidden border border-{{ $topic->warna }}-100">
                <div class="text-8xl">{{ $topic->ikon }}</div>
            </div>

            <h2 class="text-3xl font-extrabold text-sigala-dark mb-8 capitalize">{{ $topic->nama }}</h2>

            <div class="space-y-6">
                <h3 class="text-xl font-bold text-sigala-dark mb-4">Langkah-langkah pertolongan pertama</h3>
                
                @foreach($topic->steps as $step)
                <div class="flex items-start">
                    <div class="w-10 h-10 bg-sigala-blue text-white rounded-full flex items-center justify-center font-bold text-lg mr-4 shrink-0 shadow-md">{{ $step->urutan }}</div>
                    <div class="pt-1.5">
                        <p class="text-gray-600 leading-relaxed text-sm md:text-base">{{ $step->instruksi }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-10 bg-blue-50 border border-blue-100 rounded-2xl p-5 flex items-start">
                <div class="text-sigala-blue mr-4 mt-0.5 shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-blue-800 text-sm leading-relaxed font-medium">Pastikan Anda selalu mengutamakan keselamatan diri sendiri sebelum menolong korban.</p>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-100 flex justify-center">
                <a href="tel:112" class="inline-flex justify-center items-center py-3.5 px-8 bg-red-600 hover:bg-red-700 text-white font-bold text-sm rounded-xl shadow-md transition-all">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    Hubungi Layanan Darurat (112)
                </a>
            </div>

        </div>
    </div>
</x-app-layout>