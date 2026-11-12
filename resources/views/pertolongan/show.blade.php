<x-app-layout>
    <div class="max-w-xl mx-auto w-full pb-24">
        
        <div class="mb-6 flex items-center">
            <a href="{{ route('pertolongan.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-blue capitalize truncate">{{ $topic->nama }}</h1>
        </div>

        <div class="w-full h-56 sm:h-64 bg-{{ $topic->warna }}-50 rounded-3xl mb-8 flex items-center justify-center relative overflow-hidden border border-{{ $topic->warna }}-100 p-4">
            @if(file_exists(public_path('images/' . $topic->slug . '.png')))
                <img src="{{ asset('images/' . $topic->slug . '.png') }}" alt="{{ $topic->nama }}" class="w-full h-full object-contain relative z-10">
            @else
                <div class="absolute inset-0 opacity-40 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
                <div class="text-9xl relative z-10">{{ $topic->ikon }}</div>
            @endif
        </div>

        @if($topic->slug == 'dehidrasi')
            <div class="mb-8">
                <h2 class="text-lg font-extrabold text-sigala-blue mb-4">Tanda-tanda</h2>
                <ul class="space-y-3">
                    <li class="flex items-center text-sm font-semibold text-gray-700"><span class="text-sigala-blue mr-2">🔵</span> Rasa haus yang berlebihan</li>
                    <li class="flex items-center text-sm font-semibold text-gray-700"><span class="text-sigala-blue mr-2">🔵</span> Mulut dan bibir kering</li>
                    <li class="flex items-center text-sm font-semibold text-gray-700"><span class="text-sigala-blue mr-2">🔵</span> Urine berwarna gelap</li>
                    <li class="flex items-center text-sm font-semibold text-gray-700"><span class="text-sigala-blue mr-2">🔵</span> Pusing atau lemas</li>
                    <li class="flex items-center text-sm font-semibold text-gray-700"><span class="text-sigala-blue mr-2">🔵</span> Jarang buang air kecil</li>
                </ul>
            </div>
        @endif

        @if($topic->slug == 'kondisi-kegawatdaruratan')
            <div class="bg-red-50 border border-red-100 rounded-2xl p-6 mb-8">
                <h2 class="text-lg font-extrabold text-red-600 mb-2">Segera ke Fasilitas Kesehatan</h2>
                <p class="text-sm text-red-800 leading-relaxed">Untuk memastikan kondisi Anda, segera kunjungi fasilitas kesehatan terdekat atau hubungi layanan darurat.</p>
            </div>
            <div class="mb-8">
                <h2 class="text-lg font-extrabold text-red-600 mb-4">Tanda-tanda yang Perlu Diwaspadai</h2>
                <ul class="space-y-3">
                    <li class="flex items-center text-sm font-semibold text-gray-700"><span class="text-red-500 mr-2">🔴</span> Nyeri dada yang hebat</li>
                    <li class="flex items-center text-sm font-semibold text-gray-700"><span class="text-red-500 mr-2">🔴</span> Sesak napas berat</li>
                    <li class="flex items-center text-sm font-semibold text-gray-700"><span class="text-red-500 mr-2">🔴</span> Kehilangan kesadaran</li>
                    <li class="flex items-center text-sm font-semibold text-gray-700"><span class="text-red-500 mr-2">🔴</span> Kejang terus-menerus</li>
                </ul>
            </div>
        @endif

        <h2 class="text-lg font-extrabold text-sigala-blue mb-4">Langkah-langkah pertolongan pertama</h2>
        
        <div class="bg-sigala-light rounded-3xl p-5 sm:p-6 space-y-6 mb-8">
            @foreach($topic->steps as $step)
            <div class="flex items-start">
                <div class="w-8 h-8 bg-sigala-blue text-white rounded-full flex items-center justify-center font-bold text-sm mr-4 shrink-0 shadow-sm">{{ $step->urutan }}</div>
                <div class="pt-1">
                    <p class="text-gray-700 leading-relaxed text-sm">{{ $step->instruksi }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div class="bg-sigala-light border border-blue-100 rounded-2xl p-5 sm:p-6 flex items-start mb-8">
            <div class="w-8 h-8 bg-sigala-blue text-white rounded-full flex items-center justify-center mr-4 shrink-0">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <div>
                @if($topic->slug == 'luka')
                    <p class="text-xs text-sigala-dark leading-relaxed font-semibold">Jangan mengoleskan alkohol atau obat yang tidak dianjurkan pada luka terbuka.</p>
                @elseif($topic->slug == 'pendarahan')
                    <p class="text-xs text-sigala-dark leading-relaxed font-semibold">Untuk pendarahan hebat, segera hubungi layanan darurat (119 atau rumah sakit terdekat).</p>
                @elseif($topic->slug == 'luka-bakar')
                    <p class="text-xs text-sigala-dark leading-relaxed font-semibold">Luka bakar yang parah bisa berbahaya dan memerlukan penanganan medis segera.</p>
                @elseif($topic->slug == 'pingsan')
                    <p class="text-xs text-sigala-dark leading-relaxed font-semibold">Jangan memberikan makanan atau minuman saat korban masih tidak sadar.</p>
                @elseif($topic->slug == 'cedera')
                    <p class="text-xs text-sigala-dark leading-relaxed font-semibold">Jangan memberikan makanan atau minuman saat korban masih tidak sadar.</p>
                @elseif($topic->slug == 'dehidrasi')
                    <p class="text-xs text-sigala-dark leading-relaxed font-semibold">Pada anak-anak, lansia, dan penderita penyakit tertentu, dehidrasi dapat terjadi lebih cepat dan berbahaya.</p>
                @elseif($topic->slug == 'kondisi-kegawatdaruratan')
                    <p class="text-xs text-sigala-dark leading-relaxed font-semibold">Jangan menunggu sampai kondisi memburuk. Semakin cepat penanganan, semakin besar peluang keselamatan.</p>
                @endif
            </div>
        </div>

        @if($topic->slug == 'kondisi-kegawatdaruratan')
            <a href="tel:119" class="w-full py-3.5 bg-red-600 hover:bg-red-700 text-white font-bold text-sm rounded-xl shadow-md transition-all flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                Hubungi Darurat
            </a>
        @endif

    </div>
</x-app-layout>