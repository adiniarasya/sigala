<x-app-layout>
    <div class="max-w-4xl mx-auto w-full">
        
        <div class="mb-6 flex items-center">
            <a href="{{ route('edukasi.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Detail Edukasi</h1>
        </div>

        <div class="bg-white border border-gray-200 rounded-3xl overflow-hidden shadow-sm">
            
            <div class="w-full h-64 md:h-80 bg-{{ $disaster->warna }}-50 flex items-center justify-center relative overflow-hidden border-b border-{{ $disaster->warna }}-100">
                <div class="text-8xl">{{ $disaster->ikon }}</div>
            </div>

            <div class="p-6 md:p-10">
                
                <h2 class="text-3xl font-extrabold text-sigala-dark mb-3 capitalize">{{ $disaster->nama }}</h2>
                <p class="text-base text-gray-500 mb-8">Kenali risiko, pahami langkahnya, selamatkan diri.</p>

                <div class="prose prose-lg text-gray-600 mb-10 max-w-none">
                    <h3 class="text-sigala-dark font-bold text-xl mb-4">Apa itu {{ $disaster->nama }}?</h3>
                    <p class="leading-relaxed">
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
                </div>

                <div class="bg-{{ $disaster->warna }}-50 border border-{{ $disaster->warna }}-100 rounded-2xl p-6 flex items-start mb-10">
                    <div class="text-{{ $disaster->warna }}-500 mr-4 mt-0.5 shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-{{ $disaster->warna }}-800 font-bold text-base mb-1">Tahukah Anda?</h4>
                        <p class="text-{{ $disaster->warna }}-700 text-sm leading-relaxed">Indonesia merupakan salah satu negara yang paling rawan terhadap bencana {{ strtolower($disaster->nama) }} di dunia.</p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-4 pt-6 border-t border-gray-100">
                    <a href="#" class="flex-1 flex justify-center items-center py-3.5 px-6 bg-sigala-blue hover:bg-blue-700 text-white font-bold text-sm rounded-xl shadow-sm transition-all">
                        Lihat Langkah Pertolongan
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>