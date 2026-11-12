<x-app-layout>
    <div class="max-w-xl mx-auto w-full pb-24" x-data="{ tab: 'informasi' }">
        
        <div class="mb-6 flex items-center">
            <a href="{{ route('edukasi.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Detail Edukasi</h1>
        </div>

        <div class="w-full h-48 sm:h-56 bg-{{ $disaster->warna }}-50 rounded-3xl mb-6 flex items-center justify-center relative overflow-hidden border border-{{ $disaster->warna }}-100">
            <img src="{{ asset('images/' . str_replace('-bumi', '', $disaster->slug) . '.png') }}" alt="{{ $disaster->nama }}" class="w-full h-full object-cover relative z-10">
        </div>

        <h2 class="text-2xl sm:text-3xl font-extrabold text-sigala-dark mb-2 capitalize">{{ $disaster->nama }}</h2>
        <p class="text-sm text-gray-500 mb-6">Kenali risiko, pahami langkahnya, selamatkan diri.</p>

        <div class="flex bg-gray-100 p-1.5 rounded-2xl mb-6">
            <button @click="tab = 'informasi'" :class="tab === 'informasi' ? 'bg-sigala-blue text-white shadow-sm' : 'text-gray-500 hover:text-sigala-dark'" class="flex-1 py-2.5 text-sm font-bold rounded-xl transition">Informasi</button>
            <button @click="tab = 'tips'" :class="tab === 'tips' ? 'bg-sigala-blue text-white shadow-sm' : 'text-gray-500 hover:text-sigala-dark'" class="flex-1 py-2.5 text-sm font-bold rounded-xl transition">Tips</button>
            <button @click="tab = 'video'" :class="tab === 'video' ? 'bg-sigala-blue text-white shadow-sm' : 'text-gray-500 hover:text-sigala-dark'" class="flex-1 py-2.5 text-sm font-bold rounded-xl transition">Video</button>
        </div>

        <div x-show="tab === 'informasi'" x-transition class="bg-white border border-gray-100 rounded-3xl p-5 sm:p-6 shadow-sm mb-8">
            <h3 class="text-lg font-bold text-sigala-blue mb-4">Apa itu {{ $disaster->nama }}?</h3>
            <p class="text-sm text-gray-600 leading-relaxed mb-6">
                @if($disaster->slug == 'gempa-bumi')
                    Gempa bumi adalah getaran atau guncangan yang terjadi di permukaan bumi akibat pergerakan atau pelepasan energi dari dalam bumi. Gempa dapat terjadi secara tiba-tiba dan menyebabkan kerusakan bangunan, tanah longsor, bahkan tsunami jika terjadi di bawah laut.
                @elseif($disaster->slug == 'banjir')
                    Banjir adalah peristiwa terbenamnya daratan (yang biasanya kering) karena volume air yang meningkat. Banjir dapat disebabkan oleh curah hujan yang tinggi, meluapnya sungai, atau buruknya sistem drainase.
                @elseif($disaster->slug == 'tsunami')
                    Tsunami adalah serangkaian gelombang laut yang sangat besar yang disebabkan oleh gempa bumi bawah laut, letusan gunung berapi, atau tanah longsor di dasar laut. Gelombang ini dapat bergerak dengan kecepatan tinggi dan menghantam pesisir.
                @elseif($disaster->slug == 'tanah-longsor')
                    Tanah longsor adalah perpindahan material pembentuk lereng berupa batuan, bahan rombakan, tanah, atau material campuran tersebut, bergerak ke bawah atau keluar lereng.
                @else
                    Bencana alam adalah peristiwa alam yang dapat menyebabkan kerusakan dan korban jiwa.
                @endif
            </p>

            <div class="bg-orange-50 border border-orange-100 rounded-2xl p-4 flex items-start">
                <div class="text-orange-500 mr-3 mt-0.5 shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h4 class="text-orange-900 font-bold text-sm mb-1">Tahukah Anda?</h4>
                    <p class="text-orange-700 text-xs leading-relaxed">Indonesia merupakan salah satu negara yang paling rawan gempa bumi di dunia karena berada di pertemuan tiga lempeng tektonik utama.</p>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('pertolongan.index') }}" class="w-full py-3.5 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition flex items-center justify-center">
                    Lihat Langkah Pertolongan <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>

        <div x-show="tab === 'tips'" x-transition class="bg-white border border-gray-100 rounded-3xl p-5 sm:p-6 shadow-sm mb-8">
            <h3 class="text-lg font-bold text-sigala-blue mb-4">Tips Keselamatan</h3>
            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-5 sm:p-6">
                <p class="text-sm text-gray-700 leading-relaxed whitespace-pre-line">{{ $disaster->tips }}</p>
            </div>
        </div>

        <div x-show="tab === 'video'" x-transition class="bg-white border border-gray-100 rounded-3xl p-5 sm:p-6 shadow-sm mb-8">
            <h3 class="text-lg font-bold text-sigala-blue mb-4">Video Edukasi</h3>
            
            @php
                $videos = json_decode($disaster->video_url) ?? [];
            @endphp

            @if(count($videos) > 0)
                <div class="space-y-6">
                    @foreach($videos as $video)
                        <div class="bg-gray-50 border border-gray-100 rounded-2xl p-4">
                            <div class="aspect-video w-full rounded-xl overflow-hidden bg-gray-200 mb-3">
                                <iframe class="w-full h-full" src="{{ $video->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <h4 class="font-bold text-sm text-sigala-dark">{{ $video->judul }}</h4>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-gray-50 border border-gray-100 rounded-2xl p-6 text-center">
                    <p class="text-sm text-gray-500">Video edukasi untuk bencana ini belum tersedia.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>